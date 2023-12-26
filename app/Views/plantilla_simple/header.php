<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Lista de espera">
    <meta name="author" content="Fernando Córdova">
    <title><?= $titulo ?></title>

    <!-- favicon -->
    <link href="<?= base_url() ?>public/assets/imagenes/plataforma/favicon.png" rel="icon" type="image/x-icon">

    <!-- Plantilla -->
    <link href="<?= base_url() ?>public/assets/plantilla/css/plantilla.css" rel="stylesheet">

    <!-- Utilidades -->
    <link href="<?= base_url() ?>public/assets/css/utilidades.css" rel="stylesheet">

    <!-- Librerias css de cada modulo -->
    <?php
    if (is_array($libcss)) {
        foreach ($libcss as $libreria) {
            echo view($libreria);
        }
    }
    ?>
</head>

<body class="bg-dark">
    <div class="loader-wrapper">
        <div class="loader-content">
            <h1>Cargando...</h1>
        </div>
    </div>