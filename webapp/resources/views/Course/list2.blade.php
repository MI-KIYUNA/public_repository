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
        <h1>スポーツジム 講座検索 <span>~ajaxで検索するver~</span></h1>

        <!--- 検索 フィールド --->
        <div class="search-container">
            <div class="search-field">
                <label>都道府県</label>
                <input type="text" class="prefecture_input" id="prefecture_input" placeholder="検索">
                <select name="prefecture_select" id="prefecture_select">
                    <!-- prefecture.jsで都道府県optionを埋める -->
                </select>
            </div>

            <div class="search-field">
                <label>施設名</label>
                <input type="text" class="gym_input" id="gym_input" placeholder="検索">
                <select name="gym_select" id="gym_select">
                    <!-- gym.jsで施設optionを埋める -->
                </select>
            </div>
            <div class="search-field">
                <label>講座レベル</label>
                <select name="course_level_select" id="course_level_select">
                    <!-- level.jsで講座レベルoptionを埋める -->
                </select>
            </div>
            <div class="search-field-reset">
                <button id="reset_button">検索条件をクリア</button>
            </div>
        </div>

        <!--- 講座一覧 フィールド --->
        <div class="course-list-container">
            <table border="1" id="course-table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>講座名</th>
                        <th>レベル</th>
                        <th>施設名</th>
                        <th>概要</th>
                        <th>講師名</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- course_list.jsで取得・表示 -->
                </tbody>
            </table>
        </div>

        <!-- 該当する講座が見つからなかった場合のメッセージ -->
        <div class="no-courses-message" style="display: none;">
            <p>該当する講座が見つかりませんでした。</p>
        </div>
    </div>

    <script>
        window.apiCoursesUrl = "{{ route('sportGym.courses') }}";
        window.prefectureApiUrl = "{{ route('prefectures') }}";
        window.gymApiUrl = "{{ route('sportGym.gyms') }}";
        window.levelApiUrl = "{{ route('sportGym.levels') }}";
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js/sportsCourse/course.js') }}"></script>
    <script src="{{ asset('js/sportsCourse/gym.js') }}"></script>
    <script src="{{ asset('js/sportsCourse/prefecture.js') }}"></script>
    <script src="{{ asset('js/sportsCourse/level.js') }}"></script>
    <script src="{{ asset('js/sportsCourse/setup.js') }}"></script>
</body>
</html>