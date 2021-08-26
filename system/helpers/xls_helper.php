<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function create_xls_report($data, $filename = 'report')
{
    $info = $data['info'];
    $items = $data['items'];
    $receiveDate = ($info->ReceivedDate == '') ? '' :  date('Y-m-d H:i A', strtotime($info->ReceivedDate));
    $shipDate    = ($info->ShippedDate == '') ? '' :  date('Y-m-d H:i A', strtotime($info->ShippedDate));

	require_once("PHPExcel/PHPExcel.php");
	require_once("PHPExcel/PHPExcel/Writer/Excel5.php");

	$objPHPExcel = new PHPExcel();

	// Set properties
	$objPHPExcel->getProperties()->setCreator("ProjectGalaxyReport");
	$objPHPExcel->getProperties()->setLastModifiedBy("ProjectGalaxyReport");
	$objPHPExcel->getProperties()->setTitle("ProjectGalaxyReport");
	
	//Modify cell's style
	$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray(
		array(
			'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 16),
			'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER)
			)
		);
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
        
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->SetCellValue('A1', "Warehouse Container Monitoring Report");
    
    $objPHPExcel->getActiveSheet()->mergeCells('A3:B3');
	$objPHPExcel->getActiveSheet()->SetCellValue('A3', 'Control Number :')->setCellValueExplicit('A3', 'Control Number :', PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->getStyle('A3:B3')->applyFromArray(
	    array(
	        'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
	        'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))		
		)
    );
       
    $objPHPExcel->getActiveSheet()->mergeCells('C3:E3');
    $objPHPExcel->getActiveSheet()->SetCellValue('C3', $info->ControlNo)->setCellValueExplicit('C3', $info->ControlNo, PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('C3:E3')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))
        )
    );

    $objPHPExcel->getActiveSheet()->SetCellValue('F3', 'Truck Number :')->setCellValueExplicit('F3', 'Truck Number :', PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->getStyle('F3')->applyFromArray(
	    array(
	        'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
	        'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))		
		)
    );
       
    $objPHPExcel->getActiveSheet()->mergeCells('G3:H3');
    $objPHPExcel->getActiveSheet()->SetCellValue('G3', $info->TruckNo)->setCellValueExplicit('G3', $info->TruckNo, PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('G3:H3')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))
        )
    );

    $objPHPExcel->getActiveSheet()->mergeCells('A4:B4');
	$objPHPExcel->getActiveSheet()->SetCellValue('A4', '[Store Code] Store Name :')->setCellValueExplicit('A4', '[Store Code] Store Name :', PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->getStyle('A4:B4')->applyFromArray(
	    array(
	        'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
	        'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))		
		)
    );
       
    $objPHPExcel->getActiveSheet()->mergeCells('C4:E4');
    $objPHPExcel->getActiveSheet()->SetCellValue('C4', '['.$info->LocationCode.'] '.$info->Location)->setCellValueExplicit('C4', '['.$info->LocationCode.'] '.$info->Location, PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('C4:E4')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))
        )
    );

    $objPHPExcel->getActiveSheet()->SetCellValue('F4', 'Driver Name :')->setCellValueExplicit('F4', 'Driver Name :', PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->getStyle('F4')->applyFromArray(
	    array(
	        'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
	        'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))		
		)
    );
       
    $objPHPExcel->getActiveSheet()->mergeCells('G4:H4');
    $objPHPExcel->getActiveSheet()->SetCellValue('G4', $info->DriverName)->setCellValueExplicit('G4', $info->DriverName, PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('G4:H4')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))
        )
    );

    $objPHPExcel->getActiveSheet()->mergeCells('A5:B5');
	$objPHPExcel->getActiveSheet()->SetCellValue('A5', 'Warehouse :')->setCellValueExplicit('A5', 'Warehouse :', PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->getStyle('A5:B5')->applyFromArray(
	    array(
	        'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
	        'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))		
		)
    );
       
    $objPHPExcel->getActiveSheet()->mergeCells('C5:E5');
    $objPHPExcel->getActiveSheet()->SetCellValue('C5', $info->DC)->setCellValueExplicit('C5', $info->DC, PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('C5:E5')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))
        )
    );

    $objPHPExcel->getActiveSheet()->SetCellValue('F5', 'Ship Date :')->setCellValueExplicit('F5', 'Ship Date :', PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->getStyle('F5')->applyFromArray(
	    array(
	        'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
	        'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))		
		)
    );
       
    $objPHPExcel->getActiveSheet()->mergeCells('G5:H5');
    $objPHPExcel->getActiveSheet()->SetCellValue('G5', $shipDate)->setCellValueExplicit('G5', $shipDate, PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('G5:H5')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))
        )
    );

    $objPHPExcel->getActiveSheet()->mergeCells('A6:B6');
	$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'Total # of Container :')->setCellValueExplicit('A6', 'Total # of Container :', PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->getStyle('A6:B6')->applyFromArray(
	    array(
	        'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
	        'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))		
		)
    );
       
    $objPHPExcel->getActiveSheet()->mergeCells('C6:E6');
    $objPHPExcel->getActiveSheet()->SetCellValue('C6', $data['total'])->setCellValueExplicit('C6', $data['total'], PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('C6:E6')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))
        )
    );

    $objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Receive Date :')->setCellValueExplicit('F6', 'Receive Date :', PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->getStyle('F6')->applyFromArray(
	    array(
	        'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
	        'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))		
		)
    );
      
    $objPHPExcel->getActiveSheet()->mergeCells('G6:H6');
    $objPHPExcel->getActiveSheet()->SetCellValue('G6', $receiveDate)->setCellValueExplicit('G6', $receiveDate, PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('G6:H6')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))
        )
    );

	$objPHPExcel->getActiveSheet()->SetCellValue('A8', '#')->setCellValueExplicit('A8', '#', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('A8')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => 'FFFFFF')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'fill'=>array('type'=>  PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'e60000')),
			'borders'=>array('right'=>array('style'=>''), 'top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))
        )
    );

	$objPHPExcel->getActiveSheet()->SetCellValue('B8','Barcode')->setCellValueExplicit('B8', 'Barcode', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('B8')->applyFromArray(
		array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => 'FFFFFF')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'fill'=>array('type'=>  PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'e60000')),
			'borders'=>array('right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
        )
	);

	$objPHPExcel->getActiveSheet()->SetCellValue('C8', 'Container Type')->setCellValueExplicit('C8', 'Container Type', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('C8')->applyFromArray(
		array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => 'FFFFFF')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'fill'=>array('type'=>  PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'e60000')),
			'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))
        )
	);

	$objPHPExcel->getActiveSheet()->SetCellValue('D8', 'Color')->setCellValueExplicit('D8', 'Color', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('D8')->applyFromArray(
		array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => 'FFFFFF')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'fill'=>array('type'=>  PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'e60000')),
			'borders'=>array('left'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>''))
        )
    );
    
    $objPHPExcel->getActiveSheet()->SetCellValue('E8', 'Load Qty')->setCellValueExplicit('E8', 'Load Qty', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('E8')->applyFromArray(
		array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => 'FFFFFF')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'fill'=>array('type'=>  PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'e60000')),
			'borders'=>array('left'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>''))
        )
    );
    
    $objPHPExcel->getActiveSheet()->SetCellValue('F8', 'Receive Qty')->setCellValueExplicit('F8', 'Receive Qty', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('F8')->applyFromArray(
		array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => 'FFFFFF')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'fill'=>array('type'=>  PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'e60000')),
			'borders'=>array('left'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>''))
        )
	);

    $objPHPExcel->getActiveSheet()->SetCellValue('G8', 'Load Date')->setCellValueExplicit('G8', 'Load Date', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('G8')->applyFromArray(
		array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => 'FFFFFF')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'fill'=>array('type'=>  PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'e60000')),
			'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
        )
	);

	$objPHPExcel->getActiveSheet()->SetCellValue('H8', 'Unload Date')->setCellValueExplicit('H8', 'Unload Date', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('H8')->applyFromArray(
		array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => 'FFFFFF')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'fill'=>array('type'=>  PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'e60000')),
			'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
        )
    );
    
    $i       = 9;
    $num     = 1;
    $red     = 0;
	$blue    = 0;
	$yellow  = 0;
    $box     = 0;
    $case    = 0;
    $receive = 0;
    foreach($items as $row) :

        if($row->Container_ID == 1) :
            $red++;
		endif;

        if($row->Container_ID == 2) :
            $blue++;
		endif;

        if($row->Container_ID == 3) :
            $yellow++;
		endif;

		if($row->Container_ID == 4) :
			$box++;
        endif;

        if($row->Container_ID == 5) :
			$case++;
        endif;
                    
        if($row->Unloaded != "") :
            $receive++;
        endif;
        
        $load_Date   = ($row->Loaded == '') ? '' : date('Y-m-d h:i A', strtotime($row->Loaded));
        $unload_Date = ($row->Unloaded == '') ? '' : date('Y-m-d h:i A', strtotime($row->Unloaded));

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, $num)->setCellValueExplicit('A'.$i, $num, PHPExcel_Cell_DataType::TYPE_NUMERIC);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );
        
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, $row->Barcode)->setCellValueExplicit('B'.$i, $row->Barcode, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );

        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row->ContainerType)->setCellValueExplicit('C'.$i, $row->ContainerType, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );

        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row->ContainerColor)->setCellValueExplicit('D'.$i, $row->ContainerColor, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );

        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row->Total)->setCellValueExplicit('E'.$i, $row->Total, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );

        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row->RecQty)->setCellValueExplicit('F'.$i, $row->RecQty, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );


        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $load_Date)->setCellValueExplicit('G'.$i, $load_Date, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );

        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, $unload_Date)->setCellValueExplicit('H'.$i, $unload_Date, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );
        
        $i++;
        $num++;
    
    endforeach;

    $aa = $i + 1;
    $bb = $i + 2;
    $cc = $i + 3;
    $dd = $i + 4;

    $objPHPExcel->getActiveSheet()->mergeCells('A'.$aa.':B'.$aa);
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$aa, 'Container Red :')->setCellValueExplicit('A'.$aa, 'Container Red :', PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$aa.':B'.$aa)->applyFromArray(
	    array(
	        'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
	    )
    );
       
    $objPHPExcel->getActiveSheet()->mergeCells('C'.$aa.':D'.$aa);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$aa, $red)->setCellValueExplicit('C'.$aa, $red, PHPExcel_Cell_DataType::TYPE_NUMERIC);
    $objPHPExcel->getActiveSheet()->getStyle('C'.$aa.':D'.$aa)->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
        )
    );

    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$aa, 'Container Yellow :')->setCellValueExplicit('E'.$aa, 'Container Yellow :', PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->getStyle('E'.$aa)->applyFromArray(
	    array(
	        'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
	    )
    );
       
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$aa, $yellow)->setCellValueExplicit('F'.$aa, $yellow, PHPExcel_Cell_DataType::TYPE_NUMERIC);
    $objPHPExcel->getActiveSheet()->getStyle('F'.$aa)->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
        )
    );

    $objPHPExcel->getActiveSheet()->mergeCells('A'.$bb.':B'.$bb);
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$bb, 'Container Blue :')->setCellValueExplicit('A'.$bb, 'Container Blue :', PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$bb.':B'.$bb)->applyFromArray(
	    array(
	        'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
	    )
    );
       
    $objPHPExcel->getActiveSheet()->mergeCells('C'.$bb.':D'.$bb);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$bb, $blue)->setCellValueExplicit('C'.$bb, $blue, PHPExcel_Cell_DataType::TYPE_NUMERIC);
    $objPHPExcel->getActiveSheet()->getStyle('C'.$bb.':D'.$bb)->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
        )
    );

    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$bb, 'Case :')->setCellValueExplicit('E'.$bb, 'Case :', PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->getStyle('E'.$bb)->applyFromArray(
	    array(
	        'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
	    )
    );
       
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$bb, $case)->setCellValueExplicit('F'.$bb, $case, PHPExcel_Cell_DataType::TYPE_NUMERIC);
    $objPHPExcel->getActiveSheet()->getStyle('F'.$bb)->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
        )
    );

    $objPHPExcel->getActiveSheet()->mergeCells('A'.$cc.':B'.$cc);
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$cc, 'Box :')->setCellValueExplicit('A'.$cc, 'Box :', PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$cc.':B'.$cc)->applyFromArray(
	    array(
	        'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
	    )
    );
       
    $objPHPExcel->getActiveSheet()->mergeCells('C'.$cc.':D'.$cc);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$cc, $box)->setCellValueExplicit('C'.$cc, $box, PHPExcel_Cell_DataType::TYPE_NUMERIC);
    $objPHPExcel->getActiveSheet()->getStyle('C'.$cc.':D'.$cc)->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
        )
    );

    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$cc, '')->setCellValueExplicit('E'.$cc, '', PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->getStyle('E'.$cc)->applyFromArray(
	    array(
	        'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
	    )
    );
       
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$cc,'')->setCellValueExplicit('F'.$cc, '', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('F'.$cc)->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
        )
    );

    $objPHPExcel->getActiveSheet()->mergeCells('A'.$dd.':B'.$dd);
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$dd, 'Ship Count :')->setCellValueExplicit('A'.$dd, 'Ship Count :', PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$dd.':B'.$dd)->applyFromArray(
	    array(
	        'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
	    )
    );
       
    $objPHPExcel->getActiveSheet()->mergeCells('C'.$dd.':D'.$dd);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$dd, $data['total'])->setCellValueExplicit('C'.$dd, $data['total'], PHPExcel_Cell_DataType::TYPE_NUMERIC);
    $objPHPExcel->getActiveSheet()->getStyle('C'.$dd.':D'.$dd)->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
        )
    );

    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$dd, 'Receive Count :')->setCellValueExplicit('E'.$dd, 'Receive Count :', PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->getStyle('E'.$dd)->applyFromArray(
	    array(
	        'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
	    )
    );
       
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$dd, $receive)->setCellValueExplicit('F'.$dd, $receive, PHPExcel_Cell_DataType::TYPE_NUMERIC);
    $objPHPExcel->getActiveSheet()->getStyle('F'.$dd)->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
        )
    );


	// Create Excel 2003 file and output
	$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);

        // ob_end_clean();
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
	
	$objWriter->save('php://output');
}

