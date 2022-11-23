<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Payment Status</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
</head>
<body>
<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You transaction is successfully completed.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Failed!</strong> You transaction could not be completed.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		echo "<div class='container'>
		<table class='table'>
			<thead>
			  <tr>
				<th scope='col'>Order ID</th>
				<th scope='col'>Amount</th>
				<th scope='col'>Date</th>
				<th scope='col'>Bank</th>
			  </tr>
			</thead>
			<tbody>
			  <tr>
				<td> $_POST[ORDERID] </td>
				<td> $_POST[TXNAMOUNT] </td>
				<td> $_POST[TXNDATE] </td>
				<td> $_POST[BANKNAME] </td>
			  </tr>
			</tbody>
		  </table>
		</div>";

	}
	

}
else {
	echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Suspicious transaction as checksum mismatched.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
	//Process transaction as suspicious.
}

?>
<div class="container">
<button class="btn btn-primary" onclick = "window.open('../welcome.php','_self')">Go Back</button>
</div>

	
</body>

</html>