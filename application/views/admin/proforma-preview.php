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
           

    </style>
    
</head>
<body>

    <div class="container" >
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="taxinvoice" id="printableArea1">
                    
                    <div class="invoiceBody">
    
                                    <table width="100%" class="header">
                                        <tr>
                                            <td rowspan="3"><div class="printLogo center" style="text-align: center;"><img src="<?php echo base_url('assets/admin/dist/img/logo.png') ?>" alt="image" ></div></td>
                                            <td>
                                                <div class="center"><h2>DIGISAJILO INDIA PVT. LTD.</h2></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="center">
                                                    <p> A-44, SECTOR 2, NOIDA, UTTAR
                                                        PRADESH - 201301
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="center">
                                                    <p>GSTIN: 09AAHCG8640C1ZL</p>
                                                </div>
                                            </td>
                                        </tr>        
                                    </table>
    
                                    <table width="100%" class="header">
                                        <tr>
                                            <td  height="30" style="text-align: center;">
                                                <div class="center"><h2>PROFORMA INVOICE</h2></div>
                                            </td>
                                        </tr>
                                    </table>
    
                                    <table width="100%" class="header">
                                        <tr>
                                            <td colspan="2" width="50%">
                                                <div class="center"><h4>Bill To Party</h4></div>
                                            </td>
                                            <td colspan="2">
                                                <div class="center"><h4>Details</h4></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <div><p>Name</p></div>
                                            </td>
                                            <td>
                                                <div><p>JAIPUR MURTI BHANDAR    </p></div>
                                            </td>
                                            <td>
                                                <div><p>Invoice No.</p></div>
                                            </td>
                                            <td>
                                                <div><p>123</p></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div><p>Address</p></div>
                                            </td>
                                            <td>
                                                <div><p>71 MACHCHRATTA WARD, RAMNAGAR, VARANASI, UTTAR PRADESH - 209725</p></div>
                                            </td>
                                            <td>
                                                <div><p>Invoice Date</p></div>
                                            </td>
                                            <td>
                                                <div><p>25-10-2020</p></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div><p>GSTIN</p></div>
                                            </td>
                                            <td>
                                                <div><p>09AAHCG8640C1ZL</p></div>
                                            </td>
                                            <td>
                                                <div><p>State</p></div>
                                            </td>
                                            <td>
                                                <div><p>Uttar Pradesh</p></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div><p>Mobile No</p></div>
                                            </td>
                                            <td>
                                                <div><p>9988552266</p></div>
                                            </td>
                                            <td>
                                                <div><p>State Code</p></div>
                                            </td>
                                            <td>
                                                <div><p>26</p></div>
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
                                                <th><p>TOTAL (INR)</p></th>
                                            </tr>
                                        </thead>
                                        <tbody id="itembody">
                                            <tr>
                                                <td><p>1</p></td>
                                                <td><p>Alfaalfa Powder 200gm</p></td>
                                                <td><p>2106</p></td>
                                                <td><p>839</p></td>
                                                <td><p>2</p></td>
                                                <td><p>5%</p></td>
                                                <td><p>3,525.00</p></td>
                                            </tr>
                                            <tr> 
                                                <td><p>1</p></td>
                                                <td><p>Alfaalfa Powder 200gm</p></td>
                                                <td><p>2106</p></td>
                                                <td><p>839</p></td>
                                                <td><p>2</p></td>
                                                <td><p>5%</p></td>
                                                <td><p>3,525.00</p></td>
                                            </tr>
                                            <tr> 
                                                <td><p>1</p></td>
                                                <td><p>Alfaalfa Powder 200gm</p></td>
                                                <td><p>2106</p></td>
                                                <td><p>839</p></td>
                                                <td><p>2</p></td>
                                                <td><p>5%</p></td>
                                                <td><p>3,525.00</p></td>
                                            </tr>
                                            <tr> 
                                                <td><p>1</p></td>
                                                <td><p>Alfaalfa Powder 200gm</p></td>
                                                <td><p>2106</p></td>
                                                <td><p>839</p></td>
                                                <td><p>2</p></td>
                                                <td><p>5%</p></td>
                                                <td><p>3,525.00</p></td>
                                            </tr>
                                            <tr> 
                                                <td><p>1</p></td>
                                                <td><p>Alfaalfa Powder 200gm</p></td>
                                                <td><p>2106</p></td>
                                                <td><p>839</p></td>
                                                <td><p>2</p></td>
                                                <td><p>5%</p></td>
                                                <td><p>3,525.00</p></td>
                                            </tr>
                                            <tr> 
                                                <td><p>1</p></td>
                                                <td><p>Alfaalfa Powder 200gm</p></td>
                                                <td><p>2106</p></td>
                                                <td><p>839</p></td>
                                                <td><p>2</p></td>
                                                <td><p>5%</p></td>
                                                <td><p>3,525.00</p></td>
                                            </tr>
                                            <tr> 
                                                <td><p>1</p></td>
                                                <td><p>Alfaalfa Powder 200gm</p></td>
                                                <td><p>2106</p></td>
                                                <td><p>839</p></td>
                                                <td><p>2</p></td>
                                                <td><p>5%</p></td>
                                                <td><p>3,525.00</p></td>
                                            </tr>
                                            <tr> 
                                                <td><p>1</p></td>
                                                <td><p>Alfaalfa Powder 200gm</p></td>
                                                <td><p>2106</p></td>
                                                <td><p>839</p></td>
                                                <td><p>2</p></td>
                                                <td><p>5%</p></td>
                                                <td><p>3,525.00</p></td>
                                            </tr>
                                        <tr>
                                            <th colspan="3" class="center"><p>Total</p></th>
                                            <th class="center" ><p></p></th>
                                            <th class="center" ><p>10</p></th>
                                            <th class="center" ><p></p></th>
                                            <th><p>50,992.50</p></th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="center"><p>Total Amount in Words. (INR)</p></th>
                                            <th colspan="3" class="center" ><p>CGST @ 9%</p></th>
                                            <th><p>50,992.50</p></th>
                                        </tr>
                                        <tr>
                                        <td colspan="3" rowspan="2" class="center" > <p>(Ten Thousand Rupees Only)</p></td>
                                            <th colspan="3" class="center" > <p>SGST @ 9%</p></th>
                                            <th><p>50,992.50</p></th>
                                        </tr>
                                        <!-- <tr display="none">
                                            <th colspan="3" class="center" > <p>IGST @ 9%</p></th>
                                            <th><p>50,992.50</p></th>
                                        </tr> -->
                                        <tr>
                                            <th colspan="3" class="center" ><p>TOTAL AMOUNT</p></th>
                                            <th><p>475,930.00</p></th>
                                        </tr>
                                        
                                        </tbody>
                                        
                                        
                                    </table>
                                    <table>
                                        <tbody>
                                        <tr>
                                            <th colspan="3" rowspan="2" style="width: 70%;" >
                                                <h4><u>Declaration</u></h4>
                                                <p>We declare that this invocie shows the actual
                                                    price of the goods described and that all
                                                    particulars are true and correct.</p>
                                                    <p>
                                                    <br>Banking: <b>Kotak Mahindra Bank</b>
                                                    <br>Account Name: <b>Digisajilo India Pvt. Ltd.</b>
                                                    <br>Account Number: <b>0113962790</b>
                                                    <br>IFSC Code: <b>KKBK0000218</b>
                                                    <br>Branch: <b>Kalka ji, New Delhi</b>
                                                    <br>UPI: <b>DIGISAJILO@KOTAK</b>
                                                    </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4" >
                                                <div class="sign">
                                                    For <?php echo $this->session->userdata('userCompanyName');?>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="10" height="25px" style="text-align: center;"> This is a computer generated document by VyaparBill.com</th>
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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="printButton">
                    <button class="btn btn-success" onclick="printDiv1()">Send Invoice</button>
                    <br>
                </div>
            </div>
        </div>
    </div>


    <script>
    
    function printDiv1(printableArea1) {
            
            var printContents = document.getElementById("printableArea1").innerHTML;
            
            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }


        // function printDiv2(printableArea2) {
            
               
        //     var printContents = document.getElementById("printableArea2").innerHTML;
        //     var originalContents = document.body.innerHTML;

        //     document.body.innerHTML = printContents;

        //     window.print();

            
        // }

        

    </script>
    
</body>
</html>