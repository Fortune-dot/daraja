<?php
$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';

$access_token = 'OwENPt3NoxjMswXlX0Kuon8ziAAM'; // Check the file mpesa_accesstoken.php.
$ShortCode    = '174379'; // Shortcode. Same as the one on register_url.php
$amount       = '1'; // Amount the client/we are paying to the paybill
$msisdn       = '0740408496'; // Phone number paying
$billRef      = 'Fortuner'; // Anything that helps identify the specific transaction

// Check if cURL is available
if (!function_exists('curl_init')) {
    die('cURL is not available on your server.');
}

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);

$curl_post_data = array(
    'ShortCode'      => $ShortCode,
    'CommandID'      => 'CustomerPayBillOnline',
    'Amount'         => $amount,
    'Msisdn'         => $msisdn,
    'BillRefNumber'  => $billRef
);

$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);

if ($curl_response === false) {
    die('cURL Error: ' . curl_error($curl));
}

curl_close($curl);

echo $curl_response;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lipa na Mpesa Daraja API</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <!--card-->
        <div class="card">
            <h3>Basic</h3>
            <div class="details">
                <ul>
                    <li><i class="fas fa-check"></i>Single Dormain</li>
                    <li><i class="fas fa-check"></i>10 GB Disk Space</li>
                    <li><i class="fas fa-check"></i>1 Email</li>
                    <li><i class="fas fa-check"></i>Free Panel</li>
                    <li><i class="fas fa-check"></i>Free SSL</li>
                </ul>
            </div>
            <p>KSH<span>500</span>/Month</p>
            <button>Pay with Mpesa</button>
        </div>
        <!--card-->


    </div>
</body>

</html>