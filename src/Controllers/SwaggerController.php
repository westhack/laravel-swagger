<?php

namespace Westhack\LaravelSwagger\Controllers;

use Illuminate\Routing\Controller;

class SwaggerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('vendor.swagger.index', [
            'title' => config('swagger.title', 'Swagger Api')
        ]);
    }
}
