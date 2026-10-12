<?php
// Procesamiento simple del formulario
$mensaje_enviado = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $servicio = trim($_POST['servicio'] ?? '');
    $mensaje = trim($_POST['mensaje'] ?? '');

    if ($nombre && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Aquí puedes agregar envío de email real si lo deseas
        // mail($to, $subject, $body, $headers);
        $mensaje_enviado = true;
    } else {
        $error = 'Por favor completa correctamente los campos obligatorios.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios Generales | Soluciones Integrales para tu Negocio</title>
    <meta name="description" content="Ofrecemos servicios generales profesionales: diseño web, marketing digital, consultoría, mantenimiento y más. Impulsa tu empresa con soluciones confiables.">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f8fafc;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }
        header {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f766e;
        }
        .logo span { color: #14b8a6; }
        nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
        }
        nav a {
            text-decoration: none;
            color: #334155;
            font-weight: 500;
        }
        nav a:hover { color: #0f766e; }
        .hero {
            background: linear-gradient(135deg, #0f766e 0%, #14b8a6 100%);
            color: white;
            padding: 5rem 0;
            text-align: center;
        }
        .hero h1 {
            font-size: 2.8rem;
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 2rem;
            opacity: 0.95;
        }
        .btn {
            display: inline-block;
            background: #fff;
            color: #0f766e;
            padding: 0.9rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        .btn-primary {
            background: #0f766e;
            color: white;
        }
        section {
            padding: 4.5rem 0;
        }
        h2 {
            text-align: center;
            font-size: 2.2rem;
            margin-bottom: 1rem;
            color: #0f172a;
        }
        .subtitle {
            text-align: center;
            color: #64748b;
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.8rem;
        }
        .service-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            transition: transform 0.3s;
        }
        .service-card:hover {
            transform: translateY(-8px);
        }
        .service-card h3 {
            color: #0f766e;
            margin-bottom: 0.8rem;
            font-size: 1.3rem;
        }
        .why-us {
            background: white;
        }
        .benefits {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        .benefit {
            text-align: center;
            padding: 1.5rem;
        }
        .benefit .icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .contact {
            background: #f1f5f9;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }
        .form-group {
            margin-bottom: 1.2rem;
        }
        label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 500;
        }
        input, select, textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 1rem;
        }
        textarea { resize: vertical; min-height: 120px; }
        .success {
            background: #dcfce7;
            color: #166534;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        footer {
            background: #0f172a;
            color: #cbd5e1;
            text-align: center;
            padding: 2rem 0;
        }
        @media (max-width: 768px) {
            .hero h1 { font-size: 2rem; }
            nav ul { display: none; }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <div class="logo">Servicios<span>Generales</span></div>
                <ul>
                    <li><a href="#servicios">Servicios</a></li>
                    <li><a href="#por-que">Por qué nosotros</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h1>Servicios Generales Profesionales para Impulsar tu Negocio</h1>
            <p>Ofrecemos soluciones integrales y confiables en diseño, marketing, mantenimiento y consultoría. Sin complicaciones, con resultados reales.</p>
            <a href="#contacto" class="btn">Solicitar Cotización Gratis</a>
        </div>
    </section>

    <section id="servicios">
        <div class="container">
            <h2>Nuestros Servicios Generales</h2>
            <p class="subtitle">Soluciones prácticas y profesionales adaptadas a las necesidades de tu empresa o hogar.</p>
            <div class="services-grid">
                <div class="service-card">
                    <h3>Diseño y Desarrollo Web</h3>
                    <p>Creamos sitios web modernos, rápidos y optimizados que generan confianza y conversiones.</p>
                </div>
                <div class="service-card">
                    <h3>Marketing Digital</h3>
                    <p>Estrategias de publicidad online, redes sociales y posicionamiento para atraer más clientes.</p>
                </div>
                <div class="service-card">
                    <h3>Consultoría Empresarial</h3>
                    <p>Asesoramiento práctico para mejorar procesos, productividad y crecimiento de tu negocio.</p>
                </div>
                <div class="service-card">
                    <h3>Mantenimiento Técnico</h3>
                    <p>Soporte y mantenimiento de equipos, sistemas y espacios de trabajo.</p>
                </div>
                <div class="service-card">
                    <h3>Limpieza y Mantenimiento</h3>
                    <p>Servicios de limpieza profesional para oficinas, locales y propiedades.</p>
                </div>
                <div class="service-card">
                    <h3>Soporte IT</h3>
                    <p>Asistencia tecnológica, configuración de sistemas y resolución de problemas informáticos.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="por-que" class="why-us">
        <div class="container">
            <h2>¿Por qué elegirnos?</h2>
            <p class="subtitle">Trabajamos con transparencia, calidad y compromiso en cada proyecto.</p>
            <div class="benefits">
                <div class="benefit">
                    <div class="icon">✅</div>
                    <h3>Experiencia Comprobada</h3>
                    <p>Años ayudando a empresas y particulares con soluciones efectivas.</p>
                </div>
                <div class="benefit">
                    <div class="icon">⚡</div>
                    <h3>Respuesta Rápida</h3>
                    <p>Atención ágil y plazos de entrega realistas y cumplidos.</p>
                </div>
                <div class="benefit">
                    <div class="icon">💰</div>
                    <h3>Precios Claros</h3>
                    <p>Cotizaciones transparentes sin costos ocultos.</p>
                </div>
                <div class="benefit">
                    <div class="icon">🤝</div>
                    <h3>Atención Personalizada</h3>
                    <p>Nos adaptamos a las necesidades específicas de cada cliente.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="contacto" class="contact">
        <div class="container">
            <h2>Contáctanos</h2>
            <p class="subtitle">Cuéntanos qué necesitas y te responderemos a la brevedad con una propuesta.</p>

            <div class="form-container">
                <?php if ($mensaje_enviado): ?>
                    <div class="success">
                        ¡Gracias <?php echo htmlspecialchars($nombre); ?>! Hemos recibido tu mensaje. Te contactaremos pronto.
                    </div>
                <?php else: ?>
                    <?php if ($error): ?>
                        <div class="error"><?php echo htmlspecialchars($error); ?></div>
                    <?php endif; ?>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="nombre">Nombre completo *</label>
                            <input type="text" id="nombre" name="nombre" required value="<?php echo htmlspecialchars($_POST['nombre'] ?? ''); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico *</label>
                            <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" id="telefono" name="telefono" value="<?php echo htmlspecialchars($_POST['telefono'] ?? ''); ?>">
                        </div>
                        <div class="form-group">
                            <label for="servicio">Servicio de interés</label>
                            <select id="servicio" name="servicio">
                                <option value="">Selecciona un servicio</option>
                                <option value="Diseño Web">Diseño y Desarrollo Web</option>
                                <option value="Marketing Digital">Marketing Digital</option>
                                <option value="Consultoría">Consultoría Empresarial</option>
                                <option value="Mantenimiento">Mantenimiento Técnico</option>
                                <option value="Limpieza">Limpieza y Mantenimiento</option>
                                <option value="Soporte IT">Soporte IT</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Mensaje</label>
                            <textarea id="mensaje" name="mensaje" placeholder="Cuéntanos más sobre lo que necesitas..."><?php echo htmlspecialchars($_POST['mensaje'] ?? ''); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width:100%; border:none; cursor:pointer; font-size:1rem;">Enviar Solicitud</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Servicios Generales. Todos los derechos reservados.</p>
            <p style="margin-top:0.5rem; font-size:0.9rem;">Soluciones profesionales para tu negocio.</p>
        </div>
    </footer>
</body>
</html>
