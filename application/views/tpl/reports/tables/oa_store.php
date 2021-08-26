<script>
    $(function() {
        // Basic branch datatable
        $('.dataTable-branch').DataTable({
            "bSort": false,
            "ordering": true
        });
    
        $('.dataTables_filter input[type=search]').attr('placeholder', 'Type to filter...');
    
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            width: 'auto'
        });
    })
        
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-semibold">Store</h5>
    </div>
    <table id="tblstore" class="table dataTable-branch">
        <thead>
            <tr>
                <th></th>
                <th colspan="3" class="text-center" style="border: 1px solid #cdd0d4;">Deliveries</th>
                <th colspan="3" class="text-center" style="border: 1px solid #cdd0d4;">Containers</th>
            </tr>
            <tr>
                <th style="border-right: 1px solid #cdd0d4;">Store</th>
                <th class="text-center" >Shipped</th>
                <th class="text-center">Received</th>
                <th class="text-center" style="border-right: 1px solid #cdd0d4;">Progress</th>
                <th class="text-center">Shipped</th>
                <th class="text-center">Received</th>
                <th class="text-center">Progress</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($store as $s) :
            ?>
            <tr>
                <td style="border-right: 1px solid #cdd0d4;"><a href="#" id="loc_<?= $s->Location_ID; ?>" onclick="getDeliverTable(<?= $s->Location_ID; ?>, this.id); return false;">[<?= $s->LocationCode; ?>] <?= $s->Location; ?></a></td>
                <td class="text-center"><?= ($s->TotalShipped == 0) ? '-' : number_format($s->TotalShipped); ?></td>
                <td class="text-center"><?= ($s->TotalReceived == 0) ? '-' : number_format($s->TotalReceived); ?></td>
                <td class="text-center" style="border-right: 1px solid #cdd0d4;">
                <?php if (($s->TotalReceived) !== 0) {
                    echo round($s->TotalReceived / $s->TotalShipped * 100) . '%';
                } else {
                    if($s->TotalShipped == 0) { echo '-';}
                    else {echo $s->TotalReceived . '%';}
                }
                ?>
                </td>
                <td class="text-center"><?= ($s->ConShip == 0) ? '-' : number_format($s->ConShip); ?></td>
                <td class="text-center"><?= ($s->ConRec == 0) ? '-' : number_format($s->ConRec); ?></td>
                <td class="text-center">
                <?php if (($s->ConRec) !== 0) {
                    echo round($s->ConRec / $s->ConShip * 100) . '%';
                } else {
                    if($s->ConShip == 0){echo '-';}
                    else {echo $s->ConRec .'%';}
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