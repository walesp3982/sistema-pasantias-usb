<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Postulantes</title>
    <style>
        body {
            font-family: roboto, arial;
            font-size: 12px;
            color: #000;
        }
        .header {
            margin-bottom: 15px;
        }
        .logo {
            width: 150px;
            height: 40px;
            float: left;
        }
        .titulo {
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 1px;
            padding-left: 240px;    
        }
        .subtitulo {
            font-size: 14px;
            font-weight: bold;
            padding-left: 300px;
            margin-bottom: 10px;
        }
        .info {
            margin-bottom: 15px;
            font-size: 12px;
        }
        .info p {
            margin: 2px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
        }
        th {
            background-color: #2231A8;
            color: #fff;
            text-align: center;
        }
        td {
            text-align: center;
        }
        .text-left {
            text-align: left;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ public_path('images/logo-usb.png') }}" class="logo">
        <div class="titulo">LISTA DE POSTULANTES</div>
        <div class="subtitulo">Postulantes a Empresa</div>
    </div>

    <div class="info">
        <p><strong>Dirección:</strong> Av. Heroínas #123, Cochabamba - Bolivia</p>
        <p><strong>Horario:</strong> Lunes a Viernes de 08:30 a 18:30</p>
        <p><strong>Fecha:</strong> {{ date('d/m/Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width:50px;">N°</th>
                <th>Nombre Completo</th>
                <th style="width:120px;">RU</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td> 1 </td>
                    <td class="text-left">nombre</td>
                    <td>ru</td>
                </tr>
                
                <tr>
                    <td> 2 </td>
                    <td class="text-left">nombre</td>
                    <td>ru</td>
                </tr>
                
                <tr>
                    <td> 3 </td>
                    <td class="text-left">nombre</td>
                    <td>ru</td>
                </tr>
                
                <tr>
                    <td> 4 </td>
                    <td class="text-left">nombre</td>
                    <td>ru</td>
                </tr>
        </tbody>
    </table>

</body>
</html>
