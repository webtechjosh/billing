var particulars = particulars;
$('#previewprofomainvoice').on('click', function(){

  var okprint   = false;
  var partyname = new RegExp('^[A-Z]{1}[A-Za-z 0-9]+$');
  var gstno     = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');
  var mobile    = new RegExp('^[0-9]{10}$');
  var invoiceno = new RegExp('^[0-9]{1,}$');

  var gstValue     = $('#gstno').val();
  var nameValue    = $('#party_name').val();
  var mobValue     = $('#mobileno').val();
  var stateValue   = $('#state').val(); 
  var invoiceValue = $('#billno').val(); 

  if(nameValue !== ''){
    printok = true;
    $("#errorname").text('').css('color', '');
  } else {
    printok = false;
    $("#errorname").text('Party name required').css('color', 'red');
  }

  if(gstno.test(gstValue) || gstValue == '' ){
    printok = true;
    $("#errorgst").text('').css('color', '');
  } else {
    printok = false;
    $("#errorgst").text('Invalid GST').css('color', 'red');
  }
  
  if(mobile.test(mobValue)){
    printok = true;
    $("#errormob").text('').css('color', '');
  } else {
    printok = false;
    $("#errormob").text('Mobile no should be 10 digits').css('color', 'red');
  }  

    
  if(stateValue !== ''){
    printok = true;
    $("#errorstate").text('').css('color', '');
  } else {
    printok = false;
    $("#errorstate").text('State must be selected').css('color', 'red');
  }


  if(invoiceno.test(invoiceValue)){
    printok = true;
    $("#errorinvno").text('').css('color', '');
  } else {
    printok = false;
    $("#errorinvno").text('Enter Invoice no.').css('color', 'red');
  }
//errorname | errorgst | errormob | erroradd | errorstate | errorprefix | errorinvno | errordate
//desc_ | hsn_ | rate_ | gst_ | mrpgst_ | qty_ | disc_ | total_

    if(printok){
      var hsn       = new RegExp('^[1-9][0-9]{3}$');
      var rate      = new RegExp('^[0-9]+$');
      var gst       = new RegExp('^[0-9]+$');
      var qty       = new RegExp('^[0-9]+$');
      var discount  = new RegExp('^[0-9]+$');
    
      for(pc = 1; pc <= particulars; pc++){
        var desc1  = $('#desc_' + pc).val(); 
        var hsn1   = $('#hsn_' + pc).val(); 
        var rate1  = $('#rate_' + pc).val(); 
        var gst1   = $('#gst_' + pc).val(); 
        var mrpgst1= $('#mrpgst_' + pc).val(); 
        var qty1   = $('#qty_' + pc).val(); 
        var disc1  = $('#disc_' + pc).val();                                     
          
        if(hsn.test(hsn1)){
          printok = true;
          $('#hsn_' + pc).css('background-color', '');     
        } else {
          printok = false;
          $('#hsn_' + pc).css('background-color', 'red');  
        }
    
        if(rate.test(rate1)){
          printok = true;
          $('#rate_' + pc).css('background-color', '');      
        } else {
          printok = false;
          $('#rate_' + pc).css('background-color', 'red');    
        }
    
        if(qty.test(qty1)){
          printok = true;
          $('#qty_' + pc).css('background-color', '');      
        } else {
          printok = false;
          $('#qty_' + pc).css('background-color', 'red');    
        }
    
        if(discount.test(disc1)){
          printok = true;
          $('#disc_' + pc).css('background-color', '');      
        } else {
          printok = false;
          $('#disc_' + pc).css('background-color', 'red');    
        }
    
      }
    }

 if(printok){
      var frmData = $('#proformabill').serialize();
      $.ajax({
            url: baseURL+'bill/previewinvoice',
            type: 'POST',
            data: frmData,
            success: function (data) {
              $('#itembody').html(data);
            }
      });
      $('#printpartyname').text($('#party_name').val());
      $('#printinvoiceno').text($('#billno').val());
      $('#printaddress').text($('#address').val());
      $('#printdate').text($('#invoice_date').val());                  
      $('#printgst').text($('#gstno').val());
      $('#printstate').text($('#state').val());
      $('#printmobno').text($('#mobileno').val());
      $('#printstatecode').text($('#state_code').val());
      $('#printstatecode').text($('#state_code').val());
  
     var narrationMsg ='';
     if($('#narration').val() !== ''){
        narrationMsg = '<h4><u>Narration</u></h4>' + $('#narration').val();        
      }
      var footerMsg = '<h4><u>Declaration</u></h4>' + $('#bill_footer').val();

      $('#printnarration').html($('#narration').val());
      $('#printfooter').html($('#bill_footer').val());
      /* $('#printnarration').html(narrationMsg + footerMsg);    
      $('#printnarration').html($('#state_code').val()); 
      $('#printfooter').html($('#narration').val());  */

      $('#previewprofomainvoice').attr('data-target', '#modal-xl');  
  }
});

