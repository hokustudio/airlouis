	<nav class="top-bar" data-topbar role="navigation">
 		<ul class="left">
 			<li><a href="<?php echo base_url()."home"; ?>"><img class="back" src="<?php echo base_url().'img/back.png'?>"/></a></li>
 		</ul>
 		<ul>
		    <li class="name"><h1>Invest Request</h1></li>
		 </ul>
 	</nav>
<?php
	if($requestdata == 0) {
		echo "you dont have any business";
	}
	else if($requestdata == 1) {
		echo "you dont have any request";
	}
	else {
		foreach ($requestdata as $row) {
			$datauser = $this->usermodel->GetUserbyId($row['user_from']);
			foreach ($datauser as $key) {			
			echo 'you have request from '.$key['user_name'].' to business '.$row['business_to'];
		?>
		<form action="<?php echo base_url().'investrequest/confirmrequest/'.$row['user_from'].'/'.$row['business_to']; ?>" method="post">
		<input type="submit" name="acceptrequest<?php echo $row['user_from'];?>" value="accept" />
		<input type="submit" name="declinerequest<?php echo $row['user_from'];?>" value="decline" />
		</form> <br/><br/>
<?php
	}
	}
	}	
?>