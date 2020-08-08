@extends('menu.master')
@section('title',"Bill List")
@section('content')
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Phone</th>
            <th scope="col">Customer Email</th>
            <th scope="col">Customer Address</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
            <th scope="col">Status</th>

        </tr>
        </thead>
        <tbody>
        @foreach($bill->products as $product)
            <tr>
                <td>{{$bill->customer->name}}</td>
                <td>{{$bill->customer->phone}}</td>
                <td>{{$bill->customer->email}}</td>
                <td>{{$bill->customer->address}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>1</td>
                <td>{{$bill->totalPrice}}</td>
                <td>{{$bill->status}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
