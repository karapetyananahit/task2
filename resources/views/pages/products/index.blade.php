@extends("layouts.main")

@section("title", "Products")

@push("_js")
    <script>
        $(document).ready(function () {
            // alert("index")
        })
    </script>
@endpush

@section("content")
    <div class="container my-5">


        <a href="{{route("products.create")}}" class="btn btn-primary mb-5">Create</a>

        <table class="table table-hover table-bordered table-dark">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Text</th>
                <th>Image</th>
                <th colspan="2">Action</th>
            </tr>

            @foreach($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->text }}</td>
                    <td>
                    @foreach($product->images as $img)
                            <img src="/img/{{ $img->img }}" width="100px" alt="">
                        @endforeach
                        </td>
                        <td>
                            <a href="{{ route("products.edit", ["id" => $product->id]) }}"
                               class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form method="POST" action="/products/delete/{{$product->id}}">
                                @csrf
                                @method("delete")
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                </tr>
            @endforeach

        </table>

    </div>




@endsection










