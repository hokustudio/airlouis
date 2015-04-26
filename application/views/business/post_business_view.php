 	<nav class="top-bar" data-topbar role="navigation">
 		<ul class="left">
 			<li><a href="<?php echo base_url()."home"; ?>"><img class="back" src="<?php echo base_url(). 'img/back.png'?>"/></a></li>
 		</ul>
 		<ul>
		    <li class="name"><h1>Add Business</h1></li>
		 </ul>
 	</nav>
 		
			<form action="<?php echo base_url()."business/PostBusiness";?>" method="post" enctype="multipart/form-data"> 
		        <input type="text" name="bname" id="bname" placeholder="Company Name or Business Name" style="width: 400px;"/>
			    
			    <label>Company Logo</label>
			    <img id="logofield" src="<?php echo base_url().'uploads/default/newuser.png'?>" height="100px" width="100px" />
			    <input type="file" name="blogo" id="blogo"/>

			    <select name="bcategory" id="bcategory">
			    	<option>Select Category...</option>
			    	<option>Food/Drink</option>
			    	<option>Electronic</option>
			    	<option>Fashion</option>
			    	<option>Service</option>
			    	<option>Property</option>
			    </select><br/><br/>

			    <textarea name="bdescription" id="bdescription" placeholder="Business Description" style="width: 400px; height: 200px"></textarea><br/>

			    <textarea type="text" name="baddress" id="baddress" placeholder="Address" style="width: 400px; height: 100px"></textarea><br/>
			    
			    <input type="text" name="btelp" id="btelp" placeholder="No. Telp" style="width: 400px;"/>

			    <input type="text" name="bhandp" id="bhandp" placeholder="No. Hp" style="width: 400px;"/>

			    <input type="text" name="bfax" id="bfax" placeholder="No. Fax" style="width: 400px;"/>

			    <input type="text" name="bemail" id="bemail" placeholder="Email" style="width: 400px;"/>

			    <input type="text" name="bfb" id="bfb" placeholder="Facebook" style="width: 400px;"/>

			    <input type="text" name="btwt" id="btwt" placeholder="Twitter" style="width: 400px;"/>

			    <input type="text" name="bweb" id="bweb" placeholder="Web" style="width: 400px;"/>

			    <select name="bshareholder" id="shareholder">
			    	<option>types of invesments...</option>
			    	<option>profit sharing</option>
			    	<option>test 2</option>
			    	<option>test 3</option>
			    </select><br/><br/>

			    <input type="text" name="bslotinvestment" id="bslotinvestment" placeholder="Slot Investment"/><br/>

			    <input type="text" name="bvalueinvestment" id="bvalueinvestment" placeholder="Value Investment in IDR"/><br/>
			    
			    <textarea type="text" name="bproductionplan" id="bproductionplan" placeholder="Production Plan" style="width: 400px; height: 300px"></textarea><br/>

			    <textarea type="text" name="bmarketingplan" id="bmarketingplan" placeholder="Marketing Plan" style="width: 400px; height: 300px"></textarea><br/>

			    <textarea type="text" name="bfinancialplan" id="bfinancialplan" placeholder="Financial Plan" style="width: 400px; height: 300px"></textarea><br/>

			    <textarea type="text" name="bdevelopmentplan" id="bdevelopmentplan" placeholder="Development Plan" style="width: 400px; height: 300px"></textarea><br/>
		 		
		 		<input type="submit" name="submit" id="submit" value="Submit"/><br/>
		 </form>
		 <script>
	        function readURL(input) {

    			if (input.files && input.files[0]) {
        		var reader = new FileReader();

        		reader.onload = function (e) {
            		$('#logofield').attr('src', e.target.result);
        		}

        		reader.readAsDataURL(input.files[0]);
    			}
			}

			$("#blogo").change(function(){
    		readURL(this);
			});
    	</script>
