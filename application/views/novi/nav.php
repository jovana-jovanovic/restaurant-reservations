<div class="header">    
		<div class="header_top">
			<div class="container">
			  <div class="headertop_nav">
                            
                              
				<ul>
					<li><a href="<?php print base_url();?>pr_wp_185_13.pdf">Dokumentacija</a> </li>
					
				</ul>
			</div>
		    <div class="header-top-right">
		        <div class="login_box">
	    		   <div id="loginContainer">
                               <?php  if(isset($ulogovan)&& $ulogovan==TRUE){?>
	                  <a href="<?php print base_url();?>Logovanje/logout">Izloguj se</a>               
	                                <?php }
                                        else{?>
                                         <a href="<?php print base_url();?>Logovanje/index">Uloguj se</a> 
                               <?php }?>
	              </div>
	           </div> 
			 </div>
			 <div class="clearfix"></div>
            </div>
		  </div>
 	    <div class="header_bottom">
		 	  <div class="container">	 			
				<div class="logo">
					<h1><a href="<?php print base_url();?>/Pocetna">Vintage<span>Restaurant</span></a></h1>
				</div>				
			<div class="navigation">	
			<div>
              <label class="mobile_menu" for="mobile_menu">
              <span>Menu</span>
              </label>
              <input id="mobile_menu" type="checkbox">
				<ul class="nav">
                                      <?php if(!empty($meni_podaci)){
 foreach($meni_podaci as $mp){
 ?>
<li><?php print anchor($mp['putanja'],$mp['naslov'])?></li>
 <?php
}
  if($this->session->userdata('idUloga')==1){?>
<li>  <a href="<?php print base_url();?>Administracija">Admin</a> </li>              
	                                <?php }
                                        else if($this->session->userdata('idUloga')==2){?>
<li> <a href="<?php print base_url();?>Korisnik">Rezervacije</a> </li>
                               <?php }
 else if($this->session->userdata('idUloga')==3){?>
<li> <a href="<?php print base_url();?>Zaposleni">Rezervacije</a> </li>
                               <?php }?>
<?php }
 ?>
              
            <div class="clearfix"></div>
          </ul>
		</div>			
	   </div>
       <div class="clearfix"></div>		   
      </div>
     </div>
    <?php if (isset($page_title) && $page_title=='Pocetna'){
        ?>
    <div id="slider">
        
	  
	</div>
    <?php }
    else{ ?>
	 <div class="reservation_banner">
		<div class="main_title">Online Reservation Form</div>
		<div class="divider"></div>
	 </div>
    <?php } ?>
	</div>
