@extends('layouts.app')

@section('title', 'Contacto')

@section('content')
    <section class="container contact-container" style="max-width: 600px; margin: 60px auto; padding: 0 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

        <form id="contactForm" style="
            display: flex;
            flex-direction: column;
            gap: 20px;
            background: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            border: 1px solid #e0e7e9;
        ">
            <label for="nombre" style="
                font-weight: 700; 
                color: #2f855a;
                font-size: 1.1rem;
                letter-spacing: 0.02em;
            ">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required
                style="
                    padding: 14px 18px; 
                    border: 2px solid #a3d9a5; 
                    border-radius: 10px; 
                    font-size: 1rem;
                    transition: border-color 0.3s ease;
                    outline-offset: 2px;
                "
                onfocus="this.style.borderColor='#38a169'"
                onblur="this.style.borderColor='#a3d9a5'"
            >

            <label for="email" style="
                font-weight: 700; 
                color: #2f855a;
                font-size: 1.1rem;
                letter-spacing: 0.02em;
            ">Email:</label>
            <input type="email" id="email" name="email" required
                style="
                    padding: 14px 18px; 
                    border: 2px solid #a3d9a5; 
                    border-radius: 10px; 
                    font-size: 1rem;
                    transition: border-color 0.3s ease;
                    outline-offset: 2px;
                "
                onfocus="this.style.borderColor='#38a169'"
                onblur="this.style.borderColor='#a3d9a5'"
            >

            <label for="mensaje" style="
                font-weight: 700; 
                color: #2f855a;
                font-size: 1.1rem;
                letter-spacing: 0.02em;
            ">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="5" required
                style="
                    padding: 14px 18px; 
                    border: 2px solid #a3d9a5; 
                    border-radius: 10px; 
                    font-size: 1rem; 
                    resize: vertical;
                    transition: border-color 0.3s ease;
                    outline-offset: 2px;
                "
                onfocus="this.style.borderColor='#38a169'"
                onblur="this.style.borderColor='#a3d9a5'"
            ></textarea>

            <button type="button" id="sendBtn" style="
                background: linear-gradient(135deg, #81e6d9, #38a169);
                color: white;
                border: none;
                padding: 15px 0;
                border-radius: 12px;
                font-weight: 800;
                font-size: 1.2rem;
                cursor: pointer;
                box-shadow: 0 6px 15px rgba(56, 161, 105, 0.5);
                transition: background 0.3s ease, transform 0.2s;
            "
            onmouseover="this.style.background='linear-gradient(135deg, #38a169, #276749)'; this.style.transform='translateY(-3px)'"
            onmouseout="this.style.background='linear-gradient(135deg, #81e6d9, #38a169)'; this.style.transform='translateY(0)'"
            >
                Enviar
            </button>
        </form>
    </section>

    <script>
        document.getElementById('sendBtn').addEventListener('click', function() {
            alert('Formulario estático: el envío aún no está habilitado.');
        });
    </script>
@endsection
