@extends('layouts.app')

@section('title', 'CART')

@section('content')
    <div class="container" style="margin-left: 7rem; margin-top: 7rem;">
        <div class="row">
{{--            <form action="{{route('cart.buy')}}" method="post">--}}
{{--                @csrf--}}
{{--                <button class="btn btn-primary" type="submit">{{ __('messages.Buy') }}</button>--}}
{{--            </form>--}}
            @foreach($cart as $cartt)
                <div class="card mt-3 col-lg-3 m-lg-3" style="background: white">
                    <div class="card-header" style="background: white">
                        <div class="card-body">
                            <img src="{{asset($cartt->img)}}" style="width: 200px;">
                            <h5 class="card-title">{{ $cartt->name }}</h5>
{{--                            <p class="card-text">{{ $cartt->price }} KZT</p>--}}
                            <form class="form-check" action="{{route('dishes.delete', $cartt->id)}}" method="post" style="margin-left: 97px; margin-top: 37px">
                                @csrf
                                <button class="btn btn-outline-danger" type="submit">{{ __('messages.Delete') }}</button>
                            </form>
                        </div>


                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
