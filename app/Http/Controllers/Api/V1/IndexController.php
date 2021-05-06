<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\InternshipResource;
use App\Models\Internship;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $internships=Internship::query()->where('is_tuijian',1)->limit(4)->get();
        return response()->json([
            'status'=>200,
            'data'=>[
                'internships'=>InternshipResource::collection($internships)
            ]
        ]);
    }
}
