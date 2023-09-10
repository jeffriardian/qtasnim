<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BarangRequest;
use App\Interfaces\BarangInterface;

class BarangController extends Controller
{
    protected $barangInterface;

    public function __construct(BarangInterface $barangInterface)
    {
        $this->barangInterface = $barangInterface;
    }
    
    public function index()
    {
        return $this->barangInterface->getAllBarang();
    }
    
    public function store(BarangRequest $request)
    {
        return $this->barangInterface->requestBarang($request);
    }

    public function show(string $id)
    {
        return $this->barangInterface->getBarangById($id);
    }

    public function update(BarangRequest $request, string $id)
    {
        return $this->barangInterface->requestBarang($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->barangInterface->deleteBarang($id);
    }
}
