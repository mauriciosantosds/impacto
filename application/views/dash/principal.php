<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Painel administrativo</title>
        <link rel="stylesheet" href="<?= base_url('css/dash/bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?= base_url('css/dash/custom.css');?>">
    </head>

    <body>

        <body>
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="<?=base_url('dash')?>">Painel Impacto</a>


                <!-- <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->
                <a href="<?=base_url('Login/logout');?>" class="btn btn-danger"><i class="glyph-icon glyph-user"></i>Sair</a>
            </nav>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    
        