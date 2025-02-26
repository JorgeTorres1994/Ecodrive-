<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<h2 class="text-center my-4">Gestión de Multimedia</h2>

<!-- Mensaje de éxito -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<!-- Botón para agregar nueva multimedia -->
<a href="<?= base_url('/admin/multimedia/nuevo') ?>" class="btn btn-primary mb-3">Agregar Multimedia</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Subtítulo</th>
            <th>Detalle</th>
            <th>Nota</th>
            <th>Fecha</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($multimedia as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['titulo'] ?></td>
            <td><?= $item['subtitulo'] ?></td>
            <td><?= $item['detalle'] ?></td>
            <td><?= $item['nota'] ?></td>
            <td><?= $item['fecha'] ?></td>
            <td><img src="<?= base_url($item['imagen']) ?>" width="50"></td>
            <td>
                <a href="<?= base_url('/admin/multimedia/editar/'.$item['id']) ?>" class="btn btn-warning">Editar</a>
                <a href="<?= base_url('/admin/multimedia/eliminar/'.$item['id']) ?>" class="btn btn-danger" onclick="return confirm('¿Deseas eliminar este contenido?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
