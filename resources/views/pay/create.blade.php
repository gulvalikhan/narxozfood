@extends('layouts.app')
@section('title', 'MAIN  PAGE')
@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-left: 250px; margin-top: 90px">
            <div class="col-md-10">
                <form action="{{ route('pay.store', Auth::user()->id)}}" method="post">
                    @csrf
                    <div class="form-group" style="width: 330px">
                        <label for="titleInput">{{__('messages.cash')}}</label>
                        <input type="number" class="form-control @error('cash') is-invalid @enderror" id="nameInput" name="cash" placeholder="Enter cash">
                        <div class="invalid-feedback"></div>
                    </div>
                    <button style="margin-top: 10px" class="btn btn-success">{{__('messages.add')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
