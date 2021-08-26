<script type="text/javascript" src="<?= base_url(); ?>assets/js/panelspark.js"></script>
<?php if ($pickvw == 1)
        {
            echo ('<div class="col-lg-4">
            <div class="panel bg-warning-400">
                <div class="panel-body">
                    <h3 class="no-margin">'. number_format($oa[0]->TotalPicked) . '</h3>
                    Deliveries Picked
                    <h3 class="no-margin">' . number_format($oa[0]->ConPicked) . '</h3>
                    Containers Picked
                </div>
                <div id="overall-picked"></div>
            </div>
            </div>');
            $psize = 'col-lg-4';
        }
      else
        {
            $psize = 'col-lg-6';
        }  
        
?>

<div class="<?php echo $psize?>">
    <div class="panel bg-primary-400">
        <div class="panel-body">
            <h3 class="no-margin"><?= number_format($oa[0]->TotalShipped); ?></h3>
            Deliveries Shipped
            <br>
            <h3 class="no-margin"><?= number_format($oa[0]->ConShipped); ?></h3>
            Containers Shipped
        </div>
        <div id="overall-shipped"></div>
    </div>
</div>
<div class="<?php echo $psize?>">
    <div class="panel bg-green-400">
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
            <br>
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
        <div id="overall-received"></div>
    </div>
</div>
<!-- <div class="col-lg-3">
    <div class="panel bg-teal-400">
        <div class="panel-body">
            <h3 class="no-margin"><?= number_format($oa[0]->ConShipped); ?></h3>
            Containers Shipped
        </div>
        <div id="overall-conship"></div>
    </div>
</div> -->
<!-- <div class="col-lg-3">
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
</div> -->