<style type="text/css">
.tg  {border-spacing:1;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:1px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:1px 3px;word-break:normal;}
.tg .tg-78ff{border-color:inherit;font-size:xx-small;text-align:center;vertical-align:top}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
#pagebreak{page-break-after: always}

</style>
<table class="tg" border="1" cellspacing=0>
<tbody>
    <tr>
    <td class="tg-78ff" colspan="9">ALFAMART TRADING PHILS</td>
    <td class="tg-78ff">CONTAINER</td>
    <td class="tg-78ff" colspan="2">WAREHOUSE</td>
    <td class="tg-78ff" colspan="2">LOADING</td>
    <td class="tg-78ff" colspan="2">OFFLOADING<br></td>
    <td class="tg-78ff" colspan="2">UNLOADING</td>
  </tr>
  <tr>
    <td class="tg-78ff" colspan="9">DC MEXICO</td>
    <td class="tg-78ff">RED</td>
    <td class="tg-78ff" colspan="2">
    <?php  
                   foreach ($color as $key => $val) {
                    if ($val['ContainerColor'] === 'Red') {
                        echo ($color[$key]['WH'] > 0) ? $color[$key]['WH'] :'';
                    }
                } 
    ?>
    </td>
    <td class="tg-78ff" colspan="2">
    <?php  
                   foreach ($color as $key => $val) {
                    if ($val['ContainerColor'] === 'Red') {
                        echo ($color[$key]['LD'] > 0) ? $color[$key]['LD'] :'';
                    }
                } 
    ?>
    </td>
    <td class="tg-78ff" colspan="2">
    <?php  
                   foreach ($color as $key => $val) {
                    if ($val['ContainerColor'] === 'Red') {
                        echo ($color[$key]['OL'] > 0) ? $color[$key]['OL'] :'';
                    }
                } 
    ?>
    </td>
    <td class="tg-78ff" colspan="2">
    <?php  
                   foreach ($color as $key => $val) {
                    if ($val['ContainerColor'] === 'Red') {
                        echo ($color[$key]['UL'] > 0) ? $color[$key]['UL'] :'';
                    }
                } 
    ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff" colspan="9">DELIVERY LOGSHEET</td>
    <td class="tg-78ff">BLUE</td>
    <td class="tg-78ff" colspan="2">
    <?php  
                   foreach ($color as $key => $val) {
                    if ($val['ContainerColor'] === 'Blue') {
                        echo ($color[$key]['WH'] > 0) ? $color[$key]['WH'] :'';
                    }
                } 
    ?>
    </td>
    <td class="tg-78ff" colspan="2">
    <?php  
                   foreach ($color as $key => $val) {
                    if ($val['ContainerColor'] === 'Blue') {
                        echo ($color[$key]['LD'] > 0) ? $color[$key]['LD'] :'';
                    }
                } 
    ?>
    </td>
    <td class="tg-78ff" colspan="2">
    <?php  
                   foreach ($color as $key => $val) {
                    if ($val['ContainerColor'] === 'Blue') {
                        echo ($color[$key]['OL'] > 0) ? $color[$key]['OL'] :'';
                    }
                } 
    ?>
    </td>
    <td class="tg-78ff" colspan="2">
    <?php  
                   foreach ($color as $key => $val) {
                    if ($val['ContainerColor'] === 'Blue') {
                        echo ($color[$key]['UL'] > 0) ? $color[$key]['UL'] :'';
                    }
                } 
    ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">DATE</td>
    <td class="tg-78ff" colspan="2"><?php echo date('m / d / y'); ?></td>
    <td class="tg-78ff" colspan="2">SEQ</td>
    <td class="tg-78ff" colspan="4"><?php echo $zone[0]['PickSeq'] ?></td>
    <td class="tg-78ff">YELLOW</td>
    <td class="tg-78ff" colspan="2">
    <?php  
                   foreach ($color as $key => $val) {
                    if ($val['ContainerColor'] === 'Yellow') {
                        echo ($color[$key]['WH'] > 0) ? $color[$key]['WH'] :'';
                    }
                } 
    ?>
    </td>
    <td class="tg-78ff" colspan="2">
    <?php  
                   foreach ($color as $key => $val) {
                    if ($val['ContainerColor'] === 'Yellow') {
                        echo ($color[$key]['LD'] > 0) ? $color[$key]['LD'] :'';
                    }
                } 
    ?>
    </td>
    <td class="tg-78ff" colspan="2">
    <?php  
                   foreach ($color as $key => $val) {
                    if ($val['ContainerColor'] === 'Yellow') {
                        echo ($color[$key]['OL'] > 0) ? $color[$key]['OL'] :'';
                    }
                } 
    ?>
    </td>
    <td class="tg-78ff" colspan="2">
    <?php  
                   foreach ($color as $key => $val) {
                    if ($val['ContainerColor'] === 'Yellow') {
                        echo ($color[$key]['UL'] > 0) ? $color[$key]['UL'] :'';
                    }
                } 
    ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff" colspan="4">STORE CODE:</td>
    <td class="tg-78ff" colspan="5"><?php echo $zone[0]['LocationCode'] ?></td>
    <td class="tg-78ff">GRAY</td>
    <td class="tg-78ff" colspan="2"></td>
    <td class="tg-78ff" colspan="2"></td>
    <td class="tg-78ff" colspan="2"></td>
    <td class="tg-78ff" colspan="2"></td>
  </tr>
  <tr>
    <td class="tg-78ff" colspan="4">STORE INITIAL:</td>
    <td class="tg-78ff" colspan="5"><?php echo $zone[0]['WHInitial'] ?></td>
    <td class="tg-78ff">OTHERS</td>
    <td class="tg-78ff" colspan="2">
    <?php  
                   foreach ($color as $key => $val) {
                    if ($val['ContainerColor'] === 'Others') {
                        echo ($color[$key]['WH'] > 0) ? $color[$key]['WH'] :'';
                    }
                } 
    ?>
    </td>
    <td class="tg-78ff" colspan="2">
    <?php  
                   foreach ($color as $key => $val) {
                    if ($val['ContainerColor'] === 'Others') {
                        echo ($color[$key]['LD'] > 0) ? $color[$key]['LD'] :'';
                    }
                } 
    ?>
    </td>
    <td class="tg-78ff" colspan="2">
    <?php  
                   foreach ($color as $key => $val) {
                    if ($val['ContainerColor'] === 'Others') {
                        echo ($color[$key]['OL'] > 0) ? $color[$key]['OL'] :'';
                    }
                } 
    ?>
    </td>
    <td class="tg-78ff" colspan="2">
    <?php  
                   foreach ($color as $key => $val) {
                    if ($val['ContainerColor'] === 'Others') {
                        echo ($color[$key]['UL'] > 0) ? $color[$key]['UL'] :'';
                    }
                } 
    ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">ZONE</td>
    <td class="tg-78ff" colspan="2">WAREHOUSE</td>
    <td class="tg-78ff" colspan="2">LOADING</td>
    <td class="tg-78ff" colspan="2">OFFLOADING</td>
    <td class="tg-78ff" colspan="2">UNLOADING</td>
    <td class="tg-78ff">ZONE</td>
    <td class="tg-78ff" colspan="2">WAREHOUSE</td>
    <td class="tg-78ff" colspan="2">LOADING</td>
    <td class="tg-78ff" colspan="2">OFFLOADING</td>
    <td class="tg-78ff" colspan="2">UNLOADING</td>
  </tr>
  <tr>
    <td class="tg-78ff">NO</td>
    <td class="tg-78ff">CON.</td>
    <td class="tg-78ff">BOX</td>
    <td class="tg-78ff">CON.</td>
    <td class="tg-78ff">BOX</td>
    <td class="tg-78ff">CON.</td>
    <td class="tg-78ff">BOX</td>
    <td class="tg-78ff">CON.</td>
    <td class="tg-78ff">BOX</td>
    <td class="tg-78ff">NO.</td>
    <td class="tg-78ff">CON.</td>
    <td class="tg-78ff">BOX</td>
    <td class="tg-78ff">CON.</td>
    <td class="tg-78ff">BOX</td>
    <td class="tg-78ff">CON.</td>
    <td class="tg-78ff">BOX</td>
    <td class="tg-78ff">CON.</td>
    <td class="tg-78ff">BOX</td>
  </tr>
  <tr>
    <td class="tg-78ff">A1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty'] :'';
                    }
                } 
    ?>
    </td>
    <td class="tg-78ff">
        <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty'] :'';
                    }
                } 
        ?>    
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?> 
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?> 
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?> 
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?> 
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?> </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?> 
    </td>
    <td class="tg-78ff">N1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">A2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">N2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">A3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">N3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">A4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'A4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">N4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'N4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">B1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'B1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'B1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'B1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'B1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'B1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'B1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'B1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'B1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">O1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">B2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'B2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'B2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'B2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'B2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'B2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'B2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'B2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'B2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">O2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">C1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'C1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'C1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'C1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'C1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'C1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'C1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'C1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'C1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">O3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">C2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'C2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'C2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'C2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'C2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'C2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'C2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'C2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'C2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">O4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'O4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">D1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">P1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">D2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">P2</td>
