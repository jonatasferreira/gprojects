<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<h1>Gereciador de Projetos</h1>
	<h3>Criar Funcionários</h3>

    <?php
    $attributes = array('id' => 'employeeform');
    echo form_open('funcionario/criar', $attributes);
        $data = array(
            'name'          => 'name',
            'id'            => 'name',
            'value'         => set_value('name', '' ),
            'placeholder'   => 'Digite o nome',
            'maxlength'     => '255'
        );
        echo form_error('name');
        echo form_label('Nome', 'name');
        echo form_input($data);
        echo '<br>';
        $data = array(
            'name'          => 'cpf',
            'id'            => 'cpf',
            'value'         => set_value('cpf', '' ),
            'placeholder'   => 'Digite o cpf',
            'maxlength'     => '255'
        );
        echo form_error('cpf');
        echo form_label('CPF', 'cpf');
        echo form_input($data);
        echo '<br>';
        $data = array(
            'type'          => 'submit',
            'value'         => 'Enviar'
        );
        echo form_input($data);
    echo form_close();
    ?>
</div>
