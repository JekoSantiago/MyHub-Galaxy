<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');  
  
class Myemail  
{
    public $sendTo;
    public $subject;
    public $content;

    public function __construct() 
    { 
         $this->CI =& get_instance(); 
    }
   
    

    public function headerTemplate()
    {
        return '<!DOCTYPE html>
        <html>
        <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500&display=swap" rel="stylesheet">
        <style>
            body
            {
                max-width:100%;
                font-family: \'Noto Sans JP\', sans-serif;
                padding: 20px;
                font-size: 12px; 
            }
            label
            {
                font-weight: bold;
            }
            table
            {
                border-collapse: collapse;
                width: 100%;
                text-align:left;
                font-size: 12px;
            }
            table th, table td
            {
                padding: 5px;
                border:solid 1px grey; 
            }
            .Header-content
            {
                width:100%;
            }
            .right
            {
                text-align:right;
            }
            </style>
        </head>
        <body> 
        <a href="'.MYHUB_URL.'"> <img src="https://myhub.atp.ph/resource/style1/img/myhublogo.png" width="280"/> </a>';
    }

    public function footerTemplate()
    {
        return '</body>
             </html> ';
    }

    public function content($type,$data)
    {  
        $html ='';
        if($type == 1)
        { 
            $html .='<div class="body-content container">
                        <div> <br /><br />
                        Delivery Details - <strong>['.$data['deliver'][0]->LocationCode.'] '.$data['deliver'][0]->Location.'</strong> 
                        <br /><br />
                        </div>';
        }
        else
        {
            $html .='<div class="body-content container">
                    <div> <br /><br />
                         Received Delivery Details - <strong>['.$data['deliver'][0]->LocationCode.'] '.$data['deliver'][0]->Location.'</strong>
                         <br /><br />  
                    </div>';
        }  
        $html2='<tr>
                    <td colspan="3"><label>Delivery Note : </label> <span>'.$data['deliver'][0]->ControlNo.'</span></td> 
                </tr> '; 
        foreach($data['batch'] as $driver)
        {
            $html2.='<tr> 
                        <td><label>Batch Number : </label> <span>'.$driver->BatchNo.'</span></td>
                        <td><label>Truck Number : </label> <span>'.$driver->TruckNo.'</span></td>
                        <td><label>Driver : </label> <span>'.$driver->DriverName.'</span></td>
                    </tr> '; 
        }
        $html.='
        <table>
            '.$html2.'
        </table>
        <br />
                <table class="table table-bordered" style="white-space: nowrap;">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Type</th>
                            <th>Color</th>
                            <th>Total Quantity</th>
                            <th>Load Quantity</th>
                            <th>Receive Quantity</th> 
                            <th>Offload Quantity</th>
                            <th>Load Date</th>
                            <th>Receive Date</th>
                            <th>Offload Date</th> 
                        </tr>
                    </thead>
                    <tbody>';
                    $icon = "";
                    $status = "";
                    $tooltip = "";
                    $stat_ID = 0;
                    $red    = 0;
                    $blue   = 0;
                    $yellow = 0;
                    $box    = 0;
                    $case   = 0;
                    $allo   = 0;
                    $fas    = 0;
                    $barrel = 0;
                    $promo  = 0;
                    $urgent = 0;
                    $manual = 0;
                    $loadContainer    = 0;
                    $offLoadContainer = 0;

                    foreach($data['items'] as $item)
                    { 
 
                        $item->Container_ID == 1 ? $red++:false;  
                        $item->Container_ID == 2 ? $blue++:false;  
                        $item->Container_ID == 3 ? $yellow++:false; 
                        $item->Container_ID == 4 ? $box++:false; 
                        $item->Container_ID == 5 ? $case++:false;  
                        $item->Container_ID == 6 ? $allo++:false;  
                        $item->Container_ID == 7 ? $fas++:false;  
                        $item->Container_ID == 8 ? $barrel++:false;  
                        $item->Container_ID == 9 ? $promo++:false;  
                        $item->Container_ID == 10 ? $urgent++:false;  
                        $item->Container_ID == 11 ? $manual++:false;  
 
                        $item->Status == 3 ? $offLoadContainer++ : false; 
                        $item->Status == 1 ? $loadContainer++ : false; 
                        
                        if ($item->ItemsOffloaded != 0) 
                        { 
                            $icon = '<i class="icon-add"></i>';
                            $tooltip = 'Load';
                            $stat_ID = 1;
                        }
                        else
                        { 
                            $icon = '';
                            $tooltip = '';
                            $stat_ID = 1;
                        } 
                        
                             
                        $loadedDate   = ($item->Loaded == '') ? '&nbsp;' : date('Y-m-d H:i A', strtotime($item->Loaded));
                        $unloadedDate = ($item->Unloaded == '') ? '&nbsp;' : date('Y-m-d H:i A', strtotime($item->Unloaded));
                        $itemLoaded   = $item->ItemsLoaded <= 0 ? 0 : $item->ItemsLoaded;
                        $ofloadedDate = ($item->Batch_1 == $item->Total) ? '&nbsp;' : date('Y-m-d H:i A', strtotime($item->Offloaded));
                        $html.=' <tr>
                                        <td>'.$item->Barcode.'</td>
                                        <td>'.$item->ContainerType.'</td>
                                        <td>'.$item->ContainerColor.'</td>
                                        <td>'.$item->Total.'</td>
                                        <td>'. $itemLoaded.'</td>
                                        <td>'.$item->ItemsReceived.'</td>
                                        <td>'.$item->ItemsOffloaded.'</td>
                                        <td>'.$loadedDate.'</td>
                                        <td>'.$unloadedDate.'</td>
                                        <td>'.$ofloadedDate.'</td> 
                                     </tr>';
                    }                                          
              $html.='  </tbody>
                            </table>
                                </div><br />
                                <div>
                                <table class="table" style="white-space: nowrap;">
                                <tbody>
                                <tr class="active border-double">
                                    <th colspan="11">Container Count</th>
								</tr>
                                <tr>
                                        <td><label>Container Red :</label> '.$red.'</td>                                        
                                        <td><label>Container Blue :</label> '.$blue.'</td>
                                        <td><label>Container Yellow :</label> '.$yellow.'</td>
                                        <td><label>Case :</label>'.$case.'</td>
                                        <td><label>Box :</label> '.$box.'</td>
                                        <td><label>Allocation :</label> '.$allo.'</td>
                                        <td><label>FAS :</label> '.$fas.'</td>
                                        <td><label>Barrel :</label> '.$barrel.'</td>
                                        <td><label>Promo :</label> '.$promo.'</td>
                                        <td><label>Urgent :</label> '.$urgent.'</td>
                                        <td><label>Manual :</label> '.$manual.'</td> 
                                    </tr>
                                    <tr>
                                        <td colspan="6"><label>OFFLOAD CONTAINER : </label>'.$offLoadContainer.'</td>
                                        <td colspan="5"><label>LOAD CONTAINER : </label>'.$loadContainer.'</td>
                                    </tr>
                                    <tr>
                                        <td colspan="11" class="text-bold"><label>TOTAL CONTAINER : </label>'.$data['total'].'</td>
                                    </tr>
                                </tbody>
                            </table>
        </div>'; 
    return $html;
    }

}

