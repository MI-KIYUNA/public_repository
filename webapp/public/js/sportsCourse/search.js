function searchSelection(selection, searchWord) {
    const results = [];
    for (const item of selection) {
        if (item.name.includes(searchWord)) {
            results.push(item);
        }
    }
    return results;
}

function searchSelection($select, searchWord) {
    const results = [];
    var $select = $('#prefecture_select');

    // 選択肢をフィルタリング
    for (const item of $select) {
        if (item.name.includes(searchWord)) {
            results.push(item);
        }
    }

    // 選択肢　再生成
    createOption($select, results);
    return results;
}
