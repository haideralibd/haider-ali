@extends('layouts.app')

@section('product-lisit')
<div class="d-flex m-5">
    <div>
        <form action="/admin/products/search" method="post" onsubmit="return onSearch(This);">
            @csrf
            <input type="text" name="search">
            <button type="submit" class="btn btn-danger btn-group-sm">Search</button>
        </form>
    </div>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4 m-5 ">
    @foreach ($products as $product)
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="{{ url('storage/'.$product->thumbnail) }}" alt="{{ $product->title }} class=" card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="card-text">{{ $product->subcategory->title }}</p>
                <p class="card-text">{!! \Illuminate\Support\Str::limit($product->description, 50, '...') !!}</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">{{ $product->price }} Taka</small>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

<script>
    function onSearch(form) {

        var ajax = new XMLHttpRequest();

        ajax.open("POST", form.getAttribute("action"), true);

        var formData = new FormData(form);

        ajax.send(formData);

        return false;
    }
</script>