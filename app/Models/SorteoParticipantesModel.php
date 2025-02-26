<?php

namespace App\Models;

use CodeIgniter\Model;

class SorteoParticipantesModel extends Model
{
    protected $table      = 'sorteo_participantes'; // Tabla actualizada
    protected $primaryKey = 'id';

    protected $allowedFields = ['sorteo_id', 'participante_id', 'premio_id', 'es_ganador'];

    // 📌 Método para registrar la participación en el sorteo
    /*public function registrarParticipante($sorteo_id, $participante_id)
    {
        return $this->insert([
            'sorteo_id'       => $sorteo_id,
            'participante_id' => $participante_id,
            'es_ganador'      => 0 // Por defecto, no es ganador
        ]);
    }*/

    public function registrarParticipante($sorteo_id, $participante_id)
    {
        $data = [
            'sorteo_id'       => $sorteo_id,
            'participante_id' => $participante_id,
            'es_ganador'      => 0
        ];

        log_message('error', 'Insertando en sorteo_participantes: ' . json_encode($data));

        return $this->insert($data);
    }


    // 📌 Método para registrar un ganador y asignar premio
    public function registrarGanador($sorteo_id, $participante_id, $premio_id)
    {
        return $this->where(['sorteo_id' => $sorteo_id, 'participante_id' => $participante_id])
            ->set(['es_ganador' => 1, 'premio_id' => $premio_id])
            ->update();
    }
}
