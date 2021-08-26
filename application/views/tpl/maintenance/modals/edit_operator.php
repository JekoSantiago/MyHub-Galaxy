										<form id="editOperatorForm">
											<div class="form-group">
			                                    <label class="text-semibold">OPERATOR NAME :</label>
			                                    <input type="text" name="editOpsName" id="editOpsName" class="form-control" value="<?= $info[0]->OperatorName; ?>" />
			                                    <label class="error" id="opsNameError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Operator is required.</label>
			                                    <input type="hidden" name="ops_ID" id="ops_ID" value="<?= $info[0]->Operator_ID; ?>" />
			                                </div>
										</form>