<?php

namespace App\Http\Controllers;

use App\Models\Generated;
use Illuminate\Support\Facades\DB;

class TeamsGeneratorApiController extends Controller
{
    public function index()
    {
        return Generated::all();
    }

    public function getTeams()
    {
        $item = Generated::where('slug', request()->query('slug'))->first();
        return $item;
    }

    public function store()
    {
        $acceptHeader = request()->header('Content-Type');
        if ($acceptHeader != 'application/x-www-form-urlencoded') {
            return response()->json([], 406);
        }
        // Check if name is present and is string
        $valid = validator(request()->only('name', 'data'), [
            'name' => 'required|string',
            'data' => 'required',
        ]);
        if ($valid->fails()) {
            return response()->json($valid->errors()->all(), 400);
        }
        // Create generated object in DB
        $generated = Generated::create([
            'name' => request('name'),
        ]);
        $teamsJson = json_decode(request('data'), true);
        // Update slug field
        $generated->update([
            'slug' => md5($generated->id),
            'teams'=> $teamsJson
        ]);
        return $generated;
    }

    public function generateRandomTeams()
    {
        $items = json_decode(request('data'), true);
        shuffle($items);
        $items = array_chunk($items, request('count'), false);
        return $items;
    }
}
