<?php

namespace App\Http\Controllers;

use App\Models\QueryAddress;

class QueryAddressController extends Controller
{
    public function get() {
        $quaryAddresses = QueryAddress::all();
        return response($quaryAddresses);
    }
}
