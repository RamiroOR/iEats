/*!
 * Start Bootstrap - Shop Homepage v5.0.4 (https://startbootstrap.com/template/shop-homepage)
 * Copyright 2013-2021 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-shop-homepage/blob/master/LICENSE)
 */
// This file is intentionally blank
// Use this file to add JavaScript to your project
var sitePlusMinus = function() {
    $('.js-btn-minus').on('click', function(e) {
        e.preventDefault();
        if ($(this).closest('.colInput').find('.form-control').val() != 0) {
            $(this).closest('.colInput').find('.form-control').val(parseInt($(this).closest('.colInput').find('.form-control').val()) - 1);
        } else {
            $(this).closest('.colInput').find('.form-control').val(parseInt(0));
        }
    });
    $('.js-btn-plus').on('click', function(e) {
        e.preventDefault();
        $(this).closest('.colInput').find('.form-control').val(parseInt($(this).closest('.colInput').find('.form-control').val()) + 1);
    });
};
sitePlusMinus();