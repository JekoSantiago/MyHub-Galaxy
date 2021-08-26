/* ------------------------------------------------------------------------------
*
*  # Basic datatables
*
*  Specific JS code additions for datatable_basic.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: true,
        columnDefs: [{ 
            orderable: false,
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


    // Basic datatable
    $('.sched_datatable-basic').DataTable({
        "ordering": false,
        bSort: false
    });

    // External table additions
    // ------------------------------

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    $('#scheduleDate').daterangepicker({ 
        singleDatePicker: true,
        locale : {
            format: 'YYYY-MM-DD'
        }
    });
    
    $('#scheduleDate').val("");

    $('body').on('click', '#btnSaveSchedule', function(e){
        e.preventDefault();
        var urlPath = JSON.parse(webURL);
        var error = false;
        var schedDate = $('#scheduleDate').val();
        var loc_ID    = $('#location_ID').val();
        var del_Type  = $('#deliveryType').val();

        if(schedDate.length == 0)
        {   
            var error = true;
            $('#scheduleDateError').show();
        }
        else 
        {
            $('#scheduleDateError').hide();
        }

        if(loc_ID.length == 0)
        {
            var error = true;
            $('#locationError').show();
        }
        else 
        {
            $('#locationError').hide();
        }

        if(del_Type.length == 0)
        {
            var error = true;
            $('#deliveryTypeError').show();
        }
        else 
        {
            $('#deliveryTypeError').hide();
        }

        if(error == false)
        {
            $.post(urlPath + '?/schedule/save', $('#formAddSchedule').serialize(), function(data){
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
                            $(window.location).attr('href', urlPath + '?/schedule/manage');
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

    $('body').on('keyup', '#scheduleDate, #editScheduleDate', function() {
        $('#scheduleDateError').hide();
    });

    $('body').on('change', '#location_ID, #editLocationID', function() {
        $('#locationError').hide();
    });

    $('body').on('change', '#deliveryType, #editDTID', function() {
        $('#deliveryTypeError').hide();
    });

    /* load edit detail form - popup modal */
    $('#modal_edit_schedule').on('show.bs.modal', function(e) {
        var urlPath = JSON.parse(webURL);
        var sID  = $(e.relatedTarget).data('sid');
        var remoteLink = urlPath + '?/schedule/edit/'+ sID;
        
        $('#modal_edit_schedule').find('.modal-body').load(remoteLink, function() {
            $('.select').select2({
                minimumResultsForSearch: Infinity
            });

            $('.select-search').select2();
        }); 
    });

    $('body').on('click', '#btnUpdateSchedule', function(e){
        console.log('im here');
        e.preventDefault();
        var urlPath = JSON.parse(webURL);
        var error = false;
        var schedDate = $('#editScheduleDate').val();
        var loc_ID    = $('#editLocationID').val();
        var del_Type  = $('#editDTID').val();

        if(schedDate.length == 0)
        {   
            var error = true;
            $('#scheduleDateError').show();
        }
        else 
        {
            $('#scheduleDateError').hide();
        }

        if(loc_ID.length == 0)
        {
            var error = true;
            $('#locationError').show();
        }
        else 
        {
            $('#locationError').hide();
        }

        if(del_Type.length == 0)
        {
            var error = true;
            $('#deliveryTypeError').show();
        }
        else 
        {
            $('#deliveryTypeError').hide();
        }

        console.log(error);

        if(error == false)
        {
            $.post(urlPath + '?/schedule/update', $('#formEditSchedule').serialize(), function(data){
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
                            $(window.location).attr('href', urlPath + '?/schedule/manage');
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
});
