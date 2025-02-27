<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<h2 class="text-center my-4">Gestión de Participantes</h2>

<!-- Mensaje de éxito -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<!-- Botón para agregar nuevo participante -->
<a href="<?= base_url('/admin/participantes/nuevo') ?>" class="btn btn-primary mb-3">Agregar Participante</a>

<!-- Tabla de Participantes -->
<div class="table-responsive">
    <table class="table table-striped table-hover text-center align-middle shadow-sm border rounded">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>DNI</th>
                <th>Número</th>
                <th>Tipo</th>
                <th>Correo</th>
                <th>Puntaje</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($participantes as $participante): ?>
            <tr>
                <td><?= $participante['id'] ?></td>
                <td><?= $participante['nombre_completo'] ?></td>
                <td><?= $participante['dni'] ?></td>
                <td><?= $participante['numero'] ?></td>
                <td><?= ucfirst($participante['tipo']) ?></td>
                <td><?= $participante['correo'] ?></td>
                <td><?= $participante['puntaje'] ?></td>
                <td>
                    <a href="<?= base_url('/admin/participantes/editar/'.$participante['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="<?= base_url('/admin/participantes/eliminar/'.$participante['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este participante?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
