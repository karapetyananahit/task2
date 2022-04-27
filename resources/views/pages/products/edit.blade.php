<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">

    <table class="table table-hover table-bordered table-dark">
        <tr>
            <th>Image</th>
            <th>Action</th>
        </tr>

        @foreach($product->images as $img)
            <tr>
                <td>
                    <img src="/img/{{ $img->img }}" width="100px" alt="">
                </td>
                <td>
                    <form method="POST" action="/products/edit/delete/{{$img->id}}">
                        @csrf
                        @method("delete")
                        <input type="submit" value="Delete" class="btn btn-danger"/>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>


    <form method="POST"  enctype="multipart/form-data" >

        @csrf

        <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $product->title }}">

            @error('title')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea rows="10" name="description" class="form-control @error('description') is-invalid @enderror">{{ $product->description }}</textarea>

            @error('description')
            <span class="invalid-feedback " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Text</label>
            <textarea rows="10" name="text" class="form-control @error('text') is-invalid @enderror">{{ $product->text }}</textarea>

            @error('text')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Images</label>

            <div class="form-group">
                <input type="file" name="img[]" id="file" multiple>
            </div>

        </div>

        <input type="submit" value="Save" class="btn btn-primary">
    </form>

</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


