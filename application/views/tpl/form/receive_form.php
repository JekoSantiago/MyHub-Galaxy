<style type="text/css">
.rcv {  transform: scale(0.75) !important;}
       
</style>
					
					<div class="col-lg-4">
					    <!-- Basic layout-->
                        <form action="#">
							<div class="panel panel-flat bg-teal-600">
								<div class="panel-body">
									<fieldset>
                                        <legend class="text-semibold" style="color: #FFF; letter-spacing: 0.1em;"><i class="icon-truck position-left"></i> Delivery details</legend>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="text-semibold">SHIP TO:</label>
													<select style="color: #FFF;" class="select" name="shipTo" id="shipTo" data-placeholder="Select store/branch..." disabled>
														<option></option>
                                                        <?php
														foreach($location as $row) :
															$select = ($info->Location_ID == $row->Location_ID) ? "selected='selected'" : "";
                                                        ?>
                                                        <option value="<?= $row->Location_ID; ?>" <?= $select; ?>><?= $row->LocationCode.' - '. $row->Location; ?></option>
                                                        <?php
                                                        endforeach;
                                                        ?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="text-semibold">SHIP FROM:</label>
													<select style="color: #FFF;" class="select" name="returnTo" id="returnTo" data-placeholder="Select warehouse..." disabled>
														<option value="">SELECT ONE</option>
                                                        <?php 
                                                        foreach($dcOption as $i) : 
                                                            $default = ($i->Location_ID == $info->DC_ID) ? 'selected="selected"' : ''; ?>
                                                        ?>
                                                        <option value="<?= $i->Location_ID; ?>" <?= $default; ?>><?= $i->Location; ?></option>
                                                        <?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="text-semibold">LOADING STATUS :</label>
                                                    <select style="color: #FFF;" class="select" name="loadStatus" disabled>
                                                        <option value="">SELECT ONE</option>
                                                        <option value="load">LOAD</option>
                                                        <option value="unload" selected="selected">UNLOAD</option>
													</select>
												</div>
											</div>
										</div>

										<!-- <div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label class="text-semibold">TRUCK NUMBER:</label>
													<select style="color: #FFF;" class="select" name="truckNo" id="truckNo" data-placeholder="Select truck..." disabled>
														<option></option>
                                                        <?php
														foreach($trucks as $r) :
															$selected = ($info->TruckID == $r->Truck_ID) ? "selected='selected'" : "";
                                                        ?>
                                                        <option value="<?= $r->Truck_ID; ?>" <?= $selected; ?>><?= $r->TruckNo; ?></option>
                                                        <?php
                                                        endforeach;
                                                        ?>
													</select>
												</div>
											</div>
											<div class="col-md-7">
												<div class="form-group">
													<label class="text-semibold">DRIVER NAME:</label>
													<select style="color: #FFF;" class="select-search" name="driverName" id="driverName" data-placeholder="Select truck driver..." disabled>
                                                        <option></option>
                                                        <?php
														foreach($drivers as $d) :
															$default = ($d->Driver_ID == $info->DriverID) ? "selected='selected'" : "";
                                                        ?>
                                                        <option value="<?= $d->Driver_ID; ?>" <?= $default; ?>><?= $d->DriverName .'-'. $d->LicenseNo; ?></option>
                                                        <?php
                                                        endforeach;
                                                        ?>
                                                    </select>
												</div>
											</div>
										</div> -->

										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
                                                    <label class="text-semibold">NO. OF CONTAINER :</label>
                                                    <input style="color: #FFF;" type="text" class="form-control" value="<?= $info->TotalContainer; ?>" name="totalNumContainer" id="totalNumContainer" disabled>
												</div>
											</div>
											<div class="col-md-7">
												<div class="form-group">
													<label class="text-semibold">DELIVERY NOTE :</label>
													<input style="color: #FFF;" type="text" class="form-control" value="<?= $info->ControlNo; ?>" name="controlNum" id="controlNum" disabled>
												</div>
											</div>
										</div>
										<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-semibold">REMARKS. :</label>
                                                    <textarea name="remarks" id="remarks" style="color: #FFF;" class="form-control" disabled><?= $info->Remarks; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

									</fieldset>
                                    <br/>
                                    <fieldset>
									<?php
									$disable = ($info->ReceivedDate == null) ? "" : "disabled='disabled'";
									?>
										<legend class="text-semibold" style="color: #FFF; letter-spacing: 0.1em;"><i class="icon-search4 position-left"></i> SCAN BARCODE HERE</legend>
                                    	<p>Kindly focus the mouse pointer on the textbox below to scan the barcode number. It will automatically check the code scanned if it exist or not.</p>
                                    	<div class="row">
                                            <div class="col-lg-12">
												<div class="form-group">
													<input type="hidden" id="shipVal" value="0">
													<input type="hidden" id="recVal" value="1">
													<input type="hidden" id="dc_ID" value="<?= $info->DC_ID; ?>" >
													<input type="hidden" id="deliverDetails_ID" value="<?= $ids; ?>">
													<input type="hidden" id="delivery_ID" name="delivery_ID" value="<?= base64_encode($info->Deliver_ID); ?>">
													<input type="text" style="color: #FFF;" class="form-control" name="checkStoreBarcodeNum" id="checkStoreBarcodeNum" placeholder="Barcode here..." <?= $disable; ?>>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</form>
						<!-- /basic layout -->
                    </div>
                    <div class="col-lg-8">
						<!-- Basic table -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Container Lists</h5>
								<?php
								// $disableBtnReceive = ($item['scanCount'] != $info->TotalContainer) ? "disabled='disabled'" : "";
								$disableBtnReceive = ($item['countUL'] == 0 || $item['countOL'] > 0 ) ? "disabled='disabled'" : "";
								$disableBtnClear   = ($item['scanCount'] == 0) ? "disabled='disabled'" : "";
								?>
								<div class="heading-elements">
									<div class="text-right">
										<!-- <button type="button" <?= $disableBtnClear; ?> id="btnClear" class="btn bg-danger-600 btn-raised btn-xs">Clear <i class="icon-x position-right"></i></button> -->
										<button type="button" <?= $disableBtnReceive; ?> id="btnReceived" class="btn bg-success-600 btn-raised btn-xs">Received <i class="icon-check position-right"></i></button>
									</div>
								</div>
							</div>
							<div class="panel-body" style="border-bottom: 0px;">
								<div class="progress">
									<div class="progress-bar bg-teal" style="width: <?= $item['bar']; ?>%">
										<span id="scanCount"><?= $item['ctext']; ?> Scanned</span>
									</div>
								</div>
							</div>
							<div class="table-responsive">
								<form id="storeView">
									<table class="table" id="storeViewTbl">
										<thead>
											<tr>
												<th width="1%">Action</th>
												<th>Barcode</th>
												<th>Type</th>
												<th>Color</th>
												<th>Total Quantity</th>
												<th>Load Quantity</th>
												<th>Receive Quantity</th>
												<th>Offload Quantity</th>
												<th>Receive</th>
												<th>Unload Date</th>
												<th>Status</th>
											</tr>
										</thead>
									</table>
								</form>
							</div>
						</div>
						<!-- /basic table -->


						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Remarks</h5>
							</div>
							<div class="table-responsive">
									<table class="table" id="storeRemarks">
										<thead>
											<tr>
												<th>Barcode</th>
												<th>Remarks</th>
											</tr>
										</thead>
									</table>
							</div>
						</div>

					</div>

					
					<!-- Modal quantity form-->
					<div id="modal_update_quantity" class="modal" data-backdrop="static" data-keyboard="false">
						<div class="modal-dialog modal-xs">
							<div class="modal-content">
								<div class="modal-header bg-teal-600">
									<h5 class="modal-title">Quantity Form</h5>
								</div>
								<form id="formQuantity">
									<div class="modal-body">
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- /end modal -->

					<!-- Modal remarks-->
					<div id="modal_update_remarks" class="modal" data-backdrop="static" data-keyboard="false">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header bg-teal-600">
									<h5 class="modal-title">Remarks</h5>
								</div>
								<div class="modal-body">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Close</button>
									<button type="button" id="update_rmk" name="update_rmk" class="btn btn-primary legitRipple">Save changes</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /end modal -->
					<audio id="success-scan">
   						<source src="<?= base_url(); ?>assets/audio/Success-sound-effect.mp3">
					</audio>
					<audio id="error-scan">
   						<source src="<?= base_url(); ?>assets/audio/Error-sound-effect.mp3">
					</audio>
					<audio id="invalid-scan">
   						<source src="<?= base_url(); ?>assets/audio/Invalid-sound-effect.mp3">
					</audio>
					
					<script type="text/javascript">var d_ID = '<?= base64_encode($info->Deliver_ID) ;?>';</script>
					<script type="text/javascript" src="<?= base_url(); ?>assets/js/receive.js"></script>