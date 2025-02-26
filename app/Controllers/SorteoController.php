<?php

namespace App\Controllers;

use App\Models\SorteoModel;
use App\Models\PremioModel;
use App\Models\ParticipanteModel;
use App\Models\SorteoParticipantesModel;
use App\Models\SorteoGanadoresModel;
use CodeIgniter\RESTful\ResourceController;

class SorteoController extends ResourceController
{
    public function index()
    {
        $sorteoModel = new SorteoModel();
        $premioModel = new PremioModel();
        $participanteModel = new ParticipanteModel();

        $data = [
            'sorteos' => $sorteoModel->findAll(),
            'premios' => $premioModel->findAll(), // Obtener premios disponibles
            'participantes' => $participanteModel->findAll() // Obtener participantes inscritos
        ];

        return view('admin/sorteos_list', $data);
    }

    public function nuevo()
    {
        return view('admin/sorteos_form', ['title' => 'Crear Nuevo Sorteo']);
    }

    /*public function guardarSorteo()
    {
        $json = $this->request->getJSON();
        
        if (!$json || !isset($json->sorteo_id) || !isset($json->participante_id)) {
            return $this->response->setJSON(['error' => 'Datos inválidos'])->setStatusCode(400);
        }

        // 📌 Instancia del modelo
        $sorteoModel = new SorteoParticipantesModel();
        
        // 📌 Guardar el resultado en la tabla `sorteo_participantes`
        $sorteoModel->guardarGanador($json->sorteo_id, $json->participante_id);

        return $this->response->setJSON(['mensaje' => 'Sorteo registrado correctamente']);
    }*/

    public function guardarSorteo()
    {
        $json = $this->request->getJSON();

        if (!$json || !isset($json->sorteo_id) || !isset($json->participantes) || !isset($json->premios)) {
            return $this->response->setJSON(['error' => 'Datos inválidos'])->setStatusCode(400);
        }

        $sorteoModel = new SorteoParticipantesModel();
        $ganadoresModel = new SorteoGanadoresModel();

        foreach ($json->participantes as $participante) {
            $sorteoModel->registrarParticipante($json->sorteo_id, $participante->id);
        }

        foreach ($json->premios as $premio) {
            if (!empty($json->participantes)) {
                $ganador = $json->participantes[array_rand($json->participantes)];
                $sorteoModel->registrarGanador($json->sorteo_id, $ganador->id, $premio->id);
                $ganadoresModel->registrarGanador($json->sorteo_id, $ganador->id, $premio->id);
            }
        }

        return $this->response->setJSON(['mensaje' => 'Sorteo registrado correctamente']);
    }


    public function eliminar($id)
    {
        $sorteoModel = new SorteoModel();
        $sorteoModel->delete($id);

        return redirect()->to('/admin/sorteos')->with('success', 'Sorteo eliminado correctamente.');
    }
}
