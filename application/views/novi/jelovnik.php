   <div class="main"> 
         <div class="reservation_top">
           <div class="container">
             <div class="row">
               <?php if($page_title=="Jelovnik"){ ?>
                 <h2> <?php print $page_title; ?></h2><br/>
       <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr><th>Naziv jela</th><th>Cena u rsd</th></tr>
          <?php foreach($jelovnici as $key=>$j){
              
           ?>
          <tr><td><?php print $j['naziv'] ?></td><td><?php print $j['cena']; ?></td></tr>
          
          <?php }?>
                </tbody>
      </table>
        <?php  
      } ?>
            	</div>
            </div>
           </div>
	     </div>

