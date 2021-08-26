										<form id="editContainer">
											<div class="form-group">
			                                    <label class="text-semibold">CONTAINER NAME :</label>
			                                    <input type="text" name="editContName" id="editContName" value="<?= $info[0]->Container; ?>" class="form-control" />
			                                    <label class="error" id="containerNameError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Container name is required.</label>
			                                </div>
			                                <div class="form-group">
			                                    <label class="text-semibold">CONTAINER TYPE :</label>
			                                    <select name="editConType" id="editConType" class="select">
			                                        <option value="">SELECT ONE</option>
			                                        <?php 
			                                        foreach($typeOption as $t) : 
			                                        	$select = ($info[0]->ContainerType_ID == $t->ContainerType_ID) ? "selected='selected'" : ""; 
			                                        ?>
			                                        <option value="<?= $t->ContainerType_ID; ?>" <?= $select; ?>><?= $t->ContainerType; ?></option>
			                                        <?php endforeach; ?>
			                                    </select>
			                                    <label class="error" id="conTypeError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Container type is required.</label>
			                                </div>
			                                <div class="form-group">
			                                    <label class="text-semibold">CONTAINER COLOR :</label>
			                                    <select name="editContColor" id="editContColor" class="select">
			                                        <option value="">SELECT ONE</option>
			                                        <?php 
			                                        foreach($colorOption as $c) : 
			                                        	$selected = ($info[0]->ContainerColor_ID == $c->ContainerColor_ID) ? "selected='selected'" : "";
			                                        ?>
			                                        <option value="<?= $c->ContainerColor_ID; ?>" <?= $selected; ?>><?= $c->ContainerColor; ?></option>
			                                        <?php endforeach; ?>
			                                    </select>
			                                    <label class="error" id="contColorError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Container color is required.</label>
			                                </div>
			                                <input type="hidden" name="c_ID" id="c_ID" value="<?= $info[0]->Container_ID; ?>" />
										</form>