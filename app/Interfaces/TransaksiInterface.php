<?php

namespace App\Interfaces;

use App\Http\Requests\TransaksiRequest;
use Illuminate\Http\Request;

interface TransaksiInterface
{
    public function getAllTransaksi();

    public function getTransaksiById($id);

    public function requestTransaksi(TransaksiRequest $request, $id = null);

    public function deleteTransaksi($id);

    public function getTransaksiByName($code);

    public function getTransaksiByDate($code);

    public function getTransaksiByCompareProduct();

    public function getTransaksiByCompareProductByDate(Request $request);
}