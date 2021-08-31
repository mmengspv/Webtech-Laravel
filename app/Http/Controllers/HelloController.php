<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        return "Hello Laravel";
    }

    public function array()
    {
        return [
            "message" => "Hello Laravel",
            "name" => "Meng",
            "success" => true,
            "number" => 10,
        ];
    }

    public function post($id = null)
    {
        if ($id === null) return "All Post";
        return "Post ID: " . $id;
    }

    public function about()
    {
        return view('about', [
            "name" => "Meng",
            "info" => [
                "address" => "Kasetsart University",
                "email" => "contact@ku.th"
            ]
        ]);
    }
}
