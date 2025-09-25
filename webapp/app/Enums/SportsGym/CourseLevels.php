<?php

namespace App\Enums\SportsGym;

enum CourseLevels: int
{
    case Beginner = 1;
    case Intermediate = 2;
    case Advanced = 3;
    case Expert = 4;


    public function label(): string
    {
        return match ($this) {
            self::Beginner => '初級',
            self::Intermediate => '中級',
            self::Advanced => '上級者',
            self::Expert => 'エキスパート',
        };
    }

    /**
     * 講座の配列を返す関数
     *
     * @return array key:講座ID, value:[ 講座ID, 講座名]
     */
    public static function getCourseLevelList(): array
    {
        $courseLevels = [];
        foreach (self::cases() as $level) {
            $courseLevels[$level->value] = [
                'id' => $level->value,
                'name' => $level->label(),
            ];
        }
        return $courseLevels;
    }

    /**
     * レベルIDからレベル名を返す関数 TODO: イケてないので調べる
     *
     * @return string 講座レベル名
     */
    public static function getCourseLevelNameById(
        int $id
    ): ?string
    {
        foreach (self::cases() as $level) {
            if ($level->value === $id) {
                return $level->label();
            }
        }
        return "";
    }
}