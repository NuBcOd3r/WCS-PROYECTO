<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutInterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/ProductosController.php';
  $resultado = ConsultarProductos();
?>

<!DOCTYPE html>
<html lang="en">

<?php
    ShowHead()
?>

<body>

    <?php
      ShowToggler()
   ?>

    <?php
        ShowHeader()
    ?>


    <!-- SECCIÓN DE CONTACTO -->
    <section class="mt-5 mb-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2 class="text-center mb-4">Contáctanos</h2>
                    <div class="row g-4">
                        <!-- CARD IZQUIERDA - FORMULARIO -->
                        <div class="col-md-6">
                            <div class="card shadow-lg border-0 rounded-4 h-100" style="background-color: #f8f9fa;">
                                <div class="card-body p-4">
                                    <h4 class="card-title mb-4 text-center">Envíanos un mensaje</h4>
                                    <form id="formContacto" method="POST">
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre Completo</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" 
                                                   placeholder="Ingresa tu nombre" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="email" name="email" 
                                                   placeholder="tu@email.com" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="telefono" class="form-label">Teléfono</label>
                                            <input type="tel" class="form-control" id="telefono" name="telefono" 
                                                   placeholder="+506 0000-0000" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="asunto" class="form-label">Asunto</label>
                                            <input type="text" class="form-control" id="asunto" name="asunto" 
                                                   placeholder="Motivo de tu consulta" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="mensaje" class="form-label">Mensaje</label>
                                            <textarea class="form-control" id="mensaje" name="mensaje" rows="4" 
                                                      placeholder="Escribe tu mensaje aquí..." required></textarea>
                                        </div>
                                        
                                        <div class="d-grid">
                                            <button type="submit" class="btn text-white py-2" 
                                                    style="background-color: #f08632;">
                                                <i class="bi bi-send"></i> Enviar Mensaje
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- CARD DERECHA - INFORMACIÓN DE CONTACTO -->
                        <div class="col-md-6">
                            <div class="card shadow-lg border-0 rounded-4 h-100" style="background-color: #f8f9fa;">
                                <div class="card-body p-4 d-flex flex-column justify-content-center">
                                    <h4 class="card-title mb-4 text-center">Información de Contacto</h4>
                                    
                                    <div class="mb-4 text-center">
                                        <div class="d-flex align-items-center justify-content-center mb-3">
                                            <div class="me-3">
                                                <i class="bi bi-geo-alt-fill fs-4" style="color: #f08632;"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">Dirección</h6>
                                                <p class="mb-0 text-muted">Av. Central 123, San José, Costa Rica</p>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex align-items-center justify-content-center mb-3">
                                            <div class="me-3">
                                                <i class="bi bi-telephone-fill fs-4" style="color: #f08632;"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">Teléfono</h6>
                                                <p class="mb-0 text-muted">+506 8888-8888</p>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex align-items-center justify-content-center mb-3">
                                            <div class="me-3">
                                                <i class="bi bi-envelope-fill fs-4" style="color: #f08632;"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">Email</h6>
                                                <p class="mb-0 text-muted">info@marysSweetCakes.com</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 text-center">
                                        <h6 class="mb-3">Horario de Atención</h6>
                                        <p class="mb-1"><strong>Lunes a Viernes:</strong> 8:00 AM - 6:00 PM</p>
                                        <p class="mb-1"><strong>Sábados:</strong> 9:00 AM - 2:00 PM</p>
                                        <p class="mb-0"><strong>Domingos:</strong> Cerrado</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php
        ShowFooter()
    ?>

    <?php
        ShowJS()
    ?>

    <script src="../js/VerProductos.js"></script>
</body>

</html>