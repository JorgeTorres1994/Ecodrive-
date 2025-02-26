<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ParticipanteModel;
use App\Models\SorteoParticipanteModel;
use App\Models\SorteoModel;

class ParticipanteController extends Controller
{
    public function participantes()
    {
        $participanteModel = new ParticipanteModel();
        $participantes = $participanteModel->getAllParticipantes();

        // Retornar JSON si la solicitud es AJAX o se solicita JSON explícitamente
        if ($this->request->isAJAX() || strpos($this->request->getHeaderLine('Accept'), 'application/json') !== false) {
            return $this->response->setStatusCode(200)->setJSON($participantes);
        }

        return view('admin/participantes_list', ['title' => "Gestión de Participantes", 'participantes' => $participantes]);
    }

    public function nuevoParticipante()
    {
        return view('admin/participantes_form', ['title' => 'Agregar Participante']);
    }

    public function guardarParticipante()
    {
        $participanteModel = new ParticipanteModel();

        // Insertar en la base de datos
        $participanteModel->insert([
            'nombre_completo' => $this->request->getPost('nombre_completo'),
            'dni' => $this->request->getPost('dni'),
            'numero' => $this->request->getPost('numero'),
            'tipo' => $this->request->getPost('tipo'),
            'correo' => $this->request->getPost('correo'),
            'puntaje' => $this->request->getPost('puntaje')
        ]);

        // Retornar JSON si es una API o redirigir si es vista
        if ($this->request->isAJAX()) {
            return $this->response->setStatusCode(201)->setJSON(['message' => 'Participante agregado exitosamente']);
        }

        return redirect()->to('/admin/participantes')->with('success', 'Participante agregado exitosamente');
    }

    public function editarParticipante($id)
    {
        $participanteModel = new ParticipanteModel();
        $participante = $participanteModel->getParticipanteById($id);

        if ($this->request->isAJAX()) {
            return $this->response->setStatusCode(200)->setJSON($participante);
        }

        return view('admin/participantes_edit', ['participante' => $participante]);
    }

    public function actualizarParticipante($id)
    {
        $participanteModel = new ParticipanteModel();

        $updateData = [
            'nombre_completo' => $this->request->getPost('nombre_completo'),
            'dni' => $this->request->getPost('dni'),
            'numero' => $this->request->getPost('numero'),
            'tipo' => $this->request->getPost('tipo'),
            'correo' => $this->request->getPost('correo'),
            'puntaje' => $this->request->getPost('puntaje')
        ];

        $participanteModel->update($id, $updateData);

        if ($this->request->isAJAX()) {
            return $this->response->setStatusCode(200)->setJSON(['message' => 'Participante actualizado exitosamente']);
        }

        return redirect()->to('/admin/participantes')->with('success', 'Participante actualizado exitosamente');
    }

    public function eliminarParticipante($id)
    {
        $participanteModel = new ParticipanteModel();

        if (!$participanteModel->find($id)) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'El participante no existe.']);
        }

        $participanteModel->delete($id);

        if ($this->request->isAJAX()) {
            return $this->response->setStatusCode(200)->setJSON(['message' => 'Participante eliminado exitosamente']);
        }

        return redirect()->to('/admin/participantes')->with('success', 'Participante eliminado exitosamente.');
    }
}
