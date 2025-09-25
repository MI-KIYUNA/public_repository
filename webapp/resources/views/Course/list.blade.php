<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/gym_courses.css') }}">
</head>
<body>
    <div class="wrapper">
        <h1>スポーツジム 講座検索 <span>~オフラインで検索するver~</span></h1>

        <!--- 検索 フィールド --->
        <div class="search-container">
            <div class="search-field">
                <label>都道府県</label>
                <input type="text" class="prefecture_input" placeholder="検索">
                <select name="prefecture_select" id="prefecture_select">
                    <option value="">---</option>
                    @foreach ($prefectures as $prefecture)
                    <option value="{{ $prefecture['id'] }}">{{ $prefecture['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search-field">
                <label>施設名</label>
                <input type="text" class="gym_input" placeholder="検索">
                <select name="gym_select" id="gym_select">
                    <option value="">---</option>
                    @foreach ($gymList as $gym)
                    <option value="{{ $gym['id'] }}">{{ $gym['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search-field">
                <label>講座レベル</label>
                <select name="course_level" id="course_level">
                    <option value="">---</option>
                    @foreach ($courseLevels as $level)
                        <option value="{{ $level['id'] }}">{{ $level['name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!--- 講座一覧 フィールド --->
        <div class="course-list-container">
            <table border="1">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>講座名</th>
                        <th>レベル</th>
                        <th>施設名</th>
                        <th>概要</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td class="center">{{ $course['id'] }}</td>
                            <td class="center">{{ $course['course'] }}</td>
                            <td class="center">{{ $course['level_name'] }}</td>
                            <td class="center">{{ $course['gym']['name'] }}</td>
                            <td>{{ $course['outline'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- 該当する講座が見つからなかった場合のメッセージ -->
        <div class="no-courses-message" style="display: none;">
            <p>該当する講座が見つかりませんでした。</p>
        </div>
    </div>

    <script>
        window.prefectureData = @json($prefectures);
        window.gymData = @json($gymList);
        window.courses = @json($courses);
    </script>
    <script src="{{ asset('js/sportsCourse/filter.js') }}"></script>
</body>
</html>