<?php

namespace App\Models;

namespace App\Controllers;

use App\Models\GanadoresModel;
use CodeIgniter\Controller;

class GanadoresController extends Controller
{
    public function index()
    {
        $model = new GanadoresModel();
        $data['ganadores'] = $model->obtenerGanadores();
        return view('ganadores_list', $data);
    }
}