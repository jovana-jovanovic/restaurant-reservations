   <div class="main"> 
         <div class="reservation_top">
           <div class="container">
             <div class="row">
            	<div class="col-md-5">
            		<div class="contact_left">
            			<h3>Contact Info</h3>
                                    <address class="address">
                    <p>9870 St Vincent Place, <br>Glasgow, DC 45 Fr 45.</p>
                    <dl>
                        <dt></dt>
                        <dd>Freephone:<span> +1 800 254 2478</span></dd>
                        <dd>Telephone:<span> +1 800 547 5478</span></dd>
                        <dd>FAX: <span>+1 800 658 5784</span></dd>
                        <dd>E-mail:&nbsp; <a href="mailto@vintage.com">info(at)vintage.com</a></dd>
                    </dl>
                </address>
            		</div>
            	</div>
            	<div class="col-md-7 contact_right">
            		<div class="col-md-8 contact-form-right">
<h4>Kontakt forma</h4>
 <?php print form_open('Kontakt/mail','class=form-horizontal'); ?>
 <div class="form-group">

 <div class="col-xs-8 col-md-9">
 <?php print form_input(array('id'=>'tbIme','name'=>'tbIme','class'=>'form-control
input-lg forma-elementi','placeholder'=>'Ime','tabindex'=>'1','value'=> set_value('tbIme')));?>
     </div>
 <div class="col-xs-8 col-md-9">
 <?php print form_error('tbIme','<div class="alert alert-warning" role="alert">','</div>');
?>
 </div>
 </div>
 <div class="form-group">

 <div class="col-xs-8 col-md-9">
 <?php print form_input(array('id'=>'tbEmail','name'=>'tbEmail','class'=>'form-control
input-lg forma-elementi','placeholder'=>'Email Adresa','tabindex'=>'2','value'=> set_value('tbEmail')));?>

 </div>
 <div class="col-xs-8 col-md-9">
 <?php print form_error('tbEmail','<div class="alert alert-warning" 
         role="alert">','</div>'); ?>
 </div>
 </div>
 <div class="form-group">

 <div class="col-xs-10 col-md-10">
 <?php print form_textarea(array('name'=>'taPoruka','class'=>'form-control
input-lg forma-elementi', 'onkeyup'=>'Reporuka();', 'id'=>'polje','placeholder'=>'Napisite nam poruku','rows'=>'9','tabindex'=>'3'));?>
     <span id="polje_ispod"></span>
 </div>
 <div class="col-xs-10 col-md-10">
 <?php print form_error('taPoruka','<div class="alert alert-warning"
role="alert">','</div>'); ?>
 </div>
 </div>
 <div class="form-group">
 <div class="col-xs-12 col-md-10 text-center">
 <button type="submit" class="btn btn-success btn-lg" name="forma_kontakt_submit">Submit</button>
 </div>
 </div>

 <?php print form_close(); ?>
 <?php if(!empty($podaci_kontakt)){
 foreach($podaci_kontakt as $poruka){
 print $poruka."<br/>";
 }
 }
 ?>
</div>
								<div class="clearfix"></div>
							</form>
						</div>
            	</div>
            </div>
           </div>
	     </div>

