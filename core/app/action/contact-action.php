<?php

if(isset($_POST["accept"])){
	$contact = new ContactData();
	$contact->fullname = $_POST["fullname"];
	$contact->email = $_POST["email"];
	$contact->subject = $_POST["subject"];
	$contact->message = $_POST["message"];
	$contact->add();


$to = 'evilnapsis@gmail.com'; // aqui coloca el email de quien recibira el correo
$from_email = $_POST["email"]; // $_POST[email]
$subject = 'SysContact - Nuevo Mensaje';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: $from_email" . "\r\n" .
"Reply-To: $from_email" . "\r\n" .
"X-Mailer: PHP/" . phpversion();

$message = '<body>
<h1>SysContact</h1>
<h3>Nuevo Mensaje</h3>
<p>Asunto: '.$_POST["subject"].'</p>
<p>Mensaje: '.$_POST["message"].'</p>
<p>Fecha: '.date("Y/m/d h:i:s").'</p>

</body>';

mail($to, $subject, $message, $headers);

Core::alert("Mensaje Enviado!");
Core::redir("./?view=contact");
}

?>