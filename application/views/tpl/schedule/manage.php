                    <div class="col-md-12">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Schedule List</h5>
								<div class="heading-elements">
									<button data-toggle='modal' data-target='#modal_add_schedule' class="btn btn-raised btn-xs bg-success-800">
										<i class="icon-new position-left"></i> ADD NEW
									</button>
								</div>
                            </div>

                            <table class="table sched_datatable-basic">
                                <thead>
                                    <tr>
                                        <th>Schedule Date</th>
                                        <th>DC Name</th>
                                        <th>Location Code</th>
                                        <th>Location</th>
                                        <th>Delivery Type</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                foreach($schedules as $s) :
                                ?>
                                    <tr>
                                        <td><?= $this->mylibrary->formatDate($s->ScheduleDate); ?></td>
                                        <td><?= $s->DCName; ?></td>
                                        <td><?= $s->LocationCode; ?></td>
                                        <td><?= $s->Location; ?></td>
                                        <td><?= $s->DeliveryType; ?></td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li>
                                                    <a data-popup='tooltip' title='Update' data-placement='right' data-toggle='modal' data-sid="<?= base64_encode($s->Schedule_ID); ?>" data-target='#modal_edit_schedule'><i class="icon-pencil"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>    
                                </tbody>
                            </table>
                        </div>
					</div>
				</div>
                <!-- /vertical form options -->

                <!-- Modal quantity form-->
                <div id="modal_add_schedule" class="modal" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog modal-sm">
					    <div class="modal-content">
						    <div class="modal-header bg-teal-600">
                                <h5 class="modal-title">Schedule Form</h5>
                            </div>
							<form id="formAddSchedule">
							    <div class="modal-body">
                                    <div class="form-group">
                                        <label class="text-semibold">SCHEDULE DATE :</label>
                                        <input class="form-control" name="scheduleDate" id="scheduleDate">
                                        <label class="error" id="scheduleDateError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Schedule Date is required.</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">DC NAME :</label>
                                        <input type="hidden" name="dc_ID" value="<?= $dcID; ?>">
                                        <select class="select" name="dc_ID" id="dc_ID" disabled>
                                            <option value="">SELECT ONE</option>
                                            <?php 
                                            foreach($dcOption as $i) : 
                                                $default = ($i->Location_ID == $dcID) ? 'selected="selected"' : ''; ?>
                                            ?>
                                            <option value="<?= $i->Location_ID; ?>" <?= $default; ?>><?= $i->Location; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">LOCATION :</label>
                                        <select class="select-search" name="location_ID" id="location_ID">
                                            <option value="">SELECT ONE</option>
                                            <?php foreach($location as $x) : ?>
                                            <option value="<?= $x->Location_ID; ?>"><?= $x->LocationCode .'-'. $x->Location; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <label class="error" id="locationError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Location is required.</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">DELIVERY TYPE :</label>
                                        <select class="select" name="deliveryType" id="deliveryType">
                                            <option value="">SELECT ONE</option>
                                            <?php foreach($deliveryType as $d) : ?>
                                            <option value="<?= $d->DeliveryType_ID; ?>"><?= $d->DeliveryType; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <label class="error" id="deliveryTypeError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Delivery type is required.</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
			                        <button type="button" class="btn bg-default btn-raised btn-xs" data-dismiss="modal">Cancel</button>
									<button type="button" id="btnSaveSchedule" class="btn bg-danger-600 btn-raised btn-xs">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /end modal -->                
                
                <!-- Modal quantity form-->
                <div id="modal_edit_schedule" class="modal" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog modal-sm">
					    <div class="modal-content">
						    <div class="modal-header bg-teal-600">
                                <h5 class="modal-title">Edit Schedule Form</h5>
                            </div>
							<div class="modal-body">
                            </div>
                            <div class="modal-footer">
			                    <button type="button" class="btn bg-default btn-raised btn-xs" data-dismiss="modal">Cancel</button>
								<button type="button" id="btnUpdateSchedule" class="btn bg-danger-600 btn-raised btn-xs">Update</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /end modal -->    

                <script type="text/javascript" src="<?= base_url(); ?>assets/js/schedule.js"></script>
                              