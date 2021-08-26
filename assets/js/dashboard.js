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
    $('.dashboard_table_items').DataTable({
		stateSave: true,
        scrollX: true,
        "bLengthChange": false,
        "bSort": false,
		"ordering": false,
		bFilter: false
	});

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
	});

	/* Delivery details popup modal */
    // $('#modal_details_view').on('show.bs.modal', function(e) {
    //     var urlPath = JSON.parse(webURL);
    //     var id = $(e.relatedTarget).data('itemid');
    //     var canDate  = $(e.relatedTarget).data('candate');
    //     var shipDate = $(e.relatedTarget).data('sdate');
    //     var recDate  = $(e.relatedTarget).data('rdate');
    //     var cancelDate = (canDate == '') ? 0 : canDate;
    //     var remoteLink = urlPath + '?/dashboard/details/' + id + '/' + cancelDate + '/' + shipDate + '/' + recDate;

    //     $('#modal_details_view').find('.modal-body').load(remoteLink, function() {
    //         // Init Select2 when loaded
    //         $('.select').select2({
    //             minimumResultsForSearch: Infinity
    //         });
    //     });
    // });

    /* Delivery details popup modal */
    $('#modal_assign_truck').on('show.bs.modal', function(e) {
        var urlPath = JSON.parse(webURL);
        var id     = $(e.relatedTarget).data('itemid');
        var loc_ID = $(e.relatedTarget).data('locid');
        var total  = $(e.relatedTarget).data('total');
        var tscan  = $(e.relatedTarget).data('tscan');
        var remoteLink = urlPath + '?/assign/truck';

        $('#modal_assign_truck').find('.modal-body').load(remoteLink, function() {
            $('#del_ID').val(id);
            $('#location_ID').val(loc_ID);
            $('#totalContainer').val(total);
            $('#totalScan').val(tscan);
            $('.select').select2({
                minimumResultsForSearch: Infinity
            });
        });
    });

    $('body').on('click', '#btnAssign', function(e){
        $("#btnAssign").attr("disabled",true).html("Waiting..");
        e.preventDefault();
        var urlPath    = JSON.parse(webURL);
        var error      = false;
        var truckNo    = $("select[name='truck_ID']").val();
        var driverName = $('#driverName').val();

        if(truckNo.length == 0)
        {
            $("#btnAssign").removeAttr("disabled").html("ASSIGN");
            var error = true;
            $('#truckNumError').show();
        }

        if(driverName.length == 0)
        {
            $("#btnAssign").removeAttr("disabled").html("ASSIGN");
            var error = true;
            $('#driverNameError').show();
        }

        if(error == false)
        {
            $.post(urlPath + '?/dashboard/assign', $('#assignTruckForm').serialize(), function(data){
                $("#btnAssign").removeAttr("disabled").html("ASSIGN");
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
                else if(data.num == -1001)
                {
                    console.log('ime herere');
                    swal({
                        title: "Error!",
                        text: data.message,
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $('#modal_assign_truck').hide();
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
    });

     $('body').on('change', '#truck-select', function(){

        var urlPath    = JSON.parse(webURL);
        delID   = $('#deliverID').val();
        batchNo = $(this).data('bn');
        truckID = $(this).val();
        driverID = 0;

        console.log(delID);
        console.log(batchNo);
        console.log(truckID);


        $.post(urlPath + "?/update/truck", { id: delID, b: batchNo, t: truckID, d:driverID }, function(data){
            if(data.num > 0)
            {
                console.log(data.message);
            }
            else
            {
                console.log(data.message);
                swal({
                    title: "Error!",
                    text: data.message,
                    confirmButtonColor: "#EF5350",
                    type: "error"
                });
            }
        }, 'JSON');
    });

    $('body').on('change', '#driver-select', function(){

        var urlPath    = JSON.parse(webURL);
        delID   = $('#deliverID').val();
        batchNo = $(this).data('bn');
        driverID = $(this).val();
        truckID = 0;

        console.log(delID);
        console.log(batchNo);
        console.log(driverID);


        $.post(urlPath + "?/update/truck", { id: delID, b: batchNo, t: truckID, d:driverID }, function(data){
            if(data.num > 0)
            {
                console.log(data.message);
            }
            else
            {
                console.log(data.message);
                swal({
                    title: "Error!",
                    text: data.message,
                    confirmButtonColor: "#EF5350",
                    type: "error"
                });
            }
        }, 'JSON');
    });

    $('body').on('change', '#truck_ID', function(){
        $('#truckNumError').hide();
    });

    $('body').on('change', '#driverName', function(){
        $('#driverNameError').hide();
    });

    $('#shipDate').daterangepicker({
        singleDatePicker: true,
        locale : {
            format: 'YYYY-MM-DD'
        }
    });

    $('#shipDate').val("");

    /* Quantity form on change event */
    $('body').on('change', '#onoff_quantity', function(e){
        e.preventDefault();
        var urlPath = JSON.parse(webURL);
        var detail_ID  = $('#detail_ID').val();
        var deliveryID = $('#del_ID').val();
        var qty        = $('input[name="onoff_quantity"]').val();
        var loadQty    = $('#loadQty').val();
        var status     = $('#status').val();
        var action     = $('#action').val();
        var can_Date   = $('#cancelDate').val();
        var recQty     = $('#recQty').val();
        var offLoadQty = $('#offLoadQty').val();
        var theQty = (action == 'load') ? offLoadQty : loadQty;
        var isShipped  = $('#isShipped').val();
        var isReceived  = $('#isReceived').val();

        if(action == 'load')
        {
            if(parseInt(qty) > 0 )
            {
                if(parseInt(qty) == parseInt(offLoadQty) || parseInt(qty) < parseInt(offLoadQty))
                {
                    $('#modal_quantity_offload').modal('hide');
                    doAction(detail_ID, qty, status, action, can_Date, deliveryID, urlPath, isShipped, isReceived)
                }
                else
                {
                    var text = (parseInt(qty) > parseInt(offLoadQty)) ? "greater" : "less";
                    swal({
                        title: "Warning!",
                        text: "The quantity you enter is "+ text +" than the quantity you are loading.",
                        confirmButtonColor: "#EF5350",
                        type: "warning"
                    });
                }
            }
            else
            {
                swal({
                    title: "Warning!",
                    text: "You can only input numbers in the quantity field. Letters, special characters, zero and negative value are not allowed.",
                    confirmButtonColor: "#EF5350",
                    type: "warning"
                });
            }
        }
        else
        {
            if(parseInt(qty) > 0 )
            {
                if(parseInt(qty) > parseInt(loadQty))
                {
                    swal({
                        title: "Warning!",
                        text: "The quantity you enter is greater than the quantity you are receiving.",
                        confirmButtonColor: "#EF5350",
                        type: "warning"
                    });
                }
                else
                {
                    $('#modal_quantity_offload').modal('hide');
                    doAction(detail_ID, qty, status, action, can_Date, deliveryID, urlPath, isShipped, isReceived)
                }
            }
            else
            {
                swal({
                    title: "Warning!",
                    text: "You can only input numbers in the quantity field. Letters, special characters, zero and negative value are not allowed.",
                    confirmButtonColor: "#EF5350",
                    type: "warning"
                });
            }
        }
    });

    /* Delivery details popup modal */
    $('#modal_truck_load_summary').on('show.bs.modal', function(e) {
        var urlPath = JSON.parse(webURL);
        var shipDate = $(e.relatedTarget).data('ddate');
        var remoteLink = urlPath + '?/dashboard/load/summary/' + shipDate;

        $('#modal_truck_load_summary').find('.modal-body').load(remoteLink, function() {
            // Init Select2 when loaded
        });
    });

});

function cancelDelivery(delID)
{
    var urlPath = JSON.parse(webURL);

    swal({
        title: "You are about to cancel the Delivery",
        text: 'Please type "cancel" to confirm cancellation of Delivery',
        type: "input",
        showCancelButton: true,
        confirmButtonColor: "#2196F3",
        closeOnConfirm: false,
        animation: "slide-from-top"
    },
    function(inputValue){
        if (inputValue === false) return false;
        if ((inputValue === "") || (inputValue.toLowerCase() != 'cancel')) {
            swal.showInputError('Please input the word "cancel"');
            return false
        }

        if (inputValue.toLowerCase() == 'cancel') {
            $.post(urlPath + "?/cancel", { id: delID }, function(data){
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
    });
}

function viewDetails(del_ID, cancel_Date, urlPath, shipDate, recDate)
{
    $('#viewbtn_'+del_ID).tooltip('hide');
    $('#modal_details_view').modal('toggle');
    var remoteLink = urlPath + '?/dashboard/details/' + del_ID + '/' + cancel_Date + '/' + shipDate + '/' + recDate;
    $('#modal_details_view').find('.modal-body').load(remoteLink, function() {
        $('.select').select2({
                        minimumResultsForSearch: Infinity
                    });
    });
}

function checkContainer(detail_ID, totalQty, status, action, can_Date, deliver_ID, con_ID, bCode, loadQty, recQty, offLoadQty, shipDate, recDate)
{
    $('#modal_details_view').modal('hide');
    var urlPath = JSON.parse(webURL);
    if(con_ID == 5)
    {
        loadQuantityForm(con_ID, deliver_ID, bCode, loadQty, urlPath, detail_ID, status, action, can_Date, recQty, offLoadQty, shipDate, recDate)
    }
    else
    {
        doAction(detail_ID, totalQty, status, action, can_Date, deliver_ID, urlPath, shipDate, recDate);
    }
}

function loadQuantityForm(ctype, delID, bCode, loadQty, urlPath, detail_ID, status, action, can_Date, recQty, offLoadQty, shipDate, recDate)
{
    $('#modal_quantity_offload').modal('toggle');
    var remoteLink = urlPath + '?/dashboard/quantity';
    $('#modal_quantity_offload').find('.modal-body').load(remoteLink, function() {
        $('#quantity').focus();
        $('#containerType').val(ctype);
        $('#del_ID').val(delID);
        $('#barcodeNum').val(bCode);
        $('#loadQty').val(loadQty);
        $('#detail_ID').val(detail_ID);
        $('#status').val(status);
        $('#action').val(action);
        $('#cancelDate').val(can_Date);
        $('#recQty').val(recQty);
        $('#offLoadQty').val(offLoadQty);
        $('#isShipped').val(shipDate);
        $('#isReceived').val(recDate);
    });
}

function doAction(detail_ID, qty, status, action, can_Date, deliver_ID, urlPath, shipDate, recDate)
{
	$.post(urlPath + '?/delivery/'+action, { dd_ID:detail_ID, q:qty, s:status, a:action }, function(data) {
        if(data.res > 0)
        {
            $('#modal_details_view').modal('hide');
        	swal({
                title: "Success!",
                text: data.message,
                confirmButtonColor: "#EF5350",
                type: "success"
            },
            function(isConfirm){
                if (isConfirm) {
                    viewDetails(deliver_ID, can_Date, urlPath, shipDate, recDate);
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
