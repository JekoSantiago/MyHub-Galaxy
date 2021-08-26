/* ------------------------------------------------------------------------------
*
*  # receive.js
*
*  Specific JS code additions for receive page
*
*  Version: 1.0
*  Latest update: Nov 17, 2019
*
* ---------------------------------------------------------------------------- */
jQuery.fn.dataTable.Api.register( 'processing()', function ( show ) {
    return this.iterator( 'storeViewTbl', function ( ctx ) {
        ctx.oApi._fnProcessingDisplay( ctx, show );
    } );
} );
$(function() {

    
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [ 0 ]
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

    var storeViewTbl = $('#storeViewTbl').DataTable({
        stateSave: true,
        "bLengthChange": false,
        "bInfo" : false,
        "paging": false,
        "searching": false,
        "ordering": false,
        columnDefs: [ {
            orderable: false,
            className: 'text-center',
            targets: [ 3,4,5,6,7,8,9 ]
        } ],
        processing: true,
        "serverSide": true,
        "language" : {
            "processing": "<div class='table-processing'><span><img class='atp-loading' src='"+JSON.parse(webURL)+"/assets/images/loaders/ellipsis-70.gif'/></span></div>"
        },
        "ajax": {
            "url": JSON.parse(webURL) + "?/delivery/details/"+d_ID,
            "method": "POST",
            "datatype": "json", 
            "data": function (d) {
                return $.extend({}, d, {  
                    "deliveryID": $("#delivery_ID").val()
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Processing data failed. Please report to the System Adminstator.");
            }
        },
        columns:[ 
            {render: function(data,type,row,meta){
                
               
                if( row.RecQty <= 0 || row.Unloaded === '' ) 
                {
                    return  "<input type='checkbox' name='receive_tap' class='form-control rcv'>";
                }
                else
                {
                    return  "<input type='checkbox' name='receive_tap' class='form-control rcv' checked='checked'>";
                }
            }},
            { "data": "Barcode",
                render: function(data, type, row) {
                    return '<a data-toggle="modal" data-target="#modal_update_remarks" data-ddid="'+ row.DeliverDetail_ID +'" data-delid="' + row.Deliver_ID + '" id="linkBC"  name="dd_'+ row.DeliverDetail_ID +'">' + row.Barcode + '</a>';
                } 
            },
            { "data": "ContainerType" },
            { "data": "ContainerColor" },
            { "data": "Total" },
            { "data": "TruckLoaded",
            render: function (data, type, row, meta ) {
                if(row.TruckLoaded <= 0) {
                    return 0;
                }
                else {
                    return row.TruckLoaded;
                }
            }  },
            { "data": "ItemsReceived" },
            { "data": "TruckOffload" },
            { "data": "Unloaded", 
                "render": function ( data, type, row, meta ) {

                    truckload = 0;

                    if(row.TruckLoaded <= 0) {
                        truckload = 0;
                    }
                    else {
                        truckload = row.TruckLoaded;
                    }

                    if( parseInt(row.ItemsReceived) < parseInt(row.Total) || row.Unloaded === '' ) 
                    {
                        return  "<input type='checkbox' name='status[]'> <input type='hidden' id='itemStatus_"+row.Barcode+"' value='"+truckload+"'>";
                    }
                    else
                    {
                        return  "<input type='checkbox' name='status[]' checked='checked' disabled> <input type='hidden' id='itemStatus_"+row.Barcode+"' value='"+truckload+"'>";
                    }
                }
            },
            { "data": "Unloaded",
                "render" : function( data, type, row, meta) {
                   var unloaded = (row.RecQty>0) ? row.Unloaded:"";
                   return unloaded;
                }
            },
            { "data": "Status",
                "render": function ( data, type, row, meta ) {
                    if(row.TruckOffload != 0) 
                    {
                        return "<span class='label bg-danger-800'>W/ OFFLOAD</span>";
                    }
                    else
                    {
                        return "";
                    }
                }
            }
        ]
    });

    var storeRemarskTbl = $('#storeRemarks').DataTable({
        stateSave: true,
        "bLengthChange": false,
        "bInfo" : false,
        "paging": false,
        "searching": false,
        "ordering": false,
        columnDefs: [ {
            width: '15%',
            targets: [ 0 ]
        } ],
        "processing": true,
        "serverSide": true,
        "language" : {
            "processing": "<div class='table-processing'><span><img class='atp-loading' src='"+JSON.parse(webURL)+"/assets/images/loaders/ellipsis-70.gif'/></span></div>"
        },
        "ajax": {
            "url": JSON.parse(webURL) + "?/receive/ddremarks/" + d_ID,
            "method": "POST",
            "datatype": "json", 
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Processing data failed. Please report to the System Adminstator.");
            }
        },
        columns:[ 
            { "data": "Barcode" },
            { "data": "Remarks" }
        ],
    });
    
    $('body').on('change', '#checkStoreBarcodeNum', function(e) {
        e.preventDefault();
        var urlPath   = JSON.parse(webURL);
        var scanCode  = $(this).val().toUpperCase();
        var deli_ID   = $('#delivery_ID').val();
        var checkCode = scanCode.split('-'); 
        var itemsLoaded   = $('#itemStatus_'+scanCode).val();
        
        if(scanCode.indexOf('-') == -1)
        {
            invalidBarcodeErrorMessage(1, deli_ID, scanCode, urlPath);
        }
        else
        {
            var con_ID  = container_ID(scanCode);
            $.post(urlPath + '?/delivery/count/', { id:deli_ID }, function(data) {
                if((checkCode[1].length == 5 && checkCode[2] == data.loc_Code) || (checkCode[1] == 'DOS' && checkCode[3] == data.loc_Code))
                {
                    $.post(urlPath + '?/receive/barcode/status', { bCode:scanCode, theID:deli_ID }, function(r) {

                        if(r.num == 1) 
                        {
                            if(checkCode[1] == 'DOS')
                            {
                                $.post(urlPath + '?/receive/check', { code : scanCode, d : deli_ID }, function(res){
                                    if(res == 1)
                                    {
                                        receiveQuantityForm(deli_ID, scanCode, urlPath);
                                    }
                                    else
                                    {
                                        invalidBarcodeErrorMessage(con_ID, deli_ID, scanCode, urlPath);
                                    }
                                }, 'JSON');
                            }
                            else
                            {
                                if(parseInt(itemsLoaded) == 0)
                                {
                                    var message = "You have aleady receive the quantity alloted for this barcode.";
                                    warningMessage(message);
                                    $('#modal_update_quantity').modal('hide');
                                }
                                else
                                {
                                    updateDetails(scanCode, deli_ID, 1, storeViewTbl, urlPath);
                                }
                            }
                        }
                        else
                        {
                            warningMessage(r.message);
                        }
                    }, 'JSON');
                }
                else 
                {
                    invalidBarcodeErrorMessage(con_ID, deli_ID, scanCode, urlPath);
                }

            }, 'JSON');
        }
    });

    $('body').on('click', '#btnClear', function(){
        var urlPath = JSON.parse(webURL);
        var dd_ID = $('#deliverDetails_ID').val();
        var delivery_ID = $('#delivery_ID').val();
        $.post(urlPath + '?/receive/clear', { delID : delivery_ID, ids : dd_ID}, function() {
            $('.progress-bar').attr('style', 'width:0%');
            $('#scanCount').text(""); 
            $('#btnClear').attr('disabled', true);
            storeViewTbl.draw();
            $('#checkStoreBarcodeNum').val("");
            $('#checkStoreBarcodeNum').focus();
        });
    });

    $('#modal_update_remarks').on('show.bs.modal', function(e) {
        
        var urlPath = JSON.parse(webURL);
        var delID  = $(e.relatedTarget).data('delid');
        var ddID = $(e.relatedTarget).data('ddid');

        var remoteLink = urlPath + '?/receive/remarks';
        $('#modal_update_remarks').find('.modal-body').load(remoteLink, { d: delID, dd: ddID}, function() {
 
        });
    });

    /* Submit Deliver Detail remarks */
    $('body').on('click', '#update_rmk', function(e) {
        e.preventDefault();
        var urlPath = JSON.parse(webURL);
        var deliveryID = $('#delivery_ID').val();
        var dd_ID = $('#dd_ID').val();
        var rmk   = $('#dd_remarks').val();

        formdata = { d: deliveryID, dd: dd_ID, r: rmk };

        $.post(urlPath + "?/receive/rmk/update", formdata, function(res){
            if(parseInt(res.num) > 0 )
            {
                swal({
                    title: "Success!",
                    text: res.message,
                    confirmButtonColor: "#EF5350",
                    type: "success"
                },
                function(isConfirm){
                    if (isConfirm) {
                        $('#modal_update_remarks').modal('hide');
                        storeRemarskTbl.draw();
                    }
                });
            }
            else
            {
                swal({
                    title: "Error!",
                    text: res.message,
                    confirmButtonColor: "#EF5350",
                    type: "error"
                });
            } 
        }, 'JSON');
        
    });

    /* Submit Forms with customize validation */
    $('body').on('click', '#btnReceived', function(e) { 
        e.preventDefault();
        var urlPath = JSON.parse(webURL);
        //var numberNotChecked = $('input[name="status[]"]:not(":checked")').length;
        var deliveryID = $('#delivery_ID').val();

        swal({
            title: "You are about to receive the Delivery",
            text: 'Please type "receive" to confirm receiving of Delivery',
            type: "input",
            showCancelButton: true,
            confirmButtonColor: "#2196F3",
            closeOnConfirm: false,
            animation: "slide-from-top"
        },
        function(inputValue){
            if (inputValue === false) return false;
            if ((inputValue === "") || (inputValue.toLowerCase() != 'receive')) {
                swal.showInputError('Please input the word "receive"');
                return false
            }
    
            if (inputValue.toLowerCase() == 'receive') {
                $("#btnReceived").attr("disabled",true).html("Waiting..");
                swal({
                    title: "Success!",
                    text: "Delivery has been received.",
                    confirmButtonColor: "#EF5350",
                    type: "success"
                },
                function(isConfirm){
                    $("#btnReceived").removeAttr("disabled").html("RECEIVED");
                    if (isConfirm) {
                        $(window.location).attr('href', urlPath + '?/receive/delivery/'+deliveryID);
                    }
                });
            }
        });
    });

    /* Quantity form on change event */
    $('body').on('change', '#quantity', function(e){
        e.preventDefault();
        var urlPath = JSON.parse(webURL);
        var deliveryID    = $('#del_ID').val();
        var bCode         = $('#barcodeNum').val();
        var qty           = $('#quantity').val();
        var itemsLoaded   = $('#itemStatus_'+bCode).val();
        
        if (parseInt(qty) > 0) 
        {
            // if(parseInt(itemsLoaded) == 0)
            // {
            //     var message = "You have aleady receive the quantity alloted for this barcode.";
            //     warningMessage(message);
            //     $('#modal_update_quantity').modal('hide');
            // }
            // else if(parseInt(qty) > parseInt(itemsLoaded))
            // {
            //     swal({
            //         title: "Error!",
            //         text: "The quantity you enter is greater than the quantity you are receiving which is "+ parseInt(itemsLoaded) +".",
            //         confirmButtonColor: "#EF5350",
            //         type: "error"
            //     });
            // }
            // else 
            // {
                $('#modal_update_quantity').modal('hide');
                updateDetails(bCode, deliveryID, qty, storeViewTbl, urlPath);
            // }
        }
        else {
            swal({
                title: "Warning!",
                text: "You can only input numbers in the quantity field. Letters, special characters, zero and negative value are not allowed.",
                confirmButtonColor: "#EF5350",
                type: "warning"
            });
        }
        

    });


    $('body').on('change','.rcv',function(){
        var data = storeViewTbl.row( $(this).parents('tr') ).data();
        var barcode = data.Barcode;
        var x = barcode.split('-');
        var type = x[0];

        if ( data.RecQty <= 0) // Receive by tap
        {
       

            if (type == 'DOS' || type == 'SABA' || type == 'ALLOCATION' || type == 'PROMO' || type == 'FAS') 
            {
                swal({
                    title: data.Barcode ,
                    text: 'Enter Quantity to RECEIVE',
                    closeOnClickOutside: false,
                    showCloseButton: true,
                    type: "input",
                    input: "number",
                    inputPlaceholder: "Enter Quantity",
                    closeOnConfirm: false,
                    dangerMode: true,
                },function(qty)
                    {
                    if(qty>0)
                    {
                        $('.rcv').prop("disabled",true);
                        var form_data = new FormData();
                        form_data.append('deliverID', data.Deliver_ID);
                        form_data.append('ddID', data.DeliverDetail_ID);
                        form_data.append('qty', qty);
                        var urlPath = JSON.parse(webURL);
                        $.ajax({
                        url: urlPath + "?/receive/del/tap",
                        type: 'POST',
                        dataType: 'json',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        statusCode: {
                            200:function()
                            {
                                swal.close();
                                storeViewTbl.processing( true );
                                storeViewTbl.ajax.reload();
                                updateTap(qty);
                            }
                          
                        }
                    });
                
                    }
                    else
                    {
                        var text = ($.isNumeric(qty)) ? "Quantity must be greater than 0": "Enter a numeric value";
                        $('.rcv').prop("disabled",true);
                        swal({
                            title: "Error",
                            text: text,
                            icon: "warning",
                            timer: 2000,
                            buttons: false
                          });

                          storeViewTbl.ajax.reload(); 
                    }
                    

                    })
        
            }
            else //Case receive
            {
                $('.rcv').prop("disabled",true);
                var urlPath = JSON.parse(webURL);
                var form_data = new FormData();
                var qty = 1;
                form_data.append('deliverID', data.Deliver_ID);
                form_data.append('ddID', data.DeliverDetail_ID);
                form_data.append('qty', qty);

                $.ajax({
                    url: urlPath + "?/receive/del/tap",
                    type: 'POST',
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    statusCode: {
                        200:function()
                        {
                            // storeViewTbl.trigger('processing.dt');
                            storeViewTbl.ajax.reload();
                            updateTap(1);

                        }
                      
                    }
                });
            }
        }
        else // Remove receive
        {
            $('.rcv').prop("disabled",true);
            var urlPath = JSON.parse(webURL);
            var form_data = new FormData();
            var qty = 0;
            form_data.append('deliverID', data.Deliver_ID);
            form_data.append('ddID', data.DeliverDetail_ID);
            form_data.append('qty', qty);

            $.ajax({
                url: urlPath + "?/receive/del/tap",
                type: 'POST',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                statusCode: {
                    200:function()
                    {
                        // storeViewTbl.trigger('processing.dt');
                        storeViewTbl.ajax.reload();
                        updateTap(data.RecQty - (data.RecQty * 2));

                    }
                  
                }
            });
        }

    })
});

function updateDetails(scanCode, deli_ID, qty, storeViewTbl, urlPath)
{
    $.post(urlPath + '?/receive/items', { bcode : scanCode, id : deli_ID, q : qty }, function(res) {
        if(res.num > 0) 
        {
            var ct = $('#scanCount').text();
            var x = ct.split('/');
            (qty>0) ?  $('#success-scan').get(0).play():$('#invalid-scan').get(0).play();
            var totalCont = $('#totalNumContainer').val();
            var receiveCount = parseInt(x[0]) + parseInt(qty); 
            var pBar = (parseInt(receiveCount) / parseInt(totalCont)) * 100;
            var countText = receiveCount+'/'+ $('#totalNumContainer').val();
            $('.progress-bar').attr('style', 'width:'+Math.round(pBar)+'%');
            $('#scanCount').text(countText); 

            if(receiveCount > 0)
            {
                $('#btnClear').removeAttr('disabled');
            }

            if(res.countUL > 0 && res.countOL == 0)
            {
                $('#btnReceived').removeAttr('disabled');
            }

            storeViewTbl.draw();
            $('#checkStoreBarcodeNum').val("");
            $('#checkStoreBarcodeNum').focus();
        }
        else 
        {
            warningMessage(res.message);
        }
    }, 'JSON');
}

function receiveQuantityForm(delID, bCode, urlPath)
{
    $('#modal_update_quantity').modal('toggle');
    var remoteLink = urlPath + '?/receive/quantity';
    $('#modal_update_quantity').find('.modal-body').load(remoteLink, function() {
        $('#quantity').focus();
        $('#del_ID').val(delID);
        $('#barcodeNum').val(bCode);
    });
}

function warningMessage(msg)
{
    $('#error-scan').get(0).play();
    swal({
        title: "Warning!",
        text: msg,
        confirmButtonColor: "#EF5350",
        type: "warning"
    },
    function(isConfirm){
        if (isConfirm) {
            $('#checkStoreBarcodeNum').val("");
            $('#checkStoreBarcodeNum').focus();
        }
    });
}

function invalidBarcodeErrorMessage(conType, deli_ID, scanCode, urlPath)
{
    $('#invalid-scan').get(0).play();
    $.post(urlPath + '?/delivery/invalid', { c:conType, d:deli_ID, b:scanCode, q:1 }, function(res) {
        if(res.num > 0)
        {
            swal({
                title: "Error!",
                text: "Invalid barcode number.",
                confirmButtonColor: "#EF5350",
                type: "error"
            },
            function(isConfirm){
                if (isConfirm) {
                    $('#scanBarcodeNum').val("");
                    $('#scanBarcodeNum').focus();
                }
            });
        }
    }, 'JSON');
}

function container_ID(scanCode)
{
    var code = scanCode.split('-');
    var c_ID;
     
    if(code[1] != 'DOS')
    {
        var c = code[1].substr(0, 1);
        switch(c)
        {
            case 'K':
                c_ID = 3;
                break;
            case 'B':
                c_ID = 2;
                break;
            case 'M' :
                c_ID = 1;
                break;
            default: 
                c_ID = 4;
                break;
        }
    }
    else 
    {
        c_ID = 5;
    }
        
    return c_ID;
}

function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      
function updateTap(qty)
{
    var ct = $('#scanCount').text();
    var x = ct.split('/');
    console.log(x[0]);
    (qty>0) ?  $('#success-scan').get(0).play():$('#invalid-scan').get(0).play();
    var totalCont = $('#totalNumContainer').val();
    var receiveCount = parseInt(x[0]) + parseInt(qty); 
    var pBar = (parseInt(receiveCount) / parseInt(totalCont)) * 100;
    var countText = receiveCount+'/'+ $('#totalNumContainer').val();
    $('.progress-bar').attr('style', 'width:'+Math.round(pBar)+'%');
    $('#scanCount').text(countText); 
}      