$('#saveprofomainvoice').on('click', function(){
  $('#proformabill').submit();
});


$('#previeweditproformainvoice').on('click', function(){
  var okprint   = true;
  var partyname = new RegExp('^[A-Z]{1}[A-Za-z 0-9]+$');
  var gstno     = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');
  var mobile    = new RegExp('^[0-9]{10}$');
  var invoiceno = new RegExp('^[0-9]{1,}$');

  var gstValue     = $('#gstno').val();
  var nameValue    = $('#party_name').val();
  var mobValue     = $('#mobileno').val();
  var stateValue   = $('#state').val(); 
  var stateCode    = $('#state_code').val(); 
  var invoiceValue = $('#billno').val(); 

  if(nameValue !== ''){
    printok = true;
    $("#errorname").text('').css('color', '');
  } else {
    printok = false;
    $("#errorname").text('Party name required').css('color', 'red');
  }

  if(gstno.test(gstValue) || gstValue == '' ){
    printok = true;
    $("#errorgst").text('').css('color', '');
  } else {
    printok = false;
    $("#errorgst").text('Invalid GST').css('color', 'red');
  }
  
  if(mobile.test(mobValue)){
    printok = true;
    $("#errormob").text('').css('color', '');
  } else {
    printok = false;
    $("#errormob").text('Mobile no should be 10 digits').css('color', 'red');
  }  

  if(stateValue != ''){
    printok = true;
    $("#errorstate").text('').css('color', '');
  } else {
    printok = false;
    $("#errorstate").text('State must be selected').css('color', 'red');
  }


  if(invoiceno.test(invoiceValue)){
    printok = true;
    $("#errorinvno").text('').css('color', '');
  } else {
    printok = false;
    $("#errorinvno").text('Enter Invoice no.').css('color', 'red');
  }
//errorname | errorgst | errormob | erroradd | errorstate | errorprefix | errorinvno | errordate
//desc_ | hsn_ | rate_ | gst_ | mrpgst_ | qty_ | disc_ | total_
    
if(printok){
  var hsn       = new RegExp('^[1-9][0-9]{3}$');
  var rate      = new RegExp('^[0-9]+$');
  var gst       = new RegExp('^[0-9]+$');
  var qty       = new RegExp('^[0-9]+$');
  var discount  = new RegExp('^[0-9]+$');

  for(pc = 1; pc <= particulars; pc++){
    var desc1  = $('#desc_' + pc).val(); 
    var hsn1   = $('#hsn_' + pc).val(); 
    var rate1  = $('#rate_' + pc).val(); 
    var gst1   = $('#gst_' + pc).val(); 
    var mrpgst1= $('#mrpgst_' + pc).val(); 
    var qty1   = $('#qty_' + pc).val(); 
    var disc1  = $('#disc_' + pc).val();                                     
      
    if(hsn.test(hsn1)){
      printok = true;
      $('#hsn_' + pc).css('background-color', '');     
    } else {
      printok = false;
      $('#hsn_' + pc).css('background-color', 'red');  
    }

    if(rate.test(rate1)){
      printok = true;
      $('#rate_' + pc).css('background-color', '');      
    } else {
      printok = false;
      $('#rate_' + pc).css('background-color', 'red');    
    }

    if(qty.test(qty1)){
      printok = true;
      $('#qty_' + pc).css('background-color', '');      
    } else {
      printok = false;
      $('#qty_' + pc).css('background-color', 'red');    
    }

    if(discount.test(disc1)){
      printok = true;
      $('#disc_' + pc).css('background-color', '');      
    } else {
      printok = false;
      $('#disc_' + pc).css('background-color', 'red');    
    }

  }
}


  if(printok){
      var frmData = $('#editproformabill').serialize();
      $.ajax({
            url: baseURL+'bill/previewinvoice',
            type: 'POST',
            data: frmData,
            success: function (data) {
              $('#itembody').html(data);
            }
      });
      $('#printpartyname').text($('#party_name').val());
      $('#printinvoiceno').text($('#prefix').val() + ' ' + $('#billno').val());
      $('#printaddress').text($('#address').val());
      $('#printdate').text($('#invoice_date').val());                  
      $('#printgst').text($('#gstno').val());
      $('#printstate').text($('#state').val());
      $('#printstatecode').text($('#state_code').val());
      $('#printmobno').text($('#mobileno').val());

      $('#printnarration').html($('#narration').val());
      $('#printfooter').html($('#bill_footer').val());


      $('#previeweditproformainvoice').attr('data-target', '#modal-xl');  
 }
});

$('#saveeditiproformanvoice').on('click', function(){
  $('#editproformabill').submit();
});

$('#state_code').change(function(){
  if( $( this ).val() != ''){
    $('#state').val($('#state_code option:selected').text());  
  } else {
    $('#state').val('');
  }
});