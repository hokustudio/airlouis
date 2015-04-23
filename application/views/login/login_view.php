<?php $this->session->flashdata('notification');
?>
<div class="row logo">
	<div class="small-4 medium-3 large-2 columns small-centered medium-centered large-centered">
		<img src="img/logo.png">
	</div>
</div>

<div class="row">
	<div class="small-10 medium-6 large-6 columns small-centered medium-centered large-centered">
			<form class="loginF" action="<?php echo base_url()."verifylogin/UserLogin";?>" method="post"> 
		        <input type="text" class="form" placeholder="Username" name="username" value="<?php echo set_value('username')?>" />  
			    <input type="password" class="form" placeholder="Password"  name="password" value="<?php echo set_value('password')?>" />  
			    <button type="submit" class="button expand" value="Log In" />SIGN IN</button>
		 	</form>
	 </div>
</div>

<div class="row signuplink">
	<div class="small-10 medium-6 large-6 columns small-centered medium-centered large-centered text-center">
		<a href="<?php echo base_url()."signup";?>">Sign Up for Airlouis</a>
	</div>
</div>