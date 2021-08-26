<div class="col-lg-12">
						<!-- Basic datatable -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Delivery Report for today <?= date('M j, Y'); ?></h5>
							</div>

							<div class="panel-body">
                                <?php echo form_open('reports', array('id'=>'searchForm')); ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="controlNum" id="controlNum" placeholder="Delivery Note">
                                            </div>
                                            <div class="col-md-1">
                                                <?php
                                                $disabled = ($deptID == 11) ? 'disabled="disabled"' : '';
                                                ?>
                                                <select class="select-search" name="dcID" id="dcID" data-placeholder="Select DC" <?= $disabled; ?>>
                                                        <option></option>
                                                        <?php
                                                        foreach($dcOptions as $i) :
                                                            $select = ($dcID == $i->Location_ID) ? 'selected="selected"' : '';
                                                        ?>
                                                        <option value="<?= $i->Location_ID; ?>" <?= $select; ?>><?= $i->Location; ?></option>
                                                        <?php
                                                        endforeach;
                                                        ?>
                                                    </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <select class="select-search" name="shipTo" id="shipTo" data-placeholder="Store Code/Store name">
                                                    <option></option>
                                                    <?php
                                                    foreach($rowLocation as $row) :
                                                    ?>
                                                    <option value="<?= $row->Location_ID; ?>"><?= $row->LocationCode.' - '. $row->Location; ?></option>
                                                    <?php
                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <input type="text" class="form-control" name="shipDate" id="shipDate" placeholder="Ship date">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="text" class="form-control" name="receiveDate" id="receiveDate" placeholder="Receive date">
                                            </div>
                                            <!-- <div class="col-md-2">
                                                <select class="select" name="truckNo" id="truckNo" data-placeholder="Truck number">
                                                    <option></option>
                                                    <?php
                                                    foreach($rowTruck as $r) :
                                                    ?>
                                                    <option value="<?= $r->Truck_ID; ?>"><?= $r->TruckNo; ?></option>
                                                    <?php
                                                    endforeach;
                                                    ?>
                                                </select>		
                                            </div>		 -->
                                            <!-- <div class="col-md-2">
                                                <select class="select-search" name="driverName" id="driverName" data-placeholder="Driver name">
                                                    <option></option>
                                                    <?php
                                                    foreach($driverName as $d) :
                                                    ?>
                                                    <option value="<?= $d->Driver_ID; ?>"><?= $d->DriverName; ?></option>
                                                    <?php
                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>	 -->
                                            <div class="">	
                                                <button type="submit" value="search" name="btnFilterSearch" class="btn bg-primary-600 btn-raised btn-xs">Search</button>
                                            </div>
                                        </div>	
                                    </div>
                                   
								<?php echo form_close(); ?>
							</div>

							<table class="table" id="Reports_tbl">
								<thead>
									<tr class="btn-default">
									    <th class="col-lg-1">Action</th>
										<th>Delivery Note</th>
										<th>[Store Code] Store Name</th>
										<th>Ship Date</th>
										<th>Receive Date</th>
										<th>Duration</th>
										<!-- <th>Truck Number</th>
										<th>Driver Name</th> -->
									</tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($rowItems as $row) :
                                    if($row->ReceivedDate != '')
									{
										$d1 = date_create($row->ShippedDate);
										$d2 = date_create($row->ReceivedDate);

										$diff = date_diff($d2, $d1);
										$interval = $diff->format('%H:%I'); 
									}
									else 
									{
										$interval = "";
									}
                                ?>
                                    <tr>
                                        <td>
                                            <ul class="icons-list">
												<li>
													<a data-toggle='modal' data-target='#modal_details_report' data-rdate='<?= $row->ReceivedDate; ?>' data-rowid='<?= $row->Deliver_ID; ?>' data-popup='tooltip' title='View' data-placement='right'>
														<i class="icon-eye8"></i>
													</a>
                                                </li>
                                                <!-- <?php
                                                if($row->ShippedDate != "" && $row->ReceivedDate != "") :
                                                ?>
												<li>
													<a data-popup='tooltip' href="javascript: exportDetails(<?= $row->Deliver_ID; ?>);" title='Export' data-placement='right'><i class="icon-download4"></i></a>
                                                </li>
                                                <?php
                                                endif;
                                                ?> -->
											</ul>
                                        </td>
                                        <td><?= $row->ControlNo; ?></td>
                                        <td>[ <?= $row->LocationCode; ?> ] <?= $row->Location; ?></td>
                                        <td><?= ($row->ShippedDate == null) ? '' : date('Y-m-d H:i A', strtotime($row->ShippedDate)); ?></td>
                                        <td><?= ($row->ReceivedDate == null) ? '' : date('Y-m-d H:i A', strtotime($row->ReceivedDate)); ?></td>
                                        <td><?= $interval; ?></td>
                                        <!-- <td><?= $row->TruckNo; ?></td>
                                        <td><?= $row->DriverName; ?></td> -->
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                                </tbody>
							</table>
						</div>
						<!-- /basic datatable -->	
                    </div>
                    
                    <!-- Modal delivery details -->
                    <div id="modal_details_report" class="modal" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-full">
                            <div class="modal-content">
                                <div class="modal-header bg-teal-600">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Report Details</h5>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <!-- <button type="button" id="btnExportDetails" class="btn bg-success-600 btn-raised btn-xs">Export</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer -->

                    <!-- Modal Batchh details -->
                    <div id="modal_batch_details" class="modal fade" data-keyboard="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-teal-600">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Batch Details</h5>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <!-- <button type="button" id="btnExportDetails" class="btn bg-success-600 btn-raised btn-xs">Export</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer -->