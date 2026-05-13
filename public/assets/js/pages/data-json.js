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
                sInfo: 'إظهار _START_  من أصل _TOTAL_ مدخل',
                sInfoEmpty: 'يعرض 0  من أصل 0 سجل',
                sInfoFiltered: '(منتقاة من مجموع _MAX_ مُدخل)',
                sInfoPostFix: '',
                sSearch: 'بحث عام:',
                sUrl: ''
                // "oPaginate": {
                //     "sFirst": "الأول",
                //     "sPrevious": "السابق",
                //     "sNext": "التالي",
                //     "sLast": "الأخير"
                // }
            },
            lengthMenu: [
                [10, 25, 50, 100, 500, 1000, 1500, 2000, 10000,-1],
                [
              
                    '10',
                    '25',
                    '50',
                    '100',
                    '500',
                    '1000',
                    '1500',
                    '2000',
                    '10000',   
                   'الكل'
                  
                ]
            ],
            
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'copy',
                    text: 'نسخ',
                    bom: 'true',
                    exportOptions: {
                        columns: ':visible'
                        // columns: [ 0,1,2,3,4 ]
                    }
                },
                {
                    extend: 'excel',
                    text: 'إكسل',
                    bom: 'true',
                    exportOptions: {
                        columns: ':visible'
                        // columns: [ 0,1,2,3,4 ]
                    },
                    customize: function (doc) {
                    }
                },
                {
                    extend: 'print',
                    text: 'طباعة',
                    bom: 'true',
                    exportOptions: {
                        // modifier: {
                        //     page: 'all',

                        // },
                        columns: ':visible'
                        // columns: [ 0,1,2,3,4 ]
                    },

                    customize: function (doc) {

                    }
                }

            ]

        })
    }

    return {
        //main function to initiate the module
        init: function () {
            initTable1()
        }
    }
})()

jQuery(document).ready(function () {
    KTDatatablesDataSourceAjaxServer.init()
})