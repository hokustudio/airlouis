<h2>Profile</h2>
<?php 
	foreach ($datauser as $row) { $user_id = $row['user_id'];?>
	<a href="<?php echo base_url(). "profile/UpdateProfile/$user_id"?>">edit</a>
	<table >
		<tr>
			<td> <?php echo $row['user_name']; ?> </td>
		</tr>
		<tr>
			 <td> <?php echo $row['user_email']; ?> </td>	 	
		</tr>
		<tr>
			<td> <?php echo $row['user_phone_number']; ?> </td>
		</tr>
	</table>
<?php } ?>