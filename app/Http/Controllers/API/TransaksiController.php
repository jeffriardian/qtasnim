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

    public function orderName(string $code)
    {
        return $this->transaksiInterface->getTransaksiByName($code);
    }

    public function orderDate(string $code)
    {
        return $this->transaksiInterface->getTransaksiByDate($code);
    }

    public function compareProduct()
    {
        return $this->transaksiInterface->getTransaksiByCompareProduct();
    }

    public function compareProductByDate(Request $request)
    {
        return $this->transaksiInterface->getTransaksiByCompareProductByDate($request);
    }
}
