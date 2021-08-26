<script type="text/javascript" src="<?= base_url(); ?>assets/js/monitoring.js"></script>
<div id="daily-monitoring" style="display: none;">
    <div class="col-lg-7">
        <div class="row">
            <form id="filter-form">
                <div class="col-md-12">
                    <div class="panel panel-flat border-top-xlg border-top-primary">
                        <div class="panel-body">
                            <div class="col-md-2">
                                <label>Date (From)</label>
                                <input type="text" class="form-control" name="dailyDF" id="dailyDF" placeholder="Date From" readonly>
                            </div>
                            <div class="col-md-2">
                                <label>Date (To)</label>
                                <input type="text" class="form-control" name="dailyDT" id="dailyDT" placeholder="Date To" readonly>
                            </div>
                            <div class="text-left" style="margin-top: 25px">
                                <button type="button" id="btnDateFilter" name="btnDateFilter" class="btn bg-primary-600 btn-icon btn-xs"><i class="icon-filter3 position-left"></i> Filter</button>
                                <button type="button" id="btnRefresh" name="btnRefresh" class="btn bg-primary-600 btn-icon btn-xs"><i class="icon-loop3"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div id="overall-panel"></div>
        </div>
        <div id="oa_tables">
            <div id="oa_tblone" style="display: none; "></div>
            <div id="overall-am" style="display: none;"></div>
            <div id="overall-ac" style="display: none;"></div>
            <div id="overall-stores" style="display: none;"></div>
            <div id="overall-deliver" style="display: none;"></div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="panel panel-flat border-top-xlg border-top-primary">
            <div class="panel-heading">
                <h5 class="panel-title text-semibold">User Activity</h5>
            </div>
            <table id="activityTbl" class="table">
            </table>
        </div>
    </div>
</div>

<!-- Modal delivery details -->
<div id="modal_details_report" class="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header bg-teal-600">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Report Details</h5>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <!-- <button type="button" id="btnExportDetails" class="btn bg-success-600 btn-raised btn-xs">Export</button> -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Batchh details -->
<div id="modal_batch_details" class="modal fade" data-keyboard="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-teal-600">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Batch Details</h5>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <!-- <button type="button" id="btnExportDetails" class="btn bg-success-600 btn-raised btn-xs">Export</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer -->
