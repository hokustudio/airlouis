 		<h1><?php echo $this->session->userdata('user_name');?></h1>
 		<h1><?php echo $this->session->userdata('user_id');?></h1>
		<h1>Add Your Business</h1> 
			<form action="<?php echo base_url()."business/PostBusiness";?>" method="post" enctype="multipart/form-data"> 
		        <input type="text" name="bname" id="bname" placeholder="Business Name or Company Name" style="width: 400px;"/><br/><br/>
			    
			    <label>Company Logo</label>
			    <input type="file" name="blogo" id="blogo"/><br/><br/>

			    <select name="bcategory" id="bcategory">
			    	<option>Select Category...</option>
			    	<option>Food/Drink</option>
			    	<option>Electronic</option>
			    	<option>Fashion</option>
			    	<option>Service</option>
			    	<option>Property</option>
			    </select><br/><br/>

			    <textarea name="bdescription" id="bdescription" placeholder="Business Description" style="width: 400px; height: 200px"></textarea><br/><br/>

			    <textarea type="text" name="baddress" id="baddress" placeholder="Address" style="width: 400px; height: 100px"></textarea><br/><br/>
			    
			    <select name="bshareholder" id="shareholder">
			    	<option>types of invesments...</option>
			    	<option>profit sharing</option>
			    	<option>test 2</option>
			    	<option>test 3</option>
			    </select><br/><br/>

			    <input type="text" name="bslotinvestment" id="bslotinvestment" placeholder="Slot Investment" style="width: 400px;"/><br/><br/>

			    <input type="text" name="bvalueinvestment" id="bvalueinvestment" placeholder="Value Investment" style="width: 400px;"/> IDR<br/><br/>
			    
			    <textarea type="text" name="bproductionplan" id="bproductionplan" placeholder="Production Plan" style="width: 400px; height: 300px"></textarea><br/><br/>

			    <textarea type="text" name="bmarketingplan" id="bmarketingplan" placeholder="Marketing Plan" style="width: 400px; height: 300px"></textarea><br/><br/>

			    <textarea type="text" name="bfinancialplan" id="bfinancialplan" placeholder="Financial Plan" style="width: 400px; height: 300px"></textarea><br/><br/>

			    <textarea type="text" name="bdevelopmentplan" id="bdevelopmentplan" placeholder="Development Plan" style="width: 400px; height: 300px"></textarea><br/><br/>
		 		
		 		<input type="submit" name="submit" id="submit" value="Submit"/><br/>
		 </form>
