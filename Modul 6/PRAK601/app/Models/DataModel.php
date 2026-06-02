<?php
namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model{
    public function identity(){
        return [
            'name' => 'Faisal Tanjung',
            'nim' => '2410817310012',
            'prodi' => 'Teknologi Informasi',
            'hobby' => 'Bermain permainan digital, olahraga',
            'skill' => 'MySQL, Python, Godot',
            'image' => 'images/Mashiro.jpg'
        ];
    }
}