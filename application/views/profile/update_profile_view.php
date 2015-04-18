<?php foreach ($datauser as $row) { $user_id = $row['user_id']?>
<h1>Update Profile</h1> 
	<form action="<?php echo base_url()."profile/updateprofile/$user_id";?>" method="post"> 
	Username:<br /> 
        <input type="text" name="username" value="<?php echo $row['user_name']; ?>" /> 
	<br /><br /> 
        Email:<br /> 
        <input type="text" name="email" value="<?php echo $row['user_email']; ?>" /> 
        <br /><br />
	<input type="hidden" name="password" value="<?php echo $row['user_password']; ?>" /> 
        Phone Number:<br /> 
        <input type="text" name="phonenumber" value="<?php echo $row['user_phone_number']; ?>" /> 
        <br /><br /> 
        <!--Identity Number:<br /> 
        <input type="text" name="identitynumber" value="" /> 
        <br /><br /> 
        NPWP:<br /> 
        <input type="text" name="npwpnumber" value="" /> 
        <br /><br /> -->
	    <input type="submit" value="Save" /> 
 </form>
<?php }?> 