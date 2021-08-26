					<div class="col-lg-12">
						<!-- Basic datatable -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title col-md-8">Driver</h5>
								<div class="col-md-4 text-right">
									<button data-toggle='modal' data-target='#modal_add_driver' class="btn btn-raised btn-xs bg-success-800">
										<i class="icon-new position-left"></i> ADD NEW
									</button>
								</div>
							</div>
							<div class="panel-body">
								<table class="table datatable-basic">
									<thead>
										<tr>
											<th>License No.</th>
											<th>Driver Name</th>
											<th>Data Center</th>
											<th class="text-center">Status</th>
											<th class="text-center">&nbsp;</th>
										</tr>
									</thead>
									<tbody>
									<?php
									foreach($drivers as $t) :
										if($t->isActive == 1)
                                        {
                                            $icon = '<i class="icon-x"></i>';
                                            $tooltip = "Deactivate";
                                            $status = '<span class="label bg-success-800">ACTIVE</span>';
                                        }
                                        else {
                                            $icon = '<i class="icon-checkmark"></i>';
                                            $tooltip = "Activate";
                                        	$status = '<span class="label bg-danger-800">INACTIVE</span>';
                                        }
									?>
										<tr>
											<td><?= $t->LicenseNo; ?></td>
											<td><?= $t->DriverName; ?></td>
											<td><?= $t->DC; ?></td>
											<td class="text-center"><?= $status; ?></td>
											<td class="text-center">
												<ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li>
                                                                <a data-tid='<?= $t->Driver_ID;?>' data-toggle='modal' data-target='#modal_edit_driver'>
                                                                    <i class="icon-pencil"></i> Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript: doAction('<?= strtolower($tooltip); ?>', <?= $t->Driver_ID; ?>, 'driver');">
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
						<div id="modal_add_driver" class="modal fade" data-backdrop="static" data-keyboard="false">
						    <div class="modal-dialog modal-sm">
							    <div class="modal-content">
								    <div class="modal-header bg-danger-600">
									    <button type="button" class="close" data-dismiss="modal">&times;</button>
										<h5 class="modal-title">Add Form</h5>
									</div>

									<div class="modal-body">
										<form id="saveDriver">
											<div class="form-group">
			                                    <label class="text-semibold">LICENSE NO. :</label>
			                                    <input type="text" name="licenseNo" id="licenseNo" class="form-control" />
			                                    <label class="error" id="licenseNoError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* License no. is required.</label>
			                                </div>
											<div class="form-group">
			                                    <label class="text-semibold">DRIVER NAME. :</label>
			                                    <input type="text" name="driverName" id="driverName" class="form-control" />
			                                    <label class="error" id="driverNameError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Driver name is required.</label>
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
										<button type="button" id="btnSaveDriver" class="btn bg-danger-600 btn-raised btn-xs">Save</button>
									</div>
								</div>
							</div>
						</div>

						<div id="modal_edit_driver" class="modal fade" data-backdrop="static" data-keyboard="false">
						    <div class="modal-dialog modal-sm">
							    <div class="modal-content">
								    <div class="modal-header bg-danger-600">
									    <button type="button" class="close" data-dismiss="modal">&times;</button>
										<h5 class="modal-title">Edit Form</h5>
									</div>

									<div class="modal-body"></div>

									<div class="modal-footer">
			                            <button type="button" class="btn bg-default btn-raised btn-xs" data-dismiss="modal">Cancel</button>
										<button type="button" id="btnUpdateDriver" class="btn bg-danger-600 btn-raised btn-xs">Update</button>
									</div>
								</div>
							</div>
						</div>
						<!-- /Modals -->
					</div>