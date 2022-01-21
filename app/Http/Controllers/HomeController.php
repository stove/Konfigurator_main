<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class HomeController extends Controller
{
    public function getDocument() {
        $path  = 'chairs';
        $files  = File::files(resource_path($path));
        $products  = [] ;
        $materials = [];
        $chairs = [];

        $chairs = array_map(function ($file){
            $document = YamlFrontMatter::parseFile($file);
            return $document;
        }, $files);
        return $chairs[0];
    }

    public function loadProductInfo($path): array {
        $files  = File::files(resource_path($path));

        return array_map(function ($file){
            $document = YamlFrontMatter::parseFile($file);
            return new Chair($document);
        }, $files);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {


        $document=$this->getDocument();


        $chairs = $this->loadProductInfo("chairs");
        return view('home');

//        return view('home')->with('chairs',$document);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }
}
