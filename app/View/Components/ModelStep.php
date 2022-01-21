<?php

namespace App\View\Components;
use Illuminate\Support\Facades\File;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Session;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use function PHPUnit\Framework\logicalNot;

class ModelStep extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function getDocument($path) {

        $files  = File::files(resource_path($path));

        $chairs = [];

        $chairs = array_map(function ($file){
            return YamlFrontMatter::parseFile($file);
        }, $files);
        return $chairs[0];
    }

    public function fromSession(Request $request) {

//        $request->session()->put(['items', "$newItem"]);
//        $items = Item::latest()->whereIn('id', 'items')->get();
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $path  = 'chairs';
        $models = [] ;
        $urls = [] ;
        $prices = [];

        $model_document = $this->getDocument($path);

        for ($i = 1; $i < 14; $i++){
            $line = $model_document->matter()[$i];
            $explodedLine = $this->getExplodedLine($line);
            $art_no = $explodedLine[0];
            $model = $explodedLine[1];
            $img_url = $explodedLine[2];
            $price1 = $explodedLine[3];
            $price2  = $explodedLine[4];
            $price3  = $explodedLine[5];
            $models[] = $model;
            $urls[] = $img_url;
            $prices[] = $price1;
            $prices_mellan[] = $price2;
            $prices_high[]  = $price3;
        }
        $data = [$models, $urls, $prices,$prices_mellan,$prices_high];
        Session::put('prices', $prices);
        Session::push("prices", $prices);
        Session::push('prices_mellan', $prices_mellan);
        Session::push('prices_hich', $prices_high);
        return view('components.model-step', compact('models', 'urls','prices','prices_mellan', 'prices_high'));
    }

    private function getExplodedLine($line) {
        return explode(",", $line);
    }
}

