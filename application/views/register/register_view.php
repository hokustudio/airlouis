<?php $this->session->flashdata('notification')?>
<div class="row logo">
        <div class="small-4 medium-3 large-2 columns small-centered medium-centered large-centered">
                <img src="img/logo.png">
        </div>
</div>
<div class="row">
        <div class="small-10 medium-6 large-6 columns small-centered medium-centered large-centered">
        	<form class="loginF" action="<?php echo base_url()."register/postuser";?>" method="post"> 
                <input type="text" class="form" placeholder="Username" name="username" value="" /> 
                <input type="text" class="form" placeholder="Email" name="email" value="" /> 
        	<input type="password" class="form" placeholder="Password" name="password" value="" /> 
                <input type="text" class="form" placeholder="Phone Number" name="phonenumber" value="" /> 
                <!--Identity Number:<br /> 
                <input type="text" name="identitynumber" value="" /> 
                <br /><br /> 
                NPWP:<br /> 
                <input type="text" name="npwpnumber" value="" /> 
                <br /><br /> -->
        	<button type="submit" class="button expand" value="Register">SIGN UP</button> 
                </form>
        </div>
</div>

<div class="row signinlink">
        <div class="small-10 medium-6 large-6 columns small-centered medium-centered large-centered text-center">
                <a href="<?php echo base_url()."login";?>">Sign In for Airlouis</a>
        </div>
</div>
