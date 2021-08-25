<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index(){

        return view('admin.index');
    }
}
