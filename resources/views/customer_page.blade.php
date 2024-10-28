@extends('layouts.app')

@section('content')
<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            font-weight: 800;
            box-sizing: border-box;
            font-family: cursive;
        }

        svg {
            font: 10.5em 'Monoton';
            width: 100%;
            height: 100vh;
        }
        h1 {
            text-align: center;
            font: 1.5em 'Roboto', sans-serif;
            font-weight: bold;
            color: black;
            opacity: .6;
        }

        a {
            display: inline-block;
            text-transform: uppercase;
            font-size: 1em 'Roboto';
            font-weight: 300;
            border: 1px solid #2f8f7f;
            border-radius: 4px;
            color: #2f8f7f;
            margin: 15px 0;
            padding: 8px 14px;
            text-decoration: none;
            opacity: .6;
        }

        .text {
            fill: none;
            stroke-dasharray: 8% 29%;
            stroke-width: 5px;
            stroke-dashoffset: 1%;
            animation: stroke-offset 5.5s infinite linear;
        }

        .text:nth-child(1) {
            stroke: #1c234d;
            animation-delay: -1;
        }

        .text:nth-child(2) {
            stroke: #315b2c;
            animation-delay: -2s;
        }

        .text:nth-child(3) {
            stroke: #2f8f7f;
            animation-delay: -3s;
        }

        .text:nth-child(4) {
            stroke: #2f8f7f;
            animation-delay: -4s;
        }

        .text:nth-child(5) {
            stroke: #da2717;
            animation-delay: -5s;
        }

        @keyframes stroke-offset {
            100% {
                stroke-dashoffset: -35%;
            }
        }
        .here{
            color:red
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="content">
        <h1>You don't have any port here because you are a customer, you can get products but<span class='here'> Jason Only </span></h1>
        <svg viewBox="0 0 960 300">
            <symbol id="s-text">
                <text text-anchor="middle" x="50%" y="50%">404</text>
            </symbol>

            <g class="g-ants">
                <use xlink:href="#s-text" class="text"></use>
                <use xlink:href="#s-text" class="text"></use>
                <use xlink:href="#s-text" class="text"></use>
                <use xlink:href="#s-text" class="text"></use>
                <use xlink:href="#s-text" class="text"></use>
            </g>
        </svg>
       
    </div>
</body>

</html>
@endsection