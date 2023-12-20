@extends('layouts.admin')

@section('title', 'CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{ route('adm.dishes.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="titleInput">{{__('messages.Name')}}</label>
                        <input type="text" class="form-control" id="nameInput" name="name" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="titleInput">{{__('messages.Name')}} KZ</label>
                        <input type="text" class="form-control" id="nameInput" name="name_kz" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="titleInput">{{__('messages.Name')}} RU</label>
                        <input type="text" class="form-control" id="nameInput" name="name_ru" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="titleInput">{{__('messages.Name')}} EN</label>
                        <input type="text" class="form-control" id="nameInput" name="name_en" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="priceGroup">{{__('messages.Calories')}}</label>
                        <input type="number" class="form-control" id="priceInput" name="price" placeholder="Enter calories">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="imgInput" class="form-label">{{__('messages.image')}}</label>
                        <input type="file" class="form-control @error('img') is-invalid @enderror" id="imgInput" name="img">
                        @error('img')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descriptionGroup">{{__('messages.Description')}}</label>
                        <textarea class="form-control" id="descriptionInput" name="description" placeholder="Enter description"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="descriptionGroup">{{__('messages.Description')}} KZ</label>
                        <textarea class="form-control" id="descriptionInput" name="description_kz" placeholder="Enter description"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="descriptionGroup">{{__('messages.Description')}} RU</label>
                        <textarea class="form-control" id="descriptionInput" name="description_ru" placeholder="Enter description"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="descriptionGroup">{{__('messages.Description')}} EN</label>
                        <textarea class="form-control" id="descriptionInput" name="description_en" placeholder="Enter description"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="priceGroup">{{__('messages.Time')}}</label>
                        <input type="number" class="form-control" id="massaInput" name="massa" placeholder="Enter time">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="categoryGroup">{{__('messages.Category')}}</label>
                        <select class="form-control" name="category_id" id="categoryGroup">
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-outline-success" type="submit">{{__('messages.Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
