<?php

$to = "benoitdelboe@hotmail.fr";
$response = [];

//verif email renseigné et format valide

if (isset ($_POST['customer_mail']) && (filter_var($_POST['customer_mail'], FILTER_VALIDATE_EMAIL)))
    $header = "From : ".$_POST['customer_mail']."";

else
    array_push($response,'Adresse email non valide');

// verif nom renseigné non nul

if (isset($_POST['customer_name']) && $_POST['customer_name'] != "")
    $customer_name = $_POST['customer_name'];


//verif contenu renseigné et non nul

if (isset($_POST['content']) && $_POST['content'] != "")
    $content = $_POST['content'];

// si tout est bon alors on envoie le mail

if ((isset($header)) && (isset($customer_name)) && (isset($content))){
    mail($to,$customer_name,$content,$header);
    array_push($response, "Merci, votre message a bien été envoyé !");
}
echo json_encode($response);


