<div class="row">
    <div class="col-md-12">
        <form id="remarksForm">
            <div class="form-group">
                <label class="text-semibold">REMARKS:</label>
                <textarea type="text" class="form-control" name="dd_remarks" id="dd_remarks" autofocus><?= $info[0]->Remarks; ?></textarea>
                <input type="hidden" name="del_ID" id="del_ID" value="<?= $info[0]->Deliver_ID; ?>">
                <input type="hidden" name="dd_ID" id="dd_ID" value="<?= $info[0]->DeliverDetail_ID; ?>">
            </div>
        </form>
    </div>
</div>