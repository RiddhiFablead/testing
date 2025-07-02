@extends('app')

@section('content')
<div class="container my-5">
    <h3 class="mb-4">Add Product</h3>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" id="productform">
        @csrf

        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="name" id="name" class="form-control">

            <small class="text-danger" id="nameError"></small>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
            <small class="text-danger" id="descriptionError"></small>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <small class="text-danger" id="imageError"></small>
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" id="price" step="0.01" class="form-control">
            <small class="text-danger" id="priceError"></small>
        </div>

        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="quantity" id="qty" class="form-control">
            <small class="text-danger" id="qtyError"></small>
        </div>

        <button type="submit" class="btn btn-success">Add Product</button>
    </form>
</div>

<script>
    document.getElementById("productform").addEventListener("submit", function (e) {
    
        document.querySelectorAll("small.text-danger").forEach(el => el.innerText = "");

        let isValid = true;

        const name = document.getElementById("name").value.trim();
        const description = document.getElementById("description").value.trim();
        const price = document.getElementById("price").value.trim();
        const qty = document.getElementById("qty").value.trim();
        const image = document.getElementById("image").value;

        if (!name) {
            document.getElementById("nameError").innerText = "Product name is required.";
            isValid = false;
        }

        if (!description) {
            document.getElementById("descriptionError").innerText = "Description is required.";
            isValid = false;
        }

        if (!price || isNaN(price)) {
            document.getElementById("priceError").innerText = "Valid price is required.";
            isValid = false;
        }

        if (!qty || isNaN(qty) || qty < 1) {
            document.getElementById("qtyError").innerText = "Enter a valid quantity.";
            isValid = false;
        }

        if (!image) {
            document.getElementById("imageError").innerText = "Product image is required.";
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault(); 
        }
    });
</script>

@endsection
