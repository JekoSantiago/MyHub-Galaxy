                                <form id="formEditSchedule">
							        <div class="form-group">
                                        <label class="text-semibold">SCHEDULE DATE :</label>
                                        <input class="form-control" name="editScheduleDate" id="editScheduleDate" value="<?= $this->mylibrary->formatDate($info[0]->ScheduleDate); ?>">
                                        <label class="error" id="scheduleDateError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Schedule Date is required.</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">DC NAME :</label>
                                        <select class="select" name="returnTo" id="returnTo" disabled>
                                            <option value="">SELECT ONE</option>
                                            <?php 
                                            foreach($dcOption as $i) : 
                                                $default = ($i->Location_ID == $info[0]->DC_ID) ? 'selected="selected"' : ''; ?>
                                            ?>
                                            <option value="<?= $i->Location_ID; ?>" <?= $default; ?>><?= $i->Location; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">LOCATION :</label>
                                        <select class="select-search" name="editLocationID" id="editLocationID">
                                            <option value="">SELECT ONE</option>
                                            <?php 
                                            foreach($location as $x) : 
                                                $select = ($x->Location_ID == $info[0]->Location_ID) ? "selected='selected'" : ""; 
                                            ?>
                                            <option value="<?= $x->Location_ID; ?>" <?= $select; ?>><?= $x->LocationCode .'-'. $x->Location; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <label class="error" id="locationError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Location is required.</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">DELIVERY TYPE :</label>
                                        <select class="select" name="editDTID" id="editDTID">
                                            <option value="">SELECT ONE</option>
                                            <?php 
                                            foreach($deliveryType as $d) : 
                                                $selected = ($d->DeliveryType_ID == $info[0]->DeliveryType_ID) ? "selected='selected'" : "";
                                            ?>
                                            <option value="<?= $d->DeliveryType_ID; ?>" <?= $selected; ?>><?= $d->DeliveryType; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <label class="error" id="deliveryTypeError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Delivery type is required.</label>
                                    </div>
                                    <input type="hidden" name="sched_ID" value="<?= $info[0]->Schedule_ID; ?>">
                                </form>