<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $model = model(ServiceModel::class);

        $data = [
            'title' => 'Dashboard',
            'services' => $model->getServices(),
        ];

        return view('dashboard', $data);
    }
}
