(function($){
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

    $(document).ready(function() {
        konami(function() {
            $("#wrapper").attr('contenteditable', 'true');
        });
    });
})(jQuery);