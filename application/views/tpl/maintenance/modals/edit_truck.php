										<form id="editTruck">
											<div class="form-group">
			                                    <label class="text-semibold">TRUCK PLATE NO. :</label>
			                                    <input type="text" name="editPlateNo" id="editPlateNo" class="form-control" value="<?= $info[0]->TruckNo; ?>" />
			                                    <label class="error" id="plateNoError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Plate no. is required.</label>
			                                </div>
			                                <div class="form-group">
			                                    <label class="text-semibold">OPERATOR :</label>
			                                    <select name="editTruckOps" id="editTruckOps" class="select">
			                                        <option value="">SELECT ONE</option>
			                                        <?php 
			                                        foreach($operatorOption as $i) : 
			                                        	$selected = ($info[0]->Operator_ID == $i->Operator_ID) ? "selected='selected'" : "";
			                                        ?>
			                                        <option value="<?= $i->Operator_ID; ?>" <?= $selected; ?>><?= $i->OperatorName; ?></option>
			                                        <?php endforeach; ?>
			                                    </select>
			                                    <label class="error" id="truckOpsError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Operator is required.</label>
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
			                                    <input type="hidden" name="truck_ID" id="truck_ID" value="<?= $info[0]->Truck_ID; ?>" />
			                                </div>
										</form>