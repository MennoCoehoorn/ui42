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
        <link rel="stylesheet" href="/css/landing.css">
        <link rel="stylesheet" href="/css/nav_foot.css">
        <script type="text/javascript" src="/js/all-scripts.js"></script>
        <title>Effective Cleaning and Gardening</title>
    </head>
    <body>
        

@endsection

@section('content')
    <section class="container-fluid d-flex align-items-center justify-content-center" id="main_content">
            <div class="row d-flex justify-content-center align-items-center">
                    
                    <table>
                        <thead></thead>
                        <tbody>
                            <tr>
                                <td colspan="3"><h2 class="text-white display-3">Vyhľadať v databáze obcí</h2></td>
                            </tr>
                            <tr id="tr_form">
                                <td class="td_filler"></td>
                                <td id="td_form">
                                    <form class="col-8" autocomplete="off" action="/search" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="autocomplete" id="auto_div">
                                            <input id="vil_search" type="text" name="vil">
                                            <button type="submit" id="send_button"></span></button>
                                        </div>
                                    </form>
                                </td>
                                <td class="td_filler"></td>
                            </tr>
                        </tbody>
                    </table>
                    
               
                
            </div>
    </section>

    <script>
        var vils = {!! $vils !!};
        var vils_clear = [];
        vils.forEach(vil=>{
            vils_clear.push(vil.vil_name);
        });
        console.log(vils_clear);
        autocomplete(document.getElementById("vil_search"), vils_clear);
    </script>
@endsection

@section('bottom')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>   </body>
</html>
@endsection