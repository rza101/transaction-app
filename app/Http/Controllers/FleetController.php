<?php

namespace App\Http\Controllers;

use App\Models\Fleet;

class FleetController extends Controller
{
    public function index()
    {
        $fleets = Fleet::paginate(10);
        return view('fleet.index', ['fleets' => $fleets]);
    }
}
