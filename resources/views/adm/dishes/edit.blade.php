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
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{ route('adm.dishes.update', $dish->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="titleInput">{{__('messages.Name')}}</label>
                        <input type="text" value="{{$dish->name}}" class="form-control" id="nameInput" name="name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="titleInput">{{__('messages.Name')}} KZ</label>
                        <input type="text" value="{{$dish->name_kz}}" class="form-control" id="nameInput" name="name_kz">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="titleInput">{{__('messages.Name')}} RU</label>
                        <input type="text" value="{{$dish->name_ru}}" class="form-control" id="nameInput" name="name_ru">
                        <div class="invalid-feedback"></div>
                    </div>     <div class="form-group">
                        <label for="titleInput">{{__('messages.Name')}} EN</label>
                        <input type="text" value="{{$dish->name_en}}" class="form-control" id="nameInput" name="name_en">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label for="contentGroup">{{__('messages.Calories')}}</label>
                        <input type="number" value="{{$dish->price}}" class="form-control" id="priceInput" name="price">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="contentGroup">{{__('messages.Recipe')}}</label>
                        <textarea class="form-control" id="descriptionInput" name="description">{{$dish->description}}</textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="contentGroup">{{__('messages.Recipe')}} KZ</label>
                        <textarea class="form-control" id="descriptionInput" name="description_kz">{{$dish->description_kz}}</textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="contentGroup">{{__('messages.Recipe')}} RU</label>
                        <textarea class="form-control" id="descriptionInput" name="description_ru">{{$dish->description_ru}}</textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="contentGroup">{{__('messages.Recipe')}} En</label>
                        <textarea class="form-control" id="descriptionInput" name="description_en">{{$dish->description_en}}</textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="contentGroup">{{__('messages.Time')}}</label>
                        <input type="number" value="{{$dish->massa}}" class="form-control" id="massaInput" name="massa">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="categoryGroup">{{__('messages.Category')}}</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $cat)
                                <option @if($cat->id == $dish->category_id) selected @endif value="{{$cat->id}}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label for="imgInput" class="form-label">{{__('messages.image')}}</label>
                        <input type="file" class="form-control @error('img') is-invalid @enderror" id="imgInput" name="img">
                        @error('img')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-outline-success" type="submit">{{__('messages.Update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
