<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<h1>Gereciador de Projetos</h1>
	<h3>Projetos</h3>
	<?php if (isset($projectArrays) && count($projectArrays)) : ?>
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Nome Cliente</th>
				<th>Nome Gerente</th>
				<th>Tarefas</th>
				<th>Editar</th>
				<th>Deletar</th>
			</tr>
				<?php foreach ($projectArrays as $project) : ?>
				<tr>
					<td><?php echo $project['id'];?></td>
					<td><?php echo $project['name'];?></td>
					<td><?php echo $project['nameClient'];?></td>
					<td><?php echo $project['nameManager'];?></td>
					<td><a href="projeto/<?php echo $project['id'];?>/tarefa">ver</a></td>
					<td><a href="projeto/atualizar/<?php echo $project['id'];?>">editar</a></td>
					<td><a href="projeto/deletar/<?php echo $project['id'];?>">deletar</a></td>
				</tr>
				<?php endforeach; ?>
		</table>
	<?php else : ?>
		<div class="alert alert-warning" role="alert">
		Nenhum projeto encontrado.
		</div>
	<?php endif; ?>
</div>
