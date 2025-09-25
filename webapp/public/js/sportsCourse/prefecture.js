/**
 * 都道府県の選択肢を作成する関数
 * 
 * 1.apiレスポンスから選択を生成
 * 2.検索時に使用するデータを保存
 */
function createPrefectureList() {
    $.ajax({
        url: window.prefectureApiUrl,
        method: 'GET',
        dataType: 'json'
    })
    .done(function(dataList){
        var $select = $('#prefecture_select');
        createOption($select, dataList);
        originalPrefectureList = Object.values(dataList);
    })
    .fail(function(){
        alert('都道府県データの取得に失敗しました');
    });
}

/**
 * 検索ワードで都道府県をフィルタリングする 関数
 */
function filterPrefectureOptions() {
    const keyword = $('#prefecture_input').val();
    const filteredList = originalPrefectureList.filter(
        item => item.name.includes(keyword)
    );

    createOption($('#prefecture_select'), filteredList);
}

/**
 * 都道府県の選択肢が変更されたときの関数
 * 
 * 1.都道府県の選択状態を更新
 * 2.ジムの選択肢を再生成
 * 3.講座一覧を再生成する 
 */
function changePrefecture() {
    window.searchConditions.state = $('#prefecture_select').val();
    createGymList();
    createCourseTable();
}
