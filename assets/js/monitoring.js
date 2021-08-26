/* ------------------------------------------------------------------------------
*
*  # dashboard.js
*
*  Specific JS code additions for dashboard page
*
*  Version: 1.0
*  Latest update: Nov 16, 2019
*
* ---------------------------------------------------------------------------- */

$(function() {


    var urlPath = JSON.parse(webURL);

    // Table setup
    // ------------------------------
     var tbAct = $('#activityTbl').DataTable({
         searching: false,
         ordering: false,
         autowidth: true,
         processing: false,
         serverSide: true,
         bLengthChange: false,
         paging: false,
         scrollX: false,
         scrollY: "600px",
         bInfo: false,
         scrollCollapse: true,
         ajax: {
             url: urlPath + '?/monitoring/activity',
             method: 'POST',
             datatype: 'json',
             error: function(jqXHR, textStatus, errorThrown) {
                 console.log('Can not load data');
             }
         },
             columns: [
                 {
                     data: 'Activity',
                     render: function(data, type, row, meta) {
                        var icon = '';
                        var color = '';

                        if(row.Action == 1) {
                            icon = 'icon-box-add';
                            color = 'border-primary-600 text-primary-600';
                        }
                        if(row.Action == 2) {
                            icon = 'icon-box-remove';
                            color = 'border-teal-600 text-teal-600';
                        }
                        if(row.Action == 3) {
                            icon = 'icon-undo2';
                            color = 'border-orange-600 text-orange-600';
                        }
                        if(row.Action == 4) {
                            icon = 'icon-cross2';
                            color = 'border-danger-600 text-danger-600';
                        }
                        if(row.Action == 5) {
                            icon = 'icon-file-plus2';
                            color = 'border-indigo-600 text-indigo-600';
                        }
                        if(row.Action == 6) {
                            icon = 'icon-truck';
                            color = 'border-pink-600 text-pink-600';
                        }
                        if(row.Action == 7) {
                            icon = 'icon-arrow-down16';
                            color = 'border-success-600 text-success-600';
                        }
                        if(row.Action == 8) {
                            icon = 'icon-file-minus2';
                            color = 'border-danger-600 text-danger-600';
                        }

                        return '<div class="media-left">' +
                                '<span class="btn btn-flat btn-rounded btn-icon btn-xs ' + color +'"><i class="' + icon + '"></i></span>' +
                                '</div>' +
                                '<div class="media-body" style="vertical-align: middle !important;">' + row.Activity + '</div>'
                     }
                 }
             ]
     });

     setInterval( function (){
        tbAct.draw();
     }, 3000);

    // Basic datatable
    $('.monitoring_table_store').DataTable({
		stateSave: true,
        scrollX: true,
        "bLengthChange": false,
        "bSort": false,
		"ordering": false,
        bFilter: false,
        paging: false
    });

    $('#dateFrom').daterangepicker({
        singleDatePicker: true,
        locale : {
            format: 'YYYY-MM-DD'
        }
    });

    $('#dateFrom').val("");

    $('#dateTo').daterangepicker({
        singleDatePicker: true,
        locale : {
            format: 'YYYY-MM-DD'
        }
    });

    $('#dateTo').val("");

    //Fade-In entrance content
    $('#daily-monitoring').fadeIn('normal');

    //Date range daily monitoring
    $('#dailyDF').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale : {
            format: 'YYYY-MM-DD'
        }
    });

    $('#dailyDT').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale : {
            format: 'YYYY-MM-DD'
        }
    });

    var urlPath = JSON.parse(webURL);
    var remoteLinkTblOne = urlPath + '?/reports/overltblone';
    var remoteLinkPanels = urlPath + '?/reports/oapanel';

    $('#overall-panel').load(remoteLinkPanels, function() {

        $('#overall-panel').fadeIn();

        $('#oa_tblone').load(remoteLinkTblOne, function() {
            $('#oa_tblone').fadeIn();

        });
    });

    $('body').on('click', '#btnDateFilter', function(e){

        var dateF = $('#dailyDF').val();
        var dateT = $('#dailyDT').val();

        var daterange = { df:dateF, dt: dateT }

        $('#overall-panel').fadeOut('normal');
        $('#oa_tblone').fadeOut('normal');
        $('#oa_tables').find('.oa_show').fadeOut('normal').removeClass('oa_show');

        //Load panels again
        $('#overall-panel').load(remoteLinkPanels, daterange, function() {

            $('#overall-panel').fadeIn('normal');

            $('#oa_tblone').load(remoteLinkTblOne, daterange, function() {
                $('#oa_tblone').fadeIn('normal');

            });
        });
    });

    $('body').on('click', '#btnRefresh', function(e){

        var today = new Date();
        var y = today.getFullYear();
        var m = today.getMonth()+1;
        var d = today.getDate();

        if(d<10)
        {
            d='0'+d;
        }

        if(m<10)
        {
            m='0'+m;
        }

        var datetoday = y + '-' + m + '-' + d;

        $('#dailyDF').val(datetoday);
        $('#dailyDT').val(datetoday);

        var dateF = $('#dailyDF').val();
        var dateT = $('#dailyDT').val();

        var daterange = { df:dateF, dt: dateT }

        $('#overall-panel').fadeOut('normal');
        $('#oa_tblone').fadeOut('normal');
        $('#oa_tables').find('.oa_show').fadeOut('normal').removeClass('oa_show');

        // Load panels again
        $('#overall-panel').load(remoteLinkPanels, daterange, function() {

            $('#overall-panel').fadeIn('normal');

            $('#oa_tblone').load(remoteLinkTblOne, daterange, function() {
                $('#oa_tblone').fadeIn('normal');

            });
        });
    });



    /* Warehouse viewing details popup modal */
    $('#modal_details_report').on('show.bs.modal', function (e) {
        var urlPath = JSON.parse(webURL);
        var id = $(e.relatedTarget).data('rowid');
        var remoteLink = urlPath + '?/reports/details/' + id;

        $('#modal_details_report').find('.modal-body').load(remoteLink, function () {
            // Init Select2 when loaded
            // if(rDate.length == 0)
            // {
            //     $('#btnExportDetails').hide();
            // }
            // else
            // {
            //     $('#btnExportDetails').show();
            // }
        });
    });

});

    function getAMTable(dc_id, element){

        $('#tblbranch').find('tr.selected').removeClass('selected');
        $('#'+element).parents('tr').addClass('selected');

        var dateF = $('#dailyDF').val();
        var dateT = $('#dailyDT').val();
        var daterange = { df:dateF, dt: dateT }

        var urlPath = JSON.parse(webURL);
        var remoteLink = urlPath + '?/reports/am/' + dc_id;

        $('#overall-am').fadeOut('normal');
        $('#overall-am').nextAll('.oa_show').fadeOut('normal').removeClass('oa_show');

        $('#overall-am').load(remoteLink, daterange, function () {
            $('#overall-am').addClass('oa_show');
            $('#overall-am').fadeIn();
        });
    }

    function getACTable(am_id, element){

        $('#tblam').find('tr.selected').removeClass('selected');
        $('#'+element).parents('tr').addClass('selected');

        var dateF = $('#dailyDF').val();
        var dateT = $('#dailyDT').val();
        var daterange = { df:dateF, dt: dateT }

        var urlPath = JSON.parse(webURL);
        var remoteLink = urlPath + '?/reports/ac/' + am_id;

        $('#overall-ac').fadeOut('normal');
        $('#overall-ac').nextAll('.oa_show').fadeOut('normal').removeClass('oa_show');

        $('#overall-ac').load(remoteLink, daterange, function () {
            $('#overall-ac').addClass('oa_show');
            $('#overall-ac').fadeIn();
        });
    }

    function getStoresTable(ac_id, element){

        $('#tblac').find('tr.selected').removeClass('selected');
        $('#'+element).parents('tr').addClass('selected');

        var dateF = $('#dailyDF').val();
        var dateT = $('#dailyDT').val();
        var daterange = { df:dateF, dt: dateT }

        var urlPath = JSON.parse(webURL);
        var remoteLink = urlPath + '?/reports/stores/' + ac_id;

        $('#overall-stores').fadeOut('normal');
        $('#overall-stores').nextAll('.oa_show').fadeOut('normal').removeClass('oa_show');

        $('#overall-stores').load(remoteLink, daterange, function () {



            $('#overall-stores').addClass('oa_show');
            $('#overall-stores').fadeIn();
        });
    }

    function getDeliverTable(loc_id, element){

        $('#tblstore').find('tr.selected').removeClass('selected');
        $('#'+element).parents('tr').addClass('selected');

        var dateF = $('#dailyDF').val();
        var dateT = $('#dailyDT').val();
        var daterange = { df:dateF, dt: dateT }

        var urlPath = JSON.parse(webURL);
        var remoteLink = urlPath + '?/reports/deliver/' + loc_id;

        $('#overall-deliver').fadeOut('normal');
        $('#overall-deliver').nextAll('.oa_show').fadeOut('normal').removeClass('oa_show');

        $('#overall-deliver').load(remoteLink, daterange, function () {



            $('#overall-deliver').addClass('oa_show');
            $('#overall-deliver').fadeIn();
        });
    }
