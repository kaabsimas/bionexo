<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessionalRequest;
use App\Http\Requests\UpdateProfessionalRequest;
use App\Models\Professional;
use App\Models\Speciality;
use Inertia\Inertia;

class ProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professionals = Professional::orderBy('name', 'asc')->get();
        $specialities = Speciality::all();

        \Log::debug("Encontrados: ", [$professionals]);

        return Inertia::render('Professionals/Index', ['professionals' => $professionals, 'specialities' => $specialities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Professionals/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfessionalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfessionalRequest $request)
    {
        \Log::debug($request->all());

        return response()->json($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professional  $professional
     * @return \Illuminate\Http\Response
     */
    public function show(Professional $professional)
    {
        return response()->json($professional);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professional  $professional
     * @return \Illuminate\Http\Response
     */
    public function edit(Professional $professional)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfessionalRequest  $request
     * @param  \App\Models\Professional  $professional
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfessionalRequest $request, Professional $professional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professional  $professional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professional $professional)
    {
        //
    }
}
