/* ------------------------------------------------------------------------------
*
*  # delivery_update.js
*
*  Specific JS code additions for updating details in delivery page
*
*  Version: 1.0
*  Latest update: Nov 17, 2019
*
* ---------------------------------------------------------------------------- */

$(function() {

    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{ 
            orderable: false,
            width: '150px',
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

    var delivery_items_tbl = $('#delivery_items_tbl').DataTable({
        stateSave: true,
        "bLengthChange": false,
        "bInfo" : false,
        "paging": false,
        "searching": false,
        "ordering": false,
        columnDefs: [ {
            orderable: false,
            className: 'text-center',
            targets: [ 3,4 ]
        } ],
        "processing": true,
        "serverSide": true,
        "language" : {
            "processing": "<div class='table-processing'><span><img class='atp-loading' src='"+JSON.parse(webURL)+"/assets/images/loaders/ellipsis-70.gif'/></span></div>"
        },
        "ajax": {
            "url": JSON.parse(webURL) + "?/delivery/details/"+d_ID,
            "method": "POST",
            "datatype": "json", 
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Processing data failed. Please report to the System Adminstator.");
            }
        },
        columns:[   
            { "data": "Barcode" },
            { "data": "ContainerType" },
            { "data": "ContainerColor" },
            { "data": "LoadQty" },
            { "data": "RecQty" },
            { "data": "Loaded" },
            { "data": "Unloaded" }
        ]
    });

    /* Scan Barcode Events */
    $('body').on('change', '#scanBarcodeNum', function(e) {
        e.preventDefault();
        var urlPath           = JSON.parse(webURL);
        var scanCode          = $(this).val();
        var dc_ID             = $('#warehouseID').val();
        var deliveryID        = $('#createdDeliveryID').val();
        var totalNumContainer = $('#totalNumContainer').val();
        var curtc             = $('#curTotalContainer').val();
        var checkCode         = scanCode.split('-');
        // var filterCode        = false;
        
        if(scanCode.includes('-')) 
        {
            var filterCode = codeFilterCheck(checkCode[1]);

            if(scanCode.indexOf('-') == -1 || filterCode == false)
                {   
                    console.log(scanCode.indexOf('-'));
                    console.log(checkCode[1]);
                    console.log(filterCode);
                    invalidBarcodeErrorMessage(1, deliveryID, scanCode, urlPath);
                }
                else
                {
                    var con_ID  = container_ID(scanCode);

                    $.post(urlPath + '?/delivery/count', { id: deliveryID }, function(data) {
                        if(curtc > data.total)
                        {
                            if((checkCode[1].length == 5 && checkCode[2] == data.loc_Code) || (checkCode[1] == 'DOS' && checkCode[3] == data.loc_Code))
                            {
                                if(checkCode[1] == 'DOS')
                                {
                                    loadQuantityForm(5, deliveryID, scanCode, curtc, urlPath);
                                }
                                else
                                {
                                    if(dc_ID == 2) 
                                    {
                                        loadContainerForm(deliveryID, scanCode, curtc, urlPath);
                                    }
                                    else
                                    {
                                        saveDetails(con_ID, deliveryID, scanCode, 1, urlPath, delivery_items_tbl);
                                    }
                                }
                            }
                            else
                            {
                                invalidBarcodeErrorMessage(1, deliveryID, scanCode, urlPath);
                            }
                        }
                        else
                        {   
                            if((checkCode[1].length == 5 && checkCode[2] == data.loc_Code) || (checkCode[1] == 'DOS' && checkCode[3] == data.loc_Code))
                            {
                                if(checkCode[1] == 'DOS')
                                {
                                    loadQuantityForm(5, deliveryID, scanCode, curtc, urlPath);
                                }
                                else
                                {
                                    warningMessage(urlPath);
                                }
                            }
                            else
                            {
                                invalidBarcodeErrorMessage(1, deliveryID, scanCode, urlPath);
                            }
                        }
                    }, 'JSON');
                }
        }
        else
        {
            invalidBarcodeErrorMessage(1, deliveryID, scanCode, urlPath);
        }

        
    });

    /* Container type modal change event */
    $('body').on('change', '#containerCode', function(e) {
        e.preventDefault();
        var urlPath = JSON.parse(webURL);
        var con_ID = $(this).val();
        var deliveryID    = $('#del_ID').val();
        var bCode         = $('#barcodeNum').val();
        var qty           = 1;
        var totalCont     = $('#totalContainer').val();

        $('#modal_container').modal('hide');
        saveDetails(con_ID, deliveryID, bCode, qty, urlPath, delivery_items_tbl);
    });

    /* Quantity form on change event */
    $('body').on('change', '#quantity', function(e){
        e.preventDefault();
        var urlPath = JSON.parse(webURL);
        var con_ID = $('#containerType').val();
        var deliveryID    = $('#del_ID').val();
        var bCode         = $('#barcodeNum').val();
        var qty           = $(this).val();
        var totalCont     = $('#totalContainer').val();

        if(parseInt(qty) > 0 )
        {
            $.post(urlPath + '?/delivery/check', { bc : bCode, q : qty, d : deliveryID }, function(res){
                if(res == 1)
                {
                    $('#modal_quantity').modal('hide');
                    updateDOS(deliveryID, bCode, qty, urlPath, delivery_items_tbl);
                }
                else
                {
                    $('#modal_quantity').modal('hide');
                    saveDetails(con_ID, deliveryID, bCode, qty, urlPath, delivery_items_tbl);
                }
            }, 'JSON');
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
    });

    $('body').on('click', '#btnUpdateRemarks', function(e){
        var urlPath = JSON.parse(webURL);
        var tc = $('#totalNumContainer').val();
        var curtc = $('#curTotalContainer').val();
        var scanned = $('#countScanContainer').val();
        var error = false;

        if(parseInt(tc) < parseInt(scanned)) {

            console.log(tc + ' < ' + scanned);

            error = true;
            $('#totalNumContainer').val(curtc);

            swal({
                title: "Error!",
                text: "Total container can not be lower than scanned container",
                confirmButtonColor: "#EF5350",
                type: "error"
            });
        }

        if(error == false) {
            $.post(urlPath + '?/delivery/update', $('#updateForm').serialize(), function(res){
                if(res.num < 0)
                {
                    swal({
                        title: "Error!",
                        text: res.message,
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    });
                } 
                else 
                {
                    $('#curTotalContainer').val(tc);
                    swal({
                        title: "Success!",
                        text: res.message,
                        confirmButtonColor: "#EF5350",
                        type: "success"
                    });
                }
            }, 'JSON');
        }
        
    });
});

function saveDetails(ctype, delID, bCode, qty, urlPath, itemsTbl)
{
    var count = $('#countScanContainer').val();

    $.post(urlPath + '?/delivery/save/item', { c:ctype, d:delID, b:bCode, q:qty }, function(res) {
        if(res.num > 0)
        {
            $('#countScanContainer').val(parseInt(count) + parseInt(1));
            $('#success-scan').get(0).play();
            // var totalCont = $('#totalNumContainer').val();
            var totalCont = $('#curTotalContainer').val();
            var loadCount = (res.loadCount == null) ? 0 : res.loadCount; 
            var pBar = (parseInt(loadCount) / parseInt(totalCont)) * 100;
            // var countText = loadCount+'/'+ $('#totalNumContainer').val();
            var countText = loadCount+'/'+ $('#curTotalContainer').val();
            $('.progress-bar').attr('style', 'width:'+Math.round(pBar)+'%');
            $('#scanCount').text(countText); 
            itemsTbl.ajax.url(JSON.parse(webURL) + "?/delivery/details/"+delID).draw();
            $('#scanBarcodeNum').val("");
            $('#scanBarcodeNum').focus(); 
        }
        else 
        {
           errorMessages(res.message);
        }
    }, 'JSON'); 
}

function updateDOS(delID, bCode, qty, urlPath, itemsTbl)
{
    $.post(urlPath + '?/delivery/update/item', { d:delID, b:bCode, q:qty }, function(res) {
        if(res.num > 0)
        {
            $('#success-scan').get(0).play();
            itemsTbl.ajax.url(JSON.parse(webURL) + "?/delivery/details/"+delID).draw();
            $('#scanBarcodeNum').val("");
            $('#scanBarcodeNum').focus(); 
        }
        else 
        {
           errorMessages(res.message);
        }
    }, 'JSON'); 
}

function loadContainerForm(delID, bCode, total, urlPath)
{
    $('#modal_container').modal('toggle');
    var remoteLink = urlPath + '?/delivery/container';
    $('#modal_container').find('.modal-body').load(remoteLink, function() {
        // Init Select2 when loaded
        $('.select').select2({
            minimumResultsForSearch: Infinity
        });
        $('#containerCode').focus();
        $('#del_ID').val(delID);
        $('#barcodeNum').val(bCode);
        $('#totalContainer').val(total);
    });
}

function loadQuantityForm(ctype, delID, bCode, total, urlPath)
{
    $('#modal_container').modal('hide');
    $('#modal_quantity').modal('toggle');
    var remoteLink = urlPath + '?/delivery/quantity';
    $('#modal_quantity').find('.modal-body').load(remoteLink, function() {
        $('#quantity').focus();
        $('#containerType').val(ctype);
        $('#del_ID').val(delID);
        $('#barcodeNum').val(bCode);
        $('#totalContainer').val(total);
    });
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
            case 'Z' :
                c_ID = 11;
                break;
            case 'U' :
                c_ID = 10;
                break;
            case 'P' :
                c_ID = 9;
                break;
            case 'N' :
                c_ID = 8;
                break;
            case 'F' :
                c_ID = 7;
                break;
            case 'A' :
                c_ID = 6;
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

function invalidBarcodeErrorMessage(conType, deli_ID, scanCode, urlPath)
{
    $.post(urlPath + '?/delivery/invalid', { c:conType, d:deli_ID, b:scanCode, q:1 }, function(res) {
        if(res.num > 0)
        {
            $('#invalid-scan').get(0).play();
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

function warningMessage(urlPath)
{
    swal({
        title: "Warning!",
        text: "You have exceeded the number of scan barcode. By clicking ok you will be redirected to the main dashboard.",
        confirmButtonColor: "#EF5350",
        type: "warning"
    },
    function(isConfirm){
        if (isConfirm) {
            $(window.location).attr('href', urlPath + '?/dashboard');
        }
    });
}

function errorMessages(msg)
{
    $('#error-scan').get(0).play();
    swal({
        title: "Error!",
        text: msg,
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

function codeFilterCheck(code)
{
    if(code != 'DOS')
    {
        var filter = code.split('');

        if(isNaN(filter[1]) || isNaN(filter[2]) || isNaN(filter[3]) || isNaN(filter[4]))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    else
    {
        return true;
    }
}


function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }