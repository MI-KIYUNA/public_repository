/**
 * スポーツジム講座一覧を作成する関数
 */
function createCourseTable() {
    $.ajax({
        url: window.apiCoursesUrl,
        type: 'GET',
        data: window.searchConditions,
        dataType: 'json'
    })
    .done(function(data) {
        var $tbody = $('#course-table tbody');
        $tbody.empty();
        if (Object.keys(data).length === 0) {
            $('.no-courses-message').show();
            return;
        } else {
            $('.no-courses-message').hide();
        }
        $.each(data, function(id, course){
            var row = `<tr>
                <td class="center">${id}</td>
                <td class="center">${course.name}</td>
                <td class="center">${course.level}</td>
                <td class="center">${course.gym_name}</td>
                <td>${course.outline}</td>
                <td class="center">${course.teacher_name}</td>
            </tr>`;
            $tbody.append(row);
        });
    })
    .fail(function(jqXHR, textStatus, errorThrown){
        alert('スポーツジム講座データ取得に失敗しました');
    });
}
