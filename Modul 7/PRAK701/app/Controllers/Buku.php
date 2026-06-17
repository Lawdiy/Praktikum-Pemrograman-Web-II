<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    public function index()
    {
        $model = new BukuModel();
        $data['buku'] = $model->findAll();
        echo view('templates/header', $data);
        echo view('buku/index', $data);
        echo view('templates/footer');
    }

    public function create()
    {
        helper(['form']);
        $data = [];

        if (strtolower($this->request->getMethod()) === 'post') {
            $rules = [
                'judul'        => [
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => 'Judul harus diisi',
                        'string' => 'Judul harus berupa teks',
                    ]
                ],
                'penulis'      => [
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => 'Penulis harus diisi',
                        'string' => 'Penulis harus berupa teks',
                    ]
                ],
                'penerbit'     => [
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => 'Penerbit harus diisi',
                        'string' => 'Penerbit harus berupa teks',
                    ]
                ],
                'tahun_terbit' => [
                    'rules' => 'required|numeric|greater_than[1800]|less_than[2024]',
                    'errors' => [
                        'required' => 'Tahun terbit harus diisi',
                        'numeric' => 'Tahun terbit harus berupa angka',
                        'greater_than' => 'Tahun terbit harus lebih besar dari 1800',
                        'less_than' => 'Tahun terbit harus lebih kecil dari 2024',
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new BukuModel();
                $newData = [
                    'judul'        => $this->request->getVar('judul'),
                    'penulis'      => $this->request->getVar('penulis'),
                    'penerbit'     => $this->request->getVar('penerbit'),
                    'tahun_terbit' => $this->request->getVar('tahun_terbit'),
                ];
                $model->save($newData);
                session()->setFlashdata('success', 'Data berhasil ditambahkan');
                return redirect()->to('/buku');
            }
        }

        echo view('templates/header', $data);
        echo view('buku/create', $data);
        echo view('templates/footer');
    }

    public function edit($id)
    {
        helper(['form']);
        $model = new BukuModel();
        $data['buku'] = $model->find($id);

        if (strtolower($this->request->getMethod()) === 'post') {
            $rules = [
                'judul'        => [
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => 'Judul harus diisi',
                        'string' => 'Judul harus berupa teks',
                    ]
                ],
                'penulis'      => [
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => 'Penulis harus diisi',
                        'string' => 'Penulis harus berupa teks',
                    ]
                ],
                'penerbit'     => [
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => 'Penerbit harus diisi',
                        'string' => 'Penerbit harus berupa teks',
                    ]
                ],
                'tahun_terbit' => [
                    'rules' => 'required|numeric|greater_than[1800]|less_than[2024]',
                    'errors' => [
                        'required' => 'Tahun terbit harus diisi',
                        'numeric' => 'Tahun terbit harus berupa angka',
                        'greater_than' => 'Tahun terbit harus lebih besar dari 1800',
                        'less_than' => 'Tahun terbit harus lebih kecil dari 2024',
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $newData = [
                    'id'           => $id,
                    'judul'        => $this->request->getVar('judul'),
                    'penulis'      => $this->request->getVar('penulis'),
                    'penerbit'     => $this->request->getVar('penerbit'),
                    'tahun_terbit' => $this->request->getVar('tahun_terbit'),
                ];
                $model->save($newData);
                session()->setFlashdata('success', 'Data berhasil diubah');
                return redirect()->to('/buku');
            }
        }

        echo view('templates/header', $data);
        echo view('buku/edit', $data);
        echo view('templates/footer');
    }

    public function delete($id)
    {
        $model = new BukuModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/buku');
    }
}