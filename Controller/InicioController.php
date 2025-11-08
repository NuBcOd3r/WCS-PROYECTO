<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/UtilitiesController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/InicioModel.php';

    //SESSION NONE
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    //BOTON REGISTRO
    if(isset($_POST["btnRegistro"]))
    {
        $cedula = $_POST["cedula"];
        $nombreCompleto = $_POST["nombreCompleto"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $contrasenna = $_POST["contrasenna"];

        $resultado = CrearCuentaModel($cedula,$nombreCompleto,$correo,$telefono,$contrasenna);

        if($resultado)
        {
            header("Location: ../../View/Inicio/InicioSesion.php");
            exit;
        }

        $_POST["Mensaje"] = "No se ha podido crear la cuenta solicitada";
    }

    //BOTON INICIAR SESION
    if(isset($_POST["btnInicioSesion"]))
    {
        $correo = $_POST["correo"];
        $contrasenna = $_POST["contrasenna"];

        $resultado = ValidarCuentaModel($correo,$contrasenna);

        if($resultado)
        {
            $_SESSION["idUsuario"] = $resultado["idUsuario"];
            $_SESSION["nombre"] = $resultado["nombre"];
            $_SESSION["NombrePerfil"] = $resultado["NombrePerfil"];

            header("Location: ../../View/Inicio/Home.php");
            exit;
        }

        $_POST["Mensaje"] = "No se ha podido iniciar sesión, verifique sus credenciales.";
    }

    //BOTON DE RECUPERAR CONTRASEÑA
    if (isset($_POST["btnRecuperarContraseña"])) {
        $correo = $_POST["correo"];

        $resultado = RecuperarCuentaModel($correo);

        if ($resultado) {
            $contrasennaGenerada = GenerarContrasenna();
            $resultadoActualizar = ActualizarContrasennaModel($resultado['idUsuario'], $contrasennaGenerada);

            if ($resultadoActualizar) {
                $mensaje = "
                    <html>
                        <body style='font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0;'>
                            <table align='center' width='600' cellpadding='0' cellspacing='0' 
                                style='background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);'>
                                
                                <!-- Encabezado -->
                                <tr style='background-color: #f08632;'>
                                    <td style='padding: 20px; text-align: center; color: #ffffff;'>
                                        <h2 style='margin: 0;'>Restablecimiento de Contraseña</h2>
                                    </td>
                                </tr>

                                <!-- Cuerpo del mensaje -->
                                <tr>
                                    <td style='padding: 30px; color: #333333; font-size: 16px; line-height: 1.6;'>
                                        <p>Estimado(a) <strong>" . htmlspecialchars($resultado['nombre']) . "</strong>,</p>

                                        <p>Se ha generado una nueva contraseña de acceso para su cuenta:</p>

                                        <p style='font-size: 20px; font-weight: bold; color: #f08632; text-align: center; margin: 20px 0;'>
                                            " . htmlspecialchars($contrasennaGenerada) . "
                                        </p>

                                        <p>Por su seguridad, le recomendamos <strong>cambiar esta contraseña</strong> una vez que haya iniciado sesión.</p>

                                        <div style='text-align: center; margin: 30px 0;'>
                                            <a href='http://localhost/WCS-PROYECTO' 
                                                style='background-color: #f08632; color: #fff; text-decoration: none; 
                                                padding: 12px 25px; border-radius: 5px; font-weight: bold;'>
                                                Iniciar Sesión
                                            </a>
                                        </div>

                                        <p>Si usted no solicitó este cambio, por favor comuníquese con el soporte técnico de inmediato.</p>

                                        <p style='margin-top: 40px;'>Gracias por confiar en nosotros.<br>
                                        <strong>Mary´s Sweet Cakes</strong></p>
                                    </td>
                                </tr>
                            </table>
                        </body>
                    </html>";

                EnviarCorreo('Recuperar Acceso', $mensaje, $resultado["correoElectronico"]);

                header("Location: ../../View/Inicio/InicioSesion.php");
                exit;
            }
        }

        $_POST["Mensaje"] = "No se ha podido procesar.";
    }

    //BOTON DE SALIR
    if(isset($_POST["btnSalir"]))
    {
        session_destroy();
        header("Location: ../../View/Inicio/InicioSesion.php");
        exit;
    }
?>