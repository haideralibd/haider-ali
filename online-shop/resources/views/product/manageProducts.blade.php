@extends('layouts.app')

@section('manage-product-table')
<div class="d-flex flex-row-reverse m-5">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalContactForm">Add product</button>
</div>
<div class="m-5">
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Sub Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>Thumbnail photo</td>
                <td>{{ $product->title }}</td>
                <td>{!! \Illuminate\Support\Str::limit($product->description, 50, '...') !!}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->subcategory->title }}</td>
                <td>
                    <form action="#" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-group-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('product.addProductModal')

@endsection