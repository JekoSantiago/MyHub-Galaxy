<script type="text/javascript" src="<?= base_url(); ?>assets/js/manual.js"></script>
<div class="panel panel-flat">
    <div class="datatable-header">
        <div class="dataTables_Title">
            <div class="total-selected text-muted">No records selected</div>
            <button type="button" id="btnRec" name="btnRec" class="btn bg-primary-600 btn-raised btn-xs" disabled><i class="icon-arrow-down16 position-left"></i> Receive</button>
        </div>
        <div class="dataTables_Filter">
            <div class="total-records text-muted"></div>
            <button id="btnRefresh" name="btnRefresh" type="button" class="btn bg-primary-600 btn-raised btn-xs legitRipple" disabled>
                Clear filters</button>
            <button data-toggle="modal" data-target="#filter_modal" type="button" value="search" id="btnModalF" name="btnModalF" class="btn bg-primary-600 btn-raised btn-xs"><i class="icon-filter3 position-left"></i> Filter</button>
        </div>
    </div>
    <table id="manualTbl" class="table">
        <thead>
            <th><input type="checkbox" id="selectall" name="selectall"></th>
            <th>Delivery Note</th>
            <th>[Store Code] Store Name</th>
            <th>Total Containers</th>
            <th>Shipped Date</th>
        </thead>
    </table>
</div>

<div id="cover-spin" class="cover-spin"></div>

<div id="filter_modal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h5 class="modal-title">Filters</h5>
            </div>
            <div class="modal-body">
                <form action="post" id="po_filter">
                    <div class="form-group">
                        <label>Control Number</label>
                        <input type="text" class="form-control" name="controlNum" id="controlNum" placeholder="Control number...">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Data Center</label>
                                <select name="dc" id="dc" data-placeholder="Select DC" class="select-search">
                                    <option></option>
                                    <?php
                                    foreach ($dcOptions as $i) :
                                    ?>
                                        <option value="<?= $i->Location_ID; ?>"><?= $i->Location; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Store</label>
                                <select name="locationID" id="locationID" data-placeholder="Select Store" class="select-search">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ship Date (From)</label>
                                <input type="text" class="form-control" name="shipdateFrom" id="shipdateFrom" placeholder="Shipped Date from..." readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ship Date (To)</label>
                                <input type="text" class="form-control" name="shipdateTo" id="shipdateTo" placeholder="Shipped Date to..." readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="checkbox">
                                <label>
                                    <input id="isOff" name="isOff" type="checkbox">
                                    With offload
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" value="search" id="btnFilterSearch" data-dismiss="modal" name="btnFilterSearch" class="btn bg-primary-600 btn-raised btn-xs"></i> Apply</button>
            </div>
        </div>
    </div>
</div>




<!-- Hidden -->
<div class="col-md-2" style="display: none">
    <select name="ac" id="ac" data-placeholder="Select AC" class="select-search">
        <option></option>
        <?php
        foreach ($rowAC as $ac) :
        ?>
            <option value="<?= $ac->AC_ID; ?>"><?= $ac->AC; ?></option>
        <?php
        endforeach;
        ?>
    </select>
</div>
<div class="col-md-2" style="display: none">
    <select name="am" id="am" data-placeholder="Select AM" class="select-search"></select>
</div>