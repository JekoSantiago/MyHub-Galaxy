				<script type="text/javascript">var events = [ <?= $calendarData; ?> ];</script>
				<script type="text/javascript" src="<?= base_url(); ?>assets/js/calendar.js"></script>
				<!-- Basic view -->
                <div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Delivery Schedule</h5>
						<div class="heading-elements">
							<?= anchor('schedule/manage', '<i class="icon-calendar52 position-left"></i> MANAGE SCHEDULE', array('class'=>'btn bg-success-600 btn-raised btn-xs')); ?>
						</div>
					</div>
					
					<div class="panel-body">
						<div class="fullcalendar-basic"></div>
					</div>
				</div>
				<!-- /basic view -->

				<!-- Modal delivery details -->
                <div id="modal_calendar_details" class="modal" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content"></div>
                    </div>
                </div>
                <!-- /modal delivery details -->