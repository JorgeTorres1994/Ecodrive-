<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<h2 class="text-center my-4">Gestión de Premios</h2>

<!-- Mensaje de éxito -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<!-- Botón para agregar nuevo premio -->
<a href="<?= base_url('/admin/premios/nuevo') ?>" class="btn btn-primary mb-3">Agregar Premio</a>

<!-- Tabla de Premios -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Tipo</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($premios as $premio): ?>
        <tr>
            <td><?= $premio['id'] ?></td>
            <td><?= $premio['titulo'] ?></td>
            <td><?= $premio['descripcion'] ?></td>
            <td><?= ucfirst($premio['tipo']) ?></td>
            <td><img src="<?= base_url($premio['imagen']) ?>" width="50"></td>
            <td>
                <a href="<?= base_url('/admin/premios/editar/'.$premio['id']) ?>" class="btn btn-warning">Editar</a>
                <a href="<?= base_url('/admin/premios/eliminar/'.$premio['id']) ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este premio? Esta acción no se puede deshacer.')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
