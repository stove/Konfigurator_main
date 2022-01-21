{{--models urls prices--}}
<div>
    {{ $slot }}
    @for ($i = 0; $i < count($models); $i++)
        <div class="item border-5 border-dark border-success">
            <input data-price="{{ $prices[$i] }}" data-label="{{ $models[$i] }} Eco-Vinyl" id="answer_{{ $i }}_group_1"
                   name="answer_group_1" type="radio"
                   value="{{ $models[$i] }} {{ $prices[$i] }}Kr"  >
            <label class="border-5 rounded-lg border-dark" for="answer_{{ $i }}_group_1">
                    <figure class="border-5 rounded-lg border-dark"><img src="{{ $urls[$i] }}" alt="" class="img-fluid rounded-pill">
                    </figure>

                <div class="align-middle">
                    <strong>{{ $models[$i] }}</strong>
                    <button id="btn1{{ $i }}" class="item_price btn btn-outline-light" data-buttonprice="{{ $prices[$i] }}" data-buttonlabel="{{ $models[$i] }} Eco-Vinyl"  data-total="0">
                        Eco-Vinyl : {{ $prices[$i] }}:-</button>
                    <button id="btn2{{ $i }}" class="item_price btn btn-outline-light" data-buttonprice="{{ $prices[$i] }}" data-buttonlabel="{{ $models[$i] }} Textil"  data-total="0">
                        Textil : {{ $prices[$i] }}:-</button>
                    <button id="btn3{{ $i }}" class="item_price btn btn-outline-light" data-buttonprice="{{ $prices_mellan[$i]}}" data-buttonlabel="{{ $models[$i] }} Läder"  data-total="0">
                        Läder : {{ $prices_mellan[$i] }}:-</button>
                    <button id="btn4{{ $i }}" class="item_price btn btn-outline-light" data-buttonprice="{{ $prices_high[$i] }}" data-buttonlabel="{{ $models[$i] }} Exclusive"  data-total="0">
                        Exclusive : {{ $prices_high[$i] }}:-</button>
                </div>

                </label>
        </div>
    @endfor
</div>


