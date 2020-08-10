@extends('menu.master')
@section('title',"Category List")
@section('content')
    <a href="{{route('categories.showFormAdd')}}" class="btn btn-primary mt-3 mb-3">ADD NEW CATEGORY</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Vendor</th>
            <th scope="col">Quantity</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
        @forelse($categories as $key => $category)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->vendor}}</td>
                <td>@if($category->products)
                        {{count($category->products)}}
                    @endif
                </td>
                <td><a href="{{route('categories.showFormEdit',$category->id)}}" class="btn btn-primary"><i
                            class="fas fa-edit"></i></a></td>
            </tr>
        @empty
            <tr>
                <td>No Data</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$categories->links()}}
@endsection
