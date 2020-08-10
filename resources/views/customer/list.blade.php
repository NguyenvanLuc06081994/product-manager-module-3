@extends('menu.master')
@section('title','List Customer')
@section('content')
        <p style='color:green'>{{ (isset($success)) ? $success : '' }}</p>
    </div>
    <a href="{{route('customers.showFormAdd')}}" class="btn btn-primary mt-3 mb-3">ADD NEW CUSTOMER</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        {{--        {{dd($customers)}}--}}
        @forelse($customers as $key => $customer)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$customer->name}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->address}}</td>
                <td><a href="{{route('customers.showFormEdit',$customer->id)}}" class="btn btn-primary"><i
                            class="fas fa-edit"></i></a></td>
            </tr>
        @empty
            <tr>
                <td>No Data</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
