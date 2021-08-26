										<form id="editTypeForm">
											<div class="form-group">
			                                    <label class="text-semibold">CONTAINER TYPE :</label>
			                                    <input type="text" name="editType" id="editType" class="form-control" value="<?= $info[0]->ContainerType; ?>" />
			                                    <label class="error" id="c_ColorError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Container color is required.</label>
			                                    <input type="hidden" name="typeID" id="typeID" value="<?= $info[0]->ContainerType_ID; ?>" />
			                                </div>
										</form>