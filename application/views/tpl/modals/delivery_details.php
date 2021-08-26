               
                    <div class="row">
                        <form id="batchForm">
                            <?php foreach($batch as $b) : ?>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="batch-label">
                                            <span class="label label-flat label-block label-rounded label-icon border-teal text-teal-600">
                                                <i class="icon-stack3"></i> BATCH <?= $b->BatchNo; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <Label>Truck number</Label>
                                        <?php 
                                        $disabled = "";

                                        if($recDate == 1 || $this->mylibrary->decrypted($this->session->userdata('Department_ID')) != LOGISTICS_DEPT_ID) :
                                            $disabled = 'disabled';
                                        endif;

                                        ?>
                                        <select class="select" name="truck_<?= $b->BatchNo; ?>" id="truck-select" data-bn="<?= $b->BatchNo; ?>" <?= $disabled; ?>>
                                            <?php 
                                            
                                            $truckselect = "";
                                            
                                            foreach($trucks as $r) : 
                                                $truckselect = ($b->Truck_ID == $r->Truck_ID ) ? 'selected=selected' : '';
                                            ?>
                                            <option value="<?= $r->Truck_ID; ?>" <?= $truckselect; ?> ><?= $r->TruckNo; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <Label>Driver</Label>
                                        <select class="select" name="driver_<?= $b->BatchNo; ?>" id="driver-select" data-bn="<?= $b->BatchNo; ?>" <?= $disabled; ?>>
                                            <?php 
                                            
                                            $driverselect = "";

                                            foreach($drivers as $d) : 
                                                $driverselect = ($b->Driver_ID == $d->Driver_ID ) ? 'selected=selected' : '';
                                            ?>
                                            <option value="<?= $d->Driver_ID; ?>" <?= $driverselect; ?> ><?= $d->DriverName .'-'. $d->LicenseNo; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </form>
                    </div>
    
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table" style="white-space: nowrap;">
                                <thead>
                                    <tr>
                                        <th>Barcode</th>
                                        <th>Type</th>
                                        <th>Color</th>
                                        <th>Total Quantity</th>
                                        <th class="text-center">Load Quantity</th>
                                        <th class="text-center">Receive Quantity</th>
                                        <!-- <th class="text-center">Descrepancy</th> -->
                                        <th class="text-center">Offload Quantity</th>
                                        <th>Load Date</th>
                                        <th>Receive Date</th>
                                        <th>Offload Date</th>
                                        <th>Status</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- UPDATE PHP -->
                                    <?php
                                    $icon = "";
                                    $status = "";
                                    $tooltip = "";
                                    $stat_ID = 0;
                                    $red    = 0;
                                    $blue   = 0;
                                    $yellow = 0;
                                    $box    = 0;
                                    $case   = 0;
                                    $allo   = 0;
                                    $fas    = 0;
                                    $barrel = 0;
                                    $promo  = 0;
                                    $urgent = 0;
                                    $manual = 0;
                                    $loadContainer    = 0;
                                    $offLoadContainer = 0;

                                    foreach ($items as $row) :

                                        if ($row->Container_ID == 1) :
                                            $red++;
                                        endif;

                                        if ($row->Container_ID == 2) :
                                            $blue++;
                                        endif;

                                        if ($row->Container_ID == 3) :
                                            $yellow++;
                                        endif;

                                        if ($row->Container_ID == 4) :
                                            $box++;
                                        endif;

                                        if ($row->Container_ID == 5) :
                                            $case++;
                                        endif;

                                        if ($row->Container_ID == 6) :
                                            $allo++;
                                        endif;

                                        if ($row->Container_ID == 7) :
                                            $fas++;
                                        endif;

                                        if ($row->Container_ID == 8) :
                                            $barrel++;
                                        endif;

                                        if ($row->Container_ID == 9) :
                                            $promo++;
                                        endif;

                                        if ($row->Container_ID == 10) :
                                            $urgent++;
                                        endif;

                                        if ($row->Container_ID == 11) :
                                            $manual++;
                                        endif;

                                        if ($row->Status == 3) :
                                            $offLoadContainer++;
                                        endif;

                                        if ($row->Status == 1) :
                                            $loadContainer++;
                                        endif;

                                        if ($shipDate == 1) :
                                            if ($row->ItemsOffloaded != 0) :
                                                $icon = '<i class="icon-add"></i>';
                                                $tooltip = 'Load';
                                                $stat_ID = 1;
                                            else :
                                                $icon = '';
                                                $tooltip = '';
                                                $stat_ID = 1;
                                            endif;
                                        else :
                                            if ($row->ItemsOffloaded == 0) :
                                                $icon = '<i class="icon-subtract"></i>';
                                                $tooltip = 'Offload';
                                                $stat_ID = 3;
                                            else :
                                                $icon = '<i class="icon-add"></i>';
                                                $tooltip = 'Load';
                                                $stat_ID = 1;
                                            endif;
                                        endif;


                                    ?>

                                        <!-- UPDATE PHP -->

                                        <tr>
                                            <td><?= $row->Barcode; ?></td>
                                            <td><?= $row->ContainerType; ?></td>
                                            <td><?= $row->ContainerColor; ?></td>
                                            <td class="text-center"><?= $row->Total; ?></td>
                                            <td class="text-center"><?= $row->ItemsLoaded <= 0 ? 0 : $row->ItemsLoaded; ?></td>
                                            <td class="text-center"><?= $row->ItemsReceived; ?></td>
                                            <td class="text-center"><?= $row->ItemsOffloaded; ?></td>
                                            <td><?= ($row->Loaded == '') ? '&nbsp;' : date('Y-m-d H:i A', strtotime($row->Loaded)); ?></td>
                                            <td><?= ($row->Unloaded == '') ? '&nbsp;' : date('Y-m-d H:i A', strtotime($row->Unloaded)); ?></td>
                                            <?php
                                            if ($shipDate == 1) : ?>
                                                <td><?= ($row->Batch_1 == $row->Total) ? '&nbsp;' : date('Y-m-d H:i A', strtotime($row->Offloaded)); ?></td>
                                            <?php else : ?>
                                                <td><?= ($row->ItemsOffloaded == 0) ? '&nbsp;' : date('Y-m-d H:i A', strtotime($row->Offloaded)); ?></td>
                                            <?php endif; ?>
                                            <td><?= $status; ?></td>
                                            <td>
                                                <?php
                                                if ($cancelDate == 0) :
                                                    // if ($row->Unloaded == '' || $row->Total != $row->RecQty) :
                                                ?>
                                                        <ul class="icons-list">
                                                            <li>
                                                                <!-- <a><?= $icon; ?></a> -->
                                                                <a href="javascript: checkContainer(<?= $row->DeliverDetail_ID; ?>, <?= $row->Total; ?>, <?= $stat_ID; ?>, '<?= strtolower($tooltip); ?>', <?= $cancelDate; ?>, '<?= $deliver_ID; ?>', <?= $row->Container_ID; ?>, '<?= $row->Barcode; ?>', <?= $row->ItemsLoaded; ?>, <?= $row->ItemsReceived; ?>, <?= $row->ItemsOffloaded; ?>, <?= $shipDate; ?>, <?= $recDate; ?> );" data-popup='tooltip' title='<?= $tooltip; ?>' data-placement='left'><?= $icon; ?></a>
                                                            </li>
                                                        </ul>
                                                <?php
                                                    // endif;
                                                endif;
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table" style="white-space: nowrap;">
                                <tbody>
                                <tr class="active border-double">
                                    <td colspan="12">Container Count</td>
								</tr>
                                <tr>
                                        <td colspan="1">Container Red : <?= $red; ?></td>                                        
                                        <td colspan="1">Container Blue : <?= $blue; ?></td>
                                        <td colspan="1">Container Yellow : <?= $yellow; ?></td>
                                        <td colspan="1">Case : <?= $case; ?></td>
                                        <?php
                                        if ($dc_ID == 2) :
                                        ?>
                                            <td colspan="1">Box : <?= $box; ?></td>
                                            <td colspan="1">Allocation : <?= $allo; ?></td>
                                            <td colspan="1">FAS : <?= $fas; ?></td>
                                            <td colspan="1">Barrel : <?= $barrel; ?></td>
                                            <td colspan="1">Promo : <?= $promo; ?></td>
                                            <td colspan="1">Urgent : <?= $urgent; ?></td>
                                            <td colspan="1">Manual : <?= $manual; ?></td>
                                            <td colspan="1">&nbsp;</td>
                                        <?php
                                        else :
                                        ?>
                                            <td colspan="1">Allocation : <?= $allo; ?></td>
                                            <td colspan="1">FAS : <?= $fas; ?></td>
                                            <td colspan="1">Barrel : <?= $barrel; ?></td>
                                            <td colspan="1">Promo : <?= $promo; ?></td>
                                            <td colspan="1">Urgent : <?= $urgent; ?></td>
                                            <td colspan="1">Manual : <?= $manual; ?></td>
                                            <td colspan="2">&nbsp;</td>
                                        <?php
                                        endif;
                                        ?>
                                    </tr>
                                    <tr>
                                        <td colspan="6">OFFLOAD CONTAINER : <?= $offLoadContainer; ?></td>
                                        <td colspan="6">LOAD CONTAINER : <?= $loadContainer; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="12" class="text-bold">TOTAL CONTAINER : <?= $total; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <input type="hidden" name="deliverID" id="deliverID" value="<?= $deliver_ID; ?>">