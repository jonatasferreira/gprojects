<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<h1>Gereciador de Projetos</h1>
	<h3>Funcionários</h3>
	<table class="table">
		<tr>
			<th>CPF</th>
			<th>Nome</th>
			<th>Editar</th>
			<th>Deletar</th>
		</tr>
		<?php foreach ($employeeList as $employee) : ?>
		<tr>
			<td><?php echo $employee->getCpf();?></td>
			<td><?php echo $employee->getName();?></td>
			<td><a href="funcionario/atualizar/<?php echo $employee->getCpf();?>">editar</a></td>
			<td><a href="funcionario/deletar/<?php echo $employee->getCpf();?>">deletar</a></td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>