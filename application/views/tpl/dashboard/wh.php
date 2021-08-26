				<script type="text/javascript" src="<?= base_url(); ?>assets/js/dashboard.js"></script>
                <!-- Basic datatable -->
                <div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Delivery List</h5>
						<?php if( $this->mylibrary->decrypted($this->session->userdata('Department_ID')) == LOGISTICS_DEPT_ID ) : ?>
						<div class="heading-elements">
							<a class='btn bg-primary-600 btn-raised btn-xs' data-ddate='<?= $del_Date == '' ? date("Y-m-d") : $del_Date; ?>' data-toggle='modal' data-target='#modal_truck_load_summary' style='margin-bottom: 10px;'><i class="icon-truck position-left"></i> TRUCK LOAD SUMMARY</a>
                        	<?= anchor('delivery', '<i class="icon-new position-left"></i> NEW DELIVERY', array('class'=>'btn bg-success-600 btn-raised btn-xs', 'style'=>'margin-bottom: 10px;')); ?>
	                	</div>
						<?php endif ?>
					</div>

					<div class="panel-body">
                        <?php echo form_open('dashboard', array('id'=>'searchForm')); ?>
						<div class="form-group">
							<div class="col-md-1">&nbsp;</div>
							<div class="col-md-2">
							    <input type="text" class="form-control" name="controlNum" id="controlNum" placeholder="Delivery Note...">
							</div>
							<div class="form-group col-md-3">
							    <select class="select-search" name="shipTo" id="shipTo" data-placeholder="Select store/branch...">
                                    <option></option>
                                    <?php foreach($rowLocation as $row) : ?>
                                    <option value="<?= $row->Location_ID; ?>"><?= $row->LocationCode.' - '. $row->Location; ?></option>
                                    <?php endforeach; ?>
                                </select>
							</div>
							<div class="col-md-2">
							    <input type="text" class="form-control" name="shipDate" id="shipDate" placeholder="Select ship date...">
							</div>
							<!-- <div class="col-md-2">
							    <select class="select" name="truckNo" id="truckNo" data-placeholder="Select truck number...">
                                    <option></option>
                                    <?php foreach($rowTruck as $r) : ?>
                                    <option value="<?= $r->Truck_ID; ?>"><?= $r->TruckNo; ?></option>
                                    <?php endforeach; ?>
								</select>
							</div>						 -->
							<div class="text-right col-md-1">
							    <button type="submit" value="search" name="btnFilterSearch" class="btn bg-primary-600 btn-raised btn-xs"><i class="icon-search4 position-left"></i> Search</button>
							</div>
						    <div class="col-md-1">&nbsp;</div>
						</div>
						<?php echo form_close(); ?>
					</div>

					<table class="table dashboard_table_items">
						<thead>
							<tr>
                                <th class="text-center">&nbsp;</th>
								<th>Delivery Note</th>
								<th class="text-center">Total Container</th>
								<th>[Store Code] Store Name</th>
								<!-- <th>Truck No</th>
								<th>Driver Name</th> -->
								<th>Load From</th>
								<th>Load To</th>
								<th>Unload From</th>
								<th>Unload To</th>
								<th>Ship Date</th>
								<th>Receive Date</th>
							</tr>
						</thead>
						<tbody>
                        <?php
						foreach($items as $i) :
							$cancelDate = ($i->CancelledDate == "") ? 0 : 1;
							$shipDate   = ($i->ShippedDate == "") ? 0 : 1;
							$recDate    = ($i->ReceivedDate == "") ? 0 : 1;
							$deliver_ID = base64_encode($i->Deliver_ID);

                            if($i->ReceivedDate != '') :
						        $d1 = date_create($i->ShippedDate);
								$d2 = date_create($i->ReceivedDate);

								$diff = date_diff($d2, $d1);
								$interval = "[ ". $diff->format('%H:%I') ." ] ";
                            else :
                                $interval = "";
							endif;

							if($i->CancelledDate != "") :
								$bg = "class='bg-danger-300'";
							elseif($i->ReceivedDate != "") :
								$bg = "class='bg-success-300'";
							elseif($i->ShippedDate != "") :
								if($i->OffloadCount > 0) :
									$bg = "class='bg-primary'";
								else :
									$bg = "class='bg-yellow'";
								endif;
							else :
								$bg = "";
							endif;
                        ?>
							<tr <?= $bg; ?>>
                                <td class="text-center">
									<ul class="icons-list">
										<li><a href="javascript: viewDetails('<?= $deliver_ID; ?>', <?= $cancelDate; ?>, '<?= WEBSITE_URL; ?>', <?= $shipDate; ?>, <?= $recDate; ?>);" id="viewbtn_<?= $deliver_ID; ?>" data-popup='tooltip' title='View' data-placement='right'><i class="icon-eye8"></i></a></li>
										<!-- <li><a data-toggle='modal' data-target='#modal_details_view' data-candate='<?= $cancelDate; ?>' data-itemid='<?= $deliver_ID; ?>' data-sdate='<?= $shipDate; ?>' data-rdate='<?= $recDate; ?>' data-popup='tooltip' title='View' data-placement='right'><i class="icon-eye8"></i></a></li> -->
										<?php if($i->ReceivedDate == '' && $i->CancelledDate == '') : ?>
										<li><a data-toggle='modal' data-target='#modal_assign_truck' data-locid='<?= $i->Location_ID; ?>' data-itemid='<?= $deliver_ID; ?>' data-total='<?= $i->TotalContainer; ?>' data-tscan='<?= $i->TotalScan; ?>' data-popup='tooltip' title='Assign' data-placement='right'><i class="icon-truck"></i></a></li>
										<li><a href="javascript: cancelDelivery(<?= $i->Deliver_ID; ?>);" data-popup='tooltip' title='Cancel' data-placement='right'><i class="icon-x"></i></a></li>
                                        <?php
                                        endif;

                                        if($i->ShippedDate == '' && $i->CancelledDate == '') :
                                        ?>
                                        <li><?= anchor('delivery/edit/'.$deliver_ID, '<i class="icon-pencil"></i>', array('data-popup'=>'tooltip', 'title'=>'Update', 'data-placement'=>'right')); ?></li>
                                        <?php endif; ?>
									</ul>
								</td>
								<td><?= $i->ControlNo; ?></th>
								<td class="text-center"><?= $i->TotalContainer; ?></td>
								<td><?= $i->CodeLoc; ?></td>
								<!-- <td><?= $i->TruckNo; ?></td>
								<td><?= $i->DriverName; ?></td> -->
								<td><?= ($i->LoadFrom == null) ? '' : date('Y-m-d H:i A', strtotime($i->LoadFrom)); ?></td>
								<td><?= ($i->LoadTo == null) ? '' : date('Y-m-d H:i A', strtotime($i->LoadTo)); ?></td>
								<td><?= ($i->UnloadFrom == null) ? '' : date('Y-m-d H:i A', strtotime($i->UnloadFrom)); ?></td>
								<td><?= ($i->UnloadTo == null) ? '' : date('Y-m-d H:i A', strtotime($i->UnloadTo)); ?></td>
								<td><?= ($i->ShippedDate == null) ? '' : date('Y-m-d H:i A', strtotime($i->ShippedDate)); ?></td>
								<td><?= ($i->ReceivedDate == null) ? '&nbsp;' : $interval.date('Y-m-d H:i A', strtotime($i->ReceivedDate)); ?></td>
							</tr>
                        <?php
                        endforeach;
                        ?>
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->

                <!-- Modal delivery details -->
                <div id="modal_assign_truck" class="modal" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header bg-danger-800">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Assign Truck and Driver</h5>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-danger-800 btn-raised btn-xs" data-dismiss="modal">CLOSE</button>
								<button type="button" id="btnAssign" class="btn bg-primary-800 btn-raised btn-xs">ASSIGN</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /modal delivery details -->

				<!-- Modal quantity form-->
				<div id="modal_quantity_offload" class="modal" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-xs">
                        <div class="modal-content">
                            <div class="modal-header bg-danger-800">
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

				<!-- Modal quantity form-->
				<div id="modal_truck_load_summary" class="modal" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-danger-800">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Truck load summary for <?= date('M j, Y'); ?></h5>
                            </div>
                            <div class="modal-body">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /end modal -->
