<script type="text/javascript" src="<?= base_url(); ?>assets/js/panelspark.js"></script>
<div class="col-lg-3">
    <!-- Members online -->
    <div class="panel bg-primary-400">
        <div class="panel-body">
            <h3 class="no-margin"><?= number_format($oa[0]->TotalShipped); ?></h3>
            Deliveries Shipped
        </div>
        <div id="overall-shipped"></div>
    </div>
    <!-- /members online -->

</div>
<div class="col-lg-3">
    <!-- Current server load -->
    <div class="panel bg-pink-400">
        <div class="panel-body">
            <h3 class="no-margin">
            <?php if (($oa[0]->TotalShipped) !== 0) {
                    echo (number_format($oa[0]->TotalReceived) . ' ('  .  round($oa[0]->TotalReceived / $oa[0]->TotalShipped * 100) . '%) ');
                } else {
                    echo number_format($oa[0]->TotalReceived);
                }
                ?>
            </h3>
            Deliveries Received
        </div>
        <div id="overall-received"></div>
    </div>
    <!-- /current server load -->
</div>
<div class="col-lg-3">
    <!-- Current server load -->
    <div class="panel bg-teal-400">
        <div class="panel-body">
            <h3 class="no-margin"><?= number_format($oa[0]->ConShipped); ?></h3>
            Containers Shipped
        </div>
        <div id="overall-conship"></div>
    </div>
    <!-- /current server load -->
</div>
<div class="col-lg-3">
    <!-- Current server load -->
    <div class="panel bg-orange-400">
        <div class="panel-body">
            <h3 class="no-margin">
            <?php
             if (($oa[0]->ConShipped) !== 0) {
                echo (number_format($oa[0]->ConReceived) . ' ('  .  round($oa[0]->ConReceived / $oa[0]->ConShipped * 100) . '%) ');
            } else {
                 echo number_format($oa[0]->ConReceived);
            } 
            ?></h3>
            Containers Received
        </div>
        <div id="overall-conrec"></div>
    </div>
    <!-- /current server load -->
</div>