 <div class="main"> 
     <br/><br/><br/>
      <div class="header">    
		<div class="header_top">
			<div class="container">
			  <div class="headertop_nav">
				<ul>
					<li><a href="<?php print base_url(); ?>Zaposleni/danasRezervacije">Rezervacije za danasnji dan</a> </li> 
					 <li><a href="<?php print base_url(); ?>Zaposleni/aktivneRezervacije">Aktivne rezervacije</a> </li> 
                                        <li><a href="<?php print base_url(); ?>Zaposleni/zavrseneRezervacije">Zavrsene rezervacije</a> </li>
                                       
					
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
                   
      <?php if($page_title=="Zavrsene rezervacije"){?>
          <table class="table table-striped">
             
                    <tbody>
                        <tr><th>Datum rezervacije</th><th>Vreme pocetka rezervacije</th><th>Vreme kraja rezervacije</th><th>Korisnicko ime</th><th>Status rezervacije</th></tr>
                        <?php foreach ($rezervacije as $r){ ?>
                        
                        <tr><td><?php print date('j/n/Y',$r['datum']); ?></td><td><?php print $r['vreme_pocetka']; ?></td><td><?php print $r['vreme_kraja']; ?></td><td><?php print $r['username']; ?></td><td>
                                <?php if($r['status']==0){
                                    print 'Nije realizovana';
                                    
                                }
                                else if($r['status']==2){
                                    print('Realizovana');
                                }
                                else{
                                    print "";
                                }
                              ?>
                                     
                                </td></tr>
      <?php } ?>
                        </tbody>
      </table>
      <?php } ?>
                  <?php if($page_title=="Danasnje rezervacije"){?>
				                      <script>
var baseUrl="<?php echo base_url();?>";

if(typeof(EventSource) !== "undefined") {
var lastId = '';
var source = new EventSource(baseUrl+"<?php echo 'Zaposleni/rezervacijePromenaDanas'; ?>");
source.onmessage = function(event) {
var json_object = eval( '(' + event.data + ')');
var list = "<tr><th>Datum rezervacije</th><th>Vreme pocetka rezervacije</th><th>Vreme kraja rezervacije</th><th>Korisnicko ime</th><th>Status rezervacije</th></tr>";
for(var i=0;i<json_object.length;i++){
var timestamp=new Date(json_object[i].datum*1000).getTime();


var todate=new Date(timestamp).getDate();
var tomonth=new Date(timestamp).getMonth()+1;
var toyear=new Date(timestamp).getFullYear();
var original_date=tomonth+'/'+todate+'/'+toyear;
var status="";
if(json_object[i].status==2){

status="Realizovana";
}


else if(json_object[i].status==1){


var currentTime = new Date();
// var todate1=new Date(currentTime).getDate();
// var tomonth1=new Date(currentTime).getMonth()+1;
// var toyear1=new Date(currentTime).getFullYear();
var hour=new Date(currentTime).getHours();
// var timestamp_formation=new Date(tomonth1+'/'+todate1+'/'+toyear1).getTime();





    if(hour<json_object[i].vreme_pocetka){
      status="<a href="+baseUrl+"Zaposleni/otkaziRezervaciju/"+json_object[i].idRezervacija+">Otkazi</a>";
    }
    else {
      status="<a href="+baseUrl+"Zaposleni/potvrdiRezervaciju/"+json_object[i].idRezervacija+">Potvrdi rezervaciju</a>";
}







}
else{
status="Nije realizovana";
}
list += "<tr><td>"+original_date+ "</td><td>"+json_object[i].vreme_pocetka+"</td><td>"+json_object[i].vreme_kraja+"</td><td>"+json_object[i].username+"</td><td>"+status+"</td></tr>";
}
$('#rezultat').html(list);


// lastId = event.data;
}};
//         document.getElementById("rezultat").innerHTML += event.data + "<br>";
//     };
// } else {
//     document.getElementById("rezultat").innerHTML = "Sorry, your browser does not support server-sent events...";
// }
</script>
          <table class="table table-striped">
             
                    <tbody id="rezultat">
                        
                        </tbody>
      </table>
      <?php } ?>
                                 <?php if($page_title=="Aktivne rezervacije"){?>
								    <script>
          var baseUrl="<?php echo base_url();?>";

          if(typeof(EventSource) !== "undefined") {
				  var lastId = '';
				  var source = new EventSource(baseUrl+"<?php echo 'Zaposleni/rezervacijePromena'; ?>");
				  source.onmessage = function(event) {
				var json_object = eval( '(' + event.data + ')');
				var list = "<tr><th>Datum rezervacije</th><th>Vreme pocetka rezervacije</th><th>Vreme kraja rezervacije</th><th>Korisnicko ime</th><th>Status rezervacije</th></tr>";
				for(var i=0;i<json_object.length;i++){
                var timestamp=new Date(json_object[i].datum*1000).getTime();


           var todate=new Date(timestamp).getDate();
           var tomonth=new Date(timestamp).getMonth()+1;
           var toyear=new Date(timestamp).getFullYear();
           var original_date=tomonth+'/'+todate+'/'+toyear;
           var status="";
         if(json_object[i].status==2){

           status="Realizovana";
         }


         else if(json_object[i].status==1){


               var currentTime = new Date();
               var todate1=new Date(currentTime).getDate();
               var tomonth1=new Date(currentTime).getMonth()+1;
               var toyear1=new Date(currentTime).getFullYear();
               var hour=new Date(currentTime).getHours();
               var timestamp_formation=new Date(tomonth1+'/'+todate1+'/'+toyear1).getTime();

              if (timestamp_formation<timestamp){
                status="<a href="+baseUrl+"Zaposleni/otkaziRezervaciju/"+json_object[i].idRezervacija+"> Otkazi</a>";
              }
              else if(timestamp_formation==timestamp){



                   if(hour<json_object[i].vreme_pocetka){
                     status="<a href="+baseUrl+"Zaposleni/otkaziRezervaciju/"+json_object[i].idRezervacija+">Otkazi</a>";
                   }
                   else {
                     status="<a href="+baseUrl+"Zaposleni/potvrdiRezervaciju/"+json_object[i].idRezervacija+">Potvrdi rezervaciju</a>";
              }







         }}
         else{
           status="Nije realizovana";
         }
           list += "<tr><td>"+original_date+ "</td><td>"+json_object[i].vreme_pocetka+"</td><td>"+json_object[i].vreme_kraja+"</td><td>"+json_object[i].username+"</td><td>"+status+"</td></tr>";
         }
        $('#rezultat').html(list);


        // lastId = event.data;
    }};
          //         document.getElementById("rezultat").innerHTML += event.data + "<br>";
          //     };
          // } else {
          //     document.getElementById("rezultat").innerHTML = "Sorry, your browser does not support server-sent events...";
          // }
          </script>

          <table class="table table-striped">
             
                    <tbody id="rezultat">
       
                        </tbody>
      </table>
      <?php } ?>

				
				 
			  <div class="row">
 <div class="col-md-12 text-center">
 <?php if (isset($pagination)) echo $pagination; ?>

</div>

          </div>
	
           </div>
        </div>
         </div>



      