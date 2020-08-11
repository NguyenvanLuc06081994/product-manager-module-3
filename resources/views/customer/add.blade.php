@extends('menu.master')
@section('title','Form Add Customer')
@section('content')


@if($errors->all())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong> Thao tac them moi khong thanh cong!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <form method="post" action="{{route('customers.addCustomer')}}">
        @csrf
        <div class="form-group">
            <label>Customer's Name</label>
            <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" name="name"  placeholder="Customer's Name">
            @if($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Customer's Phone</label>
            <input type="text" class="form-control @if($errors->has('phone')) is-invalid @endif" name="phone" placeholder="Customer's Phone">
            @if($errors->has('phone'))
                <p class="text-danger">{{ $errors->first('phone') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Customer's Email</label>
            <input type="email" class="form-control @if($errors->has('email')) is-invalid @endif" name="email" placeholder="Customer's Email">
            @if($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Customer's Address</label>
            <input type="text" class="form-control @if($errors->has('email')) is-invalid @endif" name="address" placeholder="Customer's Address">
            @if($errors->has('address'))
                <p class="text-danger">{{ $errors->first('address') }}</p>
            @endif
        </div>
        <div class="form-group">
            <input type="submit" value="ADD" class="btn btn-primary">
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
        </div>
    </form>

@endsection

