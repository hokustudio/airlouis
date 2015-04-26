	<nav class="top-bar" data-topbar role="navigation">
 		<ul class="left">
 			<li><a href="<?php echo base_url()."home"; ?>"><img class="back" src="<?php echo base_url().'img/back.png'?>"/></a></li>
 		</ul>
 		<ul>
		    <li class="name"><h1>Bingung Mau diisi apa Boleh juga nama bisnis</h1></li>
		 </ul>
 	</nav>

<?php 
	foreach ($databusiness as $row) { ?>
	<table >
		
		<tr>
			<td>
				<span><?php echo $row['business_name']; ?></span>
			</td>
		</tr>
		
		<tr>
				<td><img src="<?php echo $row['business_logo']; ?>" width="150" height="150"/><br/>
				</td>
			
				<td><span><?php echo $row['business_telephone']; ?></span><br/>
					<span><?php echo $row['business_handphone']; ?></span><br/>
					<span><?php echo $row['business_fax']; ?></span><br/>
					<span><?php echo $row['business_email']; ?></span><br/>
					<span><?php echo $row['business_facebook']; ?></span><br/>
					<span><?php echo $row['business_twitter']; ?></span><br/>
					<span><?php echo $row['business_web']; ?></span><br/></td>
		</tr>
		<tr>
			<td colspan="2">
				<span><?php echo $row['business_description']; ?></span>
			</td>
			<td></td> 	
		</tr>
		<tr>
			<td colspan="2">
				<span><?php echo $row['business_category']; ?></span>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<span><?php echo 'slots '.$row['business_slot_investments']; ?></span>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<span><?php echo $row['business_value_investments'].' IDR'; ?></span>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<span><?php echo $row['business_marketing_plan']; ?></span>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<span><?php echo $row['business_production_plan']; ?></span>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<span><?php echo $row['business_financial_plan']; ?></span>
			</td colspan="2">
		</tr>
		<tr>
			<td colspan="2">
				<span><?php echo $row['business_development_plan']; ?></span>
			</td>
		</tr>
		<tr> <?php 
			if($this->session->userdata('user_id') != $row['business_owner_id']) {
			?>
			<td colspan="2">
				<form action="<?php echo base_url().'investrequest/request/'.$this->session->userdata('user_id').'/'.$row['business_id'];?>" method="post">
					<input type="submit" name="requestinvest" value="request invest"/>
					<input type="submit" name="sendmessage" value="send message"/>
				</form>
			</td>
			<?php }
			?>

		</tr>
	</table>
<?php } ?>