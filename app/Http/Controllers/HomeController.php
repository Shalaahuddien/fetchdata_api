<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;

class HomeController extends Controller
{
    function index()
    {
        $responsePengguna = HttpClient::fetch("GET", "http://127.0.0.1:8000/api/pengguna");
         $pengguna = $responsePengguna["data"];
    return view('home', ["pengguna => $pengguna"]);
    }
   
}