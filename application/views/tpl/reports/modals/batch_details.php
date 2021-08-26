<div class="row">
    <div class="col-md-6">
        <div class="form-group has-feedback has-feedback-left">
            <input type="text" class="form-control input-sm" value="<?= $batch[0]->TruckNo; ?>" disabled>
            <div class="form-control-feedback">
                <i class="icon-truck"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6">
    <div class="form-group has-feedback has-feedback-left">
            <input type="text" class="form-control input-sm" value="<?= $batch[0]->DriverName; ?>" disabled>
            <div class="form-control-feedback">
                <i class="icon-user"></i>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <td>Barcode</td>
                <td>Container</td>
                <td>Quantity</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $row) : ?>
                <tr>
                    <td><?= $row->Barcode; ?></td>
                    <td><?= $row->Container; ?></td>
                    <td><?= $row->Total; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>