@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit a product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="required" value="{{ $product->name }}"/>
        </div>

        <div>
            <label for="category">Category:</label>
            <input type="text" name="category" id="required" value="{{ $product->category }}"/>
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="number" name="price" id="required" value="{{ $product->price }}"/>
        </div>

        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="required" value="{{ $product->quantity }}"/>
        </div>

        <div>
            <button type="submit">Update</button>
        </div>
    </form>

@endsection