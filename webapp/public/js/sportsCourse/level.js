/**
 * ジムの選択肢を作成する関数
 * 
 */
function createLevelList() {
    $.ajax({
        url: window.levelApiUrl,
        method: 'GET',
        dataType: 'json'
    })
    .done(function(dataList){
        var $select = $('#course_level_select');
        createOption($select, dataList);
    })
    .fail(function(){
        alert('ジム講座レベルデータの取得に失敗しました');
    });
}

/**
 * ジムの選択肢が変更されたときの関数
 * 
 * 1.ジム講座レベルの選択状態を更新
 * 2.講座一覧を再生成する
 */
function changeLevel() {
    window.searchConditions.level_id = $('#course_level_select').val();
    createCourseTable();
}
