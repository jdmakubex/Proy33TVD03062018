<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Sin Datos!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

/*Insercin de Datos  a la BD*/
$consulta = "INSERT INTO contacto (name, email, phone, message)VALUES('$name','$email_address','$phone','$message')";
 /*Ojo, personalizar los datos de conexion segun los datos del servidor local*/
  $conexion = new mysqli("localhost","root","root","oxxo",3306);
 
  $respuesta = new stdClass();
 
  if($conexion->query($consulta)){
    $respuesta->mensaje = "Se guardo correctamente";
  }
  else {
    $respuesta->mensaje = "Ocurrió un error";
  }
  echo json_encode($respuesta);  

/*Fin de la Insercion de Datos*/

// Create the email and send the message
$to = 'marg.jd@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;	

?>
