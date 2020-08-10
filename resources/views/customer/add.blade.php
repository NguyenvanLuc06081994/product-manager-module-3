@extends('menu.master')
@section('title','Form Add Customer')
@section('content')
    <div class="error-message">
        @if ($errors->any())
            @foreach($errors->all() as $nameError)
                <p style="color:red">{{ $nameError }}</p>
            @endforeach
        @endif
    <form method="post" action="{{route('customers.addCustomer')}}">
        @csrf
        <div class="form-group">
            <label>Customer's Name</label>
            <input type="text" class="form-control" name="name" placeholder="Customer's Name" required>
        </div>
        <div class="form-group">
            <label>Customer's Phone</label>
            <input type="text" class="form-control" name="phone" placeholder="Customer's Phone" required>
        </div>
        <div class="form-group">
            <label>Customer's Email</label>
            <input type="email" class="form-control" name="email" placeholder="Customer's Email" required>
        </div>
        <div class="form-group">
            <label>Customer's Address</label>
            <input type="text" class="form-control" name="address" placeholder="Customer's Address" required>
        </div>
        <div class="form-group">
            <input type="submit" value="ADD" class="btn btn-primary">
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
        </div>
    </form>
@endsection

