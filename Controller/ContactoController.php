<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/UtilitiesController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/ContactoModel.php';

    //SESSION NONE
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    //BOTON ENVIAR CONTACTO
    if(isset($_POST["btnEnviarContacto"]))
    {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $asunto = $_POST["asunto"];
        $mensaje = $_POST["mensaje"];

        // Guardar en la base de datos
        $resultado = GuardarContactoModel($nombre, $email, $telefono, $asunto, $mensaje);

        if($resultado)
        {
            // Enviar correo al administrador
            $mensajeAdmin = "
                <html>
                    <body style='font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0;'>
                        <table align='center' width='600' cellpadding='0' cellspacing='0' 
                            style='background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);'>
                            
                            <!-- Encabezado -->
                            <tr style='background-color: #f08632;'>
                                <td style='padding: 20px; text-align: center; color: #ffffff;'>
                                    <h2 style='margin: 0;'>Nuevo Mensaje de Contacto</h2>
                                </td>
                            </tr>

                            <!-- Cuerpo del mensaje -->
                            <tr>
                                <td style='padding: 30px; color: #333333; font-size: 16px; line-height: 1.6;'>
                                    <p><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</p>
                                    <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
                                    <p><strong>Teléfono:</strong> " . htmlspecialchars($telefono) . "</p>
                                    <p><strong>Asunto:</strong> " . htmlspecialchars($asunto) . "</p>
                                    <hr style='border: 1px solid #e0e0e0; margin: 20px 0;'>
                                    <p><strong>Mensaje:</strong></p>
                                    <p style='background-color: #f5f5f5; padding: 15px; border-radius: 5px;'>
                                        " . nl2br(htmlspecialchars($mensaje)) . "
                                    </p>
                                </td>
                            </tr>

                            <!-- Pie de página -->
                            <tr style='background-color: #f5f5f5;'>
                                <td style='padding: 20px; text-align: center; font-size: 12px; color: #666666;'>
                                    <p style='margin: 0;'>Este mensaje fue enviado desde el formulario de contacto de Mary's Sweet Cakes</p>
                                </td>
                            </tr>
                        </table>
                    </body>
                </html>";

            // Enviar correo de confirmación al usuario
            $mensajeUsuario = "
                <html>
                    <body style='font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0;'>
                        <table align='center' width='600' cellpadding='0' cellspacing='0' 
                            style='background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);'>
                            
                            <!-- Encabezado -->
                            <tr style='background-color: #f08632;'>
                                <td style='padding: 20px; text-align: center; color: #ffffff;'>
                                    <h2 style='margin: 0;'>¡Mensaje Recibido!</h2>
                                </td>
                            </tr>

                            <!-- Cuerpo del mensaje -->
                            <tr>
                                <td style='padding: 30px; color: #333333; font-size: 16px; line-height: 1.6;'>
                                    <p>Estimado(a) <strong>" . htmlspecialchars($nombre) . "</strong>,</p>

                                    <p>Hemos recibido tu mensaje y queremos agradecerte por contactarnos.</p>

                                    <p>Nuestro equipo revisará tu consulta y te responderemos a la brevedad posible.</p>

                                    <div style='background-color: #f5f5f5; padding: 15px; border-radius: 5px; margin: 20px 0;'>
                                        <p style='margin: 0;'><strong>Resumen de tu mensaje:</strong></p>
                                        <p style='margin: 10px 0 0 0;'><strong>Asunto:</strong> " . htmlspecialchars($asunto) . "</p>
                                    </div>

                                    <p style='margin-top: 40px;'>Gracias por confiar en nosotros.<br>
                                    <strong>Mary's Sweet Cakes</strong></p>
                                    
                                    <p style='font-size: 14px; color: #666666;'>
                                        📍 Av. Central 123, San José, Costa Rica<br>
                                        📞 +506 8888-8888<br>
                                        ✉️ info@marysSweetCakes.com
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </body>
                </html>";

            // Enviar ambos correos
            EnviarCorreo('Nuevo mensaje de contacto - ' . $asunto, $mensajeAdmin, 'pfmoras@gmail.com');
            EnviarCorreo('Confirmación de mensaje recibido', $mensajeUsuario, $email);

            $_SESSION["MensajeExito"] = "¡Mensaje enviado exitosamente! Te responderemos pronto.";
            header("Location: ../../View/Contacto/Contactanos.php");
            exit;
        }

        $_POST["Mensaje"] = "No se ha podido enviar el mensaje. Por favor, intenta nuevamente.";
    }
?>