@extends('menu.master')
@section('title',"Product List")
@section('content')
    <a href="{{route('products.showFormAdd')}}" class="btn btn-primary mt-3 mb-3">ADD NEW PRODUCT</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Store</th>
            <th scope="col" colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        @forelse($products as $key => $product)
            <tr>
                <th scope="row">{{++$key}}</th>
{{--                {{dd($product->stores)}}--}}
                <td><img src="{{asset('storage/'.$product->img)}}" alt="" style="width: 75px; height: 75px"></td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->category->name}}</td>
                <td>
                    @foreach($product->stores as $store)
                        @if(isset($store->name))
                            - {{$store->name}}
                            <br>
                        @else
                            no data
                        @endif
                    @endforeach
                </td>
                <td><a href="{{route('products.showFormEdit',$product->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
                <td><a href="{{route('products.delete',$product->id)}}" class="btn btn-primary" onclick="return confirm('are you sure?')"><i class="far fa-trash-alt"></i></a></td>
            </tr>
        @empty
            <tr>
                <td>No Data</td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
