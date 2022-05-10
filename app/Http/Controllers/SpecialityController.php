<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = Speciality::orderBy('name', 'asc')->get();

        return response()->json($specialities, JsonResponse::HTTP_OK);
    }
}
