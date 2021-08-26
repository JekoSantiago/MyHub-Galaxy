/*
 * mainitenance.js - customize jQuery post, show modals on button click
 * Author : Igor M. Lucmayon
 * Date Created : Nov 14, 2019
 */

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
    $('.datatable-basic').DataTable({
		stateSave: true,
        "bSort": false,
	"bLengthChange": false
	});
    
    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

	$('body').on('click', '#btnSaveColor', function(e) {
		e.preventDefault();
		var urlPath = JSON.parse(webURL);
		var error = false;
		var c_Color = $('#c_Color').val();

		if(c_Color.length == 0)
		{
			var error = true;
			$('#c_ColorError').show();
		}
		else
		{
			$('#c_ColorError').hide();
		}

		if(error == false)
		{
			$.post(urlPath + '?/maintenance/save/color', $('#saveColorForm').serialize(), function(data) {
				if(data.res > 0)
				{
					$('#modal_add_container_color').modal('hide');
                    swal({
                        title: "Success!",
                        text: data.message,
                        confirmButtonColor: "#EF5350",
                        type: "success"
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $(window.location).attr('href', urlPath + '?/maintenance/container');
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
			}, "JSON");
		}
	});

	/* load edit container color form */
    $('#modal_edit_container_color').on('show.bs.modal', function(e) {
        var urlPath = JSON.parse(webURL);
        var colorID = $(e.relatedTarget).data('cid');
        var remoteLink = urlPath + '?/maintenance/edit/color/'+ colorID;
        
        $('#modal_edit_container_color').find('.modal-body').load(remoteLink, function() {});
    });

    $('body').on('click', '#btnUpdateColor', function(e) {
		e.preventDefault();
		var urlPath = JSON.parse(webURL);
		var error = false;
		var c_Color = $('#editColor').val();

		if(c_Color.length == 0)
		{
			var error = true;
			$('#c_ColorError').show();
		}
		else
		{
			$('#c_ColorError').hide();
		}

		if(error == false)
		{
			$.post(urlPath + '?/maintenance/update/color', $('#editColorForm').serialize(), function(data) {
				if(data.res > 0)
				{
					$('#modal_edit_container_color').modal('hide');
                    swal({
                        title: "Success!",
                        text: data.message,
                        confirmButtonColor: "#EF5350",
                        type: "success"
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $(window.location).attr('href', urlPath + '?/maintenance/container');
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
			}, "JSON");
		}
	});

	$('body').on('keydown', '#c_Color, #editColor', function(){
		$('#c_ColorError').hide();
	});

	$('body').on('click', '#btnSaveType', function(e) {
		e.preventDefault();
		var urlPath = JSON.parse(webURL);
		var error = false;
		var c_Type = $('#c_Type').val();

		if(c_Type.length == 0)
		{
			var error = true;
			$('#c_TypeError').show();
		}
		else
		{
			$('#c_TypeError').hide();
		}

		console.log(error);

		if(error == false)
		{
			$.post(urlPath + '?/maintenance/save/type', $('#saveTypeForm').serialize(), function(data) {
				if(data.res > 0)
				{
					$('#modal_add_container_type').modal('hide');
                    swal({
                        title: "Success!",
                        text: data.message,
                        confirmButtonColor: "#EF5350",
                        type: "success"
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $(window.location).attr('href', urlPath + '?/maintenance/container');
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
			}, "JSON");
		}
	});

	/* load edit container color form */
    $('#modal_edit_container_type').on('show.bs.modal', function(e) {
        var urlPath = JSON.parse(webURL);
        var typeID  = $(e.relatedTarget).data('tid');
        var remoteLink = urlPath + '?/maintenance/edit/type/'+ typeID;
        
        $('#modal_edit_container_type').find('.modal-body').load(remoteLink, function() {});
    });

    $('body').on('click', '#btnUpdateType', function(e) {
		e.preventDefault();
		var urlPath = JSON.parse(webURL);
		var error = false;
		var editType = $('#editType').val();

		if(editType.length == 0)
		{
			var error = true;
			$('#c_ColorError').show();
		}
		else
		{
			$('#c_ColorError').hide();
		}

		if(error == false)
		{
			$.post(urlPath + '?/maintenance/update/type', $('#editTypeForm').serialize(), function(data) {
				if(data.res > 0)
				{
					$('#modal_edit_container_type').modal('hide');
                    swal({
                        title: "Success!",
                        text: data.message,
                        confirmButtonColor: "#EF5350",
                        type: "success"
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $(window.location).attr('href', urlPath + '?/maintenance/container');
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
			}, "JSON");
		}
	});


	$('body').on('keydown', '#c_Type, #editType', function(){
		$('#c_TypeError').hide();
	});


	$('body').on('click', '#btnSaveContainer', function(e) {
		e.preventDefault();
		var urlPath = JSON.parse(webURL);
		var error = false;
		var contName  = $('#contName').val();
		var conType   = $('#conType').val();
		var contColor = $('#contColor').val();

		if(contName.length == 0)
		{
			var error = true;
			$('#containerNameError').show();
		}
		else
		{
			$('#containerNameError').hide();
		}

		if(conType.length == 0)
		{
			var error = true;
			$('#conTypeError').show();
		}
		else
		{
			$('#conTypeError').hide();
		}

		if(contColor.length == 0)
		{
			var error = true;
			$('#contColorError').show();
		}
		else
		{
			$('#contColorError').hide();
		}

		if(error == false)
		{
			$.post(urlPath + '?/maintenance/save', $('#saveContainer').serialize(), function(data) {
				if(data.res > 0)
				{
					$('#modal_add_container').modal('hide');
                    swal({
                        title: "Success!",
                        text: data.message,
                        confirmButtonColor: "#EF5350",
                        type: "success"
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $(window.location).attr('href', urlPath + '?/maintenance/container');
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
			}, "JSON");
		}
	});

	/* load edit container color form */
    $('#modal_edit_container').on('show.bs.modal', function(e) {
        var urlPath = JSON.parse(webURL);
        var c_ID  = $(e.relatedTarget).data('cid');
        var remoteLink = urlPath + '?/maintenance/edit/'+ c_ID;
        
        $('#modal_edit_container').find('.modal-body').load(remoteLink, function() {

        	// Default initialization
		    $('.select').select2({
		        minimumResultsForSearch: Infinity
		    });

        });
    });

    $('body').on('click', '#btnUpdateContainer', function(e) {
		e.preventDefault();
		var urlPath = JSON.parse(webURL);
		var error = false;
		var contName  = $('#editContName').val();
		var conType   = $('#editConType').val();
		var contColor = $('#editContColor').val();

		if(contName.length == 0)
		{
			var error = true;
			$('#containerNameError').show();
		}
		else
		{
			$('#containerNameError').hide();
		}

		if(conType.length == 0)
		{
			var error = true;
			$('#conTypeError').show();
		}
		else
		{
			$('#conTypeError').hide();
		}

		if(contColor.length == 0)
		{
			var error = true;
			$('#contColorError').show();
		}
		else
		{
			$('#contColorError').hide();
		}

		if(error == false)
		{
			$.post(urlPath + '?/maintenance/update', $('#editContainer').serialize(), function(data) {
				if(data.res > 0)
				{
					$('#modal_edit_container').modal('hide');
                    swal({
                        title: "Success!",
                        text: data.message,
                        confirmButtonColor: "#EF5350",
                        type: "success"
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $(window.location).attr('href', urlPath + '?/maintenance/container');
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
			}, "JSON");
		}
	});



	$('body').on('keydown', '#contName, #editContName', function(){
		$('#containerNameError').hide();
	});

	$('body').on('change', '#conType, #editConType', function(){
		$('#conTypeError').hide();
	});

	$('body').on('keydown', '#contColor, #editContColor', function(){
		$('#contColorError').hide();
	});

	$('body').on('click', '#btnSaveOperator', function(e){
		e.preventDefault();
		var error = false;
		var urlPath = JSON.parse(webURL);
		var opsName = $('#opsName').val();

		if(opsName.length == 0)
		{
			var error = true;
			$('#opsNameError').show();
		}
		else
		{
			$('#opsNameError').hide();
		}

		if(error == false)
		{
			$.post(urlPath + '?/maintenance/save/operator', $('#saveOperatorForm').serialize(), function(data){
				if(data.res > 0)
				{
					$('#modal_add_operator').modal('hide');
                    swal({
                        title: "Success!",
                        text: data.message,
                        confirmButtonColor: "#EF5350",
                        type: "success"
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $(window.location).attr('href', urlPath + '?/maintenance/truck');
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

	/* load edit container color form */
    $('#modal_edit_operator').on('show.bs.modal', function(e) {
        var urlPath = JSON.parse(webURL);
        var ops_ID  = $(e.relatedTarget).data('tid');
        var remoteLink = urlPath + '?/maintenance/edit/operator/'+ ops_ID;
        
        $('#modal_edit_operator').find('.modal-body').load(remoteLink, function() {});
    });

    $('body').on('click', '#btnUpdateOperator', function(e){
		e.preventDefault();
		var error = false;
		var urlPath = JSON.parse(webURL);
		var opsName = $('#editOpsName').val();

		if(opsName.length == 0)
		{
			var error = true;
			$('#opsNameError').show();
		}
		else
		{
			$('#opsNameError').hide();
		}

		if(error == false)
		{
			$.post(urlPath + '?/maintenance/update/operator', $('#editOperatorForm').serialize(), function(data){
				if(data.res > 0)
				{
					$('#modal_edit_operator').modal('hide');
                    swal({
                        title: "Success!",
                        text: data.message,
                        confirmButtonColor: "#EF5350",
                        type: "success"
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $(window.location).attr('href', urlPath + '?/maintenance/truck');
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


	$('body').on('keydown', '#opsName, #editOpsName', function(){
		$('#opsNameError').hide();
	});


	$('body').on('click', '#btnSaveTruck', function(e){
		e.preventDefault();
		var urlPath = JSON.parse(webURL);
		var error = false;
		var plateNo   = $('#plateNo').val();
		var truckOps  = $('#truckOps').val();
		var dc_ID     = $('#dc_ID').val();

		if(plateNo.length == 0)
		{
			var error = true;
			$('#plateNoError').show();
		}
		else
		{
			$('#plateNoError').hide();
		}

		if(truckOps.length == 0)
		{
			var error = true;
			$('#truckOpsError').show();
		}
		else
		{
			$('#truckOpsError').hide();
		}

		if(dc_ID.length == 0)
		{
			var error = true;
			$('#dcError').show();
		}
		else
		{
			$('#dcError').hide();
		}

		if(error == false)
		{
			$.post(urlPath + '?/maintenance/save/truck', $('#saveTruck').serialize(), function(data) {
				if(data.res > 0)
				{
					$('#modal_add_truck').modal('hide');
                    swal({
                        title: "Success!",
                        text: data.message,
                        confirmButtonColor: "#EF5350",
                        type: "success"
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $(window.location).attr('href', urlPath + '?/maintenance/truck');
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
			}, "JSON");
		}
	});


	/* load edit container color form */
    $('#modal_edit_truck').on('show.bs.modal', function(e) {
        var urlPath = JSON.parse(webURL);
        var truck_ID  = $(e.relatedTarget).data('tid');
        var remoteLink = urlPath + '?/maintenance/edit/truck/'+ truck_ID;
        
        $('#modal_edit_truck').find('.modal-body').load(remoteLink, function() {
        	// Default initialization
		    $('.select').select2({
		        minimumResultsForSearch: Infinity
		    });
        });
    });


    $('body').on('click', '#btnUpdateTruck', function(e){
		e.preventDefault();
		var urlPath = JSON.parse(webURL);
		var error = false;
		var plateNo   = $('#editPlateNo').val();
		var truckOps  = $('#editTruckOps').val();
		var dc_ID     = $('#editDC_ID').val();

		if(plateNo.length == 0)
		{
			var error = true;
			$('#plateNoError').show();
		}
		else
		{
			$('#plateNoError').hide();
		}

		if(truckOps.length == 0)
		{
			var error = true;
			$('#truckOpsError').show();
		}
		else
		{
			$('#truckOpsError').hide();
		}

		if(dc_ID.length == 0)
		{
			var error = true;
			$('#dcError').show();
		}
		else
		{
			$('#dcError').hide();
		}

		if(error == false)
		{
			$.post(urlPath + '?/maintenance/update/truck', $('#editTruck').serialize(), function(data) {
				if(data.res > 0)
				{
					$('#modal_edit_truck').modal('hide');
                    swal({
                        title: "Success!",
                        text: data.message,
                        confirmButtonColor: "#EF5350",
                        type: "success"
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $(window.location).attr('href', urlPath + '?/maintenance/truck');
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
			}, "JSON");
		}
	});

	$('body').on('keydown', '#plateNo, #editPlateNo', function(){
		$('#plateNoError').hide();
	});

	$('body').on('change', '#truckOps, #editTruckOps', function(){
		$('#truckOpsError').hide();
	});

	$('body').on('keydown', '#dc_ID, #editDC_ID', function(){
		$('#dcError').hide();
	});


	$('body').on('click', '#btnSaveDriver', function(e){
		e.preventDefault();
		var urlPath = JSON.parse(webURL);
		var error = false;
		var licenseNo  = $('#licenseNo').val();
		var driverName = $('#driverName').val();
		var dc_ID      = $('#dc_ID').val();

		if(licenseNo.length == 0)
		{
			var error = true;
			$('#licenseNoError').show();
		}
		else
		{
			$('#licenseNoError').hide();
		}

		if(driverName.length == 0)
		{
			var error = true;
			$('#driverNameError').show();
		}
		else
		{
			$('#driverNameError').hide();
		}

		if(dc_ID.length == 0)
		{
			var error = true;
			$('#dcError').show();
		}
		else
		{
			$('#dcError').hide();
		}

		if(error == false)
		{
			$.post(urlPath + '?/maintenance/save/driver', $('#saveDriver').serialize(), function(data) {
				if(data.res > 0)
				{
					$('#modal_add_driver').modal('hide');
                    swal({
                        title: "Success!",
                        text: data.message,
                        confirmButtonColor: "#EF5350",
                        type: "success"
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $(window.location).attr('href', urlPath + '?/maintenance/drivers');
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
			}, "JSON");
		}
	});

	/* load edit container color form */
    $('#modal_edit_driver').on('show.bs.modal', function(e) {
        var urlPath = JSON.parse(webURL);
        var driver_ID  = $(e.relatedTarget).data('tid');
        var remoteLink = urlPath + '?/maintenance/edit/driver/'+ driver_ID;
        
        $('#modal_edit_driver').find('.modal-body').load(remoteLink, function() {
        	// Default initialization
		    $('.select').select2({
		        minimumResultsForSearch: Infinity
		    });
        });
    });

    $('body').on('click', '#btnUpdateDriver', function(e){
		e.preventDefault();
		var urlPath = JSON.parse(webURL);
		var error = false;
		var licenseNo  = $('#editLicenseNo').val();
		var driverName = $('#editDriverName').val();
		var dc_ID      = $('#editDC_ID').val();

		if(licenseNo.length == 0)
		{
			var error = true;
			$('#licenseNoError').show();
		}
		else
		{
			$('#licenseNoError').hide();
		}

		if(driverName.length == 0)
		{
			var error = true;
			$('#driverNameError').show();
		}
		else
		{
			$('#driverNameError').hide();
		}

		if(dc_ID.length == 0)
		{
			var error = true;
			$('#dcError').show();
		}
		else
		{
			$('#dcError').hide();
		}

		if(error == false)
		{
			$.post(urlPath + '?/maintenance/update/driver', $('#editDriver').serialize(), function(data) {
				if(data.res > 0)
				{
					$('#modal_edit_driver').modal('hide');
                    swal({
                        title: "Success!",
                        text: data.message,
                        confirmButtonColor: "#EF5350",
                        type: "success"
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $(window.location).attr('href', urlPath + '?/maintenance/drivers');
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
			}, "JSON");
		}
	});


	$('body').on('keydown', '#licenseNo, #editLicenseNo', function(){
		$('#licenseNoError').hide();
	});

	$('body').on('change', '#driverName, #editDriverName', function(){
		$('#driverNameError').hide();
	});

	$('body').on('keydown', '#dc_ID, #editDC_ID', function(){
		$('#dcError').hide();
	});

});

function doAction(status, id, from)
{
	var urlPath = JSON.parse(webURL);

    $.post(urlPath + '?/maintenance/container/'+status, { theID:id, f:from }, function(data) {
        if(data.res > 0)
        {
        	swal({
                title: "Success!",
                text: data.message,
                confirmButtonColor: "#EF5350",
                type: "success"
            },
            function(isConfirm){
                if (isConfirm) {
                    $(window.location).attr('href', urlPath + '?/maintenance/'+data.link);
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