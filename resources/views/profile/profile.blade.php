@extends('layouts.app')
@section('title', 'Cart')
@section('content')
<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4" style="margin-left: 450px; margin-top: 50px">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{ asset('/storage/avatars/'.$profile->image) }}" alt="avatar"
                             class="rounded-circle img-fluid">
                        <h5 class="my-3">{{Auth::user()->name}}</h5>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <b class="mb-0">{{__('messages.name')}}</b>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{Auth::user()->name}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <b class="mb-0">{{__('messages.email')}}</b>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{Auth::user()->email}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="d-flex justify-content-center mb-2">
                            <a type="submit" class="btn btn-primary" href="{{route('profile.edit', Auth::user()->id)}}">{{__('messages.Edit')}}</a>
                            <form action="{{route('profile.destroy', Auth::user()->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger ms-1">{{__('messages.Delete')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
