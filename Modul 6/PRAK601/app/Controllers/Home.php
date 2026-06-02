<?php

namespace App\Controllers;

use App\Models\DataModel;

class Home extends BaseController
{
    public function index(): string
    {
        $dataModel = new DataModel();

        $data['identitas'] = $dataModel->identity();
        
        return view ('MainPage', $data);
    }
    public function profile(): string
    {
        $dataModel = new DataModel();

        $data['identitas'] = $dataModel->identity();
        
        return view ('Profile', $data);
    }
}