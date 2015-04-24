<?php 
	foreach ($databusiness as $row) { ?>
	<table >
		
		<tr>
			<td>
				<span data-table="1_1"> <?php echo $row['business_name']; ?> </span>
			</td>
		</tr>
		
		<tr>
			<td><img src="<?php echo $row['business_logo']; ?>" width="150" height="150"/><br/>
				</td>
		</tr>
		<tr>
			<td>
				<span data-table="1_2"><?php echo $row['business_description']; ?></span>
			</td> 	
		</tr>
		<tr>
			<td>
				<span data-table="1_3"><?php echo $row['business_category']; ?></span></td>
		</tr>
	</table>
	<?php } ?>