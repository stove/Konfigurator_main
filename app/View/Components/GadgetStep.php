<?php

namespace App\View\Components;

use Illuminate\Support\Facades\File;
use Illuminate\View\Component;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class GadgetStep extends Component
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

        $gadgets = [];

        $gadgets = array_map(function ($file){
            return YamlFrontMatter::parseFile($file);
        }, $files);

        return $gadgets[0];
    }
    private function getExplodedLine($line) {
        return explode(",", $line);
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $path  = 'gadgets';
        $gadget_names = [] ;
        $urls = [] ;
        $prices = [];
        $gadget_document = $this->getDocument($path);
        for ($i = 1; $i < 14; $i++){
            $line = $gadget_document->matter()[$i];

            if(is_null($line)) break;
            if (!isset($line)) {
                break;
            }
            $explodedLine = $this->getExplodedLine($line);
            $art_no = $explodedLine[0];
            $name = $explodedLine[1];
            $price = $explodedLine[2];
            $img_url  = $explodedLine[3];

            $art_nrs[]= $art_no;
            $gadget_names[] = $name;
            $prices[] = $price;
            $urls[] = $img_url;
        }
//        $data = [$art_nrs, $gadget_names, $prices,$urls];

        return view('components.gadget-step',compact('art_nrs', 'gadget_names','prices','urls'));
    }
}
