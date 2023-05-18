@extends('layouts.app')

@section('title', 'MAIN  PAGE')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="row">
            @foreach($dish as $dsh)
                <div style="background: #ffffff; border: black 2px solid; margin-left: 30px; margin-top: 30px" class="card mt-3 col-lg-3 m-lg-3">
                    <div style="background: #ffffff" class="card-header">
                        <div style="background: #ffffff" class="card-body">
                            <img src="{{asset($dsh->img)}}" style="width: 200px; height: 200px;">
                            <h5 class="card-title">{{ $dsh->name }}</h5>
                            <h5 class="card-text">{{ $dsh->price }} KZT</h5>
                            <a href="{{ route('dishes.show', $dsh->id) }}" class="flex-sm-row btn btn-warning">{{ __('messages.Check') }}:</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
