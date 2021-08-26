										<form id="editDriver">
											<div class="form-group">
			                                    <label class="text-semibold">LICENSE NO. :</label>
			                                    <input type="text" name="editLicenseNo" id="editLicenseNo" class="form-control" value="<?= $info[0]->LicenseNo; ?>" />
			                                    <label class="error" id="licenseNoError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* License no. is required.</label>
			                                </div>
											<div class="form-group">
			                                    <label class="text-semibold">DRIVER NAME. :</label>
			                                    <input type="text" name="editDriverName" id="editDriverName" class="form-control" value="<?= $info[0]->DriverName; ?>" />
			                                    <label class="error" id="driverNameError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Driver name is required.</label>
			                                </div>
			                                <div class="form-group">
			                                    <label class="text-semibold">DATA CENTER :</label>
			                                    <select name="editDC_ID" id="editDC_ID" class="select">
			                                        <option value="">SELECT ONE</option>
			                                        <?php
			                                        foreach($dcOption as $d) : 
			                                        	$select = ($info[0]->DC_ID == $d->Location_ID) ? "selected='selected'" : "";
			                                        ?>
			                                        <option value="<?= $d->Location_ID; ?>" <?= $select; ?>><?= $d->Location; ?></option>
			                                        <?php endforeach; ?>
			                                    </select>
			                                    <label class="error" id="dcError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Data center is required.</label>
			                                    <input type="hidden" name="driver_ID" id="driver_ID" value="<?= $info[0]->Driver_ID; ?>" />
			                                </div>
										</form>