<div>
      @for ($i = 0; $i < count($pillars); $i++)
         <div class="item">
             <input id="pillar_1_{{ $i }}" data-label="{{ $pillars[$i] }}" data-price="0" type="radio" name="pillar_group_1" value="{{ $pillars[$i] }}" class="required">
             <label for="pillar_1_{{ $i }}"><figure><img src="img/gaspelare.jpg" alt="" class="img-fluid rounded-pill"></figure><i class="ribbon"><span>GasPelare</span></i>
                 <strong>{{ $pillars[$i] }} </strong>{{ $desc[$i] }}</label>
         </div>
    @endfor
</div>
