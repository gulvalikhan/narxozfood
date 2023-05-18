@extends('layouts.app')
@section('title', 'MAIN  PAGE')
@section('content')
    <div class="container" style="margin-left: 7rem; margin-top: 7rem">
        <a href="{{route('pay.create')}}" class="btn btn-outline-success">{{__('messages.replenish')}}</a>
        <table class="table">
            <thead>
            <tr>
                <th>{{__('messages.money')}}</th>
                <th>{{__('messages.replenish')}}</th>
                <th>{{__('messages.Delete')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($paycheck as $u)
                @if($u->user_id == Auth::user()->id)
                    <tr>
                        <td>
                            {{$u->cash}}
                        </td>
                        <td>
                            <a href="{{route('pay.edit', $u->id)}}" class="btn btn-success">{{__('messages.replenish')}}</a>
                        </td>
                        <td>
                            <form action="{{route('pay.destroy', $u->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{__('messages.Delete')}}</button>
                            </form>
                        </td>
                    <tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
