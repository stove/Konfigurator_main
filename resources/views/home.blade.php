@extends('html')
@section('model')


{{--    <x-product :product="$product ?? '' ?? ''"></x-product>--}}
    <x-model-step>

    </x-model-step>

@endsection
@section('colors')
    <x-color-step>

    </x-color-step>



@endsection
@section('pillar')
    <x-pillar-step>

    </x-pillar-step>



@endsection
@section('gadgets')
   <x-gadget-step>

   </x-gadget-step>

@endsection
@section('laststep')

    <x-last-step>
    <x-slot name="title_last_step"></x-slot>

    </x-last-step>


@endsection
@section('footer')


    <x-footer />

@endsection
