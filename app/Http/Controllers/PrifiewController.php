<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kalender;

class PrifiewController extends Controller
{
   public function index()
{
    $kal = Kalender::latest()->get();
    return view('prifiew.index', compact('kal'));
}
}
