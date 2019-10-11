<?php

    if(isset($_POST["mailOlvide"])) {

        $destinatario = $_POST["mailOlvide"];
        $objeto = "Nueva contraseña";
        $mensaje = "Haga clic acá para generar una nueva contraseña.";
        $headers =  'From: xavierm@outlook.com.ar' . "\r\n" .
                    'Reply-To: xavierm@outlook.com.ar' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

        mail($destinatario, $objeto, $mensaje, $headers);

        header('Location: index.php'); 
    }

?>