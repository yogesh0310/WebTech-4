<?php
header("Content-type: application/json");
//header("Content-type: text/html");
require 'yogeshRestoData.php';


$req=$_GET['req'] ?? null;

if($req)
{
	$jsonData=file_get_contents("restaurant.json");
	$data=json_decode($jsonData,true)['menu_items'];
	
	try {
		$restoData=new yogeshRestoData($data);
		
	} catch (Exception $th) {
		echo json_encode([$th->getMessage()]);
		return;
	}

}
switch ($req) {
	case 'item_name':
		$names[]=$restoData->getItems();
		foreach ($names as $key => $name) {
			echo $name;
		}

		break;
	case 'menu_item':
		$menu=$_GET['name'] ?? null;
		echo $restoData->getParticularMenu($menu);
		break;
	
	default:
		echo json_encode(["Invalid Request"]);
		break;
}
?>