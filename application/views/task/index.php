<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<h1>Gereciador de Projetos</h1>
	<h3>Tarefas</h3>
	<h4><?php echo $projectName;?></h4>
	<a class="btn btn-info" href="projeto/<?php echo $projectId;?>/tarefa/criar">
	Criar Tarefa
	</a>
	
	<?php if (isset($taskArrays) && count($taskArrays)) : ?>
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Status</th>
				<th>Data Início</th>
				<th>Data Fim</th>
				<th>Responsável</th>
				<th>Editar</th>
				<th>Deletar</th>
			</tr>
				<?php foreach ($taskArrays as $task) : ?>
				<tr>
					<td><?php echo $task['id'];?></td>
					<td><?php echo $task['name'];?></td>
					<td><?php echo $task['status'];?></td>
					<td><?php echo $task['startDate'];?></td>
					<td><?php echo $task['endDate'];?></td>
					<td><?php echo $task['managerTask'];?></td>
					<td><a href="projeto/<?php echo $projectId;?>/tarefa/atualizar/<?php echo $task['id'];?>">editar</a></td>
					<td><a href="projeto/<?php echo $projectId;?>/tarefa/deletar/<?php echo $task['id'];?>">deletar</a></td>
				</tr>
				<?php endforeach; ?>
		</table>
	<?php else : ?>
		<div class="alert alert-warning" role="alert">
		Nenhuma tarefa encontrada.
		</div>
	<?php endif; ?>
</div>
