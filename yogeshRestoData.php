<?php

class yogeshRestoData{
	private $menuItems;

	public function  __construct(array $menuItems)
	{
		if(sizeof($menuItems)>0)
		{
		$this->menuItems=$menuItems;
		}
		else
		{
			throw new Exception("No menu Items");
		}
	}
	function getItems(){
		$items=[];
		foreach($this->menuItems as $menu)
		{
			$items[]=array(
				"Name"=>$menu["name"]
			);
		}
		return json_encode($items);
	}
	function getParticularMenu($menuItem)
	{
		$response=["Invalid Request"];
		
		if($menuItem)
		{

			foreach($this->menuItems as $menu){
				if($menu["name"] == $menuItem)
				{	
					
					$response=$menu;
					break;
				}
			}
		}
		return json_encode($response);
	}
} 

?>