<div class="panel panel-flat table-responsive">
    <div class="panel-heading">
        <h5 class="panel-title text-semibold">Branch</h5>
    </div>
    <table id="tblbranch" class="table dataTable text-nowrap">
        <thead>
            <tr>
                <th></th>
                <th colspan="2" class="text-center" style="border: 1px solid #cdd0d4;">Deliveries</th>
                <th colspan="2" class="text-center" style="border: 1px solid #cdd0d4;">Containers</th>
            </tr>
            <tr>
                <th style="border-right: 1px solid #cdd0d4;">Branch</th>
                <th class="text-center">Shipped</th>
                <th class="text-center" style="border-right: 1px solid #cdd0d4;">Received</th>
                <th class="text-center">Shipped</th>
                <th class="text-center">Received</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($branch as $b) :
            ?>
            <tr>
                <td style="border-right: 1px solid #cdd0d4;"><a href="#" id="dc_<?= $b->DC_ID; ?>" onclick="getAMTable(<?= $b->DC_ID; ?>, this.id); return false;"><?= $b->DC; ?></a></td>
                <td class="text-center"><?= ($b->TotalShipped == 0) ? '-' : number_format($b->TotalShipped); ?></td>
                <td class="text-center" style="border-right: 1px solid #cdd0d4;">
                <?php if (($b->TotalShipped) !== 0) {
                    echo (number_format($b->TotalReceived) . ' ('  .  round($b->TotalReceived / $b->TotalShipped * 100) . '%) ');
                } else {
                    if($b->TotalShipped == 0){echo '-';}
                    else {echo number_format($b->TotalReceived) . '%';}
                }
                ?>
                </td>
                <td class="text-center"><?= ($b->ConShip == 0) ? '-' : number_format($b->ConShip); ?></td>
                <td class="text-center">
                <?php
                 if (($b->ConShip) !== 0) {
                    echo (number_format($b->ConRec) . ' ('  .  round($b->ConRec / $b->ConShip * 100) . '%) ');
                } else {
                    if($b->ConShip == 0) {echo '-';}
                    else {echo number_format($b->ConRec) . '%';}
                }
                ?></td>
            </tr>
            <?php   
            endforeach
            ?>
        </tbody>
    </table>
</div>