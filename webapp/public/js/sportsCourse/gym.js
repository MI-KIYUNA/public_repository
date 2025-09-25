/**
 * ジムの選択肢を作成する関数
 * 
 */
function createGymList() {
    $.ajax({
        url: window.gymApiUrl,
        method: 'GET',
        data: window.searchConditions,
        dataType: 'json'
    })
    .done(function(dataList){
        var $select = $('#gym_select');
        createOption($select, dataList);
        originalGymList = Object.values(dataList);
    })
    .fail(function(){
        alert('ジム施設名データの取得に失敗しました');
    });
}

/**
 * 検索ワードでジム施設名をフィルタリングする 関数
 */
function filterGymOptions() {
    const keyword = $('#gym_input').val();
    const filteredList = originalGymList.filter(
        item => item.name.includes(keyword)
    );
    createOption($('#gym_select'), filteredList);
}

/**
 * ジム施設名の選択肢が変更されたときの関数
 * 
 * 1.ジム施設名の選択状態を更新
 * 2.講座一覧を再生成する 
 */
function changeGym() {
    window.searchConditions.gym_id = $('#gym_select').val();
    createCourseTable();
}