<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use phpDocumentor\Reflection\DocBlock\Tags\Var_;
    use phpDocumentor\Reflection\Types\This;
    use Spatie\YamlFrontMatter\YamlFrontMatter;

    class Chair {

        public $model = '';
        public $article_no = 'article_no';
        public $price_pgr1 = 'price_pgr1';
        public $price_pgr2 = 'price_prg2';
        public $price_pgr3 = 'price_prg3';
        public $body = 'body';
        public $img_url = 'img_url';
        public $pdf_url = 'pdf_url';


      /*  public $color_leather = 'test';
        public $color_eco_vinyl = 'test';
        public $color_fabric = 'test';
        public $material_1 = 'material_test';
        public $material_2 = 'material_test';
        public $material_3 = 'material_test';
        public $pillar_short = 'pillar_short';
        public $pillar_medium = 'pillar_medium';
        public $pillar_tall = 'pillar_tall';*/

        public function __construct($document) {
            $this->model = $document->model;
            $this->article_no = $document->article_no;
            $this->price_pgr1 = $document->price_pgr1;
            $this->price_pgr2 = $document->price_pgr2;
            $this->price_pgr3 = $document->price_pgr3;

            $this->img_url = $document->img_url;
            $this->pdf_url = $document->pdf_url;

            $this->body = $document->body();
            $this->body = trim($this->body);

           /* $this->color_leather = $document->color_leather;
            $this->color_eco_vinyl = $document->color_eco_vinyl;
            $this->color_fabric = $document->color_fabric;*/
           /* $this->material_1 = $document->material_1;
            $this->material_2 = $document->material_2;
            $this->material_3 = $document->material_3;

            $this->pillar_short = $document->pillar_short;
            $this->pillar_medium = $document->pillar_medium;
            $this->pillar_tall = $document->pillar_tall;*/
        }

        public function findAll($document) {}

        public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
            return $this->belongsTo(Category::class);
        }

        public function article(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
            return $this->belongsTo(Category::class);
        }

        public function pricegroup(): \Illuminate\Database\Eloquent\Relations\BelongsToMany {
            return $this->belongsToMany(PriceGroup::class);
        }

    }

