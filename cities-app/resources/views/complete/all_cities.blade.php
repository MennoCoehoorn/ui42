@extends('partials.nav_footer')

@section('header')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
        <link rel="stylesheet" href="/css/all_cities.css">
        <link rel="stylesheet" href="/css/nav_foot.css">
        <script type="text/javascript" src="/js/all-scripts.js"></script>
        <title>Effective Cleaning and Gardening</title>
    </head>
    <body>
        

@endsection
@section('content')
    
    <hr>

    <section class="container">
        
        <div class="row justify-content-center md-5">
            <h1 class="display-5">Zoznam miest</h1>
        </div>

       
        <div class="row" id="cities">
            @foreach ($data->sortBy('vil_name') as $oneData)
                <div class="col-12 col-md-4">
                    <a href="/city/{{$oneData->id}}">{{$oneData->vil_name}}</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('bottom')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>   </body>
</html>
@endsection