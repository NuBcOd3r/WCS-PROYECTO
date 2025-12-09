<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/PedidosModel.php';

    if(isset($_POST["btnEnviarPedido"]))
    {
        $idUsuario = $_SESSION["idUsuario"];
        $direccion = $_POST["direccion"];
        $fechaDeseada = $_POST["fechaDeseada"];
        $descripcion = $_POST["descripcion"];
        
        $resultado = RegistrarPedidoModel($idUsuario, $direccion, $fechaDeseada, $descripcion);

        if($resultado)
        {
            header("Location: ../../View/Productos/Productos.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "El pedido no se realizo correctamente";
        }        
    }  

    function ConsultarPedidosAdmin() {
        return ConsultarPedidosModel();
    }

    function ConsultarPedidoPorId($id) {
        return ConsultarPedidoPorIdModel($id);
    }

    function ConsultarCotizacionPorId($id) {
        return ConsultarCotizacionPorIdModel($id);
    }

    if(isset($_POST["btnActualizarPedido"]))
    {
        $idPedido = $_POST["idPedido"];
        $fechaDeseada = $_POST["fechaDeseada"];
        $direccionEntrega = $_POST["direccionEntrega"];
        $descripcion = $_POST["descripcion"];

        $resultado = ActualizarPedidoModel($idPedido,$fechaDeseada, $direccionEntrega, $descripcion);

        if($resultado)
        {
            header("Location: ../../View/Productos/Productos.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "El pedido no se realizo correctamente";
        }        
    }

    if(isset($_POST["btnCotizar"]))
    {
        $idPedido = $_POST["idPedido"];
        $precioUnitario = $_POST["precioUnitario"];
        $cantidad = $_POST["cantidad"];

        $resultado = CotizarPedidoModel($idPedido, $precioUnitario, $cantidad);

        if($resultado)
        {
            header("Location: ../../View/Pedidos/CotizacionFinal.php?id=" . $idPedido);
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "El pedido no se realizó correctamente";
        }        
    }

    if(isset($_POST["btnEnviarCotizacion"]))
    {
        $idPedido = $_POST["idPedido"];
        $pedido = ConsultarCotizacionPorId($idPedido);
        $cliente = $pedido['Cliente'];
        $correo = $pedido['Correo'];
        $telefono = $pedido['Telefono'];
        $fechaPedido = date('d/m/Y H:i', strtotime($pedido['FechaPedido']));
        $fechaDeseada = date('d/m/Y H:i', strtotime($pedido['FechaDeseada']));
        $direccionEntrega = $pedido['DireccionEntrega'];
        $descripcion = $pedido['Descripcion'];
        $cantidad = $pedido['Cantidad'];
        $precioUnitario = number_format($pedido['PrecioUnitario'], 2);
        $subtotal = number_format($pedido['Subtotal'], 2);
        $impuesto = number_format($pedido['Impuesto'], 2);
        $total = number_format($pedido['Total'], 2);

        $mensajeCotizacion = "
            <html>
                <body style='font-family: Arial, sans-serif; background-color: #ffffff; margin: 0; padding: 0;'>
                    <table align='center' width='600' cellpadding='0' cellspacing='0' 
                        style='background-color: #ffffff; border: 2px solid #dee2e6; margin: 30px auto; box-shadow: 0 0 20px rgba(0,0,0,0.1);'>
                        
                        <!-- Encabezado -->
                        <tr style='background: linear-gradient(135deg, #dee2e6 0%, #f08632 100%);'>
                            <td style='padding: 30px; text-align: center; color: #ffffff;'>
                                <h2 style='margin: 0; font-size: 28px; font-weight: bold;'>COTIZACIÓN FINAL</h2>
                                <p style='font-size: 18px; margin: 10px 0 0 0; opacity: 0.9;'>Pedido #" . htmlspecialchars($idPedido) . "</p>
                            </td>
                        </tr>

                        <!-- Cuerpo -->
                        <tr>
                            <td style='padding: 30px; color: #333333; font-size: 14px; line-height: 1.6;'>
                                
                                <p>Estimado(a) <strong>" . htmlspecialchars($cliente) . "</strong>,</p>
                                <p>Nos complace enviarle la cotización final de su pedido:</p>

                                <!-- Información del Cliente -->
                                <div style='border-bottom: 2px dashed #dee2e6; padding-bottom: 20px; margin-bottom: 20px;'>
                                    <h3 style='color: #f08632; font-size: 16px; margin-bottom: 15px;'>📋 Información del Cliente</h3>
                                    <table width='100%' style='font-size: 14px;'>
                                        <tr style='border-bottom: 1px solid #f0f0f0;'>
                                            <td style='padding: 8px 0; font-weight: 600; color: #495057; width: 180px;'>Cliente:</td>
                                            <td style='padding: 8px 0; color: #212529;'>" . htmlspecialchars($cliente) . "</td>
                                        </tr>
                                        <tr style='border-bottom: 1px solid #f0f0f0;'>
                                            <td style='padding: 8px 0; font-weight: 600; color: #495057;'>Correo Electrónico:</td>
                                            <td style='padding: 8px 0; color: #212529;'>" . htmlspecialchars($correo) . "</td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 8px 0; font-weight: 600; color: #495057;'>Teléfono:</td>
                                            <td style='padding: 8px 0; color: #212529;'>" . htmlspecialchars($telefono) . "</td>
                                        </tr>
                                    </table>
                                </div>

                                <!-- Detalles del Pedido -->
                                <div style='border-bottom: 2px dashed #dee2e6; padding-bottom: 20px; margin-bottom: 20px;'>
                                    <h3 style='color: #f08632; font-size: 16px; margin-bottom: 15px;'>📦 Detalles del Pedido</h3>
                                    <table width='100%' style='font-size: 14px;'>
                                        <tr style='border-bottom: 1px solid #f0f0f0;'>
                                            <td style='padding: 8px 0; font-weight: 600; color: #495057; width: 180px;'>Fecha del Pedido:</td>
                                            <td style='padding: 8px 0; color: #212529;'>" . $fechaPedido . "</td>
                                        </tr>
                                        <tr style='border-bottom: 1px solid #f0f0f0;'>
                                            <td style='padding: 8px 0; font-weight: 600; color: #495057;'>Fecha Deseada:</td>
                                            <td style='padding: 8px 0; color: #212529;'>" . $fechaDeseada . "</td>
                                        </tr>
                                        <tr style='border-bottom: 1px solid #f0f0f0;'>
                                            <td style='padding: 8px 0; font-weight: 600; color: #495057;'>Dirección de Entrega:</td>
                                            <td style='padding: 8px 0; color: #212529;'>" . htmlspecialchars($direccionEntrega) . "</td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 8px 0; font-weight: 600; color: #495057;'>Descripción:</td>
                                            <td style='padding: 8px 0; color: #212529;'>" . htmlspecialchars($descripcion) . "</td>
                                        </tr>
                                    </table>
                                </div>

                                <!-- Detalle de Productos -->
                                <h3 style='color: #f08632; font-size: 16px; margin-bottom: 15px;'>🛍️ Detalle de Productos</h3>
                                <table width='100%' style='border-collapse: collapse; margin: 20px 0; font-size: 14px;'>
                                    <thead>
                                        <tr style='background-color: #f8f9fa;'>
                                            <th style='padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6; font-weight: 600; color: #495057;'>Cantidad</th>
                                            <th style='padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6; font-weight: 600; color: #495057;'>Precio Unitario</th>
                                            <th style='padding: 12px; text-align: right; border-bottom: 2px solid #dee2e6; font-weight: 600; color: #495057;'>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style='padding: 12px; border-bottom: 1px solid #dee2e6;'>" . htmlspecialchars($cantidad) . "</td>
                                            <td style='padding: 12px; border-bottom: 1px solid #dee2e6;'>₡" . $precioUnitario . "</td>
                                            <td style='padding: 12px; text-align: right; border-bottom: 1px solid #dee2e6;'>₡" . $subtotal . "</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Totales -->
                                <div style='background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-top: 20px;'>
                                    <table width='100%' style='font-size: 16px;'>
                                        <tr style='padding: 8px 0;'>
                                            <td style='padding: 8px 0;'>Subtotal:</td>
                                            <td style='padding: 8px 0; text-align: right;'>₡" . $subtotal . "</td>
                                        </tr>
                                        <tr style='padding: 8px 0;'>
                                            <td style='padding: 8px 0;'>Impuesto (13%):</td>
                                            <td style='padding: 8px 0; text-align: right;'>₡" . $impuesto . "</td>
                                        </tr>
                                        <tr style='border-top: 2px solid #f08632; margin-top: 10px; padding-top: 15px; font-size: 20px; font-weight: bold; color: #f08632;'>
                                            <td style='padding-top: 15px;'>TOTAL A PAGAR:</td>
                                            <td style='padding-top: 15px; text-align: right;'>₡" . $total . "</td>
                                        </tr>
                                    </table>
                                </div>

                                <p style='margin-top: 30px;'>Si tiene alguna pregunta sobre esta cotización, no dude en contactarnos.</p>
                                
                                <p style='margin-top: 40px;'>Gracias por confiar en nosotros.<br>
                                <strong>Mary's Sweet Cakes</strong></p>
                                
                                <p style='font-size: 14px; color: #666666;'>
                                    📍 Av. Central 123, San José, Costa Rica<br>
                                    📞 +506 8888-8888<br>
                                    ✉️ info@marysSweetCakes.com
                                </p>
                            </td>
                        </tr>

                        <!-- Pie de página -->
                        <tr style='background-color: #f5f5f5;'>
                            <td style='padding: 20px; text-align: center; font-size: 12px; color: #666666;'>
                                <p style='margin: 0;'>Documento generado automáticamente - " . date('d/m/Y H:i') . "</p>
                            </td>
                        </tr>
                    </table>
                </body>
            </html>";

        $resultadoEmail = EnviarCorreo('Cotización de Pedido #' . $idPedido . ' - Mary\'s Sweet Cakes', $mensajeCotizacion, $correo);

        if($resultadoEmail)
        {
            $_SESSION["MensajeExito"] = "¡Cotización enviada exitosamente al correo del cliente!";
            header("Location: ../../View/Pedidos/Pedidos.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido enviar la cotización. Por favor, intenta nuevamente.";
        }
    }

    if(isset($_POST["btnFinalizar"]))
    {
        $idPedido = $_POST["idPedido"];

        $resultado = FinalizarPedidoModel($idPedido);

        if($resultado)
        {
            header("Location: ../../View/Pedidos/Pedidos.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "El pedido no se finalizo correctamente";
        }        
    }
?>