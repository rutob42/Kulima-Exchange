@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="">All products</h1>
    <a href="{{ route('products.create') }}">Add Products</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>
                    <a href="{{ route('products.edit', $products->id) }}">Edit</a>
                </td>
                <td><form action="{{ route ('products.destroy', $products->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
            @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endsection