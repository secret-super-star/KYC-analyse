<?php

namespace App\Http\Controllers;

use App\Models\Customernote;
use Illuminate\Http\Request;

class CustomernoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Customernote::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customernote  $customernote
     * @return \Illuminate\Http\Response
     */
    public function show(Customernote $customernote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customernote  $customernote
     * @return \Illuminate\Http\Response
     */
    public function edit(Customernote $customernote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customernote  $customernote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customernote $customernote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customernote  $customernote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customernote $customernote)
    {
        //
    }
}
