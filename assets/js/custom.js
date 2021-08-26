/* ------------------------------------------------------------------------------
*
*  # custom.js
*
*  Specific JS code additions for all pages
*
*  Version: 1.0
*  Latest update: Nov 21, 2019
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{ 
            orderable: false,
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });


    // Basic datatable
    $('.myreport_items').DataTable({
		stateSave: true,
        scrollX: true,
        "bSort": false
    });
    
    // Basic datatable
    $('.log_report_items').DataTable({
		stateSave: true,
        "bSort": false
    });

    
    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
    
    $('#shipDate, #receiveDate, #curDate, #dateSelected').daterangepicker({ 
        singleDatePicker: true,
        locale : {
            format: 'YYYY-MM-DD'
        }
    });

    $('#shipDate, #receiveDate, #dateSelected').val("");

/* Warehouse viewing details popup modal */
// $('#modal_details_view').on('show.bs.modal', function(e) {
//     var urlPath = JSON.parse(webURL);
//     var id = $(e.relatedTarget).data('rowid');
//     var remoteLink = urlPath + '?/view-details/' + id;
    
//     $('#modal_details_view').find('.modal-body').load(remoteLink, function() {
//         // Init Select2 when loaded
//     });
// });

/* Warehouse viewing details popup modal */
$('#modal_details_report').on('show.bs.modal', function(e) {
    var urlPath = JSON.parse(webURL);
    var id = $(e.relatedTarget).data('rowid');
    var rDate = $(e.relatedTarget).data('rdate');
    var remoteLink = urlPath + '?/reports/details/' + id;
    
    $('#modal_details_report').find('.modal-body').load(remoteLink, function() {
        // Init Select2 when loaded
        if(rDate.length == 0)
        {
            $('#btnExportDetails').hide();
        }
        else
        {
            $('#btnExportDetails').show();
        }

    });
});

/* Warehouse viewing details popup modal */
$('#modal_batch_details').on('show.bs.modal', function(e) {
    var urlPath = JSON.parse(webURL);
    var id = $('#reportDeliver_ID').val();
    var batchNo = $(e.relatedTarget).data('bn');

    console.log(id);
    console.log(batchNo);
    var remoteLink = urlPath + '?/reports/batch/' + id + '/' + batchNo;
    
    $('#modal_batch_details').find('.modal-body').load(remoteLink, function() {
        // Init Select2 when loaded

    });

});

$('#modal_batch_details').on('hidden.bs.modal', function(e) {
    $('body').addClass('modal-open');
});


/* Truck summary load details popup modal */
$('#modal_summary_details_view').on('show.bs.modal', function(e) {
    var urlPath = JSON.parse(webURL);
    var trno = $(e.relatedTarget).data('trno');
    var numStore = $(e.relatedTarget).data('numstore')
    var remoteLink = urlPath + '?/summary-load-details/'+ trno +'/'+ numStore;
    
    $('#modal_summary_details_view').find('.modal-body').load(remoteLink, function() {
        // Init Select2 when loaded
    });
});

/* Export when button is click from modal */
$('body').on('click', '#btnExportDetails', function(){
    var urlPath = JSON.parse(webURL);
    var deliver_ID = $('#reportDeliver_ID').val();

    window.location = urlPath + '?/reports/export-excel/'+ deliver_ID;
});

/* Downlaod Logs */
$('body').on('click', '#btnExportLogs', function() {
    var urlPath = JSON.parse(webURL);
    var loc_ID = $('#location_ID').val();
    var sDate  = $('#curDate').val();
    var id = (loc_ID.length == 0) ? 0 : loc_ID;

    window.location = urlPath + '?/reports/download/logs/'+ id +'/'+sDate;
});

/* Button ship */
$('body').on('click', '#btnShip', function(){
    var urlPath = JSON.parse(webURL);
    var deliveryID = $('#deliveryIDs').val();
    var ship = $('#shipVal').val();
    var rec  = $('#recVal').val();

    $.post(urlPath + '?/ship-delivery', { id: deliveryID, s:ship, r:rec }, function(res){
        if(res.num > 0)
        {
            swal({
                title: "Success!",
                text: res.message,
                confirmButtonColor: "#EF5350",
                type: "success"
            },
            function(isConfirm){
                if (isConfirm) {
                    $(window.location).attr('href', urlPath + '?/dashboard');
                }
            });
        }
    }, 'JSON');
});

/* Get Location ID on change event */
$('body').on('change', '#shipTo', function() {
    var urlPath = JSON.parse(webURL);
    var loc_Code = $(this).val();

    $.post(urlPath + '?/logistics/location', { code : loc_Code }, function(data) {
        $('#location_ID').val(data);
    }, 'JSON');
});

/* Validation  on change event */
$('body').on('change', '#driverName', function() {
    var urlPath = JSON.parse(webURL);
    var driver_ID = $(this).val();
    var dc_ID     = $('#returnTo').val();
    var truck_ID  = $('#truckNo').val();
    var loc_ID    = $('#location_ID').val();

    $.post(urlPath + '?/validate/driver', { d:driver_ID, b:dc_ID, t:truck_ID, c:loc_ID }, function(data) {
        if(data.status < 0)
        {
            swal({
                title: "Error!",
                text: data.msg,
                confirmButtonColor: "#EF5350",
                type: "error"
            },
            function(isConfirm){
                if (isConfirm) {
                    $('#btnCreate').attr('disabled', true);
                    $('#driverName').focus();
                }
            });
        }
        else
        {
            $('#btnCreate').removeAttr('disabled');
        }
    }, 'JSON');
});

/* Validation  on change event */
$('body').on('change', '#truckNo', function() {
    var urlPath = JSON.parse(webURL);
    var dc_ID     = $('#returnTo').val();
    var truck_ID  = $(this).val();
    var loc_ID    = $('#location_ID').val();
    var driver_ID = $('#driverName').val();

    $.post(urlPath + '?/validate/truck', { d:driver_ID, b:dc_ID, t:truck_ID, c:loc_ID }, function(data) {
        if(data.status < 0)
        {
            swal({
                title: "Error!",
                text: data.msg,
                confirmButtonColor: "#EF5350",
                type: "error"
            },
            function(isConfirm){
                if (isConfirm) {
                    $('#btnCreate').attr('disabled', true);
                    $('#truckNo').focus();
                }
            });
        }
        else
        {
            $('#btnCreate').removeAttr('disabled');
        }
    }, 'JSON');
});

/* Date Picker */
$('#shipDate, #receiveDate').daterangepicker({ 
    singleDatePicker: true,
    locale : {
        format: 'YYYY-MM-DD'
    }
});
$('#shipDate, #receiveDate').val("");

});

function cancelDelivery(delID)
{
var urlPath = JSON.parse(webURL);
$.post(urlPath + "?/cancel-delivery/", { id: delID }, function(data){
    if(data.num > 0)
    {
        swal({
            title: "Success!",
            text: data.message,
            confirmButtonColor: "#EF5350",
            type: "success"
        },
        function(isConfirm){
            if (isConfirm) {
                $(window.location).attr('href', urlPath + '?/dashboard');
            }
        });
    }
    else 
    {
        swal({
            title: "Error!",
            text: data.message,
            confirmButtonColor: "#EF5350",
            type: "error"
        });
    }
}, 'JSON');
}

function exportDetails(id)
{
    var urlPath = JSON.parse(webURL);

    window.location = urlPath + '?/reports/export-excel/'+ id;
}