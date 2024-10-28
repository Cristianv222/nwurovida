<?php
// manualidades.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planes de Precios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .pricing-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .pricing-card {
            background-color: white;
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .pricing-card.featured {
            border-color: #fff9bf;
            background-color: #c5e1c8;
        }
        .pricing-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .pricing-card h2 {
            color: #6b4ce5;
            margin-bottom: 20px;
        }
        .pricing-card p {
            font-size: 2em;
            color: #333;
        }
        .price {
            font-size: 1.5em;
            color: #6b4ce5;
        }
        .features {
            text-align: left;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .features li {
            list-style: none;
            margin-bottom: 10px;
        }
        .features li::before {
            content: "✔";
            color: green;
            margin-right: 10px;
        }
        .choose-plan {
            background-color: #6b4ce5;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .choose-plan:hover {
            background-color: #543cb5;
        }
        .note {
            font-size: 0.9em;
            color: #999;
            margin-top: 15px;
        }
    </style>
</head>
<body>



<div class="pricing-container">
    <!-- Plan Premium -->
    <div class="pricing-card">
        <h2>Plan Diario</h2>
        <p class="price"> $5 </p>
        <div class="features">
            <ul>
                <li>100 sitios activos</li>
                <li>SEO avanzado</li>
                <li>Certificado SSL</li>
                <li>Soporte 24/7</li>
            </ul>
        </div>
        <button class="choose-plan">Elegir plan</button>
        <p class="note">+2 meses GRATIS al iniciar</p>
    </div>

    <!-- Plan Business (Destacado) -->
    <div class="pricing-card featured">
        <h2>Plan Mensual</h2>
        <p class="price">3,99 €/mes</p>
        <div class="features">
            <ul>
                <li>200 sitios activos</li>
                <li>SEO avanzado + Inteligencia artificial</li>
                <li>Certificado SSL + Seguridad avanzada</li>
                <li>Soporte VIP 24/7</li>
            </ul>
        </div>
        <button class="choose-plan" src="https://agenda.kumbio.com/clubneurovida-56">Agenda tu cita</button>
        <p class="note">+2 meses GRATIS al iniciar</p>
    </div>

</body>
</html>
