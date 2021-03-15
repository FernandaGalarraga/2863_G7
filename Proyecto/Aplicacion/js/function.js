function includeHTMLPHPFile(filePath, placeHolder) {
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: filePath,
            success: function(res) {
                $("#" + placeHolder).html(res);
            },
            error: function(e) {
                $("#" + placeHolder).text("<h1>ERROR</h1><h2>Por favor contacte al Administrador</h2>");
            }
        });
    });
}