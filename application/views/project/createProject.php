<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<h1>Gereciador de Projetos</h1>
	<h3>Criar Projeto</h3>

    <?php
    $attributes = array('id' => 'projectform');
    echo form_open('projeto/criar', $attributes);
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

        echo form_error('client');
        echo form_label('Cliente', 'client');
        echo form_dropdown('client', $optionsClient);
        echo '<br>';

        echo form_error('manager');
        echo form_label('Gerente', 'manager');
        echo form_dropdown('manager', $optionsManager);

        echo '<br>';
        $data = array(
            'type'          => 'submit',
            'value'         => 'Enviar'
        );
        echo form_input($data);
    echo form_close();
    ?>
</div>
