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
                   <?php if($page_title=="Lista uloga"){ ?>
          <form method="post" action="<?php print base_url(); ?>Administracija/formaZaUnos/uloga">
              <input type="submit" class="btn btn-success" name="btnDodajUl" value="Dodaj novu ulogu "/>
          </form><br/>
       <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
    <tr><th>Naziv uloge</th><th></th><th></th></tr>
          <?php foreach($uloge as $key=>$u){
              
           ?>
          <tr><td><?php print $u['naziv']; ?></td><td><a href="<?php print base_url(); ?>Administracija/izmenaUloge/<?php print $u['idUloga']; ?>">Izmeni</a></td><td><a href="<?php print base_url(); ?>Administracija/brisanjeUloge/<?php print $u['idUloga']; ?>">Izbrisi</a></td></tr>
          
          <?php }?>
                </tbody>
      </table>
       </div>
        <?php  
      } ?>
           <?php 
      if($page_title=='Lista korisnika'){ ?>
       <form method="post" action="<?php print base_url(); ?>Administracija/formaZaUnos/korisnik">
              <input type="submit" class="btn btn-success" name="btnDodajK" value="Dodaj novog korisnika "/>
          </form><br/>
      <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                     <tr><th>Ime</th><th>Prezime</th><th>Username</th><th></th><th></th></tr>
          <?php foreach($korisnici as $key=> $k){?>
          <tr><td><?php print $k['ime']?></td><td><?php print $k['prezime']?></td><td><?php print $k['username']?></td><td><a href="<?php print base_url(); ?>Administracija/izmenaKorisnika/<?php print $k['idKorisnik']?>">Izmeni</a></td><td><a href="<?php print base_url(); ?>Administracija/brisanjeKorisnika/<?php print $k['idKorisnik']?>">IZbrisi</a></td></tr>
            
         <?php }
              
              ?>
                </tbody>
      </table>
      </div>
          
       
      <?php }
      ?>
           <?php if($page_title=="Lista stolova"){ ?>
          <form method="post" action="<?php print base_url(); ?>Administracija/formaZaUnos/sto">
              <input type="submit"class="btn btn-success"  name="btnDodajSto" value="Dodaj novi sto "/>
          </form><br/>
       <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr><th>Naziv stola</th><th>Minimalan broj gostiju</th><th>Maximalan broj gostiju</th><th></th><th></th></tr>
          <?php foreach($stolovi as $key=>$s){
              
           ?>
          <tr><td><?php print $s['ime']; ?></td><td><?php print $s['minimum']; ?></td><td><?php print $s['maximum']; ?></td><td><a href="<?php print base_url(); ?>Administracija/izmenaStola/<?php print $s['idSto']; ?>">Izmeni</a></td><td><a href="<?php print base_url(); ?>Administracija/brisanjeStola/<?php print $s['idSto']; ?>">Izbrisi</a></td></tr>
          
          <?php }?>
                </tbody>
      </table>
       </div>
        <?php  
      } ?>
             <?php if($page_title=="Lista jelovnik"){ ?>
           <form method="post" action="<?php print base_url(); ?>Administracija/formaZaUnos/jelovnik">
              <input type="submit" class="btn btn-success" name="btnDodajJ" value="Dodaj novo jelo "/>
          </form><br/>
       <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr><th>Naziv jela</th><th>Cena</th><th></th><th></tr>
          <?php foreach($jelovnici as $key=>$j){
              
           ?>
          <tr><td><?php print $j['naziv'] ?></td><td><?php print $j['cena'] ?></td><td><a href="<?php print base_url(); ?>Administracija/izmenaJelovnika/<?php print $j['idJelovnik'] ?>">Izmeni</a></td><td><a href="<?php print base_url(); ?>Administracija/brisanjeJelovnika/<?php print $j['idJelovnik'] ?>">Izbrisi</a></td></tr>
          
          <?php }?>
                </tbody>
      </table>
       </div>
        <?php  
      } ?>
            <?php if($page_title=="Lista odgovora"){ ?>
           <form method="post" action="<?php print base_url(); ?>Administracija/formaZaUnos/odgovor">
              <input type="submit" class="btn btn-success" name="btnDodajOdgovor" value="Dodaj novi odgovor "/>
          </form><br/>
           <?php if (isset($aOdgovori)){ ?>
       <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr><th>Odgovor</th><th></th><th></tr>
                   
          <?php foreach($aOdgovori as $key=>$ao){
              
           ?>
          <tr><td><?php print $ao['odgovor'] ?></td><td><a href="<?php print base_url(); ?>Administracija/izmenaOdgovora/<?php print $ao['idOdgovor'] ?>">Izmeni</a></td><td><a href="<?php print base_url(); ?>Administracija/brisanjeOdgovora/<?php print $ao['idOdgovor'] ?>">Izbrisi</a></td></tr>
          
          <?php }?>
                </tbody>
      </table>
       </div>
           <?php }
           else{ print "Trenutno ne postoji nijedan odgovor na izabranu anketu";}
           ?>
        <?php  
      } ?>
           <?php if($page_title=="Lista anketa"){ ?>
           <form method="post" action="<?php print base_url(); ?>Administracija/formaZaUnos/anketa">
              <input type="submit" class="btn btn-success" name="btnDodajAnketu" value="Dodaj novu anketu "/>
          </form><br/>
           <form method="post" action="<?php print base_url(); ?>Administracija/formaZaUnos/odgovor">
              <input type="submit" class="btn btn-success" name="btnDodajOdgovor" value="Dodaj novi odgovor "/>
          </form><br/>
       <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr><th>Anketa</th><th>Status</th><th></th><th></tr>
          <?php foreach($ankete as $key=>$a){
              
           ?>
          <tr><td><?php print $a['pitanje'] ?></td><td><?php print $a['status'] ?></td><td><a href="<?php print base_url(); ?>Administracija/listaOdgovora/<?php print $a['idPitanje'] ?>">Odgovori</a></td><td><a href="<?php print base_url(); ?>Administracija/izmenaAnkete/<?php print $a['idPitanje'] ?>">Izmeni</a></td></tr>
          
          <?php }?>
                </tbody>
      </table>
       </div>
        <?php  
      } ?>
          
            <?php if($page_title=="Lista logova"){ ?>
           
       <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr><th>Vrsta promene</th><th>Tabela</th><th>Username korisnika</th><th>Datum i vreme promene</th><th></th></tr>
          <?php foreach($logovi as $key=>$l){
              
           ?>
          <tr><td><?php print $l['promena'] ?></td><td><?php print $l['tabela'] ?></td><td><?php print $l['username'] ?></td><td><?php print date('H:i:s j/n/Y',$l['datum']); ?></td><td><a href="<?php print base_url(); ?>Administracija/brisanjeLogova/<?php print $l['idLog'] ?>">Izbrisi</a></td></tr>
          
          <?php }?>
                </tbody>
      </table>
       </div>
        <?php  
      } ?>
                
			</div>
              <div class="row">
 <div class="col-md-12 text-center">
 <?php if (isset($pagination)) echo $pagination; ?>

</div>

          </div>
              </div>
	
           </div>
        </div>
         </div>
