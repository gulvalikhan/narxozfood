@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <form class="form-check mt-3" action="{{route('adm.dishes.search')}}" method="GET">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" name="search" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
            <button class="btn btn-success">{{__('messages.search')}}</button>
        </div>
    </form>

    <h1>{{__('messages.pro_list')}}</h1>

    <a class="btn btn-outline-success mt-5" href="{{route('adm.dishes.create')}}">{{__('messages.add')}}</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('messages.Name')}}</th>
            <th scope="col">{{__('messages.Price')}}</th>
            <th scope="col">{{__('messages.Category')}}</th>
            <th scope="col">{{__('messages.Edit')}}</th>
            <th scope="col">{{__('messages.Delete')}}</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($products); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$products[$i]->name}}</td>
                <td>{{$products[$i]->price}}</td>
                <td>{{$products[$i]->category->name}}</td>
                <td>
                  <a href="{{route('dishes.edit', $products[$i]->id)}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                </td>
                <td>
                    <form action="{{route('adm.dishes.destroy', $products[$i]->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="flex-sm-row btn btn-danger mt-1" type="submit">{{__('messages.Delete')}}</button>
                    </form>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
