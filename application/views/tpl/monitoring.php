
<!--
<meta http-equiv="refresh" content="3" >
-->
<!-- <style>
	.dropdown-menu {
		overflow: overlay !important; 
		overflow-x: overlay !important; 
		overflow-y: overlay !important; 
	}    
	.dataTables_scrollBody {
		position: relative;
		width: 100%;
		overflow: initial !important;
		overflow-x: initial !important;
		overflow-y: initial !important;
		min-height: 0
	}
</style> -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/monitoring.js"></script>
<div class="col-lg-7">
    
    <div class="panel panel-flat">

        <div class="panel-body">
        <?php echo form_open('monitoring', array('id'=>'searchForm')); ?>
            <div class="col-md-2">
                <input type="text" class="form-control" name="dateFrom" id="dateFrom" placeholder="Date From">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="dateTo" id="dateTo" placeholder="Date To">
            </div>
            <div class="text-right">	
				<button type="submit" value="search" name="btnFilterSearch" class="btn bg-primary-600 btn-raised btn-xs">Search</button>
			</div>
        <?php echo form_close(); ?>
        </div>

        <div class="panel-heading">
		    <h5 class="panel-title text-semibold">Store</h5>
        </div>
        <div class="container-fluid">            
        </div>
        <table class="table monitoring_table_container">
            <thead>
				<tr>                    
					<th>Ship Date</th>
                    <th class="text-center">No. of Stores for Delivery</th>
                    <th class="text-center">Shipped by Warehouse</th>                    
                    <th class="text-center">Received by Store</th>                    
				</tr>
            </thead>
            <tbody>
            <?php foreach($store as $s) : ?>               
                <tr>                
                    <td> <?= $s->ShipDate; ?> (<?= $s->ShipDay; ?>) </td>
                    <td class="text-center"> <?= $s->Stores; ?> </td>
                    <td class="text-center"> <?= $s->Shipped; ?> (<?= number_format(($s->Shipped / $s->Stores) * 100, 2, '.',''); ?>%)</td>                    
                    <td class="text-center"> <?= $s->Received; ?> (<?= number_format(($s->Received / $s->Stores) * 100, 2, '.',''); ?>%) </td>                    
                </tr>
            <?php endforeach; ?>
        </table>


    
        <div class="panel-heading">
		    <h5 class="panel-title text-semibold">Container</h5>
        </div>
        <table class="table monitoring_table_container">
            <thead>
				<tr>                    
					<th>Ship Date</th>
                    <th class="text-center">No. of Container Shipped by Warehouse</th>
                    <th class="text-center">Total Received by Store</th>
				</tr>
            </thead>
            <tbody>
            <?php foreach($container as $c) : ?>  
                <tr>
                    <td> <?= $c->ShipDate; ?> (<?= $c->ShipDay; ?>) </td>
                    <td class="text-center"> <?= $c->TotalShipped; ?> </td>
                    <td class="text-center"> <?= $c->TotalRecQty; ?> (<?= number_format(($c->TotalShipped != 0 ? ($c->TotalRecQty / $c->TotalShipped) : 0) * 100, 2, '.',''); ?>%) </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<div class="col-lg-5">
    <div class="panel panel-flat">
        <div class="panel-heading">
		    <h5 class="panel-title text-semibold">Activity (Last 100)</h5>
        </div>
        <table id="activityTbl" class="table">
        </table>
    </div>
</div>
