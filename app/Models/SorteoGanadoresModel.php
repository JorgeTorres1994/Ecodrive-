<?php

namespace App\Models;

use CodeIgniter\Model;

class SorteoGanadoresModel extends Model
{
    protected $table      = 'sorteo_ganadores'; // Tabla de ganadores
    protected $primaryKey = 'id';

    protected $allowedFields = ['sorteo_id', 'participante_id', 'premio_id', 'fecha_ganado'];

    // 📌 Método para guardar ganadores
    /*public function registrarGanador($sorteo_id, $participante_id, $premio_id)
    {
        return $this->insert([
            'sorteo_id'       => $sorteo_id,
            'participante_id' => $participante_id,
            'premio_id'       => $premio_id
        ]);
    }*/

    public function registrarGanador($sorteo_id, $participante_id, $premio_id)
    {
        $data = [
            'sorteo_id'       => $sorteo_id,
            'participante_id' => $participante_id,
            'premio_id'       => $premio_id
        ];

        log_message('error', 'Insertando en sorteo_ganadores: ' . json_encode($data));

        return $this->insert($data);
    }
}
