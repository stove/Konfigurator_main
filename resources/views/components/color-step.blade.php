<div>
    {{ $slot }}

    <div class="vinyl" style="display:block;">
        @for ($i = 0; $i < count($vinyl_codes_array); $i++)
            <div class="item">
                <input id="colors_1_{{ $i }}" data-code="0" data-label="{{ $vinyl_codes_array[$i] }}" data-price="0" type="radio" name="color_group_1" value="{{$vinyl_codes_array[$i] }}" class="required">
                <label for="colors_1_{{ $i }}"><figure><img src="{{ $vinyl_urls_array[$i] }}" alt="" class="img-fluid"></figure><i class="ribbon"><span>Eco-Vinyl</span></i><span class="item_price"></span>
                    <strong>{{ $vinyl_codes_array[$i] }}</strong>Ex maiestat propriae deterruisset.</label>
            </div>
        @endfor
    </div>
    <div class="leather" style="display:block;">
        @for ($i = 0; $i < count($leather_codes_array); $i++)
            <div class="item">
                <input id="colors_2_{{ $i }}" data-code="0" data-label="{{ $leather_codes_array[$i] }}" data-price="0" type="radio" name="color_group_1" value="{{ $leather_codes_array[$i]}}" class="required">
                <label for="colors_2_{{ $i }}"><figure><img src="{{ $leather_urls_array[$i] }}" alt="" class="img-fluid"></figure><i class="ribbon"><span>Läder</span></i><span class="item_price"></span>
                    <strong>{{ $leather_codes_array[$i] }}</strong>Ex maiestat propriae deterruisset.</label>
            </div>
        @endfor
    </div>
    <div class="textil" style="display:block;">
        @for ($i = 0; $i < count($textil_codes_array); $i++)
            <div class="item">
                <input id="colors_3_{{ $i }}" data-code="0" data-label="{{$textil_codes_array[$i]}}" data-price="0" type="radio" name="color_group_1" value="{{$textil_codes_array[$i] }}" class="required">
                <label for="colors_3_{{ $i }}"><figure><img src="{{ $textil_urls_array[$i]   }}" alt="" class="img-fluid"></figure><i class="ribbon"><span>Textil</span></i><span class="item_price"></span>
                    <strong>{{ $textil_codes_array[$i] }}</strong>Ex maiestat propriae deterruisset.</label>
            </div>
        @endfor
    </div>
    <div class="exclusive">  Denna ruta komer upp för ifyllnad om man väljer exclusive...</div>


</div>
