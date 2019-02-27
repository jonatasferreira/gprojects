<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="">
    <meta name="author" content="Jônatas Ferreira">
    <link rel="icon" href="">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <!-- JQuery -->
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
    <base href="<?php echo base_url();?>">
</head>
<body>
<div class="navbar-wrapper">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo" href="<?php echo base_url('');?>"></a> 
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="<?php echo base_url('');?>">Home</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url('projeto');?>">Projetos<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('projeto');?>">Listar</a></li>
                                <li><a href="<?php echo base_url('projeto/criar');?>">Criar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url('cliente');?>">Clientes<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('cliente');?>">Listar</a></li>
                                <li><a href="<?php echo base_url('cliente/criar');?>">Criar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url('funcionario');?>">Funcionários<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('funcionario');?>">Listar</a></li>
                                <li><a href="<?php echo base_url('funcionario/criar');?>">Criar</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<div style="margin-top: 60px;"></div>