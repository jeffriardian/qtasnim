<?php

namespace App\Interfaces;

use App\Http\Requests\TransaksiRequest;

interface TransaksiInterface
{
    public function getAllTransaksi();

    public function getTransaksiById($id);

    public function requestTransaksi(TransaksiRequest $request, $id = null);

    public function deleteTransaksi($id);
}