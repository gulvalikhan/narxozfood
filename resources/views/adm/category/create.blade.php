@extends('layouts.admin')

@section('title', 'CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-left: 250px; margin-top: 90px">
            <div class="col-md-10">
                <form action="{{ route('adm.category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="titleInput">{{ __('messages.Name')}}</label>
                        <input style="width: 250px" type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div>
                        <label for="titleInput">{{ __('messages.Name')}}KZ</label>
                        <input style="width: 250px" type="text" class="form-control @error('name_kz') is-invalid @enderror" id="nameInput" name="name_kz" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div>
                        <label for="titleInput">{{ __('messages.Name')}}RU</label>
                        <input style="width: 250px" type="text" class="form-control @error('name_ru') is-invalid @enderror" id="nameInput" name="name_ru" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>  <div>
                        <label for="titleInput">{{ __('messages.Name')}}EN</label>
                        <input style="width: 250px" type="text" class="form-control @error('name_en') is-invalid @enderror" id="nameInput" name="name_en" placeholder="Enter name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-success" type="submit">{{ __('messages.Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
