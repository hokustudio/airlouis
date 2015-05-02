<div class="off-canvas-wrap" data-offcanvas>
  	<div class="inner-wrap">
	<!-- NAVIGATION -->  	
	    <nav class="tab-bar" role="navigation" data-options="sticky_on: [small,large]">
	      <section class="left-small">
	        <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
	      </section>

	      <section class="right tab-bar-section has-form">
	        <form action="<?php echo base_url()."index.php/home/Search";?>" method="post"> 
	        	<input type="text" name="search" class="form" placeholder="Find Business" value="<?php echo set_value('search')?>" />   
		       	<button type="submit" value="search" class="button search postfix right-small"><img src="img/search.png"/></button>
		     	</form>
	      </section>
	    </nav>
	 <!-- ENDOFNAVIGATION -->

	<!-- MENU -->
		<aside class="left-off-canvas-menu">
	      <ul class="off-canvas-list">
	        <li><label>Airlouis | <?php echo $this->session->userdata('user_name');?></label></li>
	        <li><a href="<?php echo base_url()."home";?>">Home</a></li>
	        <li><a href="<?php echo base_url()."profile/myprofile/".$this->session->userdata('user_name')?>">Profile</a></li>
	        <li><a href="<?php echo base_url()."business";?>">Add Business</a></li>
	        <li><a href="<?php echo base_url()."business/mybusiness";?>">My Business</a></li>
	        <li><a href="<?php echo base_url()."investation";?>">My Investation</a></li>
	        <li><a href="<?php echo site_url('home/UserLogout'); ?>">Logout</a></li>      
	      </ul>
	    </aside>
<!-- ENDOFMENU -->
		<section class="main-section">
			<header>
				<!-- CATEGORY -->
				<div class="row category">
					<div class="small-12 medium-12 large-12 columns medium-centered large-centered">
						<div class="small-2 columns text-center">
							<a href="#"><img src="img/icons/all.png"/></a>
						</div>
						<div class="small-2 columns text-center">
							<a href="#"><img src="img/icons/food.png"/></a>
						</div>
						<div class="small-2 columns text-center">
							<a href="#"><img src="img/icons/fashion.png"/></a>
						</div>
						<div class="small-2 columns text-center">
							<a href="#"><img src="img/icons/property.png"/></a>
						</div>
						<div class="small-2 columns text-center">
							<a href="#"><img src="img/icons/electronic.png"/></a>
						</div>
						<div class="small-2 columns text-center">
							<a href="#"><img src="img/icons/service.png"/></a>
						</div>
					</div>
				</div>
				<!-- ENDOFCATEGORY -->
			</header>
			<section>
				<!-- SLIDER -->
				<div class="row">         
	        		<div class="small-12 medium-8 large-8 large-centered medium-centered columns zeropadding">
	          			<ul class="example-orbit" data-orbit>
	      				  <li>
	      				    <img src="img/banner/ame.png" alt="Ame Ramen" />
	      				    <div class="orbit-caption">
	      				      Ame Ramen
	      				    </div>
	      				  </li>
	      				  <li class="active">
	      				    <img src="img/banner/cappucino.png" alt="Cappucino Cincau" />
	      				    <div class="orbit-caption">
	      				      Cappucino Cincau
	      				    </div>
	      				  </li>
	      				  <li>
	      				    <img src="img/banner/ipbcloth.png" alt="IPB Clothing" />
	      				    <div class="orbit-caption">
	      				      IPB Clothing
	      				    </div>
	      				  </li>
	    				 </ul>
	        		</div>         
	      		</div>
	      		<!-- ENDOFSLIDER -->
	      	</section>

<!-- NEW BUSINESS SECTION -->
	      	<section>
	      	<div class="row" style="margin-top:2em;">
	          <div class="small-12 medium-8 large-8 medium-centered large-centered columns large-collapse">
	      			<div class="small-10 medium-10 large-10 columns">
	      				<h1 class="">New business</h1>
	      			</div>
	      			<div class="small-2 medium-2 large-2 columns text-right zeropadding">
	      				<div class="ui icon buttons">
	      					<div class="ui teal button">More</div>
	      				</div>
	      			</div>
	          </div>
	          <div class="small-12 medium-8 large-8 medium-centered large-centered columns">

	         	<?php
	         		$i=1;
					foreach ($databusiness as $row) {
					$bname =  $row['business_name'];
					$bimgsrc = $row['business_logo'];
					$bcat =  $row['business_category'];
					$bdesc = $row['business_description'];
					$bslot = $row['business_slot_investments'];
					$bval = $row['business_value_investments'];
				?>	
					<div class="small-4 medium-4 large-4 columns padding" >
		                <a href="<?php echo base_url()."business/detailbusiness/".$bname?>">
		                <div class="ui card">
		                  <div class="image">
		                    <img src="<?php echo $bimgsrc ?>">
		                  </div>
		                  <div class="content">
		                      <div class="header wrap"><?php echo $bname; ?></div>
		                      <div class="meta"><a class="group"><?php echo $bcat; ?></a></div>
		                      <div class="description hide-for-small"><?php echo $bdesc; ?></div>
		                      <div class="description hide-for-medium hide-for-large"><?php echo $bslot.' slots'; ?></div>
		                  </div>
		                  <div class="extra content">
		                      <a class="right floated created hide-for-small"><?php echo $bval.' IDR'; ?></a>
		                      <a class="friends hide-for-small"><?php echo $bslot.' slots'; ?></a>
		                      <a class="right floated created hide-for-large hide-for-medium">IDR</a>
		                      <a class="friends hide-for-large hide-for-medium"><?php echo $bval; ?></a>
		                  </div>
		                </div>
	      		  		</a>
	      		  </div>
	      		  
				<?php if($i++ > 2) { break;}} ?>

	      		</div>
	      	  </div>
	        </section>
<!-- END OF NEW BUSINESS -->
<!-- SUGESTED BUSINESS SECTION -->
			<section>
				<div class="row" style="margin-top:2em;">
		          <div class="small-12 medium-8 large-8 medium-centered large-centered columns large-collapse" style="margin-bottom:10px;">
		      			<div class="small-10 medium-10 large-10 columns">
		      				<h1 class="">Suggested for you</h1>
		      			</div>
		      			<div class="small-2 medium-2 large-2 columns text-right zeropadding">
		      				<div class="ui icon buttons">
		      					<div class="ui teal button">More</div>
		      				</div>
	      				</div>
		          </div>

		          <div class="small-12 medium-8 large-8 medium-centered large-centered columns">
	                <div class="ui card" style="width:100%;">
                		<div class="suggested">
                			<div class="large-collapse">
			                  <div class="small-6 medium-5 large-5 columns">
				                  <div class="image">
				                    <img src="img/banner/bfc.png">
				                  </div>
			                  </div>
			                  <div class="small-6 medium-7 large-7 columns zeropadding">
								  <div class="content">
								      <div class="header">Bara Food Court</div>
								      <div class="meta"><a class="group">Food, Bogor</a></div>
								      <div class="description">Pusat kedai makanan. Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla</div>
								  </div>
							  </div>
							  <div class="small-6 medium-7 large-7 columns zeropadding">
							  	  <div class="extra">
								          <a class="right floated created">500 $</a>
								          <a class="friends">10 slots</a>
								  </div>
							  </div>
							</div>
						</div>                  
	                </div>
	      		  </div> 

		        </div>
			<section>
<!-- ENDOFSUGGESTED -->
			<div class="row ui divider">

			</div>
		</section>
 	</div>
</div><!-- ENFOFCANFAS -->	



