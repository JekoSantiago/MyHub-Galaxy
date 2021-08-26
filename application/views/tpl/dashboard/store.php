				<style>
				.dropdown-menu {
					overflow: overlay !important; 
					overflow-x: overlay !important; 
					overflow-y: overlay !important; 
				}    
				.dataTables_scrollBody {
					position: relative;
					width: 100%;
					overflow: initial !important;
					overflow-x: initial !important;
					overflow-y: initial !important;
					min-height: 0
				}
				</style>
                <script type="text/javascript" src="<?= base_url(); ?>assets/js/dashboard.js"></script>
                <!-- Basic datatable -->
                <div class="panel panel-flat">

					<div class="panel-heading">
						<h5 class="panel-title">Delivery List</h5>
					</div>

					<div class="panel-body">
                        <?php echo form_open('dashboard', array('id'=>'searchForm')); ?>
						<div class="form-group">
						    
							<div class="col-md-2">
							    <input type="text" class="form-control" name="controlNum" id="controlNum" placeholder="Delivery Note...">
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
							</div> -->
							                            
							<!-- <?php if($this->mylibrary->decrypted($this->session->userdata('PositionLevel_ID')) == AM_MONITORING_USERS || $this->mylibrary->decrypted($this->session->userdata('PositionLevel_ID')) == BM_MONITORING_USERS) : ?>
							    <div class="col-md-2">
							        <select class="select" name="acID" id="acID" data-placeholder="Select Area Coordinator...">
                                        <option></option>
                                        <?php foreach($rowAC as $ac) : ?>
                                        <option value="<?= $ac->AC_ID; ?>"><?= $ac->AC; ?></option>
                                        <?php endforeach; ?>
								    </select>		
								</div>
							<?php endif; ?>

                            <?php if($this->mylibrary->decrypted($this->session->userdata('PositionLevel_ID')) == BM_MONITORING_USERS) : ?> 
							    <div class="col-md-2">
							        <select class="select" name="amID" id="amID" data-placeholder="Select Area Manager...">
                                        <option></option>
                                        <?php foreach($rowAM as $am) : ?>
                                        <option value="<?= $am->AM_ID; ?>"><?= $am->AM; ?></option>
                                        <?php endforeach; ?>
								    </select>		
								</div>
							<?php endif; ?> -->
						    
							<div class="col-md-2">
							    <button type="submit" value="search" name="btnFilterSearch" class="btn bg-primary-600 btn-raised btn-xs"><i class="icon-search4 position-left"></i> Search</button>
							</div>

							<div class="col-md-2">&nbsp;</div>

						</div>
						<?php echo form_close(); ?>
					</div>

					<div class="table-responsive">
					<table class="table dashboard_table_items">
						<thead>
							<tr>
                                <th class="text-center">&nbsp;</th>
								<th>Delivery Note</th>
                                <th>[Store Code] Store Name</th>
								<th>Total Container</th>
								<!-- <th>Truck No</th>
								<th>Driver Name</th> -->
								<!-- <th>Load From</th> -->
								<!-- <th>Load To</th> -->
								<!-- <th>Unload From</th> -->
								<!-- <th>Unload To</th> -->
								<th>Ship Date</th>
								<!-- <th>Receive Date</th> -->
							</tr>
						</thead>
						<tbody>
                        <?php
						foreach($items as $i) :
							$deliver_ID = base64_encode($i->Deliver_ID);
							$cancelDate = is_null($i->CancelledDate) ? 0 : 1;
							$shipDate   = ($i->ShippedDate == "") ? 0 : 1;
							$recDate    = ($i->ReceivedDate == "") ? 0 : 1;
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
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<ul class="dropdown-menu dropdown-menu-left">												
                                                <?php if($i->ReceivedDate == '' && $this->mylibrary->decrypted($this->session->userdata('PositionLevel_ID')) == STORE_OPS_RECEIVER) : ?>
												<li><?= anchor('receive/'.$deliver_ID, '<i class="icon-clipboard6"></i> Receive Delivery'); ?></li>
												<?php else : ?>
												<li><a href="javascript: viewDetails('<?= $deliver_ID; ?>', <?= $cancelDate; ?>, '<?= WEBSITE_URL; ?>', <?= $shipDate; ?>, <?= $recDate; ?>);" ><i class="icon-eye8"></i> View Details</a></li>
												<!-- <li><a data-toggle='modal' data-target='#modal_details_view' data-candate='<?= $cancelDate; ?>' data-itemid='<?= $deliver_ID; ?>' data-sdate='<?= $shipDate; ?>' data-rdate='<?= $recDate; ?>'><i class="icon-eye8"></i> View Details</a></li> -->
												<?php endif; ?>
											</ul>
										</li>
									</ul>
								</td>
								<td><?= $i->ControlNo; ?></td>
								<td><?= $i->CodeLoc; ?></td>
								<td class="text-center"><?= $i->TotalContainer; ?></td>
								<!-- <td><?= $i->TruckNo; ?></td>
								<td><?= $i->DriverName; ?></td> -->
								<!-- <td><?= ($i->LoadFrom == null) ? '' : date('Y-m-d H:i A', strtotime($i->LoadFrom)); ?></td> -->
								<!-- <td><?= ($i->LoadTo == null) ? '' : date('Y-m-d H:i A', strtotime($i->LoadTo)); ?></td> -->
								<!-- <td><?= ($i->UnloadFrom == null) ? '' : date('Y-m-d H:i A', strtotime($i->UnloadFrom)); ?></td> -->
								<!-- <td><?= ($i->UnloadTo == null) ? '' : date('Y-m-d H:i A', strtotime($i->UnloadTo)); ?></td> -->
								<td><?= ($i->ShippedDate == null) ? '' : date('Y-m-d H:i A', strtotime($i->ShippedDate)); ?></td>
								<!-- <td><?= ($i->ReceivedDate == null) ? '' : $interval.date('Y-m-d H:i A', strtotime($i->ReceivedDate)); ?></td> -->
							</tr>
                        <?php
                        endforeach;
                        ?>
						</tbody>
					</table>
					</div>
					
				</div>
				<!-- /basic datatable -->