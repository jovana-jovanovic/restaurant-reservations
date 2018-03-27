 <div class="main"> 
     <br/><br/><br/>
      <div class="header">    
		<div class="header_top">
			<div class="container">
			  <div class="headertop_nav">
				<ul>
					<li><a href="<?php print base_url(); ?>Korisnik/rezervisiSto">Rezervissi sto</a> /</li>
					<li><a href="<?php print base_url(); ?>Korisnik/mojeRezervacije/<?php print $this->session->userdata('id'); ?>">Moje rezervacije</a> </li> 
					
                                </ul>
			</div>
		    
			 <div class="clearfix"></div>
            </div>
		  </div>
      
         <div class="reservation_top">     	
           <div class="container">    
              <h2 class="head"><?php print $page_title ?></h2>
            
              <div class="reservation_grid"> 
         
        
              
           <?php if($page_title=="Rezervacija stola"){?>
          <table class="table table-striped">
             
                    <tbody>
                        <?php print form_open('Korisnik/rezervisiSto',$forma_rezervacija); ?>
                        <tr><td>Izaberite datum:</td><td><?php print form_input($forma_rezervacija_datum) ?></td></tr>
                        <tr><td>Izaberite vreme pocetka rezervacije:</td><td><select name="termini_pocetak" id="termini_pocetak"><option value="0">Izaberi:</option></select></td></tr>
                                    <tr><td>Izaberite vreme kraja rezervacije:</td><td><select name="termini_kraj"id="termini_kraj"><option value="0">Izaberi:</option>
                             
                                            </select></td></tr>
                       
                                    <tr><td>Slobodni stolovi za izabrani termin sa minimalnim i maksimalnim brojem gostiju:</td><td> <select name="ddlRezervacija" id="ddlRezervacija"><option value="0">Izaberi:</option>  <?php print $slobodni_stolovi; ?></select></tr>
                        <tr><td> <?php print form_submit($forma_rezervacija_submit) ?></td><td></td></tr>
 </tbody>
      </table>
                       
 <?php echo form_close(); } ?>
                   
      <?php if($page_title=="Moje rezervacije"){?>
          <table class="table table-striped">
             
                    <tbody>
                        <tr><th>Datum rezervacije</th><th>Vreme pocetka rezervacije</th><th>Vreme kraja rezervacije</th><th>Otkazivanje rezervacije</th></tr>
                        <?php foreach ($rezervacije as $r){ ?>
                        
                        <tr><td><?php print date('j/n/Y',$r['datum']); ?></td><td><?php print $r['vreme_pocetka']; ?></td><td><?php print $r['vreme_kraja']; ?></td><td>
                                <?php if($r['status']==2){
                                    print('Realizovana');
                                }
                              else  if($r['status']==0){
                                    print('Nije realizovana');
                                }
                               else if(mktime(0, 0, 0, date("n")  , date("j"), date("Y")) < $r['datum']){?>
						
                                <a href="<?php print base_url(); ?>Korisnik/otkaziRezervaciju/<?php print $r['idRezervacija']; ?>">Otkazi</a>
                                <?php } else if((mktime(0, 0, 0, date("n")  , date("j"), date("Y"))== $r['datum'])){
                                    if(date('G') < $r['vreme_pocetka']){?>
                                <a href="<?php print base_url(); ?>Korisnik/otkaziRezervaciju/<?php print $r['idRezervacija']; ?>">Otkazi</a>
                                <?php }
                                else  if(date('G') < $r['vreme_kraja']){
                                    print 'Rezervacija u toku';
                                }
                                else{
                                    print "Nije realizovana";
                                }
                               
                                    
                                  
                                
                        }
                      
                                 ?>
                              

                              
                                     
                                </td></tr>
      <?php } ?>
                        </tbody>
      </table>
      <?php } ?>

				
				 
			
	
           </div>
        </div>
         </div>



      