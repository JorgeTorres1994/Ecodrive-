<?php

namespace App\Models;

use CodeIgniter\Model;

class ParticipanteModel extends Model
{
    protected $table = 'participantes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_completo', 'dni', 'numero', 'tipo', 'correo', 'puntaje'];

    // Obtener todos los participantes
    public function getAllParticipantes()
    {
        return $this->findAll();
    }

    // Obtener un participante por ID
    public function getParticipanteById($id)
    {
        return $this->where('id', $id)->first();
    }
}
