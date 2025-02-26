<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SorteoModel;
use App\Models\PremioModel;
use App\Models\ParticipanteModel;

class SorteoController extends Controller
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

    public function guardar()
    {
        $sorteoModel = new SorteoModel();

        $sorteoModel->insert([
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'fecha' => $this->request->getPost('fecha'),
            'cantidad_ganadores' => $this->request->getPost('cantidad_ganadores'),
            'estado' => 'pendiente'
        ]);

        return redirect()->to('/admin/sorteos')->with('success', 'Sorteo creado exitosamente.');
    }


    public function eliminar($id)
    {
        $sorteoModel = new SorteoModel();
        $sorteoModel->delete($id);

        return redirect()->to('/admin/sorteos')->with('success', 'Sorteo eliminado correctamente.');
    }
}
