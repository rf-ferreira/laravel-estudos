<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hardware;
use App\Models\HardwareType;
use App\Models\HardwareBrand;

class HardwareController extends Controller
{
    public function index()
    {
        $hardwares = Hardware::all();
        $types = HardwareType::all();
        $brands = HardwareBrand::all();

        return view('welcome', compact(
            'hardwares', 
            'types', 
            'brands'
        ));
    }

    public function store(Request $request)
    {
        $hardware = [
            "name" => $request->name,
            "price" => $request->price,
            "brand" => $request->brand,
            "type" => $request->type
        ];
        Hardware::create($hardware);

        return redirect('/');
    }

    public function show($type)
    {   
        // $type = HardwareType::where('type', $type)->first();
        // $hardwares = Hardware::all()->where('type', $type->id);

        $type = HardwareType::where('type', $type)->get()->first();
        $hardwares = $type->hardware()->get();

        return view('hardware', compact(
            'hardwares',
            'type'
        ));
    }
}
