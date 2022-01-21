<?php

namespace App\View\Components;

use Illuminate\Support\Facades\File;
use Illuminate\View\Component;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class PillarStep extends Component
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
        $pillars = [];
        $pillars = array_map(function ($file){
            return YamlFrontMatter::parseFile($file);
        }, $files);

        return $pillars[0];
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $path  = "pillar";
        $document = $this->getDocument($path);

        $pillar = array("kort" => $document->matter("kort"), "medium" => $document->matter("medium"),
            "long" => $document->matter('long'));

        $pillars = array("Kort " . $document->matter("kort"), "Medium" . $document->matter("medium"), "Lång " . $document->matter("long"));
        $desc = array("(Användarens längd < 165cm)", "  (Användarens längd 160-175cm)", "(Användarens längd > 175cm)");


        return view('components.pillar-step',compact('pillars', 'desc'));
    }
}
