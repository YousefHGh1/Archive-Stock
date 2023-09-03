'use strict'
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
                // {
                //     // "extend": "colvis",
                //     // "text": "إخفاء/إظهار أعمدة",
                //     // "bom": "true",
                //     // exportOptions: {
                //     //     columns: ':visible'
                //     // },
                // },
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
                        // doc.content[0].alignment = 'right';
                        // doc.defaultStyle.alignment = 'right';
                        // doc.defaultStyle.fontSize = 20;
                        // doc.defaultStyle.font = 'Arial';
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
                        // doc.styles.tableBodyEven.alignment = "right";
                        // doc.content[0].alignment = 'right';
                        // doc.defaultStyle.fontSize = 20;
                        // doc.defaultStyle.font = 'Arial';
                    }
                }

                /*
                {
                    "extend": "pdf",
                    "text": "Export as PDF",
                    "filename": "Report Name",
                    "className": "btn btn-green",
                    "charset": "utf-8",
                    "bom": "true",
                    exportOptions: {
                        columns: ':visible'
                                },
                    //             exportOptions: {
                    //     modifier: {
                    //         selected: null
                    //     }
                    // },

                    init: function(api, node, config) {
                        $(node).removeClass("btn-default");
                    },
                    customize: function (doc) {
                        doc.defaultStyle.fontSize = 20;
                        doc.defaultStyle.font = 'Arial';
                    }
                },
*/
            ]
            // select: true,
            // responsive: true,
            // searchDelay: 500,
            // processing: true,
            // serverSide: true,

            // ajax: {
            //     headers: {
            //         'X-CSRF-TOKEN': csrf
            //     },
            //     // url: HOST_URL + '/api/datatables/demos/server.php',
            //     url: DATA_URL,
            //     type: 'POST',
            //     data: {
            //         // parameters for custom backend script demo
            //         columnsDef: [
            //             'id','name','identity_number', 'address', 'created_at','actions'],
            //         from_date:from_date,
            //         to_date:to_date,
            //         voucher:voucher,
            //         vouch:vouch,
            //         widget:widget,
            //         widg:widg,
            //         name_summoner:name_summoner,
            //         idno_summoner:idno_summoner,
            //         name_defendant:name_defendant,
            //         idno_defendant:idno_defendant,
            //         jebaia_no:jebaia_no
            //     },
            // },
            // columns: [
            //     {data: 'id',width: 100},
            //     {data: 'name',width: 180},
            //     {data: 'identity_number',width:120},
            //     {data: 'address',width: 150},
            //     {data: 'created_at', class:'dir_ltr',width: 150},
            //     {data: 'actions',width: 120},

            // ],
            // columnDefs: [
            //     {
            //         targets: -1,
            //         title: 'الإجراءات',
            //         orderable: false,
            //         render: function(data, type, full, meta) {
            //             var req_create = SITEURL + '/requests/create/'+full.id;
            //             var edit = SITEURL + '/mokalafs/'+full.id+'/edit';
            //             var destroy = SITEURL + '/mokalafs/'+full.id+'/destroy';
            //             if(update_delete_ != 0){
            //                 return '\
            //                 <a href="'+req_create+'" class="btn btn-sm btn-clean btn-icon" title="إضافة طلب">\
            // 					<i class="la la-plus"></i>\
            // 				</a>\
            // 				<a href="'+edit+'" class="btn btn-sm btn-clean btn-icon" title="تعديل">\
            // 					<i class="la la-edit"></i>\
            // 				</a>\
            // 				<a href="javascript:;" onclick="return deleted_('+full.id+')" class="btn btn-sm btn-clean btn-icon" title="حذف">\
            // 					<i class="la la-trash"></i>\
            // 				</a>\
            // 			';
            //             }else if(update_ != 0){
            //                 return '\
            //                 <a href="'+req_create+'" class="btn btn-sm btn-clean btn-icon" title="إضافة طلب">\
            // 					<i class="la la-plus"></i>\
            // 				</a>\
            // 				<a href="'+edit+'" class="btn btn-sm btn-clean btn-icon" title="تعديل">\
            // 					<i class="la la-edit"></i>\
            // 				</a>\
            // 			';
            //             }else if(delete_ != 0){
            //                 return '\
            //                 <a href="'+req_create+'" class="btn btn-sm btn-clean btn-icon" title="إضافة طلب">\
            // 					<i class="la la-plus"></i>\
            // 				</a>\
            // 				<a href="javascript:;" onclick="return deleted_('+full.id+')" class="btn btn-sm btn-clean btn-icon" title="حذف">\
            // 					<i class="la la-trash"></i>\
            // 				</a>\
            // 			';
            //             }else{
            //                 return '-';
            //             }
            //         },
            //     },

            // ],
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

