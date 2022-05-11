<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessionalRequest;
use App\Http\Requests\UpdateProfessionalRequest;
use App\Models\Professional;
use App\Models\Speciality;
use Illuminate\Http\JsonResponse;
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
        $professional = Professional::create([
            'name' => $request->name,
            'crm' => $request->crm,
            'phone' => $request->phone
        ]);

        foreach($request->specialities as $speciality) {
            $model = Speciality::find($speciality);

            if($model) {
                $professional->specialities()->attach($model);
            }
        }

        return response()->json($professional, JsonResponse::HTTP_OK);
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
