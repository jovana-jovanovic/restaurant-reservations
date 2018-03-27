   <div class="main"> 
         <div class="reservation_top">
           <div class="container">
     <div class="row grids text-center">
				 <div class="col-md-4">
					<div class="view view-tenth">
					      <a href="<?php print base_url();?>Galerija">
						   <div class="inner_content clearfix">
							<div class="product_image">
								<img src="images/g2.jpg" class="img-responsive" alt=""/>
								<div class="label-product">
                                 </div>
								<div class="mask" >
			                        <h2>Pogledajte galeriju slika restorana Vintage</h2>
			                        
			                        
			                    </div>
			                  	</div>
			                 </div>
				            </a> 
				       </div>
				       <div class="product_container wow bounceIn" data-wow-delay="0.4s">
						  <h3><a href="<?php print base_url();?>Galerija">Galerija slika</a></h3>
					      <div class="underheader-line"></div>
					      
					      	
				       </div>		
		            </div>
				    <div class="col-md-4">
					  <div class="view view-tenth">
                                              <?php if($this->session->userdata('idUloga')==2){?>
                                              <a href="<?php print base_url();?>Korisnik">
                                              <?php }
                                              else{?>
                                                  <a href="<?php print base_url();?>Kontakt/rez">
                                                  
                                           <?php   } ?>
						   <div class="inner_content clearfix">
							 <div class="product_image">
								<img src="images/g4.jpg" class="img-responsive" alt=""/>
								<div class="label-product">
                         </div>
								<div class="mask">
			                        <h2>Rezervisite sto u restoranu Vintage</h2>
                                                 
			                       
			                       
			                    </div>
			                  	</div>
			                   </div>
				            </a> 
				       </div>
				       <div class="product_container wow bounceIn" data-wow-delay="0.4s">
						  <h3> <?php if($this->session->userdata('idUloga')==2){?>
                                              <a href="<?php print base_url();?>Korisnik">
                                              <?php }
                                              else{?>
                                                  <a href="<?php print base_url();?>Kontakt/rez">
                                                  
                                           <?php   } ?>Rezervacija stola</a></h3>
					      <div class="underheader-line"></div>
					     
					      	
				       </div>		
		            </div>
				    <div class="col-md-4">
					   <div class="view view-tenth">
					      <a href="<?php print base_url();?>Jelovnik">
						   <div class="inner_content clearfix">
							<div class="product_image">
								<img src="images/g1.jpg" class="img-responsive" alt=""/>
								
								<div class="mask">
			                        <h2>Pogledajte meni restorana Vintage</h2>
			                        
			                         
			                    </div>
			                    </div>
			                  </div>
				            </a> 
				       </div>
				       <div class="product_container wow bounceIn" data-wow-delay="0.4s">
						  <h3><a href="<?php print base_url();?>Jelovnik">Nas meni</a></h3>
					      <div class="underheader-line"></div>
					
					      	
				       </div>		
		            </div>
			 </div>	
            </div>
         <br/><br/>
            <div class="container">          	 
	 		   <h3 class="hist">O nama</h3>
	 		  	<div class="row">
	 		  		<div class="col-sm-6">
	 		  			<img src="images/h1.jpg" class="img-responsive" alt=""/>
	 		  		</div>
	 		  		<div class="col-sm-6 history_grid">
	 		  			
	 		  			<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option </p>
	 		  			
	 		  		</div>
	 		    </div>
	       </div>
	    </div>
	     </div>

