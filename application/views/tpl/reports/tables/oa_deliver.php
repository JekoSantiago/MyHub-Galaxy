<script>
    $(function() {
        // Basic deliver datatable
        $('.dataTable-deliver').DataTable({
            "bSort": false,
            "ordering": true,
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
        <h5 class="panel-title text-semibold">Delivery Notes</h5>
    </div>
    <table id="tbldeliver" class="table dataTable-deliver">
        <thead>
            <tr>
                <th>Delivery Note</th>
                <th>Shipped Date</th>
                <th class="text-center">Containers Shipped</th>
                <th class="text-center">Containers Received</th>
		        <th>Received Date</th>
		        <th>Remarks</th>
                <th class="text-center">Receiving  Progress</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($deliver as $d) :
            ?>
                <td><a data-toggle='modal' data-target='#modal_details_report' data-rowid='<?= $d->Deliver_ID; ?>' data-popup='tooltip' title='View' data-placement='center'><?= $d->ControlNo; ?></a></td>
                <td><?= $d->ShippedDate; ?></td>
                <td class="text-center"><?= number_format($d->ConShip); ?></td>
                <td class="text-center"><?= number_format($d->ConRec); ?></td>
		        <td><?= $d->ReceivedDate; ?></td>
		        <td><?= $d->Remarks; ?></td>
                <td class="text-center">
                <?php if (($d->ConRec) !== 0) {
                    echo round($d->ConRec / $d->ConShip * 100);
                } else {
                    echo $d->ConRec;
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