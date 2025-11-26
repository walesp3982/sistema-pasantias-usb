<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Convocatoria</title>
    <style>
        @page {
            margin: 0;
        }
        
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
        }

        /* Borde azul alrededor de toda la página */
        .page-border {
            position: fixed;
            top: 8mm;
            left: 10mm;
            right: 10mm;
            bottom: 8mm;
            border: 1.2mm solid #003087;
            pointer-events: none;
        }

        /* Header con logos */
        .header {
            background-color: white;
            padding-left: 15mm;
            padding-right: 15mm;
            padding-top: 15mm;
        }

        .logo-left {
            width: 60mm;
            height: auto;
        }

        /* Contenido principal */
        .content {
            margin: 0mm 25mm 25mm 25mm;
            /* position: relative; */
            /* z-index: 1; */
        }

        .codigo {
            text-align: right;
            font-weight: bold;
            font-size: 11pt;
            margin-bottom: 4mm;
        }

        .titulo {
            text-align: center;
            font-weight: bold;
            font-size: 15pt;
            color: #000;
            margin-bottom: 8mm;
            line-height: 1.3;
        }

        .intro {
            font-size: 11pt;
            text-align: left;
            margin-bottom: 6mm;
            line-height: 1.5;
        }

        .seccion-titulo {
            font-weight: bold;
            font-size: 11.5pt;
            text-decoration: underline;
            margin-top: 5mm;
            margin-bottom: 3mm;
        }

        ul {
            list-style-type: none;
            padding-left: 3mm;
            margin: 0;
        }

        ul li {
            font-size: 10.5pt;
            margin-bottom: 6pt;
            line-height: 1.5;
            padding-left: 0;
        }

        ul li:before {
            content: "•";
            margin-right: 5mm;
            font-weight: bold;
        }

        .texto-final {
            font-size: 11pt;
            text-align: left;
            margin-top: 8mm;
            margin-bottom: 12mm;
            line-height: 1.5;
        }

        .despedida {
            font-size: 11pt;
            margin-top: 12mm;
        }

        .firma {
            text-align: center;
            font-weight: bold;
            font-size: 11pt;
            margin-top: 20mm;
            margin-bottom: 20mm;
        }

        .firma::before {
            content: "";
            display: block;
            width: 60%;
            border-top: 1px solid #000;
            margin: 0 auto;
            margin-bottom: 4mm;
        }
        
        .fecha {
            text-align: right;
            font-size: 10.5pt;
            margin-top: 20mm;
        }
    </style>
</head>
<body>
    <!-- Borde azul -->
    <div class="page-border"></div>

    <!-- Header con logos -->
    <div class="header">
        <img src="{{ public_path('images/logo-usb.png') }}" alt="Logo Universidad Salesiana" class="logo-left">
    </div>

    <!-- Contenido principal -->
    <div class="content">
        <!-- Código -->
        <div class="codigo">R-0349</div>

        <!-- Título -->
        <div class="titulo">
            CONVOCATORIA A PRÁCTICAS <br>
            PRE-PROFESIONALES / PASANTÍAS
        </div>

        <!-- Texto introductorio -->
        <div class="intro">
            La Universidad Salesiana de Bolivia convoca a todas las estudiantes 
            de la carrera de {{ $carrera }}, interesadas en realizar Prácticas Pre-profesionales en la 
            empresa <b>{{ $empresa }}</b>, presentar lo siguiente:
        </div>

        <!-- Requerimientos -->
        <div class="seccion-titulo">Requerimientos:</div>
        <ul>
            @foreach($requerimientos as $req)
            <li>{{ $req }}</li>
            @endforeach
        </ul>

        <!-- Requisitos -->
        <div class="seccion-titulo">Detalles de la Pasantía:</div>
        <ul>
            <li><b>Ubicación: </b>{{ $ubicacion }}</li>
            <li><b>Fecha de inicio: </b>{{ $fecha_inicio }}</li>
            <li><b>Fecha de finalización: </b>{{ $fecha_final }}</li>
            <li><b>Duración: </b>{{ $duracion }} meses</li>
        </ul>

        <!-- Texto final -->
        <div class="texto-final">
            Presentar la documentación solicitada en un folder color azul con nepaco y rotulado; 
            los fólderes se recepcionarán en {{ $lugar_entrega }} hasta el día {{ $fecha_cierre }}
        </div>

        <!-- Despedida -->
        <div class="despedida">Atentamente.</div>

        <!-- Firma -->
        <div class="firma">{{ $direccion_carrera }}</div>

        <!-- Fecha -->
        <div class="fecha">{{ $ciudad_fecha }}</div>
    </div>
</body>
</html>