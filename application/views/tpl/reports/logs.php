                    <div class="col-lg-12">
						<!-- Basic datatable -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Logs Report</h5>
							</div>

							<div class="panel-body">
                                <?php echo form_open('reports/logs', array('id'=>'searchForm')); ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <?php
                                            if($deptID != 17) :
                                            ?>
                                            <div class="col-md-3">
                                                <select class="select-search" name="location_ID" id="location_ID" data-placeholder="Select store/branch...">
                                                    <option></option>
                                                    <?php 
                                                    foreach($location as $row) :
                                                        $selected = ($locID == $row->Location_ID) ? "selected='selected'" : "";
                                                    ?>
                                                    <option value="<?= $row->Location_ID; ?>" <?= $selected; ?>><?= $row->LocationCode.' - '. $row->Location; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <?php
                                            endif;
                                            ?>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="curDate" id="curDate" value="<?= $sDate; ?>" placeholder="Select date">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" value="search" name="btnFilterSearch" class="btn bg-primary-800 btn-raised btn-xs">Search</button>
                                                <button type="button" id="btnExportLogs" class="btn bg-success-800 btn-raised btn-xs">Export</button>
                                                <input type="hidden" value="<?= $deptID; ?>" id="deptID" />
                                                <input type="hidden" value="<?= $locID; ?>" id="locID" />
                                            </div>
                                        </div>	
                                    </div>
								<?php echo form_close(); ?>
							</div>

                            <table class="table log_report_items">
                                <thead>
                                    <tr>
                                        <th>Location</th>
                                        <th>DC Name</th>
                                        <th>Delivery Note</th>
                                        <th>Barcode</th>
                                        <th class="text-center">Deliver Status</th>
                                        <th>Scanned By</th>
                                        <th>Scanned Date</th>
                                        <th class="text-center">Scanned From</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($result as $r) : ?>
                                    <tr>
                                        <td><?= $r->Location; ?></td>
                                        <td><?= $r->DC; ?></td>
                                        <td><?= $r->ControlNo; ?></td>
                                        <td><?= $r->Barcode; ?></td>
                                        <td class="text-center"><?= ($r->DeliverStatus == 'Wrong') ? "Invalid Barcode" : $r->DeliverStatus; ?></td>
                                        <td><?= $r->InsertName; ?></td>
                                        <td><?= date('Y-m-d h:i A', strtotime($r->ScannedDate)); ?></td>
                                        <th class="text-center"><?= ($r->DeliverStatus == 'Load') ? "Web" : $r->ScannedFrom; ?></th>
                                    </tr>
                                <?php endforeach; ?>    
                                </tbody>
                            </table>
						</div>
                    </div>
                    