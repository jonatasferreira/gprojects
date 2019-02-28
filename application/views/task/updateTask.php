<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<h1>Gereciador de Projetos</h1>
	<h3>Atualizar Tarefa</h3>
	<h4><?php echo $projectName;?></h4>

    <?php
    $attributes = array('id' => 'taskform');
    echo form_open('projeto/'.$projectId.'/tarefa/atualizar/'.$task['id'], $attributes);
    $data = array(
        'name'          => 'name',
        'id'            => 'name',
        'value'         => set_value('name', (isset($task)) ? $task['name'] : '' ),
        'placeholder'   => 'Digite o nome tarefa',
        'maxlength'     => '200'
    );
    echo form_error('name');
    echo form_label('Nome', 'name');
    echo form_input($data);
    echo '<br>';

    $data = array(
        'type'  => 'date',
        'name'  => 'startDate',
        'id'    => 'startDate',
        'value' => set_value('name', (isset($task)) ? $task['startDate'] : '' )
    );
    echo form_error('startDate');
    echo form_label('Data Início', 'startDate');
    echo form_input($data);
    echo '<br>';

    $data = array(
        'type'  => 'date',
        'name'  => 'endDate',
        'id'    => 'endDate',
        'value' => set_value('name', (isset($task)) ? $task['endDate'] : '' )
    );
    echo form_error('endDate');
    echo form_label('Data Fim', 'endDate');
    echo form_input($data);
    echo '<br>';

    echo form_error('managerTask');
    echo form_label('Atribuida a:', 'managerTask');
    echo form_dropdown('managerTask', $optionsManager, (isset($task)) ? $task['managerTask'] : '');
    echo '<br>';

    $data = array(
        'name'          => 'description',
        'id'            => 'description',
        'value'         => set_value('name', (isset($task)) ? $task['description'] : '' ),
        'placeholder'   => 'Descriva a tarefa',
        'maxlength'     => '1024'
    );
    echo form_error('description');
    echo form_label('Descrição', 'description');
    echo form_textarea($data);

    echo '<br>';
    $data = array(
        'type'          => 'submit',
        'value'         => 'Enviar'
    );
    echo form_input($data);
    echo form_close();
    ?>
</div>
