<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<h1>Gereciador de Projetos</h1>
	<h3>Cliente</h3>
	<?php if (isset($clientList) && count($clientList)) : ?>
		<table class="table">
			<tr>
				<th>CPF</th>
				<th>Nome</th>
				<th>Editar</th>
				<th>Deletar</th>
			</tr>
			<?php foreach ($clientList as $client) : ?>
			<tr>
				<td><?php echo $client->getCpf();?></td>
				<td><?php echo $client->getName();?></td>
				<td><a href="cliente/atualizar/<?php echo $client->getCpf();?>">editar</a></td>
				<td><a href="cliente/deletar/<?php echo $client->getCpf();?>">deletar</a></td>
			</tr>
			<?php endforeach; ?>
		</table>
	<?php else : ?>
		<div class="alert alert-warning" role="alert">
		Nenhum cliente encontrado.
		</div>
	<?php endif; ?>
</div>