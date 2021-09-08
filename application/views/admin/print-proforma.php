<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style>
        body {
            -webkit-print-color-adjust: exact !important;
        }
        
/* print preview  */

.invoiceBody{
    margin-top: 20px;
    padding: 20px;
    box-shadow: 0px 0px 10px gray;
}
table  {  
    border: 1px solid #333;
    text-align: left;
    font-weight: bold;
    border-collapse: collapse;
    font-size: 12px;
}

th {
    padding-left: 5px; 
    border: 1px solid #333;
    font-size: 14px;
}

td {  
    border: 1px solid #333;
    text-align: left;
    font-weight: normal;
    padding-left: 5px;
}
.printLogo {
    width: 100%;
}

.printLogo img{
    max-width: 210px;
    max-height: 100px;
    padding: 5px;
}
.center{
    text-align: center;
}
.header h2{
  font-weight: bold;
  font-size: 24px;
  padding: 0px;
  margin: 5px;
}
.header p{
    font-weight: bold;
    font-size: 14px;
}
.header h4{
    font-size: 18px;
    font-weight: bold;
}
.sign{
    margin-top: 20px;
    text-align: center;
}
.printButton{
    margin: 30px 50px 50px;
    text-align: center;
}
.itemtable tbody tr td{
    font-size: 15px;               
}

tbody td {
    border-bottom-width: 0;
    font-size: 16px;
}

#itembody td{
    padding: 1px;
}

.partiCularTable td{
  padding: 0px;
}
.partiCularTable td input{
  padding: 5px;
}
.stampimg{
  text-align: center;
}
.stampimg img{
  max-width: 90%;
  max-height: 100px;
}
.declarationHeading h5{
  font-size: 16px;
  font-weight: bold;
}


@media (max-width: 576px){
    .login-box, .register-box {
    margin-top: .5rem;
    width: 100%;
  }
  .invoiceBody {
    margin-top: 0px;
    padding: 0px;
    box-shadow: 0px 0px 0px grey;
  }
  .printLogo img {
    max-width: 100px;
    max-height: 60px;
    padding: 2px;
}
.header h2{
  font-size: 16px;
  padding: 0px;
  margin: 2px;
}
.header h4 {
  font-size: 14px;
  font-weight: bold;
}
h4 {
  font-size: 14px;
}
.header p {
  font-size: 10px;
}
p{
  margin: 1px;
  font-size: 10px;
}
.sign {
  margin-top: 20px;
  text-align: center;
  font-size: 12px;
}
th {
  padding-left: 2px;
  border: 1px solid #333;
  font-size: 11px;
}

.partiCularTable td input{
  padding: 1px;
}
.itemtable tbody tr td {
  font-size: 12px;
}
.stampimg{
  text-align: center;
}
.stampimg img{
  max-width: 90%;
  max-height: 60px;
}
.declarationHeading h5{
  font-size: 14px;
  font-weight: bold;
}


}


@media print {
    .invoiceBody{
    padding: 10px;
    box-shadow: none;
}
table  {  
    border: 1px solid #333;
    text-align: left;
    font-weight: bold;
    border-collapse: collapse;
    font-size: 12px;
}

th {
    padding: 5px; 
    border: 1px solid #333;
    font-size: 14px;

}

td {  
    border: 1px solid #333;
    text-align: left;
    font-weight: normal;
    padding: 5px;
}
.printLogo {
    width: 100%;
    text-align: center;
}

.printLogo img{
    max-width: 200px;
    max-height: 100px;
    padding: 5px;
}
.center{
    text-align: center;
}
.header{
    text-align: center;
}
.header h2{
  font-weight: bold;
  font-size: 24px;
  padding: 0px;
  margin: 5px;
}
.header p{
    font-weight: bold;
    font-size: 14px;
}
.header div h4{
    font-size: 18px;
    font-weight: bold;
}
.sign{
    margin-top: 20px;
    text-align: center;
}
.printButton{
    margin: 30px 50px 50px;
    text-align: center;
}
.itemtable tbody tr td{
    font-size: 15px;               
}

tbody td {
    border-bottom-width: 0;
    font-size: 16px;
}

#itembody td{
    padding: 1px;
}

.partiCularTable td{
  padding: 0px;
}
.partiCularTable td input{
  padding: 5px;
}
.stampimg{
  text-align: center;
}
.stampimg img{
  max-width: 90%;
  max-height: 100px;
}
.declarationHeading h5{
  font-size: 16px;
  font-weight: bold;
}



}    

    </style>
    
