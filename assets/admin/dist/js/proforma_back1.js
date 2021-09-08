$(document).ready(function () {
  bsCustomFileInput.init();
calculate(xx);
});


  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
    //Money Euro
    $('[data-mask]').inputmask();

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    });
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
    );

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    });
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox();

    //Colorpicker
    $('.my-colorpicker1').colorpicker();
    //color picker with addon
    $('.my-colorpicker2').colorpicker();

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
    
   // calculate(xx);
  });



 var particulars = xx;
  $('.addrow').click(function(e){
    e.preventDefault();
    var rowInd = $('#invoiceparticulars >tbody >tr').length;
    var x = rowInd+1;
    particulars = x; 
    var myrow = '<tr id="rowid' + x + '">'

+ '<td><input type="text" name="particulars['+ x +'][desc]" id="desc_' + x + '" onchange="calculate(' + x + ')" value="" class="form-control" required></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="particulars['+ x +'][hsn]" id="hsn_' + x + '" onchange="calculate(' + x + ')" class="form-control" required></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="particulars['+ x +'][rate]" id="rate_' + x + '" onchange="calculate(' + x + ')" value="" class="form-control" required></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="particulars['+ x +'][gst]" id="gst_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="particulars['+ x +'][mrpgst]" id="mrpgst_' + x + '" onchange="calculate(' + x + ')" value="" class="form-control" readonly></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="particulars['+ x +'][qty]" id="qty_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="particulars['+ x +'][disc]" id="disc_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="particulars['+ x +'][total]" id="total_' + x + '" onchange="calculate(' + x + ')" value="" class="form-control" readonly></td>'

+ '<td><button type="button" class="btn btn-danger removerow" onclick="removeitem(' + x + ')"><i class="fas fa-trash"></i></button></td></tr>';

    $('#invoiceparticulars > tbody > tr:nth-child(' + (rowInd) + ')').after(myrow);
  calSum();    
  });



function removeitem(x) {
    $("#rowid" + x).remove();
    calSum();
}

function calculate(sn) {
    var rate   = parseInt($("#rate_" + sn).val()) || 0;
    var gst    = parseFloat($("#gst_" + sn).val()) || 0;
    var qty    = parseInt($("#qty_" + sn).val()) || 1;
    var disc   = parseFloat($("#disc_" + sn).val()) || 0;
    
    var discRate =  rate - (rate * disc / 100); 
    var mrpgst = discRate + parseFloat((discRate * gst)/100);
    var total =  (mrpgst * qty);
    $("#mrpgst_" + sn).val(mrpgst.toFixed(2));
    $("#qty_" + sn).val(qty); 
    $("#total_" + sn).val(total.toFixed(2));
    calSum();
}


function calSum(){
    var total = 0;
    var c=0;
    var trlen = $("#invoiceparticulars >tbody tr").length;
    $("#invoiceparticulars tr").each(function(){
       if(c>0 && c <= trlen){
         var currVal = parseFloat($(this).find("td:nth-child(8) input").val());
         if(currVal>0){
            total += currVal;
         }  
       } 
       c++; 
    });
   $('#grand_total').text(total.toFixed(2)); 
}



/*
$('#billmobileno').change(function(){
      var id =  $( this ).val();
      $.ajax({
            url: baseURL+'bill/getdetails',
            type: 'POST',
            data: ({
              id: id
            }),
          success: function (data) {

            var party_details = JSON.parse(data);
            console.log(party_details[0]['id']);
            $('#party_name').val(party_details[0]['name']);
            $('#gstno').val(party_details[0]['gst']);
            $('#mobileno').val(party_details[0]['mobileno']);            
            $('#address').val(party_details[0]['address']);
            $('#state').val(party_details[0]['state']);
          }, 
          error: function (data) {

            alert("Unable to register you. Something went wrong");        

          },
      });
});


$('#billgstno').change(function(){
      var id =  $( this ).val();
      $.ajax({
            url: baseURL+'bill/getdetails',
            type: 'POST',
            data: ({
              id: id
            }),
          success: function (data) {

            var party_details = JSON.parse(data);

            $('#party_name').val(party_details[0]['name']);
            $('#gstno').val(party_details[0]['gst']);
            $('#mobileno').val(party_details[0]['mobileno']);            
            $('#address').val(party_details[0]['address']);
            $('#state').val(party_details[0]['state']);

            console.log(party_details);

          }, 
          error: function (data) {

            alert("Unable to register you. Something went wrong");        

          },
      });
});*/

