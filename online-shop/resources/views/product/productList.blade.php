@extends('layouts.app')

@section('product-lisit')
    <div class="d-flex m-5">
        <div>
            <select class="form-select" aria-label="Default select example" id="category-filter"
                onchange="getCategoryProducts()">
                <option selected>Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <select class="form-select" aria-label="Default select example" id="sub-category-filter"
                onchange="getSubCategoryProducts()">
                <option selected>Select SubCategory</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <form action="/admin/products/search" method="post" onsubmit="return onSearch(This);">
                @csrf
                <input type="text" name="search">
                <button type="submit" class="btn btn-danger btn-group-sm">Search</button>
            </form>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 m-5 " id="allProducts">
        @foreach ($products as $product)
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('storage/' . $product->thumbnail) }}" alt="{{ $product->title }} class=" card-img-top">
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

<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script>
    var config = {
        routes: {

            sub_category_filter: "{!! route('products.category.filter') !!}",

        }
    };

    function onSearch(form) {

        var ajax = new XMLHttpRequest();

        ajax.open("POST", form.getAttribute("action"), true);

        var formData = new FormData(form);

        ajax.send(formData);

        return false;
    };


    function getCategoryProducts(id) {

        let categoryId = document.getElementById('category-filter').value;

        axios({
                method: "POST",
                url: "{{ route('products.category.filter') }}",
                data: {
                    categoryId: categoryId,
                    _token: "{{ csrf_token() }}"
                },
            })
            .then(function(response) {
                const data = response.data;
                if (data.success) {
                    let productList = data.productList;
                    console.log(productList);
                    let productSection = document.getElementById("allProducts");
                    productSection.innerHTML = "";
                    productList.forEach(function(value, index) {
                        productSection.innerHTML+=`
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ url('storage/${value . thumbnail}') }}" alt="${value.title}" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">${value.title}</h5>
                                    <p class="card-text">${value.description}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">${value.price} Taka</small>
                                </div>
                            </div>
                        </div>`;
                    });
                }
            })
            .catch(function(response) {
                console.log(response);

            });
    }

    function getSubCategoryProducts(id) {
        let subCategoryId = document.getElementById('sub-category-filter').value;
        axios({
                method: "POST",
                url: "{{ route('products.subcategory.filter') }}",
                data: {
                    subCategoryId: subCategoryId,
                    _token: "{{ csrf_token() }}"
                },
            })
            .then(function(response) {
                const data = response.data;
                if (data.success) {

                    let productList = data.productList;
                    console.log(productList);
                    let productSection = document.getElementById("allProducts");
                    productSection.innerHTML = "";
                    productList.forEach(function(value, index) {
                        productSection.innerHTML+=`
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ url('storage/${value . thumbnail}') }}" alt="${value.title}" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">${value.title}</h5>
                                    <p class="card-text">${value.description}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">${value.price} Taka</small>
                                </div>
                            </div>
                        </div>`;

                    });
                }
            })
            .catch(function(response) {
                console.log(response);

            });
    }
</script>
