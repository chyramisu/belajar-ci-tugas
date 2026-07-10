<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiscountModel;

class DiscountController extends BaseController
{
    protected $discountModel;

    public function __construct()
    {
    helper(['form', 'number']);

    $this->discountModel = new DiscountModel();
    }

    public function index()
    {
        return view('discount/index', [
            'discounts' => $this->discountModel->findAll()
        ]);
    }

    public function create()
{
    $rules = [
        'tanggal' => 'required|is_unique[discount.tanggal]',
        'nominal' => 'required'
    ];

    if (!$this->validate($rules)) {
        return redirect()->to('diskon')
            ->with('failed', $this->validator->getError('tanggal'));
    }

    $dataForm = [
        'tanggal' => $this->request->getPost('tanggal'),
        'nominal' => $this->request->getPost('nominal')
    ];

    $this->discountModel->insert($dataForm);

    return redirect()->to('diskon')
        ->with('success', 'Data Berhasil Ditambah');
}

public function edit($id)
{
    $dataForm = [
        'nominal' => $this->request->getPost('nominal')
    ];

    $this->discountModel->update($id, $dataForm);

    return redirect()->to('diskon')
        ->with('success', 'Data Berhasil Diubah');
}

public function delete($id)
{
    $this->discountModel->delete($id);

    return redirect()->to('diskon')
        ->with('success', 'Data Berhasil Dihapus');
}
}