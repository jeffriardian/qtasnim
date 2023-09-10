<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TransaksiRequest;
use App\Interfaces\TransaksiInterface;

class TransaksiController extends Controller
{
    protected $transaksiInterface;

    public function __construct(TransaksiInterface $transaksiInterface)
    {
        $this->transaksiInterface = $transaksiInterface;
    }
    
    public function index()
    {
        return $this->transaksiInterface->getAllTransaksi();
    }
    
    public function store(TransaksiRequest $request)
    {
        return $this->transaksiInterface->requestTransaksi($request);
    }

    public function show(string $id)
    {
        return $this->transaksiInterface->getTransaksiById($id);
    }

    public function update(TransaksiRequest $request, string $id)
    {
        return $this->transaksiInterface->requestTransaksi($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->transaksiInterface->deleteTransaksi($id);
    }

    public function searchName(string $nama)
    {
        return $this->transaksiInterface->getTransaksiByName($nama);
    }

    public function searchDate(string $date)
    {
        return $this->transaksiInterface->getTransaksiByDate($date);
    }
}