// $("body").on('dblclick', 'tr', function(e) {
//     //alert($(this).find('td').eq(5).find('a').eq(0).attr('id'));
//     document.location.href=$(this).find('td').eq(5).find('a').eq(0).attr('href');
// });
//
// $('#filter').click(function(){
//      from_date = $('#from_date').val() ;
//      to_date = $('#to_date').val();
//     voucher = $('#voucher').val() ;
//     vouch = $('#vouch').val() ;
//     widget = $('#widget').val() ;
//     widg = $('#widg').val() ;
//     name_summoner = $('#name_summoner').val() ;
//     idno_summoner = $('#idno_summoner').val() ;
//     name_defendant = $('#name_defendant').val() ;
//     idno_defendant = $('#idno_defendant').val() ;
//     jebaia_no = $('#jebaia_no').val() ;
//     if(from_date == ''){
//         from_date=-1;
//     }
//     if(to_date == ''){
//         to_date=-1;
//     }
//     if(voucher == ''){
//         voucher=-1;
//     }
//     if(widget == ''){
//         widget=-1;
//     }
//     if(vouch == ''){
//         vouch=-1;
//     }
//     if(widg == ''){
//         widg=-1;
//     }
//     if(name_summoner == ''){
//         name_summoner=-1;
//     }
//     if(idno_summoner == ''){
//         idno_summoner=-1;
//     }
//     if(name_defendant == ''){
//         name_defendant=-1;
//     }
//     if(idno_defendant == ''){
//         idno_defendant=-1;
//     }
//     if(jebaia_no == ''){
//         jebaia_no=-1;
//     }
//      var oTable = $('#kt_datatable').DataTable();
//      oTable.destroy();
//      KTDatatablesDataSourceAjaxServer.init();
//     // if(from_date != '' &&  to_date != '')
//     // {
//     //     $.ajax({
//     //         type: "post",
//     //         url: DATA_URL,
//     //         data: {
//     //             from_date:from_date,
//     //             to_date:to_date
//     //         },
//     //         success: function (data) {
//     //              // var oTable = $('#kt_datatable').DataTable();
//     //              // oTable.destroy();
//     //              // KTDatatablesDataSourceAjaxServer.init();
//     //         },
//     //     });
//     //     var oTable = $('#kt_datatable').DataTable();
//     //     oTable.destroy();
//     //     KTDatatablesDataSourceAjaxServer.init();
//     // }
//     // else
//     // {
//     //     alert('Both Date is required');
//     // }
// });

// $('#refresh').click(function(){
//     $('#from_date').val('');
//     $('#to_date').val('');
//     $('#voucher').val('');
//     $('#widget').val('');
//     $('#vouch').val('');
//     $('#widg').val('');
//     $('#name_summoner').val('');
//     $('#idno_summoner').val('');
//     $('#name_defendant').val('');
//     $('#idno_defendant').val('');
//     $('#jebaia_no').val('');
//     from_date='';
//     to_date = '';
//     voucher='';
//     widget='';
//     vouch='';
//     widg='';
//     name_summoner='';
//     idno_summoner='';
//     name_defendant='';
//     idno_defendant='';
//     jebaia_no='';
//     if(from_date == ''){
//         from_date=-1;
//     }
//     if(to_date == ''){
//         to_date=-1;
//     }
//     if(voucher == ''){
//         voucher=-1;
//     }
//     if(widget == ''){
//         widget=-1;
//     }
//     if(vouch == ''){
//         vouch=-1;
//     }
//     if(widg == ''){
//         widg=-1;
//     }
//     if(name_summoner == ''){
//         name_summoner=-1;
//     }
//     if(idno_summoner == ''){
//         idno_summoner=-1;
//     }
//     if(name_defendant == ''){
//         name_defendant=-1;
//     }
//     if(idno_defendant == ''){
//         idno_defendant=-1;
//     }
//     if(jebaia_no == ''){
//         jebaia_no=-1;
//     }

//     var oTable = $('#kt_datatable').DataTable();
//     oTable.destroy();
//     KTDatatablesDataSourceAjaxServer.init();
// });

// /* When click deleted */
// function deleted_(id) {
//     Swal.fire({
//         title: "هل أنت متأكد؟!",
//         text: "سيتم الحذف الآن!",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonText: "نعم, احذف",
//         cancelButtonText: "ليس الآن",
//         customClass: {
//             confirmButton: "btn btn-danger",
//             cancelButton: "btn btn-default"
//         },
//         reverseButtons: true
//     }).then(function(result) {
//         if (result.value) {
//             $.ajax({
//                 type: "post",
//                 url: SITEURL + "/mokalafs/"+id+"/destroy",
//                 success: function (data) {
//                     Swal.fire({
//                         icon: "success",
//                         title: "تم الحذف بنجاح!",
//                         text: "سيتم الإرسال لسلة المهملات",
//                         showConfirmButton: false,
//                         timer: 3000
//                     });
//                     location.reload();
//                     // var oTable = $('#kt_datatable').KTDatatable();
//                     // oTable.fnDraw(false);
//                 },
//                 error: function (data) {
//                     // console.log('Error:', data);
//                     Swal.fire({
//                         icon: "error",
//                         title: "خطأ!",
//                         text: "لم يتم الحذف",
//                         showConfirmButton: false,
//                         timer: 3000
//                     });
//                 }
//             });
//         }
//     });
// }
