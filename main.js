$("[emp]").change(function () {
    // 選択されているvalue属性値を取り出す
    let val = $("[emp]").val();
    if (val == date) {
        //input1を表示
        $('input[name="data"]').show();
        //input2を非表示
        $('input[name="word"]').hide();
    } else if (val == word) {
        //input1を非表示
        $('input[name="data"]').hide();
        //input2を表示
        $('input[name="word"]').show();
    }
});