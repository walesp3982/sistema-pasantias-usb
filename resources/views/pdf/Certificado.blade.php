<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certificado de Validación de Pasantías</title>
  <style>
    @page { size: letter landscape; margin: 0; }
    body {
      font-family: sans-serif;
      -webkit-print-color-adjust: exact;
      margin: 0;
    }

    .certificado {
      width: 11in;
      height: 8.5in;
      background: url("{{ public_path('images/CertificadoFondo.jpg') }}") ;
      background-repeat: no-repeat;
      background-position: center;
        background-size: cover;
    }

    /* Logo superior izquierdo */
    .logo {
      position: absolute;
      top: 3cm;
      left: 2.5cm;
      width: 96px;
      height: auto;
    }

    /* Título central */
    .titulo {
      text-align: center;
      margin-top: 2.7cm;
      color: #231E87;
      font-weight: 900;
      font-size: 45px;
      text-transform: uppercase;
      line-height: 1.1;
    }


    /* Cuerpo de texto */
    .cuerpo {
      max-width: 70%;
      margin: 1.8cm auto 0 auto;
      font-size: 18px;
      line-height: 1.6;
      color: #1f2937;
      text-align: justify;
    }

    .cuerpo p {
      text-align: center;
      margin-bottom: 1.2rem;
    }

    .nombre-estudiante {
      font-size: 34px;
      font-weight: 900;
      margin: 1rem 0 1.5rem 0;
      text-align: center;
    }

    /* Firmas */
    .firmas {
      width: 100%;
      position: absolute;
      bottom: 3cm;
      left: 0;
      text-align: center;
    }

    .firmas td {
      width: 50%;
      vertical-align: top;
      text-align: center;
      padding: 0 1cm;
    }
  </style>
</head>

<body>
  <div class="certificado">
    <!-- LOGO -->
    <img src="{{ public_path('images/soloLogo.jpg') }}" class="logo" alt="Logo Universidad">

    <!-- TÍTULO CENTRAL -->
    <div class="titulo">Certificado<br>de Validación<br>de Pasantías</div>

    <!-- CUERPO DEL TEXTO -->
    <div class="cuerpo">
      <p>Por medio del presente, la Carrera de {{ $postulation->internship->career->name }} obtorga el presente reconocimiento
        a el(la) estudiante:</p>

      <div class="nombre-estudiante">
        {{ strtoupper($postulation->student->first_name." ".$postulation->student->last_name) }}
      </div>

      <p>
        con Registro Universitario (RU)
        <strong>{{ $postulation->student->ru }}</strong>, ha cumplido satisfactoriamente el programa de
        pasantías académicas obligatorias en la empresa/institución
        <strong> {{ $postulation->internship->company->name }}</strong>, desde el
        <strong> {{ $postulation->internship->start_date->translatedFormat('j \\d\\e F \\d\\e Y') }}</strong> hasta el
        <strong> {{ $postulation->internship->end_date->translatedFormat('j \\d\\e F \\d\\e Y') }}</strong>, completando un total de
        <strong> {{ $postulation->internship->start_date->diffInMonths($postulation->internship->end_date) }}</strong> de trabajo práctico profesional.
      </p>
    </div>

    <!-- FIRMAS -->
    <table class="firmas">
  <tr>
    <td class="firma">
      <p>-------------------------------------------</p>
      <p>Secretaria Academica</p>
      <p>{{$postulation->internship->career->name}}</p>
    </td>

    <td class="firma">
      <p>-------------------------------------------</p>
        <p>Dirección de Carrera</p>
          <p>{{ $postulation->internship->career->name }}</p>
     </td>
    </tr>
    </table>
    </div>
</body>
</html>
