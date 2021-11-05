$(document).ready(function() {

    $(".close-search").click(function() {
        $(".search-full").removeClass("open");
        $("body").removeClass("offcanvas");
    });
    $(".header-search").click(function() {
        $(".search-full").addClass("open");
    });
});
$(document).ready(function() {

    $("form").validate({

        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
            $(element).closest('.form-control').addClass('is-invalid');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
            $(element).closest('.form-control').addClass('is-valid');
            $(element).closest('.form-control').removeClass('is-invalid');
        },
        errorElement: 'div',
        errorClass: 'valid-feedback',
        errorPlacement: function(error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },

    });
});