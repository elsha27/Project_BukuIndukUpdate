<?php

namespace App\Http\Controllers;

use App\Models\rombel;
use App\Http\Requests\StorerombelRequest;
use App\Http\Requests\UpdaterombelRequest;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['rombel'] = rombel::latest()->paginate(10);
        return view('rombel_index', $data);
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
    public function store(StorerombelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rombel $rombel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdaterombelRequest $request, rombel $rombel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rombel $rombel)
    {
        //
    }
}
