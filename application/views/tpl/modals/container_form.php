<div class="row">
	<div class="col-md-12">
		<form id="barcodeForm">
			<div class="form-group">
				<label class="text-semibold">SELECT CONTAINER :</label>
				<select name="containerCode" id="containerCode" class="select">
					<option></option>
					<?php foreach($containers as $row) :?>
					<option value="<?= $row->Container_ID; ?>"><?= strtoupper($row->Container); ?></option>
					<?php endforeach; ?>
				</select>
                <input type="hidden" name="del_ID" id="del_ID" value="">
				<input type="hidden" name="barcodeNum" id="barcodeNum" value="">
				<input type="hidden" name="totalContainer" id="totalContainer" value="">
			</div>
		</form>
    </div>
</div>