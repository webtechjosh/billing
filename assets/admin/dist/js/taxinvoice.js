var particulars = particulars;
$('#previewtaxinvoice').on('click', function(){

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
      var frmData = $('#taxbill').serialize();
      $.ajax({
            url: baseURL+'bill/previewinvoice',
            type: 'POST',
            data: frmData,
            success: function (data) {
              $('#itembody').html(data);
            }
      });
       paymentdetails($('#payment_mode').val());  
      $('#printpartyname').text($('#party_name').val());
      $('#printinvoiceno').text($('#prefix').val() + ' ' + $('#billno').val());
      $('#printaddress').text($('#address').val());
      $('#printdate').text($('#invoice_date').val());                  
      $('#printgst').text($('#gstno').val());
      $('#printstate').text($('#state').val());
      $('#printmobno').text($('#mobileno').val());
      $('#printstatecode').text($('#state_code').val());

      $('#printnarration').html($('#narration').val());
      $('#printfooter').html($('#bill_footer').val());


      $('#previewtaxinvoice').attr('data-target', '#modal-xl');  
  }
});

$('#savetaxinvoice').on('click', function(){
  $('#taxbill').submit();
});


$('#previewedittaxnvoice').on('click', function(){
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
      var frmData = $('#edittaxbill').serialize();
      $.ajax({
            url: baseURL+'bill/previewinvoice',
            type: 'POST',
            data: frmData,
            success: function (data) {
              $('#itembody').html(data);
            }
      });
      paymentdetails($('#payment_mode').val()); 
      $('#printpartyname').text($('#party_name').val());
      $('#printinvoiceno').text($('#billno').val());
      $('#printaddress').text($('#address').val());
      $('#printdate').text($('#invoice_date').val());                  
      $('#printgst').text($('#gstno').val());
      $('#printstate').text($('#state').val());
      $('#printstatecode').text($('#state_code').val());
      $('#printmobno').text($('#mobileno').val());

      $('#printnarration').html($('#narration').val());
      $('#printfooter').html($('#bill_footer').val());

      $('#previewedittaxnvoice').attr('data-target', '#modal-xl');  
   }
});

$('#saveedittaxinvoice').on('click', function(){
  $('#edittaxbill').submit();
});

$('#state_code').change(function(){
  if( $( this ).val() != ''){
    $('#state').val($('#state_code option:selected').text());  
  } else {
    $('#state').val('');
  }
});


function paymentdetails(paymode){

  var payhtml ='Payment Details'+"<br/>";

  if(paymode == 'finance'){
    payhtml += "<b>Mode of Payment: Finance</b><br />";
    payhtml += "<b>Finance Company Name: </b>" + $('#fin_company').val() +"<br />";
    payhtml += "<b>Loan Number: </b>" + $('#fin_loan_number').val() +"<br />";
    payhtml += "<b>Finance Amount: </b>" + $('#fin_fin_amount').val() +"<br />";
    payhtml += "<b>Finance Paid Amount: </b>" + $('#fin_pid_amount').val() +"<br />"; 
    payhtml += "<b>Amount: </b>" + $('#fin_amount').val();               
  }

  if(paymode == 'cash'){
    payhtml += "<b>Mode of Payment: Cash</b><br/ >";
    payhtml += "<b>Amount: </b>" +$('#cash_amount').val();    
  }
  
  if(paymode == 'cheque'){
    payhtml += "<b>Mode of Payment: Cheque</b><br />";
    payhtml += "<b>Cheque No.:</b>" + $('#chk_no').val() +"<br />";
    payhtml += "<b>Bank Name & Branch: </b>" + $('#chk_branch').val() +"<br />";
    payhtml += "<b>Payment Date: </b>" + $('#chk_pay_date').val() +"<br />";
    payhtml += "<b>Amount: </b>" +$('#chk_amount').val();    
  }

  if(paymode == 'neft'){
    payhtml += "<b>Mode of Payment: NEFT/IMPS/RTGS</b></br>";
    payhtml += "<b>Payment Ref./UTR Number: </b>" + $('#neft_refno').val() +"<br />";
    payhtml += "<b>Amount: </b>" + $('#neft_amount').val() +"<br />";
  }

  if(paymode == 'credit'){
    payhtml += "<b>Mode of Payment: Credit</b></br>";
    payhtml += "<b>Paid Amount: </b>" + $('#cr_pay_amount').val() +"<br />";
    payhtml += "<b>Outstanding Amount: </b>" + $('#cr_out_amount').val() +"<br />";
    payhtml += "<b>Amount: </b>" + $('#cr_amount').val() +"<br />";

  }
  if(paymode == 'cdcard'){
    payhtml += "<b>Mode of Payment: Credit/Debit Card</b><br/ >";
    payhtml += "<b>Amount: </b>" +$('#cdcard_amount').val();    
  }

  if(paymode == 'paytm'){
    payhtml += "<b>Mode of Payment: Paytm</b><br/ >";
    payhtml += "<b>Amount: </b>" +$('#paytm_amount').val();    
  }

  if(paymode == 'paymentgateway'){
    payhtml += "<b>Mode of Payment: Payment Gateway</b><br/ >";
    payhtml += "<b>Amount: </b>" +$('#get_pay_amount').val();    
  }

  if(paymode == 'partpayment'){
    payhtml += "<b>Mode of Payment: Part Payment</b><br/ >";
    payhtml += "<b>Amount: </b>" +$('#prt_pay_amount').val();    
  }

  if(paymode == 'upi'){
    payhtml += "<b>Mode of Payment: UPI</b><br/ >";
    payhtml += "<b>Amount: </b>" +$('#upi_amount').val();    
  }
  $('#paydetails').html(payhtml);
}



