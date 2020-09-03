<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="jquery-3.5.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
<div class="back-img">
	<div class="container">
		<div class="header">
			<h1>Yogesh's Resto</h1>
		</div>	
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn" onclick="getNameList()">Load Menu Items in Dropdown</button>
		<select id="drop" class="form-control"> 
			
		</select>
		<br>
		<br>
		<div class="profile"></div>
	</div>
</div>
<script type="text/javascript">
	let data=null;
	let s1;
	let daa=null;
	let base_url = "http://localhost/WT_4/yogeshResto.php";

        function getNameList() {
            let url = base_url + "?req=item_name";
            $.get(url,function(da,success){
                console.log(da.length);
                console.log(da);
                data=da;
            });
            var d=document.querySelector("#drop");
			d.addEventListener("click",createList);
			function createList(e) {
				//console.log(data);
				for(var i=0;i<data.length;i++)
				{
					var dl=document.querySelector("#drop");
					var op=document.createElement("option");
					op.value=i;
					op.text=data[i]["Name"];
					dl.appendChild(op);
				}
				var sel=document.getElementById('drop');
				var opt=sel.options[sel.selectedIndex];
				var s=opt.text;
				console.log(s);
				getMenuByItem(s);
				s1=opt.value;

       	    }
       	}


        function getMenuByItem(item) {
            let url = base_url + "?req=menu_item&name="+item;
            $.get(url,function(data,success){
                console.log(data);
                document.querySelector(".profile").innerHTML=`<div class="panel panel-default">
				<div class="panel-heading">
				<h3 class="panel-title center">`+data.name+`</h3>
				</div>
				<div class="panel-body">
				<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8">
					<ul class="list-group">
						<li class="list-group-item"><b>Id</b>: `+data.id+`</li>
						<li class="list-group-item"><b>Short name</b>: `+data.short_name+`</li>
						<li class="list-group-item"><b>Name</b>: `+data.name+`</li>
						<li class="list-group-item"><b>Description</b>: `+data.description+`</li>
						<li class="list-group-item"><b>Price_small</b>: `+data.price_small+`</li>
						<li class="list-group-item"><b>Price_large</b>: `+data.price_large+`</li>
						<li class="list-group-item"><b>Small Portion Name</b>: `+data.small_portion_name+`</li>
						<li class="list-group-item"><b>Large Portion Name</b>:`+data.large_portion_name+` </li>
					</ul>
					
				</div>
				<div class="col-md-2">
				</div>
				</div>
				</div>
		</div>`;
            });
        }
</script>
</body>
</html>