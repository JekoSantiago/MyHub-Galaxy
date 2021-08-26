<div class="panel panel-flat table-responsive">
    <div class="panel-heading">
        <h5 class="panel-title text-semibold">Area Manager</h5>
    </div>
    <table id="tblam" class="table dataTable text-nowrap">
        <thead>
            <tr>
                <th>Area Manager</th>
                <th class="text-right">Deliveries Shipped</th>
                <th class="text-right">Deliveries Received</th>
                <th class="text-right">Deliveries Receiving Progress</th>
                <th class="text-right">Containers Shipped</th>
                <th class="text-right">Containers Received</th>
                <th class="text-right">Containers Receiving Progress</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($am as $a) :
            ?>
            <tr>
                <td><a href="#" id="am_<?= $a->AM_ID; ?>" onclick="getACTable(<?= $a->AM_ID; ?>, this.id); return false;"><?= $a->AM; ?></a></td>
                <td class="text-right"><?= number_format($a->TotalShipped); ?></td>
                <td class="text-right"><?= number_format($a->TotalReceived); ?></td>
                <td class="text-right">
                <?php if (($a->TotalReceived) !== 0) {
                    echo round($a->TotalReceived / $a->TotalShipped * 100);
                } else {
                    echo $a->TotalReceived;
                }
                ?>
                %</td>
                <td class="text-right"><?= number_format($a->ConShip); ?></td>
                <td class="text-right"><?= number_format($a->ConRec); ?></td>
                <td class="text-right">
                <?php if (($a->ConRec) !== 0) {
                    echo round($a->ConRec / $a->ConShip * 100);
                } else {
                    echo $a->ConRec;
                }
                ?>
                %</td>
            </tr>
            <?php   
            endforeach
            ?>
        </tbody>
    </table>
</div>