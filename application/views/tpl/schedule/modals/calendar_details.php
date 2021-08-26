                            <div class="modal-header bg-danger-800">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Delivery schedule for <?= $del_Date; ?></h5>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Location Code</th>
                                            <th>Location</th>
                                            <th>Delivery Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if(empty($details)) : 
                                    ?>
                                        <tr>
                                            <td colspan="4" class="text-center">No delivery for today</td>
                                        </tr>
                                    <?php 
                                    else :
                                        foreach($details as $i) :
                                        if($i->ShippedDate != NULL && $i->ReceivedDate == NULL) :
                                            $status = '<span class="label bg-yellow">IN TRANSIT</span>';
                                        elseif($i->ShippedDate != NULL && $i->ReceivedDate != NULL) : 
                                            $status = '<span class="label bg-success-800">RECEIVED</span>';
                                        else :
                                            $status = '<span class="label bg-danger-800">PENDING</span>';
                                        endif;

                                        $disabled = (!is_null($i->ReceivedDate)) ? "disabled='disabled'" : "";
                                    ?>    
                                        <tr>
                                            <td><?= $status; ?></td>
                                            <td><?= $i->LocationCode; ?></td>
                                            <td><?= $i->Location; ?></td>
                                            <td>
                                                <div class="form-group">   
                                                    <select class="select" id="dt_ID_<?= $i->Schedule_ID; ?>" <?= $disabled; ?> onchange="javascript: updateDeliveryType(<?= $i->Schedule_ID; ?>); "; >
                                                    <?php 
                                                        foreach($deliveryType as $x) : 
                                                            $select = ($x->DeliveryType_ID == $i->DeliveryType_ID) ? "selected='selected'" : "";
                                                    ?>
                                                        <option value="<?= $x->DeliveryType_ID; ?>" <?= $select; ?>><?= $x->DeliveryType; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <input type="hidden" id="sched_Date" value="<?= $sched_Date; ?>">
                                                </div>
                                            </td>
                                        </tr>
                                    <?php 
                                        endforeach; 
                                    endif;
                                    ?>
                                    </tbody>

                                </table>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-danger-800 btn-raised btn-xs" data-dismiss="modal">CLOSE</button>
                            </div>