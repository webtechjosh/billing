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
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
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
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    );

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    });
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
    
   // calculate(xx);
  })




  $('.addrow').click(function(e){
    e.preventDefault();
    var rowInd = $('#invoiceparticulars >tbody >tr').length;
    var x = rowInd+1;
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
    $("#mrpgst_" + sn).val(mrpgst);
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



$('#party_name').keyup(function(){
      var name =  $('#party_name').val();
      if(name !==''){
      $.ajax({
            url: baseURL+"bill/get_party_name",
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


$('#previewprofomainvoice').on('click', function(){
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
     // $('#printstatecode').text($('#').val());                  
    $('#previewprofomainvoice').attr('data-target', '#modal-lg');
   } else {
     $('#previewprofomainvoice').removeAttr('data-target');
      alert('Please Enter Valid GSTIN Number');
      $("#gstno").val('');
      $("#gstno").focus();
    }

});





$('#saveprofomainvoice').on('click', function(){
  $('#proformabill').submit();
});



$('#previeweditproformainvoice').on('click', function(){
  var inputvalues = $('#gstno').val();
  var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');
  if (gstinformat.test(inputvalues)  && inputvalues != '') {

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
     // $('#printstatecode').text($('#').val());                  
    $('#previeweditproformainvoice').attr('data-target', '#modal-lg');
   } else {
     $('#previeweditproformainvoice').removeAttr('data-target');
      alert('Please Enter Valid GSTIN Number');
      $("#gstno").val('');
      $("#gstno").focus();
    }

});


$('#saveeditiproformanvoice').on('click', function(){
  $('#editproformabill').submit();
});


$('#state_code').change(function(){
  $('#state').val($('#state_code option:selected').text());
})