<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<h1>Gereciador de Projetos</h1>
	<h3>Atualizar Projeto</h3>

    <?php
    $attributes = array('id' => 'projectform');
    echo form_open('projeto/atualizar/'.$project->getId(), $attributes);
        $data = array(
            'name'          => 'name',
            'id'            => 'name',
            'value'         => set_value('name', (isset($project)) ? $project->getName() : '' ),
            'placeholder'   => 'Digite o cpf',
            'maxlength'     => '255'
        );
        echo form_error('name');
        echo form_label('Nome', 'name');
        echo form_input($data);
        echo '<br>';

        echo form_error('client');
        echo form_label('Cliente', 'client');
        echo form_dropdown('client', $optionsClient, $project->getClientId());
        echo '<br>';

        echo form_error('manager');
        echo form_label('Gerente', 'manager');
        echo form_dropdown('manager', $optionsManager, $project->getEmployeeId());

        echo '<br>';
        $data = array(
            'type'          => 'submit',
            'value'         => 'Enviar'
        );
        echo form_input($data);
    echo form_close();
    ?>
</div>
