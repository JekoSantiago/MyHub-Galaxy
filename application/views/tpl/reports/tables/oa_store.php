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
                <th>Store</th>
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
            foreach($store as $s) :
            ?>
            <tr>
                <td><a href="#" id="loc_<?= $s->Location_ID; ?>" onclick="getDeliverTable(<?= $s->Location_ID; ?>, this.id); return false;">[<?= $s->LocationCode; ?>] <?= $s->Location; ?></a></td>
                <td class="text-right"><?= number_format($s->TotalShipped); ?></td>
                <td class="text-right"><?= number_format($s->TotalReceived); ?></td>
                <td class="text-right">
                <?php if (($s->TotalReceived) !== 0) {
                    echo round($s->TotalReceived / $s->TotalShipped * 100);
                } else {
                    echo $s->TotalReceived;
                }
                ?>
                %</td>
                <td class="text-right"><?= number_format($s->ConShip); ?></td>
                <td class="text-right"><?= number_format($s->ConRec); ?></td>
                <td class="text-right">
                <?php if (($s->ConRec) !== 0) {
                    echo round($s->ConRec / $s->ConShip * 100);
                } else {
                    echo $s->ConRec;
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