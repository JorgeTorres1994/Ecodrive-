<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<h2 class="text-center my-4">Gestión de Sorteos</h2>

<a href="<?= base_url('/admin/sorteos/nuevo') ?>" class="btn btn-primary mb-3">Crear Sorteo Conductores</a>
<a href="<?= base_url('/admin/sorteos/nuevo') ?>" class="btn btn-secondary mb-3">Crear Sorteo Pasajeros</a>
<a href="<?= base_url('/admin/sorteos/nuevo') ?>" class="btn btn-primary mb-3">Crear Sorteo Gran Premio</a>

<div class="row">
    <div class="col-md-8">
        <?php foreach ($sorteos as $sorteo): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h4><?= $sorteo['titulo'] ?></h4>
                    <p><strong>Fecha:</strong> <?= $sorteo['fecha'] ?></p>
                    <p><strong>Estado:</strong>
                        <span class="badge <?= $sorteo['estado'] == 'pendiente' ? 'bg-warning' : 'bg-success' ?>">
                            <?= ucfirst($sorteo['estado']) ?>
                        </span>
                    </p>
                    <a href="<?= base_url('/admin/sorteos/realizar/' . $sorteo['id']) ?>" class="btn btn-success">Realizar Sorteo</a>
                    <a href="<?= base_url('/admin/sorteos/eliminar/' . $sorteo['id']) ?>" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="col-md-4">
        <!-- 📌 Tarjeta de Premios Disponibles -->
        <div class="card">
            <div class="card-header bg-info text-white">
                <ul class="nav nav-tabs card-header-tabs" id="premiosTab">
                    <li class="nav-item">
                        <a class="nav-link active" id="premios-conductores-tab" data-bs-toggle="tab" href="#premios-conductores">Conductores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="premios-pasajeros-tab" data-bs-toggle="tab" href="#premios-pasajeros">Pasajeros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="premios-granpremio-tab" data-bs-toggle="tab" href="#premios-granpremio">Gran Premio</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <!-- Premios para Conductores -->
                    <div class="tab-pane fade show active" id="premios-conductores">
                        <ul class="list-group">
                            <?php foreach ($premios as $premio): ?>
                                <?php if ($premio['tipo'] == 'conductor'): ?>
                                    <li class="list-group-item d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img src="<?= base_url($premio['imagen']) ?>" alt="<?= esc($premio['titulo']) ?>" width="50" height="50" class="me-2 rounded">
                                            <?= esc($premio['titulo']) ?>
                                        </div>
                                        <button class="btn btn-sm btn-primary ms-auto select-premio" data-id="<?= $premio['id'] ?>" data-titulo="<?= esc($premio['titulo']) ?>">Seleccionar</button>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Premios para Pasajeros -->
                    <div class="tab-pane fade" id="premios-pasajeros">
                        <ul class="list-group">
                            <?php foreach ($premios as $premio): ?>
                                <?php if ($premio['tipo'] == 'pasajero'): ?>
                                    <li class="list-group-item d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img src="<?= base_url($premio['imagen']) ?>" alt="<?= esc($premio['titulo']) ?>" width="50" height="50" class="me-2 rounded">
                                            <?= esc($premio['titulo']) ?>
                                        </div>
                                        <button class="btn btn-sm btn-primary ms-auto select-premio" data-id="<?= $premio['id'] ?>" data-titulo="<?= esc($premio['titulo']) ?>">Seleccionar</button>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Premios para Gran Premio -->
                    <div class="tab-pane fade" id="premios-granpremio">
                        <ul class="list-group">
                            <?php foreach ($premios as $premio): ?>
                                <?php if ($premio['tipo'] == 'gran premio'): ?>
                                    <li class="list-group-item d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img src="<?= base_url($premio['imagen']) ?>" alt="<?= esc($premio['titulo']) ?>" width="50" height="50" class="me-2 rounded">
                                            <?= esc($premio['titulo']) ?>
                                        </div>
                                        <button class="btn btn-sm btn-primary ms-auto select-premio" data-id="<?= $premio['id'] ?>" data-titulo="<?= esc($premio['titulo']) ?>">Seleccionar</button>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- 📌 Tarjeta de Participantes Inscritos -->
        <div class="card mt-3">
            <div class="card-header bg-info text-white">
                <ul class="nav nav-tabs card-header-tabs" id="participantesTab">
                    <li class="nav-item">
                        <a class="nav-link active" id="participantes-conductores-tab" data-bs-toggle="tab" href="#participantes-conductores">Conductores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="participantes-pasajeros-tab" data-bs-toggle="tab" href="#participantes-pasajeros">Pasajeros</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <!-- Participantes Conductores -->
                    <div class="tab-pane fade show active" id="participantes-conductores">
                        <ul class="list-group">
                            <?php foreach ($participantes as $participante): ?>
                                <?php if ($participante['tipo'] == 'conductor'): ?>
                                    <li class="list-group-item d-flex align-items-center justify-content-between">
                                        <span><?= esc($participante['nombre_completo']) ?> (<?= esc($participante['dni']) ?>)</span>
                                        <button class="btn btn-sm btn-success ms-auto select-participante" data-id="<?= $participante['id'] ?>" data-nombre="<?= esc($participante['nombre_completo']) ?>">Seleccionar</button>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Participantes Pasajeros -->
                    <div class="tab-pane fade" id="participantes-pasajeros">
                        <ul class="list-group">
                            <?php foreach ($participantes as $participante): ?>
                                <?php if ($participante['tipo'] == 'pasajero'): ?>
                                    <li class="list-group-item d-flex align-items-center justify-content-between">
                                        <span><?= esc($participante['nombre_completo']) ?> (<?= esc($participante['dni']) ?>)</span>
                                        <button class="btn btn-sm btn-success ms-auto select-participante" data-id="<?= $participante['id'] ?>" data-nombre="<?= esc($participante['nombre_completo']) ?>">Seleccionar</button>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 📌 JavaScript para Capturar Selecciones -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Selección de premios
            document.querySelectorAll('.select-premio').forEach(button => {
                button.addEventListener('click', function() {
                    let premioId = this.dataset.id;
                    let premioTitulo = this.dataset.titulo;
                    let listItem = this.closest('.premio-item'); // Buscar el contenedor

                    // Verificar que el contenedor exista antes de modificarlo
                    if (!listItem) return;

                    // Mostrar confirmación
                    if (confirm(`¿Desea seleccionar el premio "${premioTitulo}" para el sorteo?`)) {
                        let premiosSeleccionados = JSON.parse(localStorage.getItem('premiosSeleccionados')) || [];

                        // Verificar si ya está seleccionado
                        if (!premiosSeleccionados.some(p => p.id === premioId)) {
                            premiosSeleccionados.push({
                                id: premioId,
                                titulo: premioTitulo
                            });
                            localStorage.setItem('premiosSeleccionados', JSON.stringify(premiosSeleccionados));

                            // Resaltar el cuadro seleccionado
                            listItem.classList.add('bg-success', 'text-white');
                        }
                        console.log("Premios seleccionados:", premiosSeleccionados);
                    }
                });
            });

            // Selección de participantes
            document.querySelectorAll('.select-participante').forEach(button => {
                button.addEventListener('click', function() {
                    let participanteId = this.dataset.id;
                    let participanteNombre = this.dataset.nombre;
                    let listItem = this.closest('.participante-item'); // Buscar el contenedor

                    // Verificar que el contenedor exista antes de modificarlo
                    if (!listItem) return;

                    // Mostrar confirmación
                    if (confirm(`¿Desea seleccionar al participante "${participanteNombre}" para el sorteo?`)) {
                        let participantesSeleccionados = JSON.parse(localStorage.getItem('participantesSeleccionados')) || [];

                        // Verificar si ya está seleccionado
                        if (!participantesSeleccionados.some(p => p.id === participanteId)) {
                            participantesSeleccionados.push({
                                id: participanteId,
                                nombre: participanteNombre
                            });
                            localStorage.setItem('participantesSeleccionados', JSON.stringify(participantesSeleccionados));

                            // Resaltar el cuadro seleccionado
                            listItem.classList.add('bg-success', 'text-white');
                        }
                        console.log("Participantes seleccionados:", participantesSeleccionados);
                    }
                });
            });
        });
    </script>



    <?= $this->endSection() ?>