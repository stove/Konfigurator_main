<?php

namespace App\View\Components;

use Illuminate\Support\Facades\File;
use Illuminate\View\Component;
use Spatie\YamlFrontMatter\Document;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class ColorStep extends Component
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

        $colors = [];

        $colors = array_map(function ($file){
            return YamlFrontMatter::parseFile($file);
        }, $files);

        return $colors[0];
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $path  = 'colors';

        $document = $this->getDocument($path);
        $test1 = $document->matter('leather_codes');
        $test2 = $document->matter('leather_urls');
        $test3 = $document->matter('vinyl_codes');
        $test4 = $document->matter('vinyl_urls');
        $test5 = $document->matter('textil_codes');
        $test6 = $document->matter('textil_urls');
        $leather_codes_array = explode(",", $test1);
        $leather_urls_array = explode(",", $test2);
        $vinyl_codes_array = explode(",", $test3);
        $vinyl_urls_array = explode(",", $test4);
        $textil_codes_array = explode(",", $test5);
        $textil_urls_array = explode(",", $test6);


//        $data = [$art_nrs, $gadget_names, $prices,$urls];
        return view('components.color-step',compact('leather_codes_array','leather_urls_array','vinyl_codes_array','vinyl_urls_array','textil_codes_array','textil_urls_array'));
//        return view('components.gadget-step',compact('art_nrs', 'gadget_names','prices','urls'));
    }
}




