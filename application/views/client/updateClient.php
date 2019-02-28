<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<h1>Gereciador de Projetos</h1>
	<h3>Atualizar Cliente</h3>

    <?php
    $attributes = array('id' => 'clientform');
    echo form_open('cliente/atualizar/'.$client->getCpf(), $attributes);
        $data = array(
            'name'          => 'name',
            'id'            => 'name',
            'value'         => set_value('name', (isset($client)) ? $client->getName() : '' ),
            'placeholder'   => 'Digite o nome',
            'maxlength'     => '255'
        );
        echo form_error('name');
        echo form_label('Nome', 'name');
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
