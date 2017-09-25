<?php

namespace App\Http\Controllers;

use App\Jobs\PurchasePodscast;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function store()
    {
        $this->dispatch(new PurchasePodscast());
    }
}
