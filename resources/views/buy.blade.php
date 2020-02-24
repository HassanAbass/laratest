@extends('layouts.default')

@section('content')
    <h1>Buy for 10$</h1>
    <form action="/buy" method="post" id="stripe-charge">
        {{@csrf_field()}}
        <label for="card-element">Card</label>
        <div id="card-element"></div>
        <div id="card-error"></div>
        <input type="submit" value="Buy">
    </form>
@endsection

@section('script')
    <script src="{{asset('main.js')}}"></script>
@endsection
