/**
 * イベント 登録(イベントリスナ)
 */
function setupEventListeners() {

    // 翻訳言語変更
    $('#targetLangSelect').on('change', function(){
        const targetLang = $(this).val();
        changeLanguage(targetLang);
    });
}

/**************************************************
 * 画面 初期表示時
 **************************************************/
$(function(){
    setupEventListeners();
});

