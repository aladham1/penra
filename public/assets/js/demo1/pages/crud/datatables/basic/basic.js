"use strict";

var DatatablesDataSourceHtml = function () {

    var initTable1 = function () {
        var table = $('.table_1');

        // begin first table
        table.DataTable({
            ordering: false,
            lengthMenu: [50, 100, 150, 200, 300, 500],

            pageLength: 50,

            language: {
                'lengthMenu': 'Display _MENU_',
            },

            order: [[1, 'desc']],
        });

    };

    return {

        //main function to initiate the module
        init: function () {
            initTable1();
        },

    };

}();

jQuery(document).ready(function () {
    DatatablesDataSourceHtml.init();
});

