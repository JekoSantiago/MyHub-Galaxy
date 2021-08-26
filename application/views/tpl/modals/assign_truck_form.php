<div class="row">
	<div class="col-md-12">
		<form id="assignTruckForm">
            <div class="form-group">
                <label class="text-semibold">TRUCK NUMBER :</label>
                <select class="select" name="truck_ID" id="truck_ID">
                    <option value="">Select truck...</option>
                    <?php foreach($trucks as $r) : ?>
                    <option value="<?= $r->Truck_ID; ?>"><?= $r->TruckNo; ?></option>
                    <?php endforeach; ?>
                </select>
                <label class="error" id="truckNumError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Truck no. is required.</label>
            </div>
            <div class="form-group">
                <label class="text-semibold">DRIVER NAME :</label>
                <select class="select" name="driverName" id="driverName">
                    <option value="">Select driver...</option>
                    <?php foreach($drivers as $d) : ?>
                    <option value="<?= $d->Driver_ID; ?>"><?= $d->DriverName .'-'. $d->LicenseNo; ?></option>
                    <?php endforeach; ?>
                </select>
                <label class="error" id="driverNameError" style="margin-top: 7px; color: red; font-size: 11px; font-style: italic; display: none;">* Driver is required.</label>
            </div>
			<input type="hidden" name="del_ID" id="del_ID" value="">
            <input type="hidden" name="location_ID" id="location_ID" value="">
            <input type="hidden" name="totalContainer" id="totalContainer" value="">
            <input type="hidden" name="totalScan" id="totalScan" value="">
		</form>
    </div>
</div>