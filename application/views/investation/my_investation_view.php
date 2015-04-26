	<nav class="top-bar" data-topbar role="navigation">
 		<ul class="left">
 			<li><a href="<?php echo base_url()."home"; ?>"><img class="back" src="<?php echo base_url().'img/back.png'?>"/></a></li>
 		</ul>
 		<ul>
		    <li class="name"><h1>My Investation</h1></li>
		 </ul>
 	</nav>

 	<?php
 		if($investdata == 0) {
 			echo "no data";
 		}
 		else {
 			foreach ($investdata as $key) {
 				$datainvest = $this->businessmodel->GetBusinessbyId($key);
 				echo $key;
 				foreach ($datainvest as $val) {
 					echo  $val['business_name']; ?> <br/>
					<img src="<?php echo  $val['business_logo']; ?>" style="width:100px;height:100px"><br/><?php 
					echo  $val['business_category']; ?> <br/><?php 
					echo  $val['business_address']; ?> <br/><?php 
 				}
 			}
 		}
 	?>