					<div class="col-lg-8">
						<!-- Basic datatable -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title col-md-8">Truck</h5>
								<div class="col-md-4 text-right">
									<button data-toggle='modal' data-target='#modal_add_truck' class="btn btn-raised btn-xs bg-success-800">
										<i class="icon-new position-left"></i> ADD NEW
									</button>
								</div>
							</div>
							<div class="panel-body">
								<table class="table datatable-basic">
									<thead>
										<tr>
											<th>Operator</th>
											<th>Truck Plate No.</th>
											<th>Data Center</th>
											<th class="text-center">Status</th>
											<th class="text-center">&nbsp;</th>
										</tr>
									</thead>
									<tbody>
									<?php
									foreach($trucks as $t) :
										if($t->isActive == 1)
                                        {
                                            $icon = '<i class="icon-x"></i>';
                                            $tooltip = "Deactivate";
                                            $truckStat = '<span class="label bg-success-800">ACTIVE</span>';
                                        }
                                        else {
                                            $icon = '<i class="icon-checkmark"></i>';
                                            $tooltip = "Activate";
                                        	$truckStat = '<span class="label bg-danger-800">INACTIVE</span>';
                                        }
									?>
										<tr>
											<td><?= $t->OperatorName; ?></td>
											<td><?= $t->TruckNo; ?></td>
											<td><?= $t->Location; ?></td>
											<td class="text-center"><?= $truckStat; ?></td>
											<td class="text-center">
												<ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li>
                                                                <a data-tid='<?= $t->Truck_ID;?>' data-toggle='modal' data-target='#modal_edit_truck'>
                                                                    <i class="icon-pencil"></i> Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript: doAction('<?= strtolower($tooltip); ?>', <?= $t->Truck_ID; ?>, 'truck');">
                                                                    <?= $icon; ?> <?= $tooltip; ?>
                                                                </a>
                                                            </li>
                                                        </ul>
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
						<!-- /basic datatable -->	
						<!-- Modals -->
						<div id="modal_add_truck" class="modal fade" data-backdrop="static" data-keyboard="false">
						    <div class="modal-dialog modal-sm">
							    <div class="modal-content">
								    <div class="modal-header bg-danger-600">
									    <button type="button" class="close" data-dismiss="modal">&times;</button>
										<h5 class="modal-title">Add Form</h5>
									</div>

									<div class="modal-body">
										<form id="saveTruck">
											<div class="form-group">
			                                    <label class="text-semibold">TRUCK PLATE NO. :</label>
			                                    <input type="text" name="plateNo" id="plateNo" class="form-control" />
			                                    <label class="error" id="plateNoError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Plate no. is required.</label>
			                                </div>
			                                <div class="form-group">
			                                    <label class="text-semibold">OPERATOR :</label>
			                                    <select name="truckOps" id="truckOps" class="select">
			                                        <option value="">SELECT ONE</option>
			                                        <?php foreach($operatorOption as $i) : ?>
			                                        <option value="<?= $i->Operator_ID; ?>"><?= $i->OperatorName; ?></option>
			                                        <?php endforeach; ?>
			                                    </select>
			                                    <label class="error" id="truckOpsError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Operator is required.</label>
			                                </div>
			                                <div class="form-group">
			                                    <label class="text-semibold">DATA CENTER :</label>
			                                    <select name="dc_ID" id="dc_ID" class="select">
			                                        <option value="">SELECT ONE</option>
			                                        <?php foreach($dcOption as $d) : ?>
			                                        <option value="<?= $d->Location_ID; ?>"><?= $d->Location; ?></option>
			                                        <?php endforeach; ?>
			                                    </select>
			                                    <label class="error" id="dcError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Data center is required.</label>
			                                </div>
										</form>
									</div>

									<div class="modal-footer">
			                            <button type="button" class="btn bg-default btn-raised btn-xs" data-dismiss="modal">Cancel</button>
										<button type="button" id="btnSaveTruck" class="btn bg-danger-600 btn-raised btn-xs">Save</button>
									</div>
								</div>
							</div>
						</div>

						<div id="modal_edit_truck" class="modal fade" data-backdrop="static" data-keyboard="false">
						    <div class="modal-dialog modal-sm">
							    <div class="modal-content">
								    <div class="modal-header bg-danger-600">
									    <button type="button" class="close" data-dismiss="modal">&times;</button>
										<h5 class="modal-title">Edit Form</h5>
									</div>

									<div class="modal-body"></div>

									<div class="modal-footer">
			                            <button type="button" class="btn bg-default btn-raised btn-xs" data-dismiss="modal">Cancel</button>
										<button type="button" id="btnUpdateTruck" class="btn bg-danger-600 btn-raised btn-xs">Update</button>
									</div>
								</div>
							</div>
						</div>
						<!-- /Modals -->
					</div>

					<div class="col-lg-4">
						<!-- Basic datatable -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title col-md-8">Operator</h5>
								<div class="col-md-4 text-right">
									<button data-toggle='modal' data-target='#modal_add_operator' class="btn btn-raised btn-xs bg-success-800">
										<i class="icon-new position-left"></i> ADD NEW
									</button>
								</div>
							</div>
							<div class="panel-body">
								<table class="table datatable-basic">
									<thead>
										<tr>
											<th>Operator</th>
											<th class="text-center">Status</th>
											<th class="text-center">&nbsp;</th>
										</tr>
									</thead>
									<tbody>
									<?php
									foreach($truckOps as $t) :
										if($t->isActive == 1)
                                        {
                                            $icon = '<i class="icon-x"></i>';
                                            $tooltip = "Deactivate";
                                            $typeStat = '<span class="label bg-success-800">ACTIVE</span>';
                                        }
                                        else {
                                            $icon = '<i class="icon-checkmark"></i>';
                                            $tooltip = "Activate";
                                        	$typeStat = '<span class="label bg-danger-800">INACTIVE</span>';
                                        }
									?>
										<tr>
											<td><?= $t->OperatorName; ?></td>
											<td class="text-center"><?= $typeStat; ?></td>
											<td class="text-center">
												<ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li>
                                                                <a data-tid='<?= $t->Operator_ID;?>' data-toggle='modal' data-target='#modal_edit_operator'>
                                                                    <i class="icon-pencil"></i> Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript: doAction('<?= strtolower($tooltip); ?>', <?= $t->Operator_ID; ?>, 'operator');">
                                                                    <?= $icon; ?> <?= $tooltip; ?>
                                                                </a>
                                                            </li>
                                                        </ul>
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
						<!-- /basic datatable -->	
						<!-- Modals -->
						<div id="modal_add_operator" class="modal fade" data-backdrop="static" data-keyboard="false">
						    <div class="modal-dialog modal-sm">
							    <div class="modal-content">
								    <div class="modal-header bg-danger-600">
									    <button type="button" class="close" data-dismiss="modal">&times;</button>
										<h5 class="modal-title">Add Form</h5>
									</div>

									<div class="modal-body">
										<form id="saveOperatorForm">
											<div class="form-group">
			                                    <label class="text-semibold">OPERATOR NAME :</label>
			                                    <input type="text" name="opsName" id="opsName" class="form-control" />
			                                    <label class="error" id="opsNameError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Operator is required.</label>
			                                </div>
										</form>
									</div>

									<div class="modal-footer">
			                            <button type="button" class="btn bg-default btn-raised btn-xs" data-dismiss="modal">Cancel</button>
										<button type="button" id="btnSaveOperator" class="btn bg-danger-600 btn-raised btn-xs">Save</button>
									</div>
								</div>
							</div>
						</div>

						<div id="modal_edit_operator" class="modal fade" data-backdrop="static" data-keyboard="false">
						    <div class="modal-dialog modal-sm">
							    <div class="modal-content">
								    <div class="modal-header bg-danger-600">
									    <button type="button" class="close" data-dismiss="modal">&times;</button>
										<h5 class="modal-title">Edit Form</h5>
									</div>

									<div class="modal-body"></div>

									<div class="modal-footer">
			                            <button type="button" class="btn bg-default btn-raised btn-xs" data-dismiss="modal">Cancel</button>
										<button type="button" id="btnUpdateOperator" class="btn bg-danger-600 btn-raised btn-xs">Update</button>
									</div>
								</div>
							</div>
						</div>
						<!-- /Modals -->
					</div>
