<?PHP


 // phpmailer sinifimizi uygulamamiza dahil ediyoruz.
 require("phpmailer/class.phpmailer.php");

 $mail = new PHPMailer();
 
 // Eposta HTML olarak gonderilsin (HTML gonderimini iptal etmek icin true yerine false yazin)
 $mail->IsHTML(true);

 $mail->CharSet  = 'utf-8'; 
 
 // Eposta konu basligi
 $mail->Subject = "Terapi Tasarim Formu";
 
 // TXT eposta icin eposta govdesini olusturuyoruz
 $mail->AltBody = "Terapi Tasarim İletişim Formu\n\n
                  Adi Soyadi : ".$_POST['ad']."\n
                  Telefon Numarasi : ".$_POST['telefon']."\n
				          Eposta Adresi : ".$_POST['eposta']."\n
				          Mesaj : ".$_POST['mesaj']."\n
				  ";
				  
 // HTML eposta icin eposta govdesini olusturuyoruz
 $mail->Body    = "Ziyaretci Formu<br><br>
                   Adi Soyadi : ".$_POST['ad']."<br>
                   Telefon Numarasi : ".$_POST['telefon']."<br>
				          Eposta Adresi : ".$_POST['eposta']."<br>
				          Mesaj : ".$_POST['mesaj']."<br>
				  ";

 // epostamizi SMTP ustunden yollayalim.
 $mail->IsSMTP();

 // SMTP sunucu adresimiz.
 $mail->Host = "mail.terapitasarim.com";
 
 // Sunucumuz kimlik dogrulamasi istiyorsa "true" degerini verelim.
 $mail->SMTPAuth = true;     

 // SMTP kullanici adi ve parolasi
 $mail->Username = "info@terapitasarim.com";
 $mail->Password = "AD24em62.";

 // Eposta kimden gidiyor?
 $mail->From = "info@terapitasarim.com";

 // Eposta icin gorunen isim (Opsiyonel)
$mail->FromName = "Web Sitesi Siparisi - Terapi Tasarim";

 // hedef adres (gorunen isim olmadan)
 $mail->AddAddress("terapitasarim@gmail.com");
 
 // hedef adres (gorunen isim ile birlikte)
 //$mail->AddAddress("alici1@adres.com", "ALICI 1");

 // Eposta birden fazla kisiye gidecek ise $mail->AddAddress'i yine kullanabiliriz.
$mail->AddAddress("waccooo@gmail.com");

 // Yanitlama adresi ornegi (Opsiyonel)
 //$mail->AddReplyTo("destek@bikesoft.net","Teknik Destek");

 // Eposta icin sozcuk kaydirma. (Opsiyonel)
 //$mail->WordWrap = 50;

 // Eposta eklentisi (Opsiyonel)
 //$mail->AddAttachment("deneme.txt");

 // Eposta eklentisi (giden dosya adini biz belirleyelim) (Opsiyonel)
 //$mail->AddAttachment("deneme.txt", "yeni.txt");



 if(!$mail->Send()) 
 {
  echo "Mesajiniz gonderilemedi.<p>";
  echo "Hata : " . $mail->ErrorInfo;
  die();
}
 else
 {
  echo "Mesajiniz gonderildi.";
  header("Location:http://www.terapitasarim.com/");
 }  


/*

$sent = mail($Recipient, $Subject, $Email_body, $Email_headers);

  if ($sent){
    $emailResult = array ('sent'=>'yes');
  } else{
    $emailResult = array ('sent'=>'no');
  }

*/


?>