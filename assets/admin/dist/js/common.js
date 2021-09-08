$(document).ready(function () {
  bsCustomFileInput.init();
//  $('#invoice_date').datetimepicker();

calculate(xx);
});

function numberWithCommas(number) {
    var parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}


  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  });



 var particulars = xx;
  $('.addrow').click(function(e){
    e.preventDefault();
    var rowInd = $('#invoiceparticulars >tbody >tr').length;
    var x = rowInd+1;
    var particulars = x; 
    var myrow = '<tr id="rowid' + x + '">'

+ '<td><input type="text" name="particulars['+ x +'][desc]" id="desc_' + x + '" onchange="calculate(' + x + ')" value="" class="form-control" required></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="particulars['+ x +'][hsn]" id="hsn_' + x + '" onchange="calculate(' + x + ')" value="0000" class="form-control" required></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="particulars['+ x +'][rate]" id="rate_' + x + '" onchange="calculate(' + x + ')" value="0" class="form-control" required></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="particulars['+ x +'][gst]" id="gst_' + x + '" onchange="calculate(' + x + ')" value="0"  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="particulars['+ x +'][mrpgst]" id="mrpgst_' + x + '" onchange="calwithrespecttogst(' + x + ')" value="0" class="form-control" readonly></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="particulars['+ x +'][qty]" id="qty_' + x + '" onchange="calculate1(' + x + ')" value="1"  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="particulars['+ x +'][disc]" id="disc_' + x + '" onchange="calculate1(' + x + ')" value="0"  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="particulars['+ x +'][total]" id="total_' + x + '" onchange="calculate1(' + x + ')" value="0" class="form-control" readonly></td>'

+ '<td><button type="button" class="btn btn-danger removerow" onclick="removeitem(' + x + ')"><i class="fas fa-trash"></i></button></td></tr>';

    $('#invoiceparticulars > tbody > tr:nth-child(' + (rowInd) + ')').after(myrow);
  calSum();    
  });

function removeitem(x) {
    $("#rowid" + x).remove();
    particulars--;
    calSum();
}

function calculate(sn) {
    var rate   = parseInt($("#rate_" + sn).val()) || 0;
    var gst    = parseFloat($("#gst_" + sn).val()) || 0;
    var qty    = parseInt($("#qty_" + sn).val()) || 1;
    var disc   = parseFloat($("#disc_" + sn).val()) || 0;
    
    var discRate =  rate - (rate * disc / 100); 
    var mrpgst = Math.round(discRate + parseFloat((discRate * gst)/100));
    var total =  (mrpgst * qty);
    $("#mrpgst_" + sn).val(mrpgst.toFixed(2));
    $("#qty_" + sn).val(qty); 
    $("#total_" + sn).val(total.toFixed(2));
    calSum();
}



function calwithrespecttogst(sn){
  var amountwithgst = $('#mrpgst_'+sn).val();
  var gstpercentage = $('#gst_'+sn).val();
  var pamount = amountwithgst / ((gstpercentage/100) + 1);
  $("#rate_" + sn).val(pamount.toFixed(2));
  calSum();
}



function calculate1(sn) {
    let qty    = parseInt($("#qty_" + sn).val()) || 1;
    let mrpwithgst = parseInt($("#mrpgst_" + sn).val());
    let disc   = parseInt($("#disc_" + sn).val()) || 0;
    let total = (mrpwithgst * qty) - (mrpwithgst * qty * disc /100);
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
   $('#grand_total').text(numberWithCommas(total)); 
}



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


$('#gstno').focus(function() {
    var dispText = $("#display").text();
    if(dispText == 'nof') {
      $("#display").text("");
      $('#gstno').attr('readonly', false);
      $('#mobileno').attr('readonly', false);
      $('#address').attr('readonly', false);
      $('#state').attr('readonly', false);
      $('#email').attr('readonly', false);
      $('#state_code').attr('readonly', false);

      $('#gstno').val('');
      $('#mobileno').val('');
      $('#address').val('');
      $('#state').val('');
      $('#email').val('');
      $('#state_code').val('');
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
            $('#email').attr('readonly', true);
            $('#state_code').attr('readonly', true); 
            
            /* Remove error msg */
            $("#errorname").text('');
            $("#errorgst").text('');
            $("#errormob").text('');
            $("#errorstate").text('');
            $("#errorinvno").text('');
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

$('#state_code').change(function(){
  if( $( this ).val() != ''){
    $('#state').val($('#state_code option:selected').text());  
  } else {
    $('#state').val('');
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


function excel(){
 window.location.href =  baseURL+'bill/excel';
}
