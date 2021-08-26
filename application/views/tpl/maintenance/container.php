					<div class="col-lg-6">
						<!-- Basic datatable -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title col-md-8">Container</h5>
								<div class="col-md-4 text-right">
									<button data-toggle='modal' data-target='#modal_add_container' class="btn btn-raised btn-xs bg-success-800">
										<i class="icon-new position-left"></i> ADD NEW
									</button>
								</div>
							</div>
							<div class="panel-body">
								<table class="table datatable-basic">
									<thead>
										<tr>
											<th>Container</th>
											<th>Type</th>
											<th>Color</th>
											<th class="text-center">Status</th>
											<th class="text-center">&nbsp;</th>
										</tr>
									</thead>
									<tbody>
									<?php
									foreach($container as $c) :
										if($c->isActive == 1)
                                        {
                                            $icon = '<i class="icon-x"></i>';
                                            $tooltip = "Deactivate";
                                            $conStat = '<span class="label bg-success-800">ACTIVE</span>';
                                        }
                                        else {
                                            $icon = '<i class="icon-checkmark"></i>';
                                            $tooltip = "Activate";
                                        	$conStat = '<span class="label bg-danger-800">INACTIVE</span>';
                                        }
									?>
										<tr>
											<td><?= $c->Container; ?></td>
											<td><?= $c->ContainerType; ?></td>
											<td><?= $c->ContainerColor; ?></td>
											<td class="text-center"><?= $conStat; ?></td>
											<td class="text-center">
												<ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li>
                                                                <a data-cid='<?= $c->Container_ID;?>' data-toggle='modal' data-target='#modal_edit_container'>
                                                                    <i class="icon-pencil"></i> Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript: doAction('<?= strtolower($tooltip); ?>', <?= $c->Container_ID; ?>, 'container');">
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
						<div id="modal_add_container" class="modal fade" data-backdrop="static" data-keyboard="false">
						    <div class="modal-dialog modal-sm">
							    <div class="modal-content">
								    <div class="modal-header bg-danger-600">
									    <button type="button" class="close" data-dismiss="modal">&times;</button>
										<h5 class="modal-title">Add Form</h5>
									</div>

									<div class="modal-body">
										<form id="saveContainer">
											<div class="form-group">
			                                    <label class="text-semibold">CONTAINER NAME :</label>
			                                    <input type="text" name="contName" id="contName" class="form-control" />
			                                    <label class="error" id="containerNameError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Container name is required.</label>
			                                </div>
			                                <div class="form-group">
			                                    <label class="text-semibold">CONTAINER TYPE :</label>
			                                    <select name="conType" id="conType" class="select">
			                                        <option value="">SELECT ONE</option>
			                                        <?php foreach($typeOption as $t) : ?>
			                                        <option value="<?= $t->ContainerType_ID; ?>"><?= $t->ContainerType; ?></option>
			                                        <?php endforeach; ?>
			                                    </select>
			                                    <label class="error" id="conTypeError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Container type is required.</label>
			                                </div>
			                                <div class="form-group">
			                                    <label class="text-semibold">CONTAINER COLOR :</label>
			                                    <select name="contColor" id="contColor" class="select">
			                                        <option value="">SELECT ONE</option>
			                                        <?php foreach($colorOption as $c) : ?>
			                                        <option value="<?= $c->ContainerColor_ID; ?>"><?= $c->ContainerColor; ?></option>
			                                        <?php endforeach; ?>
			                                    </select>
			                                    <label class="error" id="contColorError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Container color is required.</label>
			                                </div>
										</form>
									</div>

									<div class="modal-footer">
			                            <button type="button" class="btn bg-default btn-raised btn-xs" data-dismiss="modal">Cancel</button>
										<button type="button" id="btnSaveContainer" class="btn bg-danger-600 btn-raised btn-xs">Save</button>
									</div>
								</div>
							</div>
						</div>

						<div id="modal_edit_container" class="modal fade" data-backdrop="static" data-keyboard="false">
						    <div class="modal-dialog modal-sm">
							    <div class="modal-content">
								    <div class="modal-header bg-danger-600">
									    <button type="button" class="close" data-dismiss="modal">&times;</button>
										<h5 class="modal-title">Edit Form</h5>
									</div>

									<div class="modal-body"></div>

									<div class="modal-footer">
			                            <button type="button" class="btn bg-default btn-raised btn-xs" data-dismiss="modal">Cancel</button>
										<button type="button" id="btnUpdateContainer" class="btn bg-danger-600 btn-raised btn-xs">Update</button>
									</div>
								</div>
							</div>
						</div>
						<!-- /Modals -->
					</div>

					<div class="col-lg-3">
						<!-- Basic datatable -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title col-md-8">Container Type</h5>
								<div class="col-md-4 text-right">
									<button data-toggle='modal' data-target='#modal_add_container_type' class="btn btn-raised btn-xs bg-success-800">
										<i class="icon-new position-left"></i> ADD NEW
									</button>
								</div>
							</div>
							<div class="panel-body">
								<table class="table datatable-basic">
									<thead>
										<tr>
											<th>Type</th>
											<th class="text-center">Status</th>
											<th class="text-center">&nbsp;</th>
										</tr>
									</thead>
									<tbody>
									<?php
									foreach($cType as $t) :
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
											<td><?= $t->ContainerType; ?></td>
											<td class="text-center"><?= $typeStat; ?></td>
											<td class="text-center">
												<ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li>
                                                                <a data-tid='<?= $t->ContainerType_ID;?>' data-toggle='modal' data-target='#modal_edit_container_type'>
                                                                    <i class="icon-pencil"></i> Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript: doAction('<?= strtolower($tooltip); ?>', <?= $t->ContainerType_ID; ?>, 'type');">
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
						<div id="modal_add_container_type" class="modal fade" data-backdrop="static" data-keyboard="false">
						    <div class="modal-dialog modal-sm">
							    <div class="modal-content">
								    <div class="modal-header bg-danger-600">
									    <button type="button" class="close" data-dismiss="modal">&times;</button>
										<h5 class="modal-title">Add Form</h5>
									</div>

									<div class="modal-body">
										<form id="saveTypeForm">
											<div class="form-group">
			                                    <label class="text-semibold">CONTAINER TYPE :</label>
			                                    <input type="text" name="c_Type" id="c_Type" class="form-control" />
			                                    <label class="error" id="c_TypeError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Container type is required.</label>
			                                </div>
										</form>
									</div>

									<div class="modal-footer">
			                            <button type="button" class="btn bg-default btn-raised btn-xs" data-dismiss="modal">Cancel</button>
										<button type="button" id="btnSaveType" class="btn bg-danger-600 btn-raised btn-xs">Save</button>
									</div>
								</div>
							</div>
						</div>

						<div id="modal_edit_container_type" class="modal fade" data-backdrop="static" data-keyboard="false">
						    <div class="modal-dialog modal-sm">
							    <div class="modal-content">
								    <div class="modal-header bg-danger-600">
									    <button type="button" class="close" data-dismiss="modal">&times;</button>
										<h5 class="modal-title">Edit Form</h5>
									</div>

									<div class="modal-body"></div>

									<div class="modal-footer">
			                            <button type="button" class="btn bg-default btn-raised btn-xs" data-dismiss="modal">Cancel</button>
										<button type="button" id="btnUpdateType" class="btn bg-danger-600 btn-raised btn-xs">Update</button>
									</div>
								</div>
							</div>
						</div>
						<!-- /Modals -->
					</div>

					<div class="col-lg-3">
						<!-- Basic datatable -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title col-md-8">Container Color</h5>
								<div class="col-md-4 text-right">
									<button data-toggle='modal' data-target='#modal_add_container_color' class="btn btn-raised btn-xs bg-success-800">
										<i class="icon-new position-left"></i> ADD NEW
									</button>
								</div>
							</div>
							<div class="panel-body">
								<table class="table datatable-basic">
									<thead>
										<tr>
											<th>Color</th>
											<th class="text-center">Status</th>
											<th class="text-center">&nbsp;</th>
										</tr>
									</thead>
									<tbody>
									<?php
									foreach($cColor as $i) :
										if($i->isActive == 1)
                                        {
                                            $icon = '<i class="icon-x"></i>';
                                            $tooltip = "Deactivate";
                                            $colorStat = '<span class="label bg-success-800">ACTIVE</span>';
                                        }
                                        else {
                                            $icon = '<i class="icon-checkmark"></i>';
                                            $tooltip = "Activate";
                                        	$colorStat = '<span class="label bg-danger-800">INACTIVE</span>';
                                        }
									?>
										<tr>
											<td><?= $i->ContainerColor; ?></td>
											<td class="text-center"><?= $colorStat; ?></td>
											<td class="text-center">
												<ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li>
                                                                <a data-cid='<?= $i->ContainerColor_ID;?>' data-toggle='modal' data-target='#modal_edit_container_color'>
                                                                    <i class="icon-pencil"></i> Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript: doAction('<?= strtolower($tooltip); ?>', <?= $i->ContainerColor_ID; ?>, 'color');">
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
						<div id="modal_add_container_color" class="modal fade" data-backdrop="static" data-keyboard="false">
						    <div class="modal-dialog modal-sm">
							    <div class="modal-content">
								    <div class="modal-header bg-danger-600">
									    <button type="button" class="close" data-dismiss="modal">&times;</button>
										<h5 class="modal-title">Add Form</h5>
									</div>

									<div class="modal-body">
										<form id="saveColorForm">
											<div class="form-group">
			                                    <label class="text-semibold">CONTAINER COLOR :</label>
			                                    <input type="text" name="c_Color" id="c_Color" class="form-control" />
			                                    <label class="error" id="c_ColorError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Container color is required.</label>
			                                </div>
										</form>
									</div>

									<div class="modal-footer">
			                            <button type="button" class="btn bg-default btn-raised btn-xs" data-dismiss="modal">Cancel</button>
										<button type="button" id="btnSaveColor" class="btn bg-danger-600 btn-raised btn-xs">Save</button>
									</div>
								</div>
							</div>
						</div>

						<div id="modal_edit_container_color" class="modal fade" data-backdrop="static" data-keyboard="false">
						    <div class="modal-dialog modal-sm">
							    <div class="modal-content">
								    <div class="modal-header bg-danger-600">
									    <button type="button" class="close" data-dismiss="modal">&times;</button>
										<h5 class="modal-title">Edit Form</h5>
									</div>

									<div class="modal-body"></div>

									<div class="modal-footer">
			                            <button type="button" class="btn bg-default btn-raised btn-xs" data-dismiss="modal">Cancel</button>
										<button type="button" id="btnUpdateColor" class="btn bg-danger-600 btn-raised btn-xs">Update</button>
									</div>
								</div>
							</div>
						</div>
						<!-- /Modals -->
					</div>