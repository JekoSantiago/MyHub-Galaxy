                    <div class="col-lg-12">
						<!-- Basic datatable -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Compliance Report</h5>
							</div>

							<div class="panel-body">
                                <?php echo form_open('reports/compliance', array('id'=>'searchForm')); ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-5">&nbsp;</div>
                                            
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="dateSelected" id="dateSelected" placeholder="Select date">
                                            </div>
                                            <div class="col-md-1">
                                                <button type="submit" value="search" name="btnFilterSearch" class="btn bg-primary-600 btn-raised btn-xs">Search</button>
                                            </div>
                                            <div class="col-md-4">&nbsp;</div>		
                                        </div>	
                                    </div>
								<?php echo form_close(); ?>
							</div>
                            <?php
                            if(count($result) > 0) :
                                foreach($result as $key => $row) :
                                    foreach($row as $k => $value) :
                                        $controlNo = $k;
                                        $rowItems  = $value
                            ?>

                                    <div class="col-lg-12">
                                        <h4>
                                            DELIVERY NOTE : <?= $controlNo; ?>
                                        </h4>
                                    </div>

        							<table class="table myreport_items" style="margin-bottom: 20px;">
        								<thead>
        									<tr class="btn-default">
                                                <th>Location</th>
        									    <th>Container Type</th>
        										<th class="text-center">Count Loaded</th>
        										<th>Warehouse Checker</th>
        										<th>Load Start</th>
        										<th>Load End</th>
        										<th class="text-center">Load Duration</th>
        										<th>Reciever</th>
                                                <th>Unload Start</th>
                                                <th>Unload End</th>
                                                <th class="text-center">Unload Duration</th>
                                                <th class="text-center">Count Unloaded</th>
                                                <th class="text-center">Variance</th>
        									</tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach($rowItems as $item) :
                                            $ldStart = date_create($item['LoadStart']);
                                            $ldEnd   = date_create($item['LoadEnd']);

                                            $diffLoad     = date_diff($ldEnd, $ldStart);
                                            $loadDuration = $diffLoad->format('%H:%I'); 

                                            $uldStart = date_create($item['UnloadStart']);
                                            $uldEnd   = date_create($item['UnloadEnd']);

                                            $diffUnload     = date_diff($uldEnd, $uldStart);
                                            $unloadDuration = $diffUnload->format('%H:%I'); 

                                            $variance = $item['CountLoaded'] - $item['CountUnloaded'];
                                        ?>
                                            <tr>
                                                <td><?= $item['Location']; ?></td>
                                                <td>
                                                    <?= $item['Container']; ?>
                                                </td>
                                                <td class="text-center"><?= $item['CountLoaded']; ?></td>
                                                <td><?= $item['WHUser']; ?></td>
                                                <td><?= ($item['LoadStart'] == "") ? "" : date('Y-m-d H:i:s', strtotime($item['LoadStart'])); ?></td>
                                                <td><?= ($item['LoadEnd'] == "") ? "" : date('Y-m-d H:i:s', strtotime($item['LoadEnd'])); ?></td>
                                                <td class="text-center"><?= $loadDuration; ?></td>
                                                <td><?= $item['StoreUser']; ?></td>
                                                <td><?= ($item['UnloadStart'] == "") ? "" : date('Y-m-d H:i:s', strtotime($item['UnloadStart'])); ?></td>
                                                <td><?= ($item['UnloadEnd'] == "") ? "" : date('Y-m-d H:i:s', strtotime($item['UnloadEnd'])); ?></td>
                                                <td class="text-center"><?= $unloadDuration; ?></td>
                                                <td class="text-center"><?= $item['CountUnloaded']; ?></td>
                                                <td class="text-center"><?= $variance; ?></td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                        </tbody>
        							</table>
                            <?php
                                    endforeach;
                                endforeach;
                            else :
                            ?>
                            <div class="col-lg-12">
                                <h4>
                                    STORE NAME
                                </h4>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr class="btn-default">
                                        <th>Location</th>
                                        <th>Container Type</th>
                                        <th>Count Loaded</th>
                                        <th>Warehouse Checker</th>
                                        <th>Load Start</th>
                                        <th>Load End</th>
                                        <th>Load Duration</th>
                                        <th>Reciever</th>
                                        <th>Unload Start</th>
                                        <th>Unload End</th>
                                        <th>Unload Duration</th>
                                        <th>Count Unloaded</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            No data to display from the database.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                            endif;
                            ?>
						</div>
                            
                    </div>
                    