</head>
<body>
    
    <?php 
    $idLogo = $this->session->userdata('userID');
    $logo_name = insert_logo_on_bill($idLogo);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="taxinvoice" id="printableArea1">
                    
                    <div class="invoiceBody">
                                <table width="100%" class="header" cellpadding="5">
                                <?php 
                                    if($this->session->userdata('regType') != 'Free' ){
                                ?>                                        
                                        <tr>
                                            <td rowspan="3"><div class="printLogo"><img src="<?php echo base_url('uploads/'.$logo_name) ?>" alt="image" style="padding:10px; max-width:200px; max-height:150px;" ></div></td>
                                            <td class="header">
                                                <div><h2><?php echo $this->session->userdata('userCompanyName');?></h2></div>
                                            </td>
                                        </tr>
                                <?php
                                    } else {
                                ?>

                                        <tr>
                                            <td class="header">
                                                <div><h2><?php echo $this->session->userdata('userCompanyName');?></h2></div>
                                            </td>
                                        </tr>

                                <?php
                                    }
                                ?>
                                        <tr>
                                            <td class="header">
                                                <div >
                                                    <p><?php echo $this->session->userdata('userCompanyAddress');?></p>
                                                </div>
                                            </td>
                                        </tr>        
                                    </table>
    
                                    <table width="100%" class="header">
                                        <tr>
                                            <td  height="30" class="header">
                                                <div><h2><?php echo strtoupper($data->bill_type). ' INVOICE';?></h2></div>
                                            </td>
                                        </tr>
                                    </table>
    
                                    <table width="100%" class="header">
                                        <tr>
                                            <td colspan="2" width="50%" class="header">
                                                <div ><h4>Bill To Party</h4></div>
                                            </td>
                                            <td colspan="2" width="50%" class="header">
                                                <div ><h4>Details</h4></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <div><p>Name</p></div>
                                            </td>
                                            <td>
                                                <div><p><?php echo $data->party_name;?></p></div>
                                            </td>
                                            <td>
                                                <div><p>Invoice No.</p></div>
                                            </td>
                                            <td>
                                                <div><p><?php echo $data->prefix.'-'.$data->billno;?></p></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div><p>Address</p></div>
                                            </td>
                                            <td>
                                                <div><p><?php echo $data->address;?></p></div>
                                            </td>
                                            <td>
                                                <div><p>Invoice Date</p></div>
                                            </td>
                                            <td>
                                                <div><p><?php echo $data->invoice_date;?></p></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div><p>GSTIN</p></div>
                                            </td>
                                            <td>
                                                <div><p><?php echo $data->gstno;?></p></div>
                                            </td>
                                            <td>
                                                <div><p>State</p></div>
                                            </td>
                                            <td>
                                                <div><p><?php echo $data->state;?></p></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div><p>Mobile No</p></div>
                                            </td>
                                            <td>
                                                <div><p><?php echo $data->mobileno;?></p></div>
                                            </td>
                                            <td>
                                                <div><p>State Code</p></div>
                                            </td>
                                            <td>
                                                <div><p><?php echo $data->state_code;?></p></div>
                                            </td>
                                        </tr>
                                    </table>
    
                                    <table width="100%" class="itemtable" >
                                        <thead>
                                            <tr>
                                                <th><p>SR NO.</p></th>
                                                <th><p>PARTICULARS</p></th>
                                                <th><p>HSN/SAC</p></th>
                                                <th><p>RATE(INR)</p></th>
                                                <th><p>QTY</p></th>
                                                <th><p>DISCOUNT%</p></th>
                                                <th><p>SUB TOTAL</p></th>
                                            </tr>
                                        </thead>
                                        <tbody id="itembody">
