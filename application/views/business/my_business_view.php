<h1>My Business</h1>
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