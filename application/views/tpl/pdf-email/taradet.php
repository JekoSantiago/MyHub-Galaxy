<style type="text/css">
.head  {border-collapse:collapse;border-spacing:0;}
.head td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:13px;
  overflow:hidden;padding:1px 2px;word-break:normal;}
.head th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:13px;
  font-weight:normal;overflow:hidden;padding:1px 2px;word-break:normal;}
.head .head-v6d6{border-color:#ffffff;font-size:small;text-align:left;vertical-align:top}
.head .head-i047{border-color:#ffffff;font-size:small;font-weight:bold;text-align:left;vertical-align:top}
.inlineTable {
      float:left;
        }
.spacing{border-color:#ffffff !important;border:none !important;}
#pagebreak{page-break-after: always}
       
</style>
<div>
    <table class="head">
    <thead>
    <tr>
        <th class="head-i047" colspan="2">LOGSHEET DELIVERY</th>
        <th class="head-i047"></th>
        <th class="head-i047"></th>
        <th class="head-i047"></th>
        <th class="head-i047"></th>
        <th class="head-v6d6"></th>
        <th class="head-i047"></th>
        <th class="head-i047"></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="head-i047">STORE CODE</td>
        <td class="head-i047"><?php echo $zone[0]['LocationCode'] ?></td>
        <td class="head-i047"></td>
        <td class="head-i047" colspan="2"><?php echo $zone[0]['Location'] ?></td>
        <td class="head-i047">(<?php echo $zone[0]['WHInitial'] ?>)</td>
        <td class="head-i047"></td>
        <td class="head-i047"colspan="2"> DELIVERY NOTE: &nbsp; <?php echo $zone[0]['ControlNo'] ?></td>
        <td class="head-i047"></td>
    </tr>
    <tr>
        <td class="head-i047">PickingDate</td>
        <td class="head-i047"><?php echo $color[0]['PickDate'] ?></td>
        <td class="head-i047"></td>
        <td class="head-i047">Picking No: <?php echo $zone[0]['PickSeq'] ?></td>
        <td class="head-i047"></td>
        <td class="head-v6d6"></td>
        <td class="head-v6d6"></td>
        <td class="head-i047" >Checker: </td>
        <td class="head-i047" ><?php echo $sign[0]->WHS ?></td>
    </tr>
    </tbody>
    </table>
    <br>
    <style type="text/css">
    .left  {border-spacing:0;}
    .left td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    overflow:hidden;padding:1px 3px;word-break:normal;}
    .left th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    font-weight:normal;overflow:hidden;padding:1px 3px;word-break:normal;}
    .left .left-yxfa{font-size:small;text-align:center;vertical-align:middle}
    .left .left-1l0q{font-size:small;text-align:center;vertical-align:top}
    .left .left-b08v{border-color:inherit;font-size:small;text-align:center;vertical-align:middle}
    .spacing{border-color:#ffffff !important;border:none !important;}
    </style>
    <table class="left inlineTable">
    <thead>
    <tr>
    <th class="left-b08v">No.</th>
        <th class="left-b08v" colspan="4">Container</th>
        <th class="left-b08v" colspan="10">Zone / Total DOS</th>
        <th class="left-b08v">WH</th>
        <th class="left-b08v">LD</th>
        <th class="left-b08v">OL</th>
        <th class="left-b08v">UL</th>
    </tr>
    </thead>
    <tbody>
        <?php
         $count = count($conts);
         $T1 = ($count>10) ? $count/2 : $count;
         ?>
        <?php  for($i=0;$i<=intval($T1-1);$i++):  ?>
    <tr>
        <td class="left-1l0q"><?php echo $i + 1;?></td>
        <td class="left-1l0q" colspan="4"><?php echo $conts[$i]['container'] ?> </td>
        <td class="left-1l0q" colspan="10"><?php echo $conts[$i]['zones'] ?> </td>
        <td class="left-1l0q"><?php echo ($conts[$i]['scannedQty']>0) ?  $conts[$i]['scannedQty'] : '-' ?> </td>
        <td class="left-1l0q"><?php echo ($conts[$i]['loadedQty']>0) ?  $conts[$i]['loadedQty'] : '-' ?> </td>
        <td class="left-1l0q"><?php echo ($conts[$i]['offloadedQty']>0) ?  $conts[$i]['offloadedQty'] : '-' ?> </td>
        <td class="left-1l0q"><?php echo ($conts[$i]['unloadedQty']>0) ?  $conts[$i]['unloadedQty'] : '-' ?> </td>
        <td class="spacing"></td>
        <td class="spacing"></td>
        <td class="spacing"></td>

    </tr> 
        
        <?php endfor;?>
    </tbody>
    </table>

    <table class="left inlineTable">
    <thead>
    <tr>
    <th class="left-b08v">No.</th>
        <th class="left-b08v" colspan="4">Container</th>
        <th class="left-b08v" colspan="10">Zone / Total DOS</th>
        <th class="left-b08v">WH</th>
        <th class="left-b08v">LD</th>
        <th class="left-b08v">OL</th>
        <th class="left-b08v">UL</th>
    </tr>
    </thead>
    <tbody>
        <?php  for($i=intval($T1);$i<=$count-1;$i++):  ?>
    <tr>
        <td class="left-1l0q"><?php echo $i + 1;?></td>
        <td class="left-1l0q" colspan="4"><?php echo $conts[$i]['container'] ?> </td>
        <td class="left-1l0q" colspan="10"><?php echo $conts[$i]['zones'] ?> </td>
        <td class="left-1l0q"><?php echo ($conts[$i]['scannedQty']>0) ?  $conts[$i]['scannedQty'] : '-' ?> </td>
        <td class="left-1l0q"><?php echo ($conts[$i]['loadedQty']>0) ?  $conts[$i]['loadedQty'] : '-' ?> </td>
        <td class="left-1l0q"><?php echo ($conts[$i]['offloadedQty']>0) ?  $conts[$i]['offloadedQty'] : '-' ?> </td>
        <td class="left-1l0q"><?php echo ($conts[$i]['unloadedQty']>0) ?  $conts[$i]['unloadedQty'] : '-' ?> </td>
    </tr> 
        <?php endfor;?>
    </tbody>
    </table>


    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;}
        .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
        overflow:hidden;padding:2px 3px;word-break:normal;}
        .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
        font-weight:normal;overflow:hidden;padding:2px 3px;word-break:normal;}
        .tg .tg-0r18{border-color:inherit;font-size:14px;text-align:center;vertical-align:top}
        .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
        .footer {
            position: fixed;
            left: 10;
            bottom: 60;
            width: 100%;
            text-align: center;
            }
    </style>
    <div class="footer">
        <table class="tg">
        <thead>
        <tr>
            <th class="tg-0r18" colspan="20">Checked By:</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="tg-0r18" colspan="5">WAREHOUSE</td>
            <td class="tg-0r18" colspan="5">ISSUING</td>
            <td class="tg-0r18" colspan="5">DRIVER</td>
            <td class="tg-0r18" colspan="5">STORE P.I.C.</td>
        </tr>
        <tr>
            <td class="tg-c3ow" colspan="5"><?php echo $sign[0]->WHS ?><br></td>
            <td class="tg-c3ow" colspan="5"><?php echo $sign[0]->ISG ?><br></td>
            <td class="tg-c3ow" colspan="5"><?php echo $sign[0]->DRV ?><br></td>
            <td class="tg-c3ow" colspan="5"><?php echo $sign[0]->STORE_PIC ?><br></td>
        </tr>
        </tbody>
        </table>
    </div>

</div>
