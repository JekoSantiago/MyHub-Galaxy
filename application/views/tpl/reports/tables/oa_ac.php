<div class="panel panel-flat table-responsive">
    <div class="panel-heading">
        <h5 class="panel-title text-semibold">Area Coordinator</h5>
    </div>
    <table id="tblac" class="table dataTable text-nowrap">
        <thead>
            <tr>
                <th></th>
                <th colspan="3" class="text-center" style="border: 1px solid #cdd0d4;">Deliveries</th>
                <th colspan="3" class="text-center" style="border: 1px solid #cdd0d4;">Containers</th>
            </tr>
            <tr>
                <th style="border-right: 1px solid #cdd0d4;">Area Coordinator</th>
                <th class="text-center">Shipped</th>
                <th class="text-center">Received</th>
                <th class="text-center" style="border-right: 1px solid #cdd0d4;">Progress</th>
                <th class="text-center">Shipped</th>
                <th class="text-center">Received</th>
                <th class="text-center">Progress</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($ac as $a) :
            ?>
            <tr>
                <td style="border-right: 1px solid #cdd0d4;"><a href="#" id="ac_<?= $a->AC_ID; ?>" onclick="getStoresTable(<?= $a->AC_ID; ?>, this.id); return false;"><?= $a->AC; ?></a></td>
                <td class="text-center"><?= ($a->TotalShipped == 0) ? '-' : number_format($a->TotalShipped); ?></td>
                <td class="text-center"><?= ($a->TotalReceived == 0) ? '-' : number_format($a->TotalReceived); ?></td>
                <td class="text-center" style="border-right: 1px solid #cdd0d4;">
                <?php if (($a->TotalReceived) !== 0) {
                    echo round($a->TotalReceived / $a->TotalShipped * 100) . '%';
                } else {
                    if($a->TotalShipped == 0){echo '-';}
                    else {echo $a->TotalReceived . '%';}
                }
                ?>
                </td>
                <td class="text-center"><?= ($a->ConShip == 0) ? '-' : number_format($a->ConShip); ?></td>
                <td class="text-center"><?= ($a->ConRec == 0) ? '-' : number_format($a->ConRec); ?></td>
                <td class="text-center">
                <?php if (($a->ConRec) !== 0) {
                    echo round($a->ConRec / $a->ConShip * 100) . '%';
                } else {
                    if($a->ConShip == 0){echo '-';}
                    else {echo $a->ConRec . '%';}
                }
                ?>
                </td>
            </tr>
            <?php   
            endforeach
            ?>
        </tbody>
    </table>
</div>