<?php
        $row = '';
        $sr = 1;
        $totalQty=0;
        $grandTotal=0;
        $partystateCode = $data->state_code;

        $items = json_decode($data->particulars);
        $cgst = $sgst =0;
        foreach ($items as $key => $value) {
            $value = json_decode(json_encode($value), true);
            $totalV =  $value['rate'] * $value['qty'];
            $totalV = $totalV - ($totalV*$value['disc']/100);  
            $row .= '<tr><td style="padding:5px;">'.$sr.'</td><td style="padding:5px;">'.$value['desc'].'</td><td style="padding:5px;">'.$value['hsn'].'</td><td style="padding:5px;">'.number_format($value['rate'],2).'/-'.'</td><td style="padding:5px;">'.$value['qty'].'</td><td style="padding:5px;">'.$value['disc'].'%'.'</td><td style="padding:5px;">'.number_format($totalV,2).'/-'.'</td></tr>';
            $totalQty   += $value['qty'];
            $grandTotal += $totalV; 

        if($value['gst'] != '' && $value['gst'] > 0) {
            $amount = $value['rate'] * $value['qty'];
            $cgst += (($amount * ($value['gst']/2))/100);
            $sgst += (($amount * ($value['gst']/2))/100);
            $cgstOuter = (($amount * $value['gst'])/100);
          } 
          $sr++;
        }

      // $cgst = $sgst = (($grandTotal * 9)/100);
      // $cgstOuter = (($grandTotal * 18)/100);

        $grandTotal1 = ($grandTotal + $cgst +  $sgst);

        if($this->session->userdata('userCompanyStateCode') != $partystateCode) {
            $foot = '<tr><th colspan="3" class="center"><p>Total (INR)</p></th><th class="center" ><p></p></th><th class="center" ><p>'.number_format($totalQty,2).'</p></th> <th class="center" ><p></p></th> <th><p>'.number_format($grandTotal,2).'/-'.'</p></th></tr>
            <tr><th colspan="3" class="center"><p>Total Amount in Words. (INR)</p></th><th colspan="3" class="center" ><p>CGST</p></th><th><p>'.number_format($cgstOuter,2).'/-'.'</p></th></tr>
            <tr><td colspan="3" class="center" > <p>('.ucwords(no_to_words($grandTotal1)).'/-'.' Only)</p></td><th colspan="3" class="center" ><p>TOTAL AMOUNT</p></th><th><p>'.number_format($grandTotal1,2).'/-'.'</p></th></tr>';
        } else {
        $foot = '<tr><th colspan="3" class="center"><p>Total (INR)</p></th><th class="center" ><p></p></th><th class="center" ><p>'.number_format($totalQty,2).'</p></th> <th class="center" ><p></p></th> <th><p>'.number_format($grandTotal,2).'/-'.'</p></th></tr>
            <tr><th colspan="3" class="center"><p>Total Amount in Words. (INR)</p></th><th colspan="3" class="center" ><p>CGST</p></th><th><p>'.number_format($cgst,2).'/-'.'</p></th></tr>
            <tr><td colspan="3" rowspan="2" class="center" > <p>('.ucwords(no_to_words($grandTotal1)).' Only)</p></td><th colspan="3" class="center" > <p>SGST</p></th><th><p>'.$sgst.'/-'.'</p></th></tr>
            <tr><th colspan="3" class="center" ><p>TOTAL AMOUNT</p></th><th><p>'.number_format($grandTotal1,2).'/-'.'</p></th></tr>';         
        }

        echo $row.$foot;
?>
                                        </tbody>
                                        
                                        
                                    </table>
                                    <table width="100%">
                                        <tbody>
                                        <tr>
                                            <th colspan="3" rowspan="2" style="width: 70%;" >
                                                <?php
                                                    if($data->narration !=''){
                                                    echo '<h5><u>Narration:</u></h5>';
                                                    echo '<p>'.$data->narration.'</p>';
                                                    }
                                                ?>
                                                <h5><u>Declaration:</u></h5>
                                                <p><?php echo $data->bill_footer;?>
                                                    </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4" style="width: 30%" >
                                                <?php

                                                    if($data->payment_mode != ''){
                                                        
                                                        $payhead = array('cash'=>'Cash', 'cheque' => 'Cheque', 'neft' => 'NEFT/IMPS/RTGS', 'credit'=>'Credit', 'finance' =>'Finance', 'cdcard' => 'Credit/Debit Card', 'paymentgateway'=>'Payment Gateway', 'upi'=>'UPI');
                                                        $paybody = array('amount' => 'Amount', 'company' =>'Finance Company Name', 'loan_number' => 'Loan Number', 'fin_amount' => 'Finance Amount', 'fin_amount_apid' => 'Finance Paid Amount', 'cheque_no' => 'Cheque No.', 'branch' => 'Bank Name & Branch', 'payment_date' => 'Payment Date', 'payment_ref_utr' => 'Payment Ref./UTR Number', 'paid_amount' => 'Paid Amount', 'outstanding_amount' => 'Outstanding Amount:');

                                                        echo "<h5><u>Payment Details:</u></h5><br />";

                                                        echo "<b>Payment Mode :</b>". $payhead[$data->payment_mode]."<br />"; 
                                                        
                                                        $payDetails = json_decode($data->payment_details);
                                                        foreach($payDetails as $key => $value) {
                                                            
/*                                                            $dtype = gettype($value);
                                                            if(in_array($dtype, array('integer', 'double'))){
                                                              echo $paybody[$key] .": ". number_format($value,2)."<br />";                                      
                                                            } else {*/
                                                                echo $paybody[$key] .": ". $value."<br />";                                      
                                                           // }

                                                            
                                                        }
                                                    }
                                                
                                                ?>
                                                
                                                <div class="sign" style="text-align: center;">
                                                    <?php 
                                                        if( $data->bill_type == 'Tax') {
                                                            $img = insert_signature($idLogo);
                                                    ?>        
                                                    <img src="<?php echo base_url('uploads/'.$img); ?>" style="max-width: 90%; max-height:100px;">
                                                             
                                                     <?php
                                                     }
                                                    ?>
                                                    <br>
                                                    For <?php echo $this->session->userdata('userCompanyName');?>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="10" height="25px" style="text-align: center;"> This is a computer generated document. 
                                            <?php 
                                                if($this->session->userdata('regType') == 'Free' ){
                                            ?>
                                            By <img src="<?php echo base_url('assets/admin/dist/img/logo.png') ?>" alt="image" style="height:30px;" >
                                            
                                            <?php
                                                }
                                            ?>
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                   

                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <br>
    </div>   

   
</body>
</html>