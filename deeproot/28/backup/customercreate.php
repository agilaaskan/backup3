<?php
$row=0;
$file =  fopen('customersample.csv', "r");	
$i=0;
while ($row = fgetcsv($file)) { 
  if ($i > 0) {
    
$url = 'http://staging3.24sevencommerce.com/shop';
$token_url=$url."rest/V1/integration/admin/token";
$product_url=$url. "rest/V1/customers";
$ch = curl_init();
$data = array("username" => agila, "password" => 'Deep@123');
$data_string = json_encode($data);
$ch = curl_init($token_url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
    );
$token = curl_exec($ch);

$adminToken=  json_decode($token);
echo $adminToken;
exit();
// $columncoun="India";
$email=$row[0];
$fname=$row[1];
$lname = $row[2];
$pass = $row[3];
$bfname=$row[4];
$blname = $row[5];
$bst1	= $row[6];
$bst2 =$row[7];
$bst3	= $row[8];
$bst4 =$row[9];
$bcity = $row[10];
$bregion	= $row[11];
$bcountry = $row[12];
$bpin	= $row[13];
$bphone	= $row[14];
$bcompany	= $row[15];
$sfname=$row[16];
$slname = $row[17];
$sst1	= $row[18];
$sst2 =$row[19];
$sst3	= $row[20];
$scity = $row[21];
$sregion	= $row[22];
$scountry = $row[23];
$spin	= $row[24];
$sphone	= $row[25];
$scompany	= $row[26];
$cret	= $row[27];

$customerData = [
    'customer' => [
        "email" => "$email",
        "firstname" => "$fname",
        "lastname" => "$lname",
        "dob" => "$row[29]",
        "gender" => "$row[28]",
        "createdAt" => "$cret",
        "storeId" => 1,
        // "websiteId" => "$row[0]",
        "groupId" => 1,
        "addresses" => [
            [
                "firstname" => "$bfname",
                "lastname" => "$blname",
                "countryId" => "$bcountry ",
                "region" => [
                    "region" => "$bregion"
                ],
                "street" => [
                   " $bst1",
                    "$bst2",
                    "$bst3",
                    "$bst4"
                ],
                "company" => "$bcountry",
                "telephone" => "$bphone",
                "postcode" => "$bpin",
                "city" => "$bcity",
                "defaultBilling" => true
            ],
            [
                "firstname" => "$sfname",
                "lastname" => "$slname",
                "countryId" => "$scountry",
                "region" => [
                    "region" => "$sregion"
                ],
                "street" => [
                    "$sst1",
                    "$sst2",
                    "$sst3"
                ],
                 "company" => "$scountry",
                "telephone" => "$sphone",
                "postcode" => "$spin",
                "city" => "$scity",
                "defaultShipping" => true
            ]
            ],
            "extension_attributes"=> [
                "is_subscribed"=> 1
            ]
    ],
    "password" => "$pass"
];


    $setHaders = array('Content-Type:application/json','Authorization:Bearer '.$adminToken);
    
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $product_url);
    curl_setopt($ch,CURLOPT_POSTFIELDS,  json_encode($customerData));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $setHaders); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
      echo $i;
    }
    }   
    $i++;
    }
