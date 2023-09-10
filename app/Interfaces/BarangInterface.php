<?php

namespace App\Interfaces;

use App\Http\Requests\BarangRequest;

interface BarangInterface
{
    public function getAllBarang();

    public function getBarangById($id);

    public function requestBarang(BarangRequest $request, $id);

    public function deleteBarang($id);
}