<td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">D3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">P3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">D4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'D4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">P4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'P4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">E1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">Q1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">E2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">Q2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">E3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">Q3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">E4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'E4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">Q4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Q4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">F1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">R1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">F2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">R2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">F3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">R3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">F4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'F4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">R4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'R4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">G1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">S1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">G2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">S2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">G3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">S3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">G4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'G4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">S4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'S4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">H1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">T1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">H2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">T2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">H3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">T3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'T3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">H4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'H4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">U1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'U1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'U1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'U1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'U1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'U1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'U1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'U1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'U1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">I1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">U2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'U2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'U2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'U2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'U2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'U2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'U2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'U2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'U2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">I2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">V1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">I3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">V2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">I4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'I4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">V4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'V4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">J1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">W1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'W1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'W1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'W1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'W1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'W1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'W1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'W1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'W1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">J2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">W2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'W2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'W2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'W2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'W2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'W2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'W2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'W2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'W2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">J3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">X1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">J4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'J4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">X2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">K1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">X3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'X3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">K2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">X4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">K3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">Y1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">K4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'K4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">Y2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">L1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">Y3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">L2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">Y4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">L3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">Y5</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y5') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y5') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y5') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y5') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y5') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y5') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y5') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'Y5') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">L4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'L4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
  </tr>
  <tr>
    <td class="tg-78ff">M1</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M1') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M1') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M1') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M1') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M1') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M1') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M1') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M1') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">PREPAID</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'PREPAID') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'PREPAID') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'PREPAID') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'PREPAID') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'PREPAID') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'PREPAID') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'PREPAID') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'PREPAID') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">M2</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M2') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M2') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M2') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M2') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M2') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M2') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M2') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M2') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">SABA</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'SABA') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'SABA') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'SABA') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'SABA') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'SABA') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'SABA') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'SABA') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'SABA') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">M3</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M3') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M3') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M3') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M3') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M3') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M3') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M3') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M3') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">FAS</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'FAS') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'FAS') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'FAS') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'FAS') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'FAS') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'FAS') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'FAS') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'FAS') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff">M4</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M4') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M4') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M4') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M4') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M4') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M4') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M4') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'M4') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">ALLOCATION</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'ALLOCATION') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'ALLOCATION') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'ALLOCATION') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'ALLOCATION') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'ALLOCATION') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'ALLOCATION') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'ALLOCATION') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'ALLOCATION') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-0pky"></td>
    <td class="tg-78ff">PROMO</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'PROMO') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'PROMO') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'PROMO') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'PROMO') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'PROMO') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'PROMO') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'PROMO') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'PROMO') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-0pky"></td>
    <td class="tg-78ff">MARKETING</td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'MARKETING') {
                        echo ($zone[$key]['WHCQty'] > 0) ? $zone[$key]['WHCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'MARKETING') {
                        echo ($zone[$key]['WHBQty'] > 0) ? $zone[$key]['WHBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'MARKETING') {
                        echo ($zone[$key]['LDCQty'] > 0) ? $zone[$key]['LDCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'MARKETING') {
                        echo ($zone[$key]['LDBQty'] > 0) ? $zone[$key]['LDBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'MARKETING') {
                        echo ($zone[$key]['OLCQty'] > 0) ? $zone[$key]['OLCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'MARKETING') {
                        echo ($zone[$key]['OLBQty'] > 0) ? $zone[$key]['OLBQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'MARKETING') {
                        echo ($zone[$key]['ULCQty'] > 0) ? $zone[$key]['ULCQty']:'';
                    }
                } 
        ?>
    </td>
    <td class="tg-78ff">
    <?php  
                   foreach ($zone as $key => $val) {
                    if ($val['Zone'] === 'MARKETING') {
                        echo ($zone[$key]['ULBQty'] > 0) ? $zone[$key]['ULBQty']:'';
                    }
                } 
        ?>
    </td>
  </tr>
  <tr>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-0pky"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-78ff"></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-78ff" colspan="18">CHECKED BY:</td>
  </tr>
  <tr>
    <td class="tg-c3ow" colspan="4" rowspan="3"><?php echo $sign[0]->WHS ?><br></td>
    <td class="tg-c3ow" colspan="5" rowspan="3"><?php echo $sign[0]->ISG ?><br></td>
    <td class="tg-c3ow" colspan="4" rowspan="3"><?php echo $sign[0]->DRV ?><br></td>
    <td class="tg-c3ow" colspan="5" rowspan="3"><?php echo $sign[0]->STORE_PIC ?><br></td>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
    <td class="tg-78ff" colspan="4">WAREHOUSE</td>
    <td class="tg-78ff" colspan="5">ISSUING</td>
    <td class="tg-78ff" colspan="4">DRIVER</td>
    <td class="tg-78ff" colspan="5">STORE PIC</td>
  </tr>
</tbody>
</table>

<div id='pagebreak'></div>


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
        <td class="left-1l0q"><?php echo ($conts[$i]['scannedQty']>0) ?  $conts[$i]['scannedQty'] : '-' ?> </td>
        <td class="left-1l0q"><?php echo ($conts[$i]['loadedQty']>0) ?  $conts[$i]['loadedQty'] : '-' ?> </td>
        <td class="left-1l0q"><?php echo ($conts[$i]['offloadedQty']>0) ?  $conts[$i]['offloadedQty'] : '-' ?> </td>
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
                        echo ($WH>0) ? $WH : '-';
                    ?>
                </td>
                <td class="tg-qstx">
                <?php
                        $LD = $zone[$i]['LDCQty'] + $zone[$i]['LDBQty'];
                        echo ($LD>0) ? $LD : '-';
                    ?>
                </td>
                <td class="tg-qstx">
                <?php
                        $OL = $zone[$i]['OLCQty'] + $zone[$i]['OLBQty'];
                        echo ($OL>0) ? $OL : '-';
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
                        echo ($WH>0) ? $WH : '-';
                    ?>
                </td>
                <td class="tg-qstx">
                <?php
                        $LD = $zone[$i]['LDCQty'] + $zone[$i]['LDBQty'];
                        echo ($LD>0) ? $LD : '-';
                    ?>
                </td>
                <td class="tg-qstx">
                <?php
                        $OL = $zone[$i]['OLCQty'] + $zone[$i]['OLBQty'];
                        echo ($OL>0) ? $OL : '-';
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