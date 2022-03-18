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


    <form method="POST"  enctype="multipart/form-data" action="{{route("products.store")}}">

        @csrf

        <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Short description</label>
            <textarea rows="5" name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="">Text</label>
            <textarea rows="5" name="text" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="">Images</label>
            <input type="file" name="img[]" id="file" multiple>

        </div>

        <input type="submit" value="Save" class="btn btn-primary">
    </form>

</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


