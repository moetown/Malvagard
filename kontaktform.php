<?php 

// anger en variabel som kan lagra de eventuella felaktigheterna 
$errors = array(); 
// kontrollera om ett Förnamn angivits 
if (!$_POST["namn"]) 
$errors[] = "- NAMN"; 
// kontrollera om ett Efternamn angivits 
if (!$_POST["telefon"]) 
$errors[] = "- TELEFON"; 
// kontrollera om en E-postadress angivits 
if (!$_POST["epost"]) 
$errors[] = "- E-POSTADRESS"; 
// kontrollera om ett Meddelande angivits 
if (!$_POST["meddelande"]) 
$errors[] = "- inget MEDDELANDE har skrivits!"; 
// om felaktig information finns visas detta meddelande 
if (count($errors)>0){ 
echo "<strong>Följande information måste anges innan du kan skicka formuläret:</strong><br />"; 
foreach($errors as $fel) 
echo "$fel <br />"; 
echo "<br />Ange den information som saknas och skicka formuläret igen. Tack! <br />"; 
echo "<a href='javascript:history.go(-1)'>klicka här för att komma tillbaka till formuläret</a>"; 
} 
else { 
// formuläret är korrekt ifyllt och informationen bearbetas 
$to = "moa_parsland@hotmail.com"; 
$from = $_POST["epost"]; 
$subject = 'Kontakt från webbplatsen!'; 
$fnamn = $_POST["namn"]; 
$enamn = $_POST["telefon"]; 
$message = $_POST["meddelande"]; 

######################################################################## 
// HEADERS för innehållstyp och textkodning 
$headers = "Content-Type: text/plain; charset=utf-8 \r\n";  
$headers .= "From:".$fnamn." ".$enamn." <".$from.">"."\r\n"; 
$headers .= "MIME-Version: 1.0 \r\n"; 
######################################################################## 
if (mail($to, $subject, $message, $headers)) 
echo nl2br("<h2>Ditt meddelande har skickats!</h2> 
<b>mottagare:</b> $to 
<b>meddelande:</b> 
$message 
"); 
     
else 
echo "Det gick inte att skicka ditt meddelande"; 
} 
?>