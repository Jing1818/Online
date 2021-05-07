<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\InternshipDetailResource;
use App\Models\Internship;
use App\Models\User;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    //
    public function detail(Request $request,Internship $internship){
        return response()->json([
            'status'=>200,
            'data'=>new InternshipDetailResource($internship)
        ]);
    }
}
