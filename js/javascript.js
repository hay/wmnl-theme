(function($) {
function konami(fn) {
    var input = "";
    var pattern = "3838404037393739666513";
    $(document).keydown(function(e) {
        input += e.keyCode;
        if (input.indexOf(pattern) !== -1) {
            fn();
            input = "";
        }
    });
}

window.App = {
    "init" : function() {
        konami(function() {
            $("#wrapper").attr('contenteditable', 'true');
        });
    }
}
})(jQuery);