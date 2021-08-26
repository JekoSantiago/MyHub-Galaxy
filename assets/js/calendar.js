/* ------------------------------------------------------------------------------
*
*  # calendar.js
*
*  Specific JS code additions for schedule page
*
*  Version: 1.0
*  Latest update: Nov 21, 2019
*
* ---------------------------------------------------------------------------- */

$(function() {




    // Initialization
    // ------------------------------

    // Basic view
    $('.fullcalendar-basic').fullCalendar({
        header: {
            left: 'prev,next',
            center: 'title',
            right: '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        },
        editable: false,
        events: events,
        dayClick: function(date, jsEvent, view) {
            $('#modal_calendar_details').modal('toggle');
            var urlPath = JSON.parse(webURL);
            var remoteLink = urlPath + '?/schedule/view/' + date.format(); 
            $('#modal_calendar_details').find('.modal-content').load(remoteLink, function() {
                $('.select').select2({
                    minimumResultsForSearch: Infinity
                });
            }); 
        }
    });


    

});

function updateDeliveryType(sID)
{
    var urlPath = JSON.parse(webURL);
    var dt_ID   = $('#dt_ID_'+sID).val();
    var sched_Date = $('#sched_Date').val();

    $.post(urlPath + '?/schedule/modify', { schedID:sID, id:dt_ID }, function(data) {
        if(data.num > 0)
        {
            $('#modal_calendar_details').modal('hide');
            swal({
                title: "Success!",
                text: data.message,
                confirmButtonColor: "#EF5350",
                type: "success"
            },
            function(isConfirm){
                if (isConfirm) {
                    $('#modal_calendar_details').modal('toggle');
                    var remoteLink = urlPath + '?/schedule/view/' + sched_Date; 
                    $('#modal_calendar_details').find('.modal-content').load(remoteLink, function() {
                        $('.select').select2({
                            minimumResultsForSearch: Infinity
                        });
                    }); 
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
