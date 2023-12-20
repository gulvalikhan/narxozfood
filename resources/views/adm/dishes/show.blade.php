@extends('layouts.app')

@section('title', 'SHOW PAGE')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="col-4" style="margin-left: 200px">
                <div class="card mt-3" style="background: #ffffff;">
                    <div class="card-header" style="background: #ffffff">
                        <div class="card-body" style="background: #ffffff">
                            <img src="{{asset($dish->img)}}" width="100px" style="width: 200px; height: 200px" alt="">
                            <h4 class="card-title">{{ __('messages.Name') }}: {{$dish->name }}</h4>
{{--                            <h5 class="card-text">{{ __('messages.Calories') }}: {{$dish->calories }} cal</h5>--}}
                            <h5 class="card-text">{{ __('messages.Resipe') }}: {{$dish->description}}</h5>
                            <h5 class="card-text">{{ __('messages.Calories') }}: {{$dish->massa}}  Кал</h5>
                        </div>

                        <form action="{{route('dishes.cart', $dish->id)}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <p>{{ __('messages.Save') }}</p>
                                    <select class="form-select" name="quantity">
                                        @for($i=1; $i<=99; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-success">{{ __('messages.Save') }}</button>
                        </form>
                    </div>
                </div>
                <form style="margin-top: 10px;" action="{{route('comments.store')}}" method="post">
                    @csrf
                    <textarea style="width: 400px; border-style: outset" name="content" rows="2" cols="30" placeholder="{{__('messages.entr_cmt')}}"></textarea>
                    <input type="hidden" name="dish_id" value="{{$dish->id}}">
                    <button style="margin-left: 430px; margin-top: -90px" type="submit" class="btn btn-outline-dark">✓</button>
                </form>
                <ul class="list-group mt-3">
                    @foreach($dish->comments as $comment)
                        <li class="list-group-item d-flex justify-content-between align-items-start" style="width: 700px; margin-top: 25px">
                            <small>{{__('messages.author')}}: <span style="color: #1a202c; font-size: 16px;">{{$comment->user->name}}</span></small>
                            <small style="margin-right: 300px"><span style="color: #1a202c; font-size: 16px;">{{__('messages.comment')}}: {{$comment->content}}</span></small>
                        </li>
                        @can('delete', $comment)
                            <form action="{{route('comments.destroy', $comment->id)}}" method="post" style="margin-top: -40px; margin-left: 728px">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  onclick="return confirm('Are you sure?')" class="btn btn-outline-dark">X</button>
                            </form>
                        @endcan
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