function create_xls_report_all_wh($data, $filename = 'report')
{
    $items = $data['rowItems'];
    
	require_once("PHPExcel/PHPExcel.php");
	require_once("PHPExcel/PHPExcel/Writer/Excel5.php");

	$objPHPExcel = new PHPExcel();

	// Set properties
	$objPHPExcel->getProperties()->setCreator("ProjectGalaxyReport");
	$objPHPExcel->getProperties()->setLastModifiedBy("ProjectGalaxyReport");
	$objPHPExcel->getProperties()->setTitle("ProjectGalaxyReport");
	
	//Modify cell's style
	$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray(
		array(
			'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 16),
			'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER)
			)
		);
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:G1');
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
        
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->SetCellValue('A1', "Warehouse Container Monitoring Report");
    
    $objPHPExcel->getActiveSheet()->SetCellValue('A3', 'Control Number')->setCellValueExplicit('A3', 'Control Number', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('A3')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => 'FFFFFF')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'fill'=>array('type'=>  PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'e60000')),
			'borders'=>array('right'=>array('style'=>''), 'top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))
        )
    );

	$objPHPExcel->getActiveSheet()->SetCellValue('B3','[Store Code] Store Name')->setCellValueExplicit('B3', '[Store Code] Store Name', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('B3')->applyFromArray(
		array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => 'FFFFFF')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'fill'=>array('type'=>  PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'e60000')),
			'borders'=>array('right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
        )
	);

	$objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Ship Date')->setCellValueExplicit('C3', 'Ship Date', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('C3')->applyFromArray(
		array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => 'FFFFFF')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'fill'=>array('type'=>  PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'e60000')),
			'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))
        )
	);

	$objPHPExcel->getActiveSheet()->SetCellValue('D3', 'Receive Date')->setCellValueExplicit('D3', 'Receive Date', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('D3')->applyFromArray(
		array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => 'FFFFFF')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'fill'=>array('type'=>  PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'e60000')),
			'borders'=>array('left'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>''))
        )
	);

    $objPHPExcel->getActiveSheet()->SetCellValue('E3', 'Duration')->setCellValueExplicit('E3', 'Duration', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('E3')->applyFromArray(
		array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => 'FFFFFF')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'fill'=>array('type'=>  PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'e60000')),
			'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
        )
	);

	$objPHPExcel->getActiveSheet()->SetCellValue('F3', 'Truck Number')->setCellValueExplicit('F3', 'Truck Number', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('F3')->applyFromArray(
		array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => 'FFFFFF')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'fill'=>array('type'=>  PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'e60000')),
			'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
        )
    );

    $objPHPExcel->getActiveSheet()->SetCellValue('G3', 'Driver Name')->setCellValueExplicit('G3', 'Driver Name', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('G3')->applyFromArray(
		array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => 'FFFFFF')),
			'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'fill'=>array('type'=>  PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => 'e60000')),
			'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
        )
    );
    
    $i = 4;

    foreach($items as $row) :

        $shipDate    = ($row->ShippedDate == null) ? '' : date('Y-m-d H:i A', strtotime($row->ShippedDate));
        $receiveDate = ($row->ReceivedDate == null) ? '' : date('Y-m-d H:i A', strtotime($row->ReceivedDate));

        if($row->ReceivedDate != '') :
            $d1 = date_create($row->ShippedDate);
			$d2 = date_create($row->ReceivedDate);

			$diff = date_diff($d2, $d1);
			$duration = $diff->format('%H:%I'); 
		else : 
		    $duration = "";
        endif;

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, $row->ControlNo)->setCellValueExplicit('A'.$i, $row->ControlNo, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );
        
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, '[ '.$row->LocationCode.' ] '.$row->Location)->setCellValueExplicit('B'.$i, '[ '.$row->LocationCode.' ] '.$row->Location, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );

        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $shipDate)->setCellValueExplicit('C'.$i, $shipDate, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );

        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $receiveDate)->setCellValueExplicit('D'.$i, $receiveDate, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );

        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $duration)->setCellValueExplicit('E'.$i, $duration, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );

        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row->TruckNo)->setCellValueExplicit('F'.$i, $row->TruckNo, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );

        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $row->DriverName)->setCellValueExplicit('G'.$i, $row->DriverName, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );
        
        $i++;
    
    endforeach;

    // Create Excel 2003 file and output
	$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);

    // ob_end_clean();
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$filename.'.xls"');

    $objWriter->save('php://output');
}

