<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class SportCourse extends Authenticatable
{
    use HasFactory, Notifiable;

    // スポーツジム講座テーブル
    protected $table = 'sport_courses';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'gym_id',
        'teacher_id',
        'outline',
    ];

    static public function getSportCourseList(): Collection
    {
        return self::with(['gym', 'teacher'])->get();
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * ジム講座一覧取得
     *
     * @param string|null $state
     * @param int|null $gymId
     * @param int|null $levelId
     * @return Collection
     */
    static public function getSportCourseListByFilter(
        ?string $state,
        ?int $gymId,
        ?int $levelId
    ): Collection
    {
        $select = self::getListSelect();

        // 条件付きで講座一覧を取得
        $list = self::query()
                ->join('gyms', 'sport_courses.gym_id', '=', 'gyms.id')
                ->join('teachers', 'sport_courses.teacher_id', '=', 'teachers.id')
                ->select($select);
  
        if ($state) {
            $list->where('state', $state);
        }
        if ($gymId) {
            $list->where('gym_id', $gymId);
        }
        if ($levelId) {
            $list->where('level', $levelId);
        }
        return $list->get();
    }

    static private function getListSelect(): array
    {
        return [
            'sport_courses.id as id',
            'sport_courses.name as name',
            'sport_courses.level as level',
            'sport_courses.outline as outline',
            'gyms.id as gym_id',
            'gyms.name as gym_name',
            'gyms.state as state',
            'teachers.first_name as teacher_first_name',
            'teachers.last_name as teacher_last_name',
        ];
    }

    private function getDetailsSelect(int $courseId): array
    {
        return [
            'sport_courses.id as id',
            'sport_courses.name as name',
            'sport_courses.level as level',
            'sport_courses.outline as outline',
            'gyms.id as gym_id',
            'gyms.name as gym_name',
            'gyms.state as state',
            'gyms.city as city',
            'gyms.street as street',
            'gyms.other_address as other_address',
            'gyms.email as email',
            'gyms.phone_number as phone_number',
            'teachers.id as teacher_id',
            'teachers.first_name as teacher_first_name',
            'teachers.last_name as teacher_last_name',
            'teachers.email as teacher_email',
            'teachers.phone_number as teacher_phone_number',
        ];
    }
}
