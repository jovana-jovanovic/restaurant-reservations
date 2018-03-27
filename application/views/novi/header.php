<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<html>
<head>

    <script src="<?php print base_url();?>js/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="<?php print base_url();?>js/jquery-ui.js" type="text/javascript"></script>
<title>Restoran Vintage</title>
<link href="<?php print base_url();?>css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link rel="stylesheet" href="<?php print base_url();?>css/jquery-ui.css" />


<link href="<?php print base_url();?>css/style.css" rel='stylesheet' type='text/css' />
<meta name="keywords" content="Restoran,Rezervacija stola">
<meta name="Jovana Jovanović" content="author"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php print base_url();?>css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300:700' rel='stylesheet' type='text/css'>

<link href="<?php print base_url();?>css/lightbox.min.css" rel="stylesheet" type="text/css"/>


<script>
		$(function() {
	    var button = $('#loginButton');
	    var box = $('#loginBox');
	    var form = $('#loginForm');
	    button.removeAttr('href');
	    button.mouseup(function(login) {
	        box.toggle();
	        button.toggleClass('active');
	    });
	    form.mouseup(function() { 
	        return false;
	    });
	    $(this).mouseup(function(login) {
	        if(!($(login.target).parent('#loginButton').length > 0)) {
	            button.removeClass('active');
	            box.hide();
	        }
	    });
	});
   </script>
     <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>

  <script type="text/javascript">
      var baseUrl="<?php echo base_url();?>";

      function Datum(){
        this.datum;
        this.termin;


      }
      function Termin(){

        this.termini_pocetak;
        this.terminiNiz=[];
        this.idTerminiNiz=[];
        this.termini_kraj;
        this.sto;

        this.init=function(){

                var self=this;
                self.terminiNiz=[];
                self.idTerminiNiz=[];
                self.sto=0;
                self.ajaxKraj(function(response,response1){
                   for (var i = 0; i < response.length; i++) {
                        self.terminiNiz[i]=response[i];
                       }

                   for (var i = 0; i < response1.length; i++) {
                        self.idTerminiNiz[i]=response1[i];
                       }

                self.ispis();

                 })
              }

         this.ajaxPocetak=function(callback){

                  $.post(baseUrl+'Korisnik/ajaxChange',eval('(' + JSON.stringify(this) + ')'),function(podaci){
                  var termini=$.parseJSON(podaci);
                  var nizTmpTermin=[];
                  var nizTmpIdTermin=[];
                  var ispis="<option value='0'>Izaberi</option>";
                  $('#termini_kraj').html(ispis);
                  $('#ddlRezervacija').html(ispis);


                      for(var i=0;i<termini.length;i++){
                          nizTmpTermin[i]=termini[i].termin;
                          nizTmpIdTermin[i]=termini[i].idTermin;
                             }

                    callback(nizTmpTermin,nizTmpIdTermin);

                   });

                   }
          this.initPocetak=function(){

                  var self=this;
                  self.terminiNiz=[];
                  self.idTerminiNiz=[];
                  self.termini_kraj=0;
                  self.sto=0;

                  self.ajaxPocetak(function(response,response1){
                      for (var i = 0; i < response.length; i++) {
                          self.terminiNiz[i]=response[i];
                              }

                      for (var i = 0; i < response1.length; i++) {
                          self.idTerminiNiz[i]=response1[i];
                              }

                  self.ispisPocetak();

                            })
                         }

          this.ispisPocetak=function(){

                  var self=this;
                  var isp="<option value='0'>Izaberi</option>";
                  $('#ddlRezervacija').html(isp);
                      for(var i=0;i<self.terminiNiz.length;i++){
                          isp+="<option value='"+self.idTerminiNiz[i]+"'>"+self.terminiNiz[i]+"</option>";
                                   }
                  $('#termini_pocetak').html(isp);

                             }



         this.ispis=function(){

                 var self=this;
                 var isp="<option value='0'>Izaberi</option>";
                 $('#ddlRezervacija').html(isp);
                       for(var i=0;i<self.terminiNiz.length;i++){
                          isp+="<option value='"+self.idTerminiNiz[i]+"'>"+self.terminiNiz[i]+"</option>";
                        }
                 $('#termini_kraj').html(isp);

                  }


         this.ajaxKraj=function(callback){
                  $.post(baseUrl+'Korisnik/terminiKraj',eval('(' + JSON.stringify(this) + ')'),function(podaci){
                  var termini=$.parseJSON(podaci);
                  var nizTmpTermin=[];
                  var nizTmpIdTermin=[];

                       for(var i=0;i<termini.length;i++){
                            nizTmpTermin[i]=termini[i].termin;
                            nizTmpIdTermin[i]=termini[i].idTermin;
                          }

                 callback(nizTmpTermin,nizTmpIdTermin);

                });

                }
              }

      function Sto(){

        this.stoIzbor;
        this.termini_pocetak;
        this.termini_kraj;
        this.datum;
        this.stoloviNiz=[];
        this.idStoloviNiz=[];


        this.init=function(){
                var self=this;
                self.ajaxSto(function(response,response1){
                      for (var i = 0; i < response.length; i++) {
                            self.stoloviNiz[i]=response[i];
                                 }

                      for (var i = 0; i < response1.length; i++) {
                            self.idStoloviNiz[i]=response1[i];
                                 }

                  self.ispis();

                           })
                        }
        this.ispis=function(){

                var self=this;
                var isp="<option value='0'>Izaberi</option>";
                     for(var i=0;i<self.stoloviNiz.length;i++){
                          isp+="<option value='"+self.idStoloviNiz[i]+"'>"+self.stoloviNiz[i]+"</option>";
                                 }
                $('#ddlRezervacija').html(isp);

                         }



       this.ajaxSto=function(callback){
                 $.post(baseUrl+'Korisnik/rezervacija',eval('(' + JSON.stringify(this) + ')'),function(podaci){
                 var stolovi=$.parseJSON(podaci);
                 var nizTmpSto=[];
                 var nizTmpIdSto=[];

                      for(var i=0;i<stolovi.length;i++){
                            nizTmpSto[i]=stolovi[i].ime;
                            nizTmpIdSto[i]=stolovi[i].idSto;
                                }

                      callback(nizTmpSto,nizTmpIdSto);

                         });

                         }
                       }


    function Rezervacija(){

      this.termini_pocetak;
      this.termini_kraj;
      this.datum;
      this.ddlRezervacija;

      this.ajaxRezervacija=function(){
      $.post(baseUrl+'Korisnik/rezAjax',eval('(' + JSON.stringify(this) + ')'),function(podaci){

                     alert(podaci);
                     window.location = baseUrl+'Korisnik/rezervisiSto';
                   

                                             });

                                           }
                   }



                   $(document).ready(
                       function(){
                         var datumIzbor=new Datum();
                         var termin=new Termin();
                         var sto=new Sto();
                           $("#datepicker").change(function(){
                             dat=$('#datepicker').val();
                             datumIzbor.termin=termin;
                             datumIzbor.datum=dat;
                             datumIzbor.termin.initPocetak();

                         });


                           $("#termini_pocetak").change(function(){
                              poc=$('#termini_pocetak').val();
                              termin.termini_pocetak=poc;
                              termin.init();

                                 });



                           $("#termini_kraj").change(function(){
                               poc=$('#termini_pocetak').val();
                               kraj=$('#termini_kraj').val();
                               dat=$('#datepicker').val();
                               termin.termini_kraj=kraj;
                               termin.sto=sto;
                               termin.sto.datum=datumIzbor.datum;
                               termin.sto.termini_pocetak=termin.termini_pocetak;
                               termin.sto.termini_kraj=termin.termini_kraj;
                               termin.sto.init();



                                   });


                           $("#forma_rezervacija_submit").click(function(e){

                             e.preventDefault();
                             var rezervacija=new Rezervacija();
                               st=$('#ddlRezervacija').val();
                               sto.stoIzbor=st;
                               rezervacija.termini_pocetak=termin.termini_pocetak;
                               rezervacija.termini_kraj=termin.termini_kraj;
                               rezervacija.datum=datumIzbor.datum;
                               rezervacija.ddlRezervacija=st;
                               rezervacija.ajaxRezervacija();
                             });



                               }
                               );





                   </script>


















     <title><?php print $page_title ?></title>
   <!----font-Awesome----->
<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
<!----font-Awesome----->
<!---strat-date-piker---->

</head>