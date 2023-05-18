@extends('layouts.admin')
@section('title', 'CARTS PAGE')
@section('content')
    <h1>CARTS PAGE</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">{{__('messages.Name')}}</th>
            <th scope="col">{{__('messages.user')}}</th>
            <th scope="col">{{__('messages.quantity')}}</th>
            <th scope="col">{{__('messages.status')}}</th>
            <th scope="col">{{__('messages.confirm')}}</th>
        </tr>
        </thead>
        <tbody>
        @for($i =1; $i<count($dishesInCart); $i++)
            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$dishesInCart[$i-1]->dish->name}}</td>
                <td>{{$dishesInCart[$i-1]->user->name}} </td>
                <td>{{$dishesInCart[$i-1]->quantity}} </td>
                <td>{{$dishesInCart[$i-1]->status}} </td>
                <td>
                    <form action="{{route('adm.cart.confirm',$dishesInCart[$i]->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-outline-primary">{{__('messages.confirm')}}</button>
                    </form>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