$('#party_name').keyup(function(){
      var name =  $( this ).val();
      if(name !==''){
      $.ajax({
            url: baseURL+'bill/get_party_name',
            type: 'POST',
            data: ({
              name: name
            }),
            beforeSend: function(){
              $("#party_name").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function (data) {
              $("#display").show();
              $("#display").html(data);
              $("#party_name").css("background","#FFF");
            }
      });
  }
});


function selectParty(val) {
      $("#party_name").val($('#name'+val).text());
      $("#display").hide();
      $.ajax({
            url: baseURL+'bill/get_party_details_by_id',
            type: 'POST',
            data: ({
              id: val
            }),
            beforeSend: function(){
              $("#party_name").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function (data) {
            var partyDetails = JSON.parse(data);
            $('#gstno').val(partyDetails[0]['gst']);
            $('#mobileno').val(partyDetails[0]['mobileno']);            
            $('#address').val(partyDetails[0]['address']);
            $('#state').val(partyDetails[0]['state']);
            $('#state_code').val(partyDetails[0]['state_code']).attr("selected","selected");
            $('#email').val(partyDetails[0]['email']);
            
            $('#gstno').attr('readonly', true);
            $('#mobileno').attr('readonly', true);
            $('#address').attr('readonly', true);
            $('#state').attr('readonly', true);
            $('#state_code').attr('readonly', true);                
                
                
            }
      });      
}

$(document).ready(function() {
  calSum();
});


$('#frmChangpassword').submit(function(){
  var pass = $('#password').val();
  var confpass = $('#confpassword').val();
      if(pass != confpass){
        alert("Password not match");
        return false;
      } else {
        return true;
      }
});


/*$('#previewprofomainvoice11').on('click', function(){
  var inputvalues = $('#gstno').val();
  var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');
  if (gstinformat.test(inputvalues)  && inputvalues != '') {

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
      $('#printstatecode').text($('#').val());                  
    $('#previewprofomainvoice').attr('data-target', '#modal-lg');
   } else {
     $('#previewprofomainvoice').removeAttr('data-target');
      alert('Please Enter Valid GSTIN Number');
      $("#gstno").val('');
      $("#gstno").focus();
    }

});*/


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
      var hsn       = new RegExp('^[0-9]{4}$');
      var rate      = new RegExp('^[0-9]+$');
      var gst       = new RegExp('^[0-9]+$');
      var qty       = new RegExp('^[1-9]+$');
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
      $('#previewprofomainvoice').attr('data-target', '#modal-xl');  
  }
});

$('#saveprofomainvoice').on('click', function(){
  $('#proformabill').submit();
});


$('#previeweditproformainvoice').on('click', function(){

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
  var hsn       = new RegExp('^[0-9]{4}$');
  var rate      = new RegExp('^[0-9]+$');
  var gst       = new RegExp('^[0-9]+$');
  var qty       = new RegExp('^[1-9]+$');
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
      $('#printinvoiceno').text($('#billno').val());
      $('#printaddress').text($('#address').val());
      $('#printdate').text($('#invoice_date').val());                  
      $('#printgst').text($('#gstno').val());
      $('#printstate').text($('#state').val());
      $('#printmobno').text($('#mobileno').val());
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
    $('#state').val();
  }
});

function printBill(id) {
  var url = baseURL+'bill/preview/'+id;
  w = 700;
  h = 600;
  LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
  TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
  settings = 'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',resizable';
  window.open(url, 'PrintWindow', settings);
}


function dowloadBill(id){
  window.location.href = baseURL+'bill/download/'+id;
}