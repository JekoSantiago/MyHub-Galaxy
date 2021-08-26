<div class="row">
	<div class="col-lg-6">
		<div class="form-group">
			<label class="text-semibold">Delivery Note :</label>
			<input type="text" disabled class="form-control" value="<?= $info->ControlNo; ?>">
			<input type="hidden" name="reportDeliver_ID" id="reportDeliver_ID" value="<?= $info->Deliver_ID; ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label class="text-semibold">Warehouse :</label>
			<input type="text" disabled class="form-control" value="<?= $info->DC; ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label class="text-semibold">[Store Code] Store Name :</label>
			<input type="text" disabled class="form-control" value="[<?= $info->LocationCode; ?>] <?= $info->Location; ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label class="text-semibold">Total # of container :</label>
			<input type="text" disabled class="form-control" value="<?= $info->TotalContainer; ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label class="text-semibold">Ship Date:</label>
			<input type="text" disabled class="form-control" value="<?= ($info->ShippedDate == null) ? '' : date('Y-m-d h:i A', strtotime($info->ShippedDate)); ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label class="text-semibold">Receive Date :</label>
			<input type="text" disabled class="form-control" value="<?= ($info->ReceivedDate == null) ? '' : date('Y-m-d h:i A', strtotime($info->ReceivedDate)); ?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 batch-container">

	<?php foreach($batch as $b) : ?>
		<div class="deliver-batches">
			<button name="btn-batch" id="btn-batch" class="btn btn-flat btn-rounded border-teal text-teal-600" data-toggle="modal" data-target="#modal_batch_details" data-bn="<?= $b->BatchNo; ?>">
				<i class="icon-stack3"></i> <span class="batch-text">BATCH</span> <?= $b->BatchNo; ?>
			</a>
		</div>
	<?php endforeach; ?>

	</div>
</div>
<div class="table-responsive">
	<table class="table" id="storeViewTbl">
		<thead>
			<tr>
				<th>#</th>
				<th>Barcode</th>
				<th>Type</th>
				<th>Color</th>
				<th class="text-center">Load Quantity</th>
				<th class="text-center">Receive Quantity</th>
				<th>Load Date</th>
				<th>Unload Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i       = 1;
			$red     = 0;
			$blue    = 0;
			$yellow  = 0;
			$box     = 0;
			$case    = 0;
			$allo   = 0;
			$fas    = 0;
			$saba = 0;
			$promo  = 0;
			$urgent = 0;
			$manual = 0;
			$receive = 0;
			foreach ($items as $row) :
				if ($row->Container_ID == 1) {
					$red++;
				}

				if ($row->Container_ID == 2) {
					$blue++;
				}

				if ($row->Container_ID == 3) {
					$yellow++;
				}

				if ($row->Container_ID == 4) {
					$box++;
				}

				if ($row->Container_ID == 5) {
					$case = $case + $row->Total;
				}

				if ($row->Container_ID == 6) :
					$allo = $allo + $row->Total;
				endif;

				if ($row->Container_ID == 7) :
					$fas = $fas + $row->Total;
				endif;

				if ($row->Container_ID == 8) :
					$promo = $promo + $row->Total;
				endif;

				if ($row->Container_ID == 9) :
					$saba = $saba + $row->Total;
				endif;

				if ($row->Container_ID == 10) :
					$urgent++;
				endif;

				if ($row->Container_ID == 11) :
					$manual++;
				endif;

				if ($row->RecQty >= $row->Total) {
					$receive = $receive + $row->Total;
				}
			?>
				<tr>
					<td><?= $i; ?></td>
					<td><?= $row->Barcode; ?></td>
					<td><?= $row->ContainerType; ?></td>
					<td><?= $row->ContainerColor; ?></td>
					<td class="text-center"><?= $row->Total; ?></td>
					<td class="text-center"><?= $row->RecQty; ?></td>
					<td><?= ($row->Loaded == '') ? '' : date('Y-m-d h:i A', strtotime($row->Loaded)); ?></td>
					<td><?= ($row->Unloaded == '') ? '' : date('Y-m-d h:i A', strtotime($row->Unloaded)); ?></td>
				</tr>
			<?php
				$i++;
			endforeach;
			?>
		</tbody>
	</table>
</div>
<div class="table-responsive">
	<table class="table">
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
				if ($info->DC_ID == 2) :
				?>
					<td colspan="1">Box : <?= $box; ?></td>
					<td colspan="1">Allocation : <?= $allo; ?></td>
					<td colspan="1">FAS : <?= $fas; ?></td>
					<td colspan="1">Promo : <?= $promo; ?></td>
					<td colspan="1">Saba : <?= $saba; ?></td>
					<td colspan="2">&nbsp;</td>
					<td colspan="2">&nbsp;</td>
					<td colspan="1">&nbsp;</td>
				<?php
				else :
				?>
					<td colspan="1">Allocation : <?= $allo; ?></td>
					<td colspan="1">FAS : <?= $fas; ?></td>
					<td colspan="1">Promo : <?= $promo; ?></td>
					<td colspan="1">Saba : <?= $saba; ?></td>
					<td colspan="2">&nbsp;</td>
					<td colspan="2">&nbsp;</td>
					<td colspan="2">&nbsp;</td>
				<?php
				endif;
				?>
			</tr>

			<!-- <tr>
					<td>Container Red : <?= $red; ?></td>
					<td>Container Blue : <?= $blue; ?></td>
				</tr>
				<tr>
					<td>Container Yellow : <?= $yellow; ?></td>
					<td>Case : <?= $case; ?></td>
				</tr>
				<?php
				if ($info->DC_ID == 2) :
				?>
				<tr>
					<td>Box : <?= $box; ?></td>
					<td>&nbsp;</td>
				</tr>
				<?php
				endif;
				?> -->
			<tr>
				<td colspan="3">Ship Count : <?= $info->TotalContainer; ?></td>
				<td colspan="3">Receive Count : <?= $receive; ?></td>
				<td colspan="6">&nbsp;</td>
			</tr>
		</tbody>
	</table>
</div>
