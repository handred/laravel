<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <title>Chat</title>
    </head>
    <body>
        <div id="app">
            <chat-component></chat-component>
            <chartevent-component></chartevent-component>
            <test-component :urldata="{{$urldata}}"></test-component>
            <ajax-component></ajax-component>
            <chartline-component></chartline-component>
            <chartpie-component></chartpie-component>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
