<?php

session_start();
if(isset($_SESSION[1])){
    header("location:main_login.php");
}
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    // user already logged in the site
    header ("location:/main_login.php");
}
else {

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ACCESS PERMISSIONS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type = "text/javascript" src = "http://cdn.jsdelivr.net/jquery.cookie/1.3.1/jquery.cookie.js"></script>

    <html>
    <head>
        <title>ACCESS PERMISSIONS</title>
        <style>
            body {
                background-color: lightblue;
                color: black;
            }

            input[type=text], select {


                margin: 2px 0;
                display: inline-block;
                border: 1px solid #1f401f;
                border-radius: 4px;
                box-sizing: border-box;
            }

            .button {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 16px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
                cursor: pointer;
            }

            .button1 {
                background-color: white;
                color: black;
                border: 2px solid #4CAF50;
            }

            .button1:hover {
                background-color: #4CAF50;
                color: white;
            }

            .button2 {
                background-color: white;
                color: black;
                border: 2px solid #008CBA;
            }

            .button2:hover {
                background-color: #008CBA;
                color: white;
            }

            .button3 {
                background-color: white;
                color: black;
                border: 2px solid #f44336;
            }

            .button3:hover {
                background-color: #f44336;
                color: white;
            }

            .button4 {
                background-color: white;
                color: black;
                border: 2px solid #e7e7e7;
            }

            .button4:hover {background-color: #e7e7e7;}

            .button5 {
                background-color: white;
                color: black;
                border: 2px solid #555555;
            }

            .button5:hover {
                background-color: #555555;
                color: white;
            }



        </style>
    </head>
<body>
<div class="table">
    <table align="center" class="table-bordered table-condensed">
        <script>
            $(function () {
                if ($.cookie("username") != null) {
                    //var data = "<u>Values from Cookies</u><br /><br />";
                    var data = $.cookie("username");
                    document.getElementById("user").innerText = data;
                    //data += "<b>Name:</b> " + $.cookie("name") + " <b>Technology:</b> " + $.cookie("technology");
                    //window.alert(data);
                    //document.getElementById("refno1").value = data;
                    //document.getElementById("refno1").value = "refno - 123"
                    //document.getElementById("label1").innerText = data;
                }
            });
        </script>

        <tr style="text-align:left"><th>NAME <input list ="exec1" type="text" name="exec" id ="exec" placeholder="User Name" value="" onfocus= "getuser()"></th><th>READ</th><th>SAVE</th><th>DELETE/CANCEL</th><th>PRINT</th><th>REVISE</th></tr>
        <datalist id="exec1"></datalist>
        <script>
            function getuser() {

                var doc = "userrights";
                var issued = "employees";

                $.ajax({
                    type:"POST",
                    url:"getissueddoc.php",
                    data: ({doc:doc,issued:issued}),
                }).done(function( data ) {

                    var x =  $.parseJSON(data);

                    var str=''; // variable to store the options

                    for (var i=0; i < x.length;++i){
                        str += '<option value="'+x[i].username+'" />'; // Storing options in variable
                    }
                    var my_list=document.getElementById("exec1");
                    my_list.innerHTML = str;
//window.alert("test");
//document.getElementById("reason").value = reason;


                });

            }
            </script>
        <tr style="text-align:left"><th>SUPPLIER MASTER</th><th><input type="checkbox" name="SMR" id="SMR"></th><th><input type="checkbox" name="SMS" id="SMS"></th><th><input type="checkbox" name="SMD" id="SMD"></th></tr>
        <tr style="text-align:left"><th>CUSTOMER MASTER</th><th><input type="checkbox" name="CMR" id="CMR"></th><th><input type="checkbox" name="CMS" id="CMS"></th><th><input type="checkbox" name="CMD" id="CMD"></th></tr>
        <tr style="text-align:left"><th>UNIT MASTER</th><th><input type="checkbox" name="UMR" id="UMR"></th><th><input type="checkbox" name="UMS" id="UMS"></th><th><input type="checkbox" name="UMD" id="UMD"></th></tr>
        <tr style="text-align:left"><th>CURRENCY MASTER</th><th><input type="checkbox" name="CUMR" id="CUMR"></th><th><input type="checkbox" name="CUMS" id="CUMS"></th><th><input type="checkbox" name="CUMD" id="CUMD"></th></tr>
        <tr style="text-align:left"><th>PRODUCT MASTER</th><th><input type="checkbox" name="PMR" id="PMR"></th><th><input type="checkbox" name="PMS" id="PMS"></th><th><input type="checkbox" name="PMD" id="PMD"></th></tr>
        <tr style="text-align:left"><th>INCO TERMS MASTER</th><th><input type="checkbox" name="ITMR" id="ITMR"></th><th><input type="checkbox" name="ITMS" id="ITMS"></th><th><input type="checkbox" name="ITMD" id="ITMD"></th></tr>
        <tr style="text-align:left"><th>PAYMENT TERMS MASTER</th><th><input type="checkbox" name="PTMR" id="PTMR"></th><th><input type="checkbox" name="PTMS" id="PTMS"></th><th><input type="checkbox" name="PTMD" id="PTMD"></th></tr>
        <tr style="text-align:left"><th>TRANSPORT MASTER</th><th><input type="checkbox" name="PTMR" id="PTMR"></th><th><input type="checkbox" name="PTMS" id="PTMS"></th><th><input type="checkbox" name="PTMD" id="PTMD"></th></tr>
        <tr style="text-align:left"><th>CONTACT PERSON - SUPPLIER</th><th><input type="checkbox" name="CPSMR" id="CPSMR"></th><th><input type="checkbox" name="CPSMS" id="CPSMS"></th><th><input type="checkbox" name="CPSMD" id="CPSMD"></th></tr>
        <tr style="text-align:left"><th>CONTACT PERSON - CUSTOMER</th><th><input type="checkbox" name="CPCMR" id="CPCMR"></th><th><input type="checkbox" name="CPCMS" id="CPCMS"></th><th><input type="checkbox" name="CPCMD" id="CPCMD"></th></tr>
        <tr style="text-align:left"><th>BANK DETAILS - SUPPLIER</th><th><input type="checkbox" name="BDSMR" id="BDSMR"></th><th><input type="checkbox" name="BDSMS" id="BDSMS"></th><th><input type="checkbox" name="BDSMD" id="BDSMD"></th></tr>
        <tr style="text-align:left"><th>BANK DETAILS - CUSTOMER</th><th><input type="checkbox" name="BDCMR" id="BDCMR"></th><th><input type="checkbox" name="BDCMS" id="BDCMS"></th><th><input type="checkbox" name="BDCMD" id="BDCMD"></th></tr>
        <tr style="text-align:left"><th>FREIGHT AGENTS DETAILS</th><th><input type="checkbox" name="FADMR" id="FADMR"></th><th><input type="checkbox" name="FADMS" id="FADMS"></th><th><input type="checkbox" name="FADMD" id="FADMD"></th></tr>
        <tr style="text-align:left"><th>COUNTRY/PORT OF SHIPMENT</th><th><input type="checkbox" name="POSMR" id="POSMR"></th><th><input type="checkbox" name="POSMS" id="POSMS"></th><th><input type="checkbox" name="POSMD" id="POSMD"></th></tr>
        <tr style="text-align:left"><th>BANK MASTER</th><th><input type="checkbox" name="BMR" id="BMR"></th><th><input type="checkbox" name="BMS" id="BMS"></th><th><input type="checkbox" name="BMD" id="BMD"></th></tr>
        <tr style="text-align:left"><th>BANK ACCOUNT MASTER</th><th><input type="checkbox" name="BAMR" id="BAMR"></th><th><input type="checkbox" name="BAMS" id="BAMS"></th><th><input type="checkbox" name="BAMD" id="BAMD"></th></tr>
        <tr style="text-align:left"><th>QUOTATION</th><th><input type="checkbox" name="QMR" id="QMR"></th><th><input type="checkbox" name="QMS" id="QMS"></th><th><input type="checkbox" name="QMD" id="QMD"></th><th><input type="checkbox" name="QMP" id="QMP"></th><th><input type="checkbox" name="QMR" id="QMR"></th></tr>
        <tr style="text-align:left"><th>PROFORMA</th><th><input type="checkbox" name="PMR" id="PMR"></th><th><input type="checkbox" name="PMS" id="PMS"></th><th><input type="checkbox" name="PMD" id="PMD"></th><th><input type="checkbox" name="PMP" id="PMP"></th><th><input type="checkbox" name="PMR" id="PMR"></th></tr>
        <tr style="text-align:left"><th>ORDER CONFIRMATION</th><th><input type="checkbox" name="OCMR" id="OCMR"></th><th><input type="checkbox" name="OCMS" id="OCMS"></th><th><input type="checkbox" name="OCMD" id="OCMD"></th><th><input type="checkbox" name="OCMP" id="OCMP"></th><th><input type="checkbox" name="OCMR" id="OCMR"></th></tr>
        <tr style="text-align:left"><th>SHIPPING INFORMATION</th><th><input type="checkbox" name="SIMR" id="SIMR"></th><th><input type="checkbox" name="SIMS" id="SIMS"></th><th><input type="checkbox" name="SIMD" id="SIMD"></th><th><input type="checkbox" name="SIMP" id="SIMP"></th><th><input type="checkbox" name="SIMR" id="SIMR"></th></tr>
        <tr style="text-align:left"><th>COPY DOCUMENT</th><th><input type="checkbox" name="CDMR" id="CDMR"></th><th><input type="checkbox" name="CDMS" id="CDMS"></th><th><input type="checkbox" name="CDMD" id="CDMD"></th><th><input type="checkbox" name="CDMP" id="CDMP"></th><th><input type="checkbox" name="CDMR" id="CDMR"></th></tr>
        <tr style="text-align:left"><th>COMMISSION ENTRY</th><th><input type="checkbox" name="CEMR" id="CEMR"></th><th><input type="checkbox" name="CEMS" id="CEMS"></th><th><input type="checkbox" name="CEMD" id="CEMD"></th><th><input type="checkbox" name="CEMP" id="CEMP"></th><th><input type="checkbox" name="CEMR" id="CEMR"></th></tr>
        <tr style="text-align:left"><th><input type="button" name="save" value="Save" id="save" onclick="savedata()"></th><th><input type="button" name="delete" value="Delete" id="delete" onclick="deldata()"></th></tr>
    </table>
    <script>
        function click() {

        }
    </script>
</div>
</body>
</html>
<HTMl>
<a href="/logout.php">< Log Out</a> User: <label id="user" for=""></label>
</HTMl>
