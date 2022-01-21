<div>
    <!-- /step -->
{{--    'art_nrs', 'gadget_names','prices','urls'--}}

        @for ($i = 0; $i < count($art_nrs); $i++)
            <div class="item">
            <input data-price="{{ $prices[$i] }}" data-label="{{ $gadget_names[$i] }}" id="answers_5_{{ $i }}" type="checkbox" name="answers_5[]" value="{{ $gadget_names[$i] }} {{ $prices[$i] }}Kr">
            <label for="answers_5_{{ $i }}"><figure><img src="{{ $urls[$i] }}" alt="" class="img-fluid rounded-pill"></figure><span class="item_price">{{ $prices[$i] }}</span><strong>{{ $gadget_names[$i] }}</strong></label>
        </div>

@endfor
    <!-- /step-->
</div>
