<?php

namespace App\Http\Controllers;

use App\Http\Resources\GamesResource;
use App\Models\Games;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $size = $request->input('size', 1);
        $sortBy = $request->input('sortBy', 'title');
        $sortDir = $request->input('sortDir', 'ASC');

        $game = Games::orderBy($sortBy, $sortDir)->paginate($size);
        return response()->json([
            'page' => $game->currentPage(),
            'size' => $size,
            'totalElement' => $game->count(),
            'content' => GamesResource::collection($game)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
