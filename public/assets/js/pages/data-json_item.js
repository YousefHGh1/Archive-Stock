var KTDatatablesDataSourceAjaxServer = (function () {
    var initTable1 = function () {
        var table = $('#example')
        
        pdfMake.fonts = {
            Arial: {
                normal: '../fonts/dinnext/dinnextltarabic-bold-webfont.ttf'
            }
        }

        // begin first table
        table.DataTable({
            language: {
                sProcessing: 'جارٍ التحميل...',
                sLengthMenu: 'أظهر _MENU_ ',
                sZeroRecords: 'لم يعثر على أية سجلات',
                sSearch: 'بحث عام:',
                sUrl: ''
            },

            dom: 'Blfrtip', // Controls layout of the table, including buttons
            buttons: [
                {
                    extend: 'copy',
                    text: 'نسخ',
                    bom: 'true',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    text: 'إكسل',
                    bom: 'true',
                    exportOptions: {
                        columns: ':visible'
                    },
                    customize: function (doc) {}
                },
                {
                    extend: 'print',
                    text: 'طباعة',
                    bom: 'true',
                    exportOptions: {
                        columns: ':visible'
                    },
                    customize: function (doc) {}
                }
            ],
            paging: false,   // Disable pagination
            info: false       // Optionally, you can disable the "Showing x of x entries" info
        })
    }

    return {
        // Main function to initiate the module
        init: function () {
            initTable1()
        }
    }
})()

jQuery(document).ready(function () {
    KTDatatablesDataSourceAjaxServer.init()
})
