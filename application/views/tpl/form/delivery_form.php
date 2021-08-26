                    <div class="col-lg-4">
                    	<!-- Basic layout-->
                    	<form class="form-validate-jquery" id="formCreateDelivery">
                    		<div class="panel panel-flat bg-teal-600">
                    			<div class="panel-body" style="padding: 20px 15px;">
                    				<fieldset>
                    					<legend class="text-semibold" style="color: #FFF; letter-spacing: 0.1em;"><i class="icon-truck position-left"></i> Delivery Details</legend>
                    					<div class="row">
                    						<div class="col-md-12">
                    							<div class="form-group">
                    								<label class="text-semibold">SHIP TO :</label>
                    								<select class="select-search" name="shipTo" id="shipTo" data-placeholder="Select store/branch..." required="required">
                    									<option></option>
                    									<?php foreach ($locationOption as $row) : ?>
                    										<option value="<?= $row->LocationCode; ?>"><?= $row->LocationCode . ' - ' . $row->Location; ?></option>
                    									<?php endforeach; ?>
                    								</select>
                    								<label class="error" id="shipToError" style="color: red; font-size: 11px; font-style: italic; display: none;">* Ship to is required.</label>
                    							</div>
                    						</div>
                    					</div>
                    					<div class="row">
                    						<div class="col-md-6">
                    							<div class="form-group">
                    								<label class="text-semibold">SHIP FROM :</label>
                    								<select class="select" name="returnTo" id="returnTo" disabled>
                    									<option value="">SELECT ONE</option>
                    									<?php
														foreach ($dcOption as $i) :
															$default = ($i->Location_ID == $dcID) ? 'selected="selected"' : ''; ?>
                    										?>
                    										<option value="<?= $i->Location_ID; ?>" <?= $default; ?>><?= $i->Location; ?></option>
                    									<?php endforeach; ?>
                    								</select>
                    							</div>
                    						</div>

                    						<div class="col-md-6">
                    							<div class="form-group">
                    								<label class="text-semibold">LOADING STATUS :</label>
                    								<select class="select" name="loadStatus" disabled>
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
                    								<input type="text" style="color: #FFF;" class="form-control" name="totalNumContainer" id="totalNumContainer">
                    								<label class="error" id="numContainerError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* No. of container is required.</label>
                    							</div>
                    						</div>

                    						<div class="col-md-7">
                    							<div class="form-group">
                    								<label class="text-semibold">DELIVERY NOTE :</label>
                    								<input type="text" style="color: #FFF;" class="form-control" name="controlNum" id="controlNum">
                    								<label class="error" id="controlNumError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Delivery note is required.</label>
                    							</div>
                    						</div>
                    					</div>
                    					<div class="row">
                    						<div class="col-md-12">
                    							<div class="form-group">
                    								<label class="text-semibold">REMARKS. :</label>
                    								<textarea name="remarks" id="remarks" style="color: #FFF;" class="form-control"></textarea>
                    								<label class="error" id="remarksError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Remarks is required.</label>
                    							</div>
                    						</div>
                    					</div>
                    					<div class="row" style="margin-top: 10px">
                    						<div class="col-md-12">
                    							<div class="text-right">
                    								<button type="button" id="btnCreate" class="btn btn-default btn-raised">Create <i class="icon-arrow-right14 position-right"></i></button>
                    							</div>
                    						</div>
                    					</div>
                    				</fieldset>
                    				<br />
                    				<fieldset>
                    					<legend class="text-semibold" style="color: #FFF; letter-spacing: 0.1em;"><i class="icon-search4 position-left"></i> SCAN BARCODE HERE</legend>
                    					<p class="col-lg-12" style="padding: 0px;">Kindly focus the mouse pointer on the textbox below to scan the barcode number. It will automatically check the code scanned if it exist or not.</p>
                    					<div class="row">
                    						<div class="col-lg-12">
                    							<div class="form-group">
                    								<input type="hidden" id="createdDeliveryID" name="createdDeliveryID" value="0">
                    								<input type="hidden" id="countScanContainer" value="0" />
                    								<input type="hidden" id="warehouseID" value="<?= $dcID; ?>">
                    								<input type="hidden" name="location_ID" id="location_ID" value="">
                    								<input type="text" style="color: #FFF;" onkeyup="this.value = this.value.toUpperCase();" class="form-control" name="scanBarcodeNum" id="scanBarcodeNum" placeholder="Barcode here..." disabled>
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
                    						<th>Receive Quantity</th>
                    						<th>Load Date</th>
                    						<th>UnLoad Date</th>
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
                    <script type="text/javascript" src="<?= base_url(); ?>assets/js/delivery.js"></script>