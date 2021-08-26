$(function() {

    navigator.geolocation.getCurrentPosition(function(position){
        console.log(position);
    });

    var urlPath = JSON.parse(webURL);
    var checkedState = new Array();

    $('#shipdateFrom').daterangepicker({ 
        singleDatePicker: true,
        locale : {
            format: 'YYYY-MM-DD'
        }
    });

    $('#shipdateFrom').val("");

    $('#shipdateTo').daterangepicker({ 
        singleDatePicker: true,
        locale : {
            format: 'YYYY-MM-DD'
        }
    });

    $('#shipdateTo').val("");

    var tbManual = $('#manualTbl').DataTable({
        bSort: false,
        bFilter: false,
        bLengthChange: false,
        // dom: 'it',
        bInfo : false,
        paging: false,
        autoWidth: false,
        processing: true,
        serverSide: true,
        // language: {
        //     infoEmpty: 'No records to be shown',
        //     info:  '_TOTAL_ Records'
        // },
        ajax: {
            url: urlPath + '?/manual/list',
            method: 'POST',
            datatype: 'json',
            data: function(data){

                var isOffload = 0;

                if( $('#isOff').is(":checked") == true ) {
                    var isOffload = 1;
                }

                var controlNo = $(controlNum).val();
                var dcID      = $(dc).val();
                var locID     = $(locationID).val();
                var sdFrom    = $(shipdateFrom).val();
                var sdTo      = $(shipdateTo).val();
                var acID      = $(ac).val();
                var amID      = $(am).val();
                var isOff     = isOffload;

                data.controlNo = controlNo;
                data.dcID      = dcID;
                data.locID     = locID;
                data.sdFrom    = sdFrom;
                data.sdTo      = sdTo;
                data.acID      = acID;
                data.amID      = amID;
                data.isOff     = isOff;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Can not load data');
            },
            dataSrc: function(json){                
                var rowCount = json.recordsTotal;
                console.log(rowCount);


                $('#btnRec').attr('disabled', 'disabled'); 

                if(rowCount > 0)
                {
                    $('.total-records').text(rowCount + ' records filtered');
                    $('#selectall').removeAttr('disabled');
                }
                else
                {
                    $('.total-records').text('No records to be shown');
                    $('#selectall').attr('disabled', 'disabled');                    
                }

                return json.data;
            },
        },         
            columns: [
                { data: 'Deliver_ID',
                  className: 'text-center',
                    render: function(data,type,row,meta){

                        return '<input type="checkbox" id="selectid" name="select_' + row.Deliver_ID +'" data-delid ="'+ row.Deliver_ID +'" value="'+ row.Deliver_ID +'">'
                    } },
                { data: 'ControlNo' },
                { data: 'Location' },
                { data: 'TotalContainer' },
                { data: 'ShippedDate' },
            ], drawCallback: function (settings) {

                $(this).closest('table').find('#selectall')
                .prop('checked', false);         
            }
    });


    $('body').on('click', '#selectall', function () {
        $(this).closest('table').find('tbody :checkbox')
            .prop('checked', this.checked)
            .closest('tr').toggleClass('selected', this.checked);
    });

    $('body').on('click', 'tbody :checkbox',function () {
        $(this).closest('tr').toggleClass('selected', this.checked); 

        $(this).closest('table').find('#selectall')
        .prop('checked', ($(this).closest('table').find('#selectid:checked').length == $(this).closest('table').find('tbody :checkbox').length)); 
    });

    $("body").on('change', '#selectid, #selectall', function() {

        var count = 0;
        checkedState = $("#manualTbl #selectid:checked").map(function(){
          return $(this).val();
        }).get(); 

        count = checkedState.length;
        console.log(count);

        if(count > 0) {
            $('#btnRec').removeAttr('disabled');
            $('.total-selected').text(count + ' records selected');
        }
        else {
            $('.total-selected').text('No records selected');
            $('#btnRec').attr('disabled', 'disabled'); 
        }
        
    });

    $('body').on('click', '#btnFilterSearch',function () {

        var ctn = $('#controlNum').val();
        var dc  = $('#dc').val();
        var loc = $('#locationID').val();
        var sdf = $('#shipdateFrom').val();
        var sdt = $('#shipdateTo').val();
        var ac  = $('#ac').val();
        var am  = $('#am').val();

        // localStorage.setItem('ctn', ctn); 
        // localStorage.setItem('dc', dc); 
        // localStorage.setItem('loc', loc); 
        // localStorage.setItem('sdf', sdf); 
        // localStorage.setItem('sdt', sdt); 
        // localStorage.setItem('ac', ac); 
        // localStorage.setItem('am', am);      

        if(ctn != '' || dc != '' || loc != '' || ac != '' || am != '' || (sdf != '' && sdt != '')) {
            $('#btnRefresh').removeAttr('disabled');
            tbManual.draw();
        }
        
    });

    $('body').on('click', '#btnRefresh',function () {

        $('#controlNum').val('');
        $('#dc').val(0).change();
        $('#locationID').val(0).change();
        $('#shipdateFrom').val('');
        $('#shipdateTo').val('');
        $('#ac').val('');
        $('#am').val('');

        $('#btnRefresh').attr('disabled', 'disabled');
        tbManual.draw();
    });

    $('#filter_modal').on('show.bs.modal', function(e) {

        // var ctn = localStorage.getItem('ctn'); 
        // var dc =localStorage.getItem('dc'); 
        // var loc =localStorage.getItem('loc'); 
        // var sdf =localStorage.getItem('sdf'); 
        // var sdt =localStorage.getItem('sdt'); 
        // var ac =localStorage.getItem('ac'); 
        // var am =localStorage.getItem('am');  


        // $('.select-search').select2();

        // $('#controlNum').val(ctn);
        // $('#dc').val(dc);
        // $('#locationID').val(loc).change();
        // $('#shipdateFrom').val(sdf);
        // $('#shipdateTo').val(sdt);
        // $('#ac').val(ac);
        // $('#am').val(am);
    })

    $('body').on('click', '#btnRec',function () {
        
        var deliverID = { data: checkedState };
        
        swal({
            title: "Are you sure?",
            text: "You're about to receive a number of deliveries.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#27ae60",
            confirmButtonText: "Receive",
            cancelButtonText: "Cancel",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm){
            if (isConfirm) {
                $('#cover-spin').show();
                $.post(urlPath + '?/manual/receive', deliverID, function(res) {
                        if(res.num > 0)
                        {
                            $('#cover-spin').hide();
                            swal({
                                title: "Success!",
                                text: res.msg,
                                type: "success",
                                confirmButtonText: "Ok"
                            },
                            function(isConfirm)
                            {
                                if(isConfirm) {
                                    tbManual.draw();
                                }
                            });
                        }
                        else {
                            $('#cover-spin').hide();
                            swal({
                                title: "Warning!",
                                text: res.msg,
                                type: "warning",
                                confirmButtonText: "Ok"
                            });
                        }
                    }, 'JSON');
            }
        });
                // $.ajax({
                //     url: '?/manual/receive',
                //     type: 'POST',
                //     data: deliverID,
                //     success: function (data) {
                //         console.log(data.num);
                //         if (data.num > 0) {
                //             swal({
                //                 title: "Success!",
                //                 text: data.msg,
                //                 type: "success",
                //                 confirmButtonText: "Ok"
                //             },
                //             function(isConfirm)
                //             {
                //                 tbManual.draw();
                //             });
                //         }
                //         else {
                //             swal({
                //                 title: "Warning!",
                //                 text: data.msg,
                //                 type: "warning",
                //                 confirmButtonText: "Ok"
                //             });
                //         }
                //     },
                //     error: function () {
                //         console.log('error');
                //     }
                // }, 'JSON');
         

        
    });

    $('body').on('change', "#dc", function() {

        var dcID = $(this).val();

        $.ajax({
            url: '?/manual/storelist/' + dcID,
            type: 'POST',
            dataType: 'text',
            cache: false,
            success: function (data) {
                $('#locationID').html(data);
            },
            error: function () {
                console.log('error');
            }
        });
    });

})