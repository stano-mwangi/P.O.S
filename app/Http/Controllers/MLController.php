<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MLController extends Controller
{
    //
    public function predictDemand(Request $request)
    {
        // Fetch data from request and pass it to machine learning service for demand forecasting
        $data = $request->all();
        $predictions = MLService::predictDemand($data);
        return response()->json($predictions);
    }

    public function optimizeInventory(Request $request)
    {
        // Fetch data from request and pass it to machine learning service for inventory optimization
        $data = $request->all();
        $optimized_inventory = MLService::optimizeInventory($data);
        return response()->json($optimized_inventory);
    }

    public function predictExpiration(Request $request)
    {
        // Fetch data from request and pass it to machine learning service for expiration prediction
        $data = $request->all();
        $expiration_predictions = MLService::predictExpiration($data);
        return response()->json($expiration_predictions);
    }

    public function trackInventory(Request $request)
    {
        // Fetch data from request and pass it to machine learning service for inventory tracking
        $data = $request->all();
        $inventory_movement = MLService::trackInventory($data);
        return response()->json($inventory_movement);
    }
}
