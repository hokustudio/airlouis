  	<nav class="top-bar" data-topbar role="navigation">
 		<ul class="left">
 			<li><a href="<?php echo base_url()."home"; ?>"><img class="back" src="img/back.png"/></a></li>
 		</ul>
 		<ul>
		    <li class="name"><h1>Profile</h1></li>
		 </ul>
 	</nav>

	<?php 
	foreach ($datauser as $row) { $user_id = $row['user_id']; $user_name = $row['user_name'];?>
	<table >
		
		<tr>
			<td><form action="<?php echo base_url()."profile/updateusername/".$user_name;?>" method="post">
				<span data-table="1_1"> <?php echo $row['user_name']; ?> </span>
				<input type="submit" class="submit" data-table="1_1" value="save" />
				<a class="cancel" data-table="1_1" href="#">cancel</a>
				</form>
			</td>

			<td><a class="buttonid" data-table="1_1" data="username" href="#">edit</a></td>
		</tr>
		
		<tr>
			<td><img src="<?php echo $row['user_picture']; ?>" width="150" height="150"/><br/>
					<input type="file" name="userpic" id="userpic"/>
				</td>
		</tr>
		<tr>
			<td><form action="<?php echo base_url()."profile/updateemail/".$user_name;?>" method="post">
				<span data-table="1_2"><?php echo $row['user_email']; ?></span>
				<input type="submit" class="submit" data-table="1_2" value="save" />
				<a class="cancel" data-table="1_2" href="#">cancel</a>
				</form>
			</td>
			<td><a class="buttonid" data-table="1_2" data="email" href="#2">edit</a></td>	 	
		</tr>
		<tr>
			<td><form action="<?php echo base_url()."profile/updatephone/".$user_name;?>" method="post">
				<span data-table="1_3"><?php echo $row['user_phone_number']; ?></span>
				<input type="submit" class="submit" data-table="1_3" value="save" />
				<a class="cancel" data-table="1_3" href="#">cancel</a>
				</form>
			</td>
			<td><a class="buttonid" data-table="1_3" data="phonenumber" href="#">edit</a></td>
		</tr>
	</table>
	<?php } ?>
	<script>
        $(document).ready(function(e) {
        	$(".cancel").hide();
        	$(".submit").hide();

            $(".buttonid").click(function() {
                data_id = $(this).attr("data-table");
                data_name = $(this).attr("data");
                var newdata = $("span[data-table="+data_id+"]");
                var val = newdata.text();
                newdata.replaceWith("<input type='text' class='submit' name="+data_name+" value="+val+" />");
            	$(this).hide();
            	$(".submit[data-table="+data_id+"]").fadeIn(); 
            	$(".cancel[data-table="+data_id+"]").fadeIn();
            });

            $(".cancel").click(function() {
            	data_id = $(this).attr("data-table");
            	$(this).hide();
            	$(".submit[data-table="+data_id+"]").hide();
            	$(".buttonid[data-table="+data_id+"]").fadeIn();

            	var newdata = $("input[type='text']");
            	var val = newdata.val();
            	newdata.replaceWith("<span data-table='"+data_id+"' >"+val+"</span>");
            });
        });
    </script>