<!-- Main JS Assets-->

<!-- Jquery Core Js -->
<script src="{{URL::asset("/adminBSB/plugins/jquery/jquery.js")}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{URL::asset("/adminBSB/plugins/bootstrap/js/bootstrap.js")}}"></script>

<!-- Select Plugin Js -->
<script src="{{URL::asset("/adminBSB/plugins/bootstrap-select/js/bootstrap-select.js")}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{URL::asset("/adminBSB/plugins/jquery-slimscroll/jquery.slimscroll.js")}}"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="{{URL::asset("/adminBSB/plugins/bootstrap-notify/bootstrap-notify.js")}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{URL::asset("/adminBSB/plugins/node-waves/waves.js")}}"></script>

<!-- Autosize Plugin Js -->
<script src="{{URL::asset("/adminBSB/plugins/autosize/autosize.js")}}"></script>

<!-- Moment Plugin Js -->
<script src="{{URL::asset("/adminBSB/plugins/momentjs/moment.js")}}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{URL::asset("/adminBSB/plugins/jquery-countto/jquery.countTo.js")}}"></script>

<!-- Morris Plugin Js -->
<script src="{{URL::asset("/adminBSB/plugins/raphael/raphael.js")}}"></script>
<script src="{{URL::asset("/adminBSB/plugins/morrisjs/morris.js")}}"></script>

<!-- ChartJs -->
<script src="{{URL::asset("/adminBSB/plugins/chartjs/Chart.bundle.js")}}"></script>

<!-- Flot Charts Plugin Js -->
<script src="{{URL::asset("/adminBSB/plugins/flot-charts/jquery.flot.js")}}"></script>
<script src="{{URL::asset("/adminBSB/plugins/flot-charts/jquery.flot.resize.js")}}"></script>
<script src="{{URL::asset("/adminBSB/plugins/flot-charts/jquery.flot.pie.js")}}"></script>
<script src="{{URL::asset("/adminBSB/plugins/flot-charts/jquery.flot.categories.js")}}"></script>
<script src="{{URL::asset("/adminBSB/plugins/flot-charts/jquery.flot.time.js")}}"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="{{URL::asset("/adminBSB/plugins/jquery-sparkline/jquery.sparkline.js")}}"></script>

<!-- Custom Js -->
<script src="{{URL::asset("/adminBSB/js/admin.js")}}"></script>
<script src="{{URL::asset("/adminBSB/js/pages/index.js")}}"></script>
<script src="{{URL::asset("/adminBSB/js/pages/forms/form-validation.js")}}"></script>
<script src="{{URL::asset("/adminBSB/plugins/jquery-validation/jquery.validate.js")}}"></script>
<script src="{{URL::asset("/adminBSB/plugins/jquery-steps/jquery.steps.js")}}"></script>
<script src="{{URL::asset("/adminBSB/plugins/sweetalert/sweetalert.min.js")}}"></script>
<script src="{{URL::asset("/adminBSB/js/pages/forms/basic-form-elements.js")}}"></script>
<script src="{{URL::asset("/adminBSB/js/pages/forms/advanced-form-elements.js")}}"></script>
<script src="{{URL::asset("adminBSB/js/pages/ui/dialogs.js")}}"></script>
{{--../../plugins/sweetalert/sweetalert.min.js--}}

<script src="{{URL::asset("/adminBSB/js/script.js")}}"></script>
<script src="{{ URL::asset('adminBSB/plugins/jquery-spinner/js/jquery.spinner.js') }}"></script>

<!-- Demo Js -->
<script src="{{URL::asset("/adminBSB/js/demo.js")}}"></script>

<script src="{{URL::asset("adminBSB/plugins/jquery-datatable/jquery.dataTables.js")}}"></script>
<script src="{{URL::asset("adminBSB/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js")}}"></script>
<script src="{{URL::asset("adminBSB/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js")}}"></script>
<script src="{{URL::asset("adminBSB/plugins/jquery-datatable/extensions/export/buttons.flash.min.js")}}"></script>
<script src="{{URL::asset("adminBSB/plugins/jquery-datatable/extensions/export/jszip.min.js")}}"></script>
<script src="{{URL::asset("adminBSB/plugins/jquery-datatable/extensions/export/pdfmake.min.js")}}"></script>
<script src="{{URL::asset("adminBSB/plugins/jquery-datatable/extensions/export/vfs_fonts.js")}}"></script>
<script src="{{URL::asset("adminBSB/plugins/jquery-datatable/extensions/export/buttons.html5.min.js")}}"></script>
<script src="{{URL::asset("adminBSB/plugins/jquery-datatable/extensions/export/buttons.print.min.js")}}"></script>


<script>
    $(window).bind('load', function () {
        var lang = {
            showing: 'نمایش',
            from: 'از',
            to: 'تا',
            record: 'مورد',
            total: 'کل',
        };

        var table = $('#searchableTable').DataTable({
            responsive: true,
            oLanguage : {
                "sSearch": "جستجو",
                "sLengthMenu": " نمایش _MENU_ تعداد  در صفحه ",
                "sInfoFiltered" : "( پیدا شده از <b>  _MAX_ </b>  (تعداد کُل) ) ",
                "sInfo": lang.showing + "<b> _START_ </b>" + " " + lang.to + "<b> _END_ </b> __ " + lang.from + "<b> _TOTAL_  </b>" + "",
                "oPaginate": {
                    "sNext": "بعدی",
                    "sPrevious": "قبلی",
                }
            },
            lengthMenu: [
                [ 10, 25, 50, 100, -1 ],
                [ '10', '25', '50', '100', 'همه' ]
            ],
            "dom": "<'row'<'col-md-3'l><'col-md-3'f><'col-md-12'B>><'row'<'col-md-12't>><'row'<'col-md-4'i><'col-md-6'p>>",
            buttons: [
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [ 0, ':visible' ]
                    }
                }
            ],
            // sort: true
        });

        $(".t-column").on('click', function () {
            var visibile = $(this).data('vis') === 1 ? true : false;
           table.columns($(this).data('column')).visible(! visibile);
           $(this).data('vis', Number(visibile));
           alert(visibile);
        });

        $("ul.pagination").parent().addClass('text-center');

        // //Exportable table
        // $('.js-exportable').DataTable({
        //     dom: 'Bfrtip',
        //     responsive: true,
        //     buttons: [
        //         'copy', 'csv', 'excel', 'pdf', 'print'
        //     ]
        // });

        function toggleVisibility(column) {

        }
    });
</script>

@yield('js')