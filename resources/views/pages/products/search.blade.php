@extends("layouts.main")

@section("title", "Products")


@section("content")
    <div class="container my-5">


        <table class="table table-hover table-bordered table-dark">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Text</th>
                <th>Image</th>
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
                </tr>
            @endforeach

        </table>

    </div>




@endsection




