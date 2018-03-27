 <div class="footer">
         <div class="container"><br/>   	 
           	 <div class="footer_top">
           	 	<div class="row">
           	 	   <div class="col-md-4 footer_grid">
           	 			
					  
                                      <?php if ((isset($anketa)) && (isset($odgovori)) )   {?>    
                               <h4><?php print $anketa; ?></h4>
 <table >
 <tbody id="options">
 <?php foreach ($odgovori as $o){
 $idOdgovor=$o['idOdgovor'];
 $odgovor=$o['odgovor']; ?>
 <tr>
 <td>
 <input type="radio" class="radio-anketa" name="odgovor" value="<?php print $idOdgovor; ?>" id="<?php print $idOdgovor; ?>"/>
 <label for="<?php print $idOdgovor; ?>"><span></span><?php print $odgovor; ?></label>
 </td>
 </tr>
 <?php
                                          }
 ?>
 </tbody>
 <tbody id="results">

 </tbody>
 <tr>
 <td colspan="2"><input type='button' class='btn btn-success anketa-btn' id='btnglasaj'value='Glasaj'/></td>
 </tr>
 </table>
                                         
                               <div id="odgovor4"></div><?php }?>
                                      </div>
           	 		
           	 		<div class="col-md-4 footer_grid">
           	 			<h4>Linkovi</h4>
           	 			<div class="footer-list">
						 <ul>
                                                    
                                                         <p> <?php if(!empty($meni_podaci)){
 foreach($meni_podaci as $mp){
 ?>
<li><?php print anchor($mp['putanja'],$mp['naslov'])?></li>
 <?php
}
 }
 ?></p>
							
                                                 
                                                 </ul>
					    </div>
           	 		</div>
           	 		<div class="col-md-4 footer_grid">
           	 			<h4>Nasa adresa</h4>
           	 			<div class="company_address">
				     	        <p>500 Lorem Ipsum Dolor Sit,</p>
						   		<p>22-56-2-9 Sit Amet, Lorem,</p>
						   		
				   		<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p> <span><a href="<?php print base_url(); ?>kontakt">Kontaktirajte nas</a></span></p>
				   		</div>
				    
           	 		</div>
           	     </div>
                      <div class="copy_right">
						<p>&copy; 2016 Jovana Jovanovic</p>
				   </div>
				   
				  
				</div>
           	  </div>
                
	</div>
       </div>
       <script src="<?php print base_url();?>js/lightbox.js" language="javascript"></script>

       <script type="text/javascript">
           $(document).ready(function() {
               $('#results').html("");
                                                                                $('#results').hide();
                                                                                $('#odgovor4').text("");
                                                                                $('#btnglasaj').click(function(){
                                                                                    var idOdgovor=$('input[name=odgovor]:checked').val();
                                                                                    if(idOdgovor==null){
                                                                                        $('#odgovor4').addClass('alert alert-danger');
                                                                                        $('#odgovor4').text("Morate izabrati odgovor!");
                                                                                    }
                                                                                    else{
                                                                                    var podaci={idOdgovor:idOdgovor};
                                                                                    $.post('http://restoranvintage.esy.es/Kontakt/anketa_glasanje',podaci,function(podaci){
                                                                                        var obj=JSON.parse(podaci);
                                                                                        if(obj.poruka_greska){
                                                                                            $('#odgovor4').addClass('alert alert-danger');
                                                                                         $('#odgovor4').text(obj.poruka_greska);
                                                                                        }
                                                                                        else{
                                                                                            
                                                                                            var all_results=obj.all_results[0].rezultat;
                                                                                            var vrednost=100/all_results;
                                                                                            for(var i=0;i<obj.results.length;i++){
                                                                                                var result=obj.results[i].rezultat * vrednost;
                                                                                                var title=obj.results[i].odgovor;
                                                                                                $('#results').append("<tr><td> "+title+"  "+"<span class='procenti'>"+ Math.round(result)+"%</span></td></tr>");
                                                                                            }
                                                                                            $('#odgovor4').addClass('alert alert-success');
                                                                                            $('#odgovor4').text(obj.poruka);    
                                                                                         }
                                                                                     });
                                                                                     
                                                                                 $('#options').hide();
                                                                                 $('#results').show();
                                                                                 $(this).addClass('disabled');
                                                                                 }
                                                                                });
                                                                                    
                                                                                
										
									});
	</script>
	 <script src="<?php print base_url();?>js/jsscript.js" type="text/javascript"></script>
           
</body>
 
</html>



