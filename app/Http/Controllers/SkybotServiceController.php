<?php

namespace App\Http\Controllers;
use App\Models\Skybot;
use Illuminate\Http\Request;
class SkybotServiceController extends Controller
{
    public function index()
    {
        
        $count = Skybot::count();
        return view('skybot.index', ["count"=>$count, "title"=>"Count"]);
    }
}