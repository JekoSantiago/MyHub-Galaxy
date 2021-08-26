<div class="panel panel-flat table-responsive">
    <div class="panel-heading">
        <h5 class="panel-title text-semibold">Branch</h5>
    </div>
    <table id="tblbranch" class="table dataTable text-nowrap">
        <thead>
            <tr>
                <th>Branch</th>
                <th class="text-right">Deliveries Shipped</th>
                <th class="text-right">Deliveries Received</th>
                <th class="text-right">Containers Shipped</th>
                <th class="text-right">Containers Received</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($branch as $b) :
            ?>
            <tr>
                <td><a href="#" id="dc_<?= $b->DC_ID; ?>" onclick="getAMTable(<?= $b->DC_ID; ?>, this.id); return false;"><?= $b->DC; ?></a></td>
                <td class="text-right"><?= number_format($b->TotalShipped); ?></td>
                <td class="text-right">
                <?php if (($b->TotalShipped) !== 0) {
                    echo (number_format($b->TotalReceived) . ' ('  .  round($b->TotalReceived / $b->TotalShipped * 100) . '%) ');
                } else {
                    echo number_format($b->TotalReceived);
                }
                ?>
                </td>
                <td class="text-right"><?= number_format($b->ConShip); ?></td>
                <td class="text-right">
                <?php
                 if (($b->ConShip) !== 0) {
                    echo (number_format($b->ConRec) . ' ('  .  round($b->ConRec / $b->ConShip * 100) . '%) ');
                } else {
                    echo number_format($b->ConRec);
                }
                ?></td>
            </tr>
            <?php   
            endforeach
            ?>
        </tbody>
    </table>
</div>