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
        <td class="left-1l0q"><?php echo ($conts[$i]['scannedQty']>0) ?  $conts[$i]['scannedQty'] : '' ?> </td>
        <td class="left-1l0q"><?php echo ($conts[$i]['loadedQty']>0) ?  $conts[$i]['loadedQty'] : '' ?> </td>
        <td class="left-1l0q"><?php echo ($conts[$i]['offloadedQty']>0) ?  $conts[$i]['offloadedQty'] : '' ?> </td>
        <td class="left-1l0q"><?php echo ($conts[$i]['unloadedQty']>0) ?  $conts[$i]['unloadedQty'] : '' ?> </td>
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
        <td class="left-1l0q"><?php echo ($conts[$i]['scannedQty']>0) ?  $conts[$i]['scannedQty'] : '' ?> </td>
        <td class="left-1l0q"><?php echo ($conts[$i]['loadedQty']>0) ?  $conts[$i]['loadedQty'] : '' ?> </td>
        <td class="left-1l0q"><?php echo ($conts[$i]['offloadedQty']>0) ?  $conts[$i]['offloadedQty'] : '' ?> </td>
        <td class="left-1l0q"><?php echo ($conts[$i]['unloadedQty']>0) ?  $conts[$i]['unloadedQty'] : '' ?> </td>
    </tr> 
        
        <?php endfor;?>
    </tbody>
    </table>
</div>
<div style="clear: both;"></div>
<div id='pagebreak'></div>
<div>
    <style type="text/css">
    .tg  {border-spacing:0;}
    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    overflow:hidden;padding:1px 6px;word-break:normal;}
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    font-weight:normal;overflow:hidden;padding:1px 6px;word-break:normal;}
    .tg .tg-teil{font-size:small;text-align:left;vertical-align:middle}
    .tg .tg-qstx{font-size:small;text-align:center;vertical-align:middle}
    </style>
    <table class="tg inlineTable">
    <thead>
    <tr>
        <th class="tg-teil">No.</th>
        <th class="tg-teil" colspan="14">Description</th>
        <th class="tg-teil">WH</th>
        <th class="tg-teil">LD</th>
        <th class="tg-teil">OL</th>
        <th class="tg-teil">UL</th>
    </tr>
    </thead>
    <tbody>
        <?php
            $count2 = count($zone);
            $T2 = ($count2>10) ? $count2/2 : $count2;
        ?>
        <?php  for($i=0;$i<=intval($T2-1);$i++):  ?>
            <tr>
                <td class="tg-qstx"><?php echo $i + 1;?></td>
                <td class="tg-teil" colspan="14"><?php echo $zone[$i]['Zone'] ?></td>
                <td class="tg-qstx">
                    <?php
                        $WH = $zone[$i]['WHCQty'] + $zone[$i]['WHBQty'];
                        echo ($WH>0) ? $WH : '';
                    ?>
                </td>
                <td class="tg-qstx">
                <?php
                        $LD = $zone[$i]['LDCQty'] + $zone[$i]['LDBQty'];
                        echo ($LD>0) ? $LD : '';
                    ?>
                </td>
                <td class="tg-qstx">
                <?php
                        $OL = $zone[$i]['OLCQty'] + $zone[$i]['OLBQty'];
                        echo ($OL>0) ? $OL : '';
                    ?>
                </td>
                <td class="tg-qstx">
                <?php
                        $UL = $zone[$i]['ULCQty'] + $zone[$i]['ULBQty'];
                        echo ($UL>0) ? $UL : '';
                    ?>
                </td>
                <td class="spacing"></td>
                <td class="spacing"></td>
                <td class="spacing"></td>
            </tr>
        <?php endfor;?>
    </tbody>
    </table>
    <table class="tg inlineTable">
    <thead>
    <tr>
        <th class="tg-teil">No.</th>
        <th class="tg-teil" colspan="14">Description</th>
        <th class="tg-teil">WH</th>
        <th class="tg-teil">LD</th>
        <th class="tg-teil">OL</th>
        <th class="tg-teil">UL</th>
    </tr>
    </thead>
    <tbody>
        <?php  for($i=intval($T2);$i<=$count2-1;$i++):  ?>
            <tr>
                <td class="tg-qstx"><?php echo $i + 1;?></td>
                <td class="tg-teil" colspan="14"><?php echo $zone[$i]['Zone'] ?></td>
                <td class="tg-qstx">
                    <?php
                        $WH = $zone[$i]['WHCQty'] + $zone[$i]['WHBQty'];
                        echo ($WH>0) ? $WH : '';
                    ?>
                </td>
                <td class="tg-qstx">
                <?php
                        $LD = $zone[$i]['LDCQty'] + $zone[$i]['LDBQty'];
                        echo ($LD>0) ? $LD : '';
                    ?>
                </td>
                <td class="tg-qstx">
                <?php
                        $OL = $zone[$i]['OLCQty'] + $zone[$i]['OLBQty'];
                        echo ($OL>0) ? $OL : '';
                    ?>
                </td>
                <td class="tg-qstx">
                <?php
                        $UL = $zone[$i]['ULCQty'] + $zone[$i]['ULBQty'];
                        echo ($UL>0) ? $UL : '';
                    ?>
                </td>
            </tr>
        <?php endfor;?>
    </tbody>
    </table>
</div>