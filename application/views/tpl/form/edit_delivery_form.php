					<div class="col-lg-4">
					    <!-- Basic layout-->
                        <form id="updateForm">
							<div class="panel panel-flat bg-teal-600">
								<div class="panel-body">
									<fieldset>
                                        <legend class="text-semibold" style="color: #FFF; letter-spacing: 0.1em;"><i class="icon-truck position-left"></i> Delivery details</legend>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="text-semibold">SHIP TO:</label>
													<select class="select" style="color: #FFF;" name="shipTo" id="shipTo" data-placeholder="Select store/branch..." disabled>
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
													<select class="select" name="returnTo" id="returnTo" disabled>
                                                        <option value="">SELECT ONE</option>
                                                        <?php 
                                                        foreach($dcOption as $i) : 
                                                            $default = ($i->Location_ID == $info->DC_ID ) ? 'selected="selected"' : ''; ?>
                                                        ?>
                                                        <option value="<?= $i->Location_ID; ?>" <?= $default; ?>><?= $i->Location; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="text-semibold">LOADING STATUS :</label>
                                                    <select class="select" style="color: #FFF;" name="loadStatus" disabled>
                                                        <option value="">SELECT ONE</option>
                                                        <option value="load" selected="selected">LOAD</option>
                                                        <option value="unload">UNLOAD</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
                                                    <label class="text-semibold">NO. OF CONTAINER :</label>
													<input type="text" onkeypress="return isNumberKey(event)" style="color: #FFF;" class="form-control" value="<?= $info->TotalContainer; ?>" name="totalNumContainer" id="totalNumContainer">
													<input type="hidden" id="curTotalContainer" value="<?= $info->TotalContainer; ?>" />
												</div>
											</div>
											<div class="col-md-7">
												<div class="form-group">
													<label class="text-semibold">DELIVERY NOTE :</label>
													<input type="text" style="color: #FFF;" class="form-control" value="<?= $info->ControlNo; ?>" name="controlNum" id="controlNum">
												</div>
											</div>
										</div>
										<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-semibold">REMARKS. :</label>
                                                    <textarea name="remarks" id="remarks" style="color: #FFF;" class="form-control"><?= $info->Remarks; ?></textarea>
                                                    <label class="error" id="remarksError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Remarks is required.</label>
                                                </div>
                                            </div>
										</div>
										<div class="row" style="margin-top: 10px" id="updateBtn">
                                            <div class="col-md-12">
                                                <div class="text-right">
                                                    <button type="button" id="btnUpdateRemarks" class="btn btn-default btn-raised">UPDATE <i class="icon-arrow-right14 position-right"></i></button>
                                                </div>
                                            </div>
										</div>
									</fieldset>
                                    <br/>
                                    <fieldset>
                                        <legend class="text-semibold" style="color: #FFF; letter-spacing: 0.1em;"><i class="icon-search4 position-left"></i> SCAN BARCODE HERE</legend>
                                        <p class="col-lg-12" style="padding: 0px;">Kindly focus the mouse pointer on the textbox below to scan the barcode number. It will automatically check the code scanned if it exist or not.</p>
                                        <div class="row">
                                            <div class="col-lg-12">
												<div class="form-group">
													<input type="hidden" id="createdDeliveryID" name="createdDeliveryID" value="<?= base64_encode($info->Deliver_ID); ?>">
													<input type="hidden" id="countScanContainer" value="<?= $info->LoadCount; ?>" />
													<input type="hidden" id="warehouseID" value="<?= $info->DC_ID; ?>" >
                                                    <input type="text" style="color: #FFF;" onkeyup="this.value = this.value.toUpperCase();" class="form-control" name="scanBarcodeNum" id="scanBarcodeNum" placeholder="Barcode here...">
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
							</div>
							<div class="panel-body" style="border-bottom: 0px;">
								<div class="progress">
									<div class="progress-bar bg-teal" style="width: 0%">
										<span id="scanCount">0/0 Scanned</span>
									</div>
								</div>
							</div>
							<div class="table-responsive">
								<table class="table" id="delivery_items_tbl">
									<thead>
										<tr>
											<th>Barcode</th>
											<th>Container Type</th>
											<th>Container Color</th>
											<th>Load Quantity</th>
											<th>Received Quantity</th>
											<th>Load Date</th>
											<th>Unload Date</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
						<!-- /basic table -->
					</div>
					<!-- Modal container type form-->
					<div id="modal_container" class="modal" data-backdrop="static" data-keyboard="false">
						<div class="modal-dialog modal-xs">
							<div class="modal-content">
								<div class="modal-header bg-teal-600">
									<h5 class="modal-title">Container Type Form</h5>
								</div>
								<form id="formContainerType">
									<div class="modal-body">
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- /end modal -->

					<!-- Modal quantity form-->
					<div id="modal_quantity" class="modal" data-backdrop="static" data-keyboard="false">
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
					<script type="text/javascript" src="<?= base_url(); ?>assets/js/delivery_update.js"></script>