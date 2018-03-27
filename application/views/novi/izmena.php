 <div class="main"> 
     <br/><br/><br/>
     <div class="header">    
		<div class="header_top">
			<div class="container">
			  <div class="headertop_nav">
				<ul>
					<li><a href="<?php print base_url(); ?>Administracija/listaKorisnika">Upravljaj korisnicima</a> /</li> 
					<li><a href="<?php print base_url(); ?>Administracija/listaStolova">Upravljaj stolovima</a> /</li> 
					<li><a href="<?php print base_url(); ?>Administracija/listaJelovnik">Upravljaj jelovnikom</a>/</li>
                    <li><a href="<?php print base_url(); ?>Administracija/listaAnketa">Upravljaj anketama</a></li> 					
					<li><a href="<?php print base_url(); ?>Administracija/slika">Dodaj sliku u galeriju</a> /</li>
				     <li><a href="<?php print base_url(); ?>Administracija/listaLogova">Upravljaj logovima</a></li> 
                                        
                                </ul>
			</div>
                            
		    
			 <div class="clearfix"></div>
            </div>
		  </div>
         <div class="reservation_top">     	
           <div class="container">    
              <h2 class="head"><?php print $page_title ?></h2>
            
              <div class="reservation_grid"> 
                  <div class="table-responsive">
         <?php if($page_title=="Izmena uloga"){?>
         <?php echo form_open('Administracija/izmenaUloge',$forma_uloga); ?>
            <table class="table table-striped">
                <tr>  <td><?php echo form_hidden($forma_uloga_id) ?></td> <td></td>   
                    </tr>
                <tbody><tr><td><?php echo form_label('Naslov uloge','naslov'); ?></td>
                         <td><?php echo form_input($forma_uloga_naziv) ?></td></tr>
                    
                    <tr><td><?php echo form_submit($forma_uloga_submit) ?></td><td></td>
		</tr>
                    
                  
                    
                    </tbody>
      </table>
         <?php echo form_close(); } ?>
                       <?php if($page_title=="Izmena ankete"){?>
         <?php echo form_open('Administracija/izmenaAnkete',$forma_anketa); ?>
            <table class="table table-striped">
                <tr>  <td><?php echo form_hidden($forma_anketa_id) ?></td> <td></td>   
                    </tr>
                <tbody><tr><td><?php echo form_label('Pitanje','pitanje'); ?></td>
                         <td><?php echo form_input($forma_anketa_pitanje) ?></td></tr>
                    <tr><td><?php echo form_label('Status','status'); ?></td>
                         <td><?php echo form_dropdown('forma_anketa_status',$forma_anketa_status,$status) ?></td></tr>
                    
                    <tr><td><?php echo form_submit($forma_anketa_submit) ?></td><td></td>
		</tr>
                    
                  
                    
                    </tbody>
      </table>
         <?php echo form_close(); } ?>
          <?php if($page_title=="Izmena odgovora"){?>
         <?php echo form_open('Administracija/izmenaOdgovora',$forma_odgovor); ?>
            <table class="table table-striped">
                <tr>  <td><?php echo form_hidden($forma_odgovor_id) ?></td> <td></td>   
                    </tr>
                <tbody><tr><td><?php echo form_label('Odgovor','odgovor'); ?></td>
                         <td><?php echo form_input($forma_odgovor_odgovor) ?></td></tr>
                   
                    
                    <tr><td><?php echo form_submit($forma_odgovor_submit) ?></td><td></td>
		</tr>
                    
                  
                    
                    </tbody>
      </table>
         <?php echo form_close(); } ?>
         
                 <?php if($page_title=="Izmena korisnika"){?>
         <?php echo form_open('Administracija/izmenaKorisnika',$forma_korisnik); ?>
            <table class="table table-striped">
                 <tr>  <td><?php echo form_hidden($forma_korisnik_id)?></td> <td></td>   
                    </tr>
                <tbody><tr><td><?php echo form_label('Ime korisnika','ime'); ?></td>
                        <td><?php echo form_input($forma_korisnik_ime) ?></td></tr>
            
                    <tr><td><?php echo form_label('Prezime korisnika','prezime'); ?></td>
                        <td><?php echo form_input($forma_korisnik_prezime) ?></td></tr>
                    <tr><td><?php echo form_label('Username korisnika','username'); ?></td>
                        <td><?php echo form_input($forma_korisnik_username) ?></td></tr>
                    <tr><td><?php echo form_label('Password korisnika','password'); ?></td>
                        <td><?php echo form_input($forma_korisnik_password) ?></td></tr>
                    <tr><td><?php echo form_label('Mail korisnika','mail'); ?></td>
                        <td><?php echo form_input($forma_korisnik_mail) ?></td></tr>
                    
                    <tr><td><?php echo form_submit($forma_korisnik_submit) ?></td><td></td>
		</tr>
                    
                  
                    
                    </tbody>
      </table>
         <?php echo form_close(); } ?>
          <?php if($page_title=="Izmena stola"){?>
         <?php echo form_open('Administracija/izmenaStola',$forma_sto); ?>
            <table class="table table-striped">
                 <tr> <td><?php echo form_hidden($forma_sto_id) ?></td>  <td></td>   
                    </tr>
                <tbody><tr><td><?php echo form_label('Naslov stola','naslov'); ?></td>
                         <td><?php echo form_input($forma_sto_ime) ?></td></tr>
               
                     <tr>
                         <td><?php echo form_label('Minimalan broj gostiju: ','minimum'); ?></td> 
                         <td><?php echo form_input($forma_sto_minimum) ?></td>  </tr> 
                      <tr>  
                          <td><?php echo form_label('Maximalan broj gostiju: ','maximum'); ?></td>
                          <td><?php echo form_input($forma_sto_maximum) ?></td>  </tr>
                              
                    
                      <tr><td><?php echo form_submit($forma_sto_submit) ?></td><td>
		</tr>
                    
                  
                    
                    </tbody>
      </table>
         <?php echo form_close(); } ?>
           <?php if($page_title=="Izmena jela"){?>
         <?php echo form_open('Administracija/izmenaJelovnika',$forma_jelovnik); ?>
            <table class="table table-striped">
                <tr> <td><?php echo form_hidden($forma_jelovnik_id) ?></td>  <td></td>   
                    </tr>
                
                <tbody><tr><td><?php echo form_label('Naziv jela:','nazivJela'); ?></td>
                   <td><?php echo form_input($forma_jelovnik_naziv) ?></td></tr>
                    <tr><td><?php echo form_label('Cena jela: ','cenaJela'); ?></td>  
                        <td><?php echo form_input($forma_jelovnik_cena) ?></td></tr>
                   
                    <tr><td><?php echo form_submit($forma_jelovnik_submit) ?></td><td></td>
                        
		</tr>
                    
                  
                    
                    </tbody>
      </table>
         <?php echo form_close(); } ?>
				
				 
			</div>
	
           </div>
        </div>
         </div>



