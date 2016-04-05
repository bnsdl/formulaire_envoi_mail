<?php

$to = "benoitdelboe@hotmail.fr";

//verif email renseigné et format valide

if (isset ($_POST['customer_mail']) && (filter_var($_POST['customer_mail'], FILTER_VALIDATE_EMAIL))){
    $header = "From : ".$_POST['customer_mail']."";
    echo $header;
}
else
    echo "email non valide";

// verif nom renseigné non nul

if (isset($_POST['name']) && $_POST["name"] != ""){
    $customer_name = $_POST['name'];
}
else {
    echo "missing customer name";
}

//verif contenu renseigné et non nul

if (isset($_POST['content']) && $_POST['content'] != "")
    $content = $_POST['content'];
else
    echo "";



// si tout est bon alors on envoie le mail

if ((isset($header)) && (isset($customer_name)) && (isset($content)))
    mail($to,$customer_name,$content,$header);
else
    header("Location:index.html");
