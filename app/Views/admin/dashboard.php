<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
    <h2 class="text-center my-4">Dashboard - Panel de Control</h2>

    <div class="row">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h3><?= $totalPremios ?></h3>
                    <p>Premios Disponibles</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h3><?= $totalSorteos ?></h3>
                    <p>Sorteos Realizados</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h3><?= $totalParticipantes ?></h3>
                    <p>Participantes Inscritos</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h3><?= $totalGanadores ?></h3>
                    <p>Ganadores Totales</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráfico de Sorteos -->
    <h3 class="mt-5 text-center">Sorteos por Mes</h3>
    <canvas id="chartSorteos"></canvas>

    <script>
        var ctx = document.getElementById('chartSorteos').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
                datasets: [{
                    label: 'Sorteos Realizados',
                    data: [5, 7, 3, 8, 10],
                    backgroundColor: 'rgba(255, 99, 132, 0.6)'
                }]
            }
        });
    </script>
<?= $this->endSection() ?>
