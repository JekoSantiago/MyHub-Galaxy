<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'under';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/**
 * Error pages
 */
$route['denied'] = 'errorpage/page403/$1';

$route['verify'] = 'login/verify/$1';
$route['logout'] = 'login/logout/$1';
/**
 * Dashboard routes
 */
$route['assign/truck'] = 'dashboard/assignTruckDriverForm/$1';
$route['update/truck'] = 'dashboard/updateAssigned/$1';
$route['cancel']       = 'dashboard/cancel/$1';
$route['dashboard/load/summary/(:any)'] = 'dashboard/truckLoadSummary/$1';
$route['test'] = 'dashboard/test/$1';


/**
 * Delivery Routes
 */
$route['delivery/save/item'] = 'delivery/saveDeliveryItems/$1';
$route['delivery/count']     = 'delivery/countScanCode/$1';
$route['delivery/location']  = 'delivery/getLocationID/$1';
$route['delivery/load']      = 'dashboard/doAction/$1';
$route['delivery/offload']   = 'dashboard/doAction/$1';
$route['delivery/invalid']   = 'delivery/invalidBarcode/$1';
$route['delivery/update/item'] = 'delivery/updateDetStatus/$1';
$route['delivery/check']      = 'delivery/checkCode/$1';
$route['delivery/tara']      = 'delivery/pdfEmail';

/**
 * Receiving Routes
 */
$route['receive/del/tap']         = 'receive/updateDelTap/$1';
$route['receive/check']           = 'receive/checkCode/$1';
$route['receive/barcode/status']  = 'receive/checkBarcodeStatus/$1';
$route['receive/rmk/update']      = 'receive/modifyDD_Remarks/$1';
$route['receive/ddremarks/(:num)'] = 'receive/ddRemarks/$1';
$route['receive/quantity']        = 'receive/quantityForm/$1';
$route['receive/remarks']         = 'receive/remarksForm/$1';
$route['receive/items']           = 'receive/receiveDeliveryItems/$1';
$route['receive/qty-count']       = 'receive/qtyCount/$1';
$route['receive/clear']           = 'receive/clearDeliveryDetailStatus/$1';
$route['receive/delivery/(:any)'] = 'receive/receivedDelivery/$1';
$route['receive/(:any)']          = 'receive/index/$1';


/**
 * Maintenance Routes
 */
$route['maintenance/container']            = 'maintenance/index/$1';
$route['maintenance/save']                 = 'maintenance/saveContainer/$1';
$route['maintenance/save/color']           = 'maintenance/saveColor/$1';
$route['maintenance/save/type']            = 'maintenance/saveType/$1';
$route['maintenance/update/color']         = 'maintenance/updateColor/$1';
$route['maintenance/update/type']          = 'maintenance/updateType/$1';
$route['maintenance/update']               = 'maintenance/updateContainer/$1';
$route['maintenance/container/activate']   = 'maintenance/doAction/$1';
$route['maintenance/container/deactivate'] = 'maintenance/doAction/$1';
$route['maintenance/save/operator']        = 'maintenance/saveOperator/$1';
$route['maintenance/save/truck']           = 'maintenance/saveTruck/$1';
$route['maintenance/update/operator']      = 'maintenance/updateOperator/$1';
$route['maintenance/update/truck']         = 'maintenance/updateTruck/$1';
$route['maintenance/save/driver']          = 'maintenance/saveDriver/$1';
$route['maintenance/update/driver']        = 'maintenance/updateDriver/$1';
$route['maintenance/edit/driver/(:any)']   = 'maintenance/editDriver/$1';
$route['maintenance/edit/color/(:any)']    = 'maintenance/editColor/$1';
$route['maintenance/edit/type/(:any)']     = 'maintenance/editType/$1';
$route['maintenance/edit/(:any)']          = 'maintenance/editContainer/$1';
$route['maintenance/edit/operator/(:any)'] = 'maintenance/editOperator/$1';
$route['maintenance/edit/truck/(:any)']    = 'maintenance/editTruck/$1';

$route['reports/details/(:any)']              = 'reports/viewReportDetails/$1';
$route['reports/export-excel/(:num)']         = 'reports/exportExcelPerStoreDetails/$1';
$route['reports/download/logs/(:any)/(:any)'] = 'reports/downloadLogs/$1';


/**
 * Monitoring Routes
 */
$route['monitoring/activity'] = 'monitoring/getActivity/$1';

$route['reports/oapanel']        = 'reports/getPanel/$1';
$route['reports/overltblone']    = 'reports/getFirstTbl/$1';
$route['reports/am/(:num)']      = 'reports/getAMTbl/$1';
$route['reports/ac/(:num)']      = 'reports/getACTbl/$1';
$route['reports/stores/(:num)']  = 'reports/getStoreTbl/$1';
$route['reports/deliver/(:num)'] = 'reports/getDeliverTbl/$1';
$route['reports/batch/(:num)/(:num)'] = 'reports/viewBatchDetails/$1';


/**
 * Manual Routes
 */
$route['manual/list']             = 'manual/getUnreceivedList/$1';
$route['manual/storelist/(:num)'] = 'manual/getStoreOption/$1';
$route['manual/receive'] = 'manual/receivedDelivery/$1';
