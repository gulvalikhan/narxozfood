@extends('layouts.admin')

@section('title', 'EDIT PAGE')

@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center" style="margin-left: 400px; margin-top: 90px">
            <div class="col-md-10">
                <form action="{{ route('adm.category.update', $category->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">{{ __('messages.Name') }}</label>
                        <input type="text" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">{{ __('messages.Name') }}</label>
                        <input type="text" value="{{$category->name_kz}}" class="form-control @error('name_kz') is-invalid @enderror" id="nameInput" name="name_kz">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">{{ __('messages.Name') }}</label>
                        <input type="text" value="{{$category->name_ru}}" class="form-control @error('name_ru') is-invalid @enderror" id="nameInput" name="name_ru">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">{{ __('messages.Name') }}</label>
                        <input type="text" value="{{$category->name_en}}" class="form-control @error('name_en') is-invalid @enderror" id="nameInput" name="name_en">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-outline-success" type="submit">{{ __('messages.Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
