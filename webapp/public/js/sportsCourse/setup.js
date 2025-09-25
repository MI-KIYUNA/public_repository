/**
 * イベント 登録(イベントリスナ)
 */
function setupEventListeners() {

    // 検索時の入力イベント
    $('#prefecture_input').on('input', function(){
        filterPrefectureOptions();
    });
    $('#gym_input').on('input', function(){
        filterGymOptions();
    });

    // 選択肢の変更イベント
    $('#prefecture_select').on('change', function(){
        changePrefecture();
    });
    $('#gym_select').on('change', function(){
        changeGym();
    });
    $('#course_level_select').on('change', function(){
        changeLevel();
    });

    // リセットボタンのクリックイベント
    $('#reset_button').on('click', function(){
        clearSelectOptions();
        createCourseTable();
    });
}

/**
 * 選択肢を'---'を選択した状態にする
 */
function clearSelectOptions() {
    $('#prefecture_select').val('');
    $('#gym_select').val('');
    $('#course_level_select').val('');
    window.searchConditions = {
        state: '',
        gym_id: null,
        level_id: null
    };
}


/**
 * optionのデータ型 定義
 * @typedef {Object} optionDataType
 * @property {string|number} id value
 * @property {string} name text
 */

/**
 * 選択肢生成 関数
 * 
 * @param {jQuery} $selectObject 選択肢オブジェクト
 * @param {optionDataType[]} dataList - 選択肢データ
 */
function createOption($selectObject, dataList) {
    // 初期化
    $selectObject.empty();
    var option = $('<option>').val('').text('---');
    $selectObject.append(option);

    // 選択肢を追加
    $.each(dataList, function(key, data){
        option = $('<option>')
            .val(data.id)
            .text(data.name);
        $selectObject.append(option);
    });
}

/**************************************************
 * 画面 初期表示時
 **************************************************/
$(function(){
    // 検索条件管理用のグローバル変数
    window.searchConditions = {
        state: '',
        gym_id: null,
        level_id: null
    };

    // 検索時に使用するデータを保存する変数
    var originalPrefectureList = [];
    var originalGymList = [];

    // 選択肢生成
    createPrefectureList();
    createGymList();
    createLevelList();

    // 講座一覧生成
    createCourseTable();

    // イベント登録
    setupEventListeners();
});

