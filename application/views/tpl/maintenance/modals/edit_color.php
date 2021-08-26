										<form id="editColorForm">
											<div class="form-group">
			                                    <label class="text-semibold">CONTAINER COLOR :</label>
			                                    <input type="text" name="editColor" id="editColor" class="form-control" value="<?= $info[0]->ContainerColor; ?>" />
			                                    <label class="error" id="c_ColorError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Container color is required.</label>
			                                    <input type="hidden" name="colorID" id="colorID" value="<?= $info[0]->ContainerColor_ID; ?>" />
			                                </div>
										</form>