	<nav class="top-bar" data-topbar role="navigation">
 		<ul class="left">
 			<li><a href="<?php echo base_url()."home"; ?>"><img class="back" src="<?php echo base_url().'img/back.png'?>"/></a></li>
 		</ul>
 		<ul>
		    <li class="name"><h1>My Business</h1></li>
		 </ul>
 	</nav>
<?php 
	foreach ($mydatabusiness as $row) {
		if(!empty($row))
		{
			echo  $row['business_name']; ?> <br/>
			<img src="<?php echo  $row['business_logo']; ?>" style="width:100px;height:100px"><br/><?php 
			echo  $row['business_category']; ?> <br/><?php 
			echo  $row['business_address']; ?> <br/><?php 
		}
		else
		{
			echo "no data";
		}
	}
?>