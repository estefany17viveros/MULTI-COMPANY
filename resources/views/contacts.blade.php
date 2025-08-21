@extends('layouts.app')

@section('title', 'Contacto')

@section('content')
<section class="container contact-info" style="max-width: 1100px; margin: 60px auto; padding: 0 30px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <div style="
        background: #ffffff;
        border-radius: 20px;
        padding: 50px 40px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        border: 1px solid #e2e8f0;
        line-height: 1.6;
        color: #2f4f4f;
    ">
        <h2 style="color: #1E7C4F; font-weight: 800; margin-bottom: 30px;">📞 Información de Contacto</h2>

        <p style="font-size: 1.1rem; margin-bottom: 30px;">
            Estamos siempre disponibles para atender tus dudas, sugerencias o solicitudes. No dudes en contactarnos a través de cualquiera de los siguientes medios, nuestro equipo de soporte está listo para ayudarte de lunes a viernes en horario laboral.
        </p>

        <ul style="list-style: none; padding: 0; font-size: 1.1rem; margin-bottom: 40px;">
            <li style="margin-bottom: 18px;">
                <strong>📍 Dirección:</strong> Calle 123, Centro Empresarial, Ciudad Ejemplo, Código Postal 56789
            </li>
            <li style="margin-bottom: 18px;">
                <strong>📧 Email:</strong> soporte@empresa.com — Para consultas generales y soporte técnico.
            </li>
            <li style="margin-bottom: 18px;">
                <strong>📱 Teléfono:</strong> +57 321 456 7890 — Línea directa de atención al cliente.
            </li>
            <li style="margin-bottom: 25px;">
                <strong>🕑 Horario de Atención:</strong> Lunes a Viernes, 8:00am - 5:00pm (GMT-5)
            </li>
        </ul>

        <div>
            <h4 style="color: #1E7C4F; font-weight: 700; margin-bottom: 20px;">🔗 Síguenos en Redes Sociales</h4>
            <div style="display: flex; gap: 25px; font-size: 2rem;">
                <a href="#" target="_blank" style="color: #3b5998;" aria-label="Facebook">
                    <i class="fab fa-facebook-square"></i>
                </a>
                <a href="#" target="_blank" style="color: #1da1f2;" aria-label="Twitter">
                    <i class="fab fa-twitter-square"></i>
                </a>
                <a href="#" target="_blank" style="color: #0077b5;" aria-label="LinkedIn">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="#" target="_blank" style="color: #e1306c;" aria-label="Instagram">
                    <i class="fab fa-instagram-square"></i>
                </a>
            </div>
        </div>

        <section style="margin-top: 50px; font-size: 1rem; color: #4a4a4a;">
            <h3 style="color: #1E7C4F; font-weight: 700; margin-bottom: 15px;">📝 Más información</h3>
            <p>
                Nuestro compromiso es brindarte la mejor experiencia posible. Para temas relacionados con ventas, soporte técnico, o cualquier otro departamento, te recomendamos utilizar los canales correspondientes para agilizar la atención.
            </p>
            <p>
                También puedes visitar nuestra <a href="/faq" style="color: #1E7C4F; text-decoration: underline;">Sección de Preguntas Frecuentes</a> para resolver dudas comunes al instante.
            </p>
        </section>
    </div>
</section>
@endsection