function create_xls_report_logs($data, $filename = 'report')
{
    $items = $data['result'];

    require_once("PHPExcel/PHPExcel.php");
    require_once("PHPExcel/PHPExcel/Writer/Excel5.php");

    $objPHPExcel = new PHPExcel();

    // Set properties
    $objPHPExcel->getProperties()->setCreator("ProjectGalaxyReport");
    $objPHPExcel->getProperties()->setLastModifiedBy("ProjectGalaxyReport");
    $objPHPExcel->getProperties()->setTitle("ProjectGalaxyReport");
    
    //Modify cell's style
    $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 18),
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER)
            )
        );
    
    $objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
    
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->SetCellValue('A1', "Logs Report");


    
    $objPHPExcel->getActiveSheet()->SetCellValue('A3', 'LOCATION')->setCellValueExplicit('A3', 'LOCATION', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('A3')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
            'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))      
        )
    );

    $objPHPExcel->getActiveSheet()->SetCellValue('B3', 'DC NAME')->setCellValueExplicit('B3', 'DC NAME', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('B3')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
            'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))      
        )
    );
       
    $objPHPExcel->getActiveSheet()->SetCellValue('C3', 'DELIVERY NOTE')->setCellValueExplicit('C3', 'DELIVERY NOTE', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('C3')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
            'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))
        )
    );

    $objPHPExcel->getActiveSheet()->SetCellValue('D3', 'BARCODE')->setCellValueExplicit('D3', 'BARCODE', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('D3')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
            'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))      
        )
    );
       
    $objPHPExcel->getActiveSheet()->SetCellValue('E3', 'DELIVER STATUS')->setCellValueExplicit('E3', 'DELIVER STATUS', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('E3')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
            'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))
        )
    );

    $objPHPExcel->getActiveSheet()->SetCellValue('F3', 'SCANNED BY')->setCellValueExplicit('F3', 'SCANNED BY', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('F3')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
            'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))      
        )
    );
       
    $objPHPExcel->getActiveSheet()->SetCellValue('G3', 'SCANNED DATE')->setCellValueExplicit('G3', 'SCANNED DATE', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('G3')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => false, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
            'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))
        )
    );

    $objPHPExcel->getActiveSheet()->SetCellValue('H3', 'SCANNED FROM')->setCellValueExplicit('H3', 'SCANNED FROM', PHPExcel_Cell_DataType::TYPE_STRING);
    $objPHPExcel->getActiveSheet()->getStyle('H3')->applyFromArray(
        array(
            'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 10, 'color' => array('rgb' => '000000')),
            'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
            'borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN))      
        )
    );
       
    $i = 4;
    foreach($items as $row) :
        
        $scanDate = date('Y-m-d h:i A', strtotime($row->ScannedDate)); 
        $deliverStatus = ($row->DeliverStatus == 'Wrong') ? "Invalid Barcode" : $row->DeliverStatus;
        $scanFrom = ($row->DeliverStatus == 'Load') ? "Web" : $row->ScannedFrom;
        
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, $row->Location)->setCellValueExplicit('A'.$i, $row->Location, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );
        
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, $row->DC)->setCellValueExplicit('B'.$i, $row->DC, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );

        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row->ControlNo)->setCellValueExplicit('C'.$i, $row->ControlNo, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );

        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row->Barcode)->setCellValueExplicit('D'.$i, $row->Barcode, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );

        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $deliverStatus)->setCellValueExplicit('E'.$i, $deliverStatus, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );

        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row->InsertName)->setCellValueExplicit('F'.$i, $row->InsertName, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );


        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $scanDate)->setCellValueExplicit('G'.$i, $scanDate, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );

        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, $scanFrom)->setCellValueExplicit('H'.$i, $scanFrom, PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$i)->applyFromArray(
            array(
                'font' => array('name' => 'Calibri', 'bold' => true, 'italic'=> false, 'size' => 9, 'color' => array('rgb' => '000000')),
                'alignment'=>array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE),
                'borders'=>array('top'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'bottom'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'right'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN), 'left'=>array('style'=>''))
            )
        );
        
        $i++;
    
    endforeach;


    // Create Excel 2003 file and output
    $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);

        // ob_end_clean();
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
    
    $objWriter->save('php://output');
}
