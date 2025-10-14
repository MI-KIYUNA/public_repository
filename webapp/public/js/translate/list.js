/**
 * 翻訳言語変更のメイン処理
 * @param {Array} sentences - 翻訳対象の文章配列
 * @param {string} targetLangCode - 翻訳先言語コード
 */
function changeLanguage(targetLangCode) {
    translatePhrases(window.sentences, targetLangCode);
}

/**
 * フレーズを翻訳してテーブルを更新
 * @param {Array} sentences - 翻訳対象の文章配列
 * @param {string} targetLangCode - 翻訳先言語コード
 */
function translatePhrases(sentences, targetLangCode) {
    if (!sentences.length || !targetLangCode) {
        console.warn('翻訳対象の文章または言語が指定されていません');
        return;
    }

    $.ajax({
        url: window.travelPhraseListApiUrl,
        method: 'GET',
        data: {
            sentences: sentences,
            target_lang: targetLangCode
        },
        success: function(data) {
            updateTranslatedText(data);
        },
        error: function(xhr, status, error) {
            console.error('翻訳APIでエラーが発生しました:', error);
            showErrorMessage('翻訳に失敗しました。もう一度お試しください。');
        }
    });
}

/**
 * 翻訳結果をテーブルに反映
 * @param {Array} translatedData - 翻訳結果の配列
 */
function updateTranslatedText(translatedData) {
    $('#phrasesTable tbody tr').each(function(i){
        if (translatedData[i]) {
            $(this).find('.translated').text(translatedData[i]);
        }
    });
}

/**
 * エラーメッセージを表示
 * @param {string} message
 */
function showErrorMessage(message) {
    alert(message);
}