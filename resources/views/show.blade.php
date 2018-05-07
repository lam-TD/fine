<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>
            .add_image {
                margin-top:15px ;
                margin-bottom: 15px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 add-image">
                    <a href = "{{url('hinhanh/create') }}" class="btn btn-primary">Upload image</a>
                </div>
            </div>
            <div class="row">
               @foreach($hinhanh as $thumbnail)
                <div class="col-md-6">
                    <label> Orginal: </label>
                    <img src="uploads/android/{{$thumbnail->image}}">
                </div>
                <div class="col-md-6">
                    <label> Resize: </label>
                    <img src="thumbnails/thumb_{{$thumbnail->image}}">
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
