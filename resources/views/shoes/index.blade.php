<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, th, td {
            font-size: xx-large;
            margin:  auto;
            text-align: center;
            border: 1px solid;
            background: rgb(255, 186, 148);
            background: radial-gradient(circle, rgba(255, 186, 148, 1) 3%, rgba(241, 48, 2, 1) 57%);
        }

        td {
            font-size: xx-large;
        }
        .delete{
            padding-top: 1em;
        }

        button{
            font-family: 'Alumni Sans Inline One';
            font-size: x-large;
            border-width: 4px;
            border-color: #e2160b;
            border-radius: 0.5em;
            background: rgb(241,100,2);

        }


    </style>
</head>
<body>

@extends('layouts.app')

@section('content')

    <a href="/shoes/create">
        <button>Add new</button>
    </a>


    <table>
        <thead>
        <tr>
            <th scope="col">Brand</th>
            <th scope="col">Model</th>
            <th scope="col">Color</th>
            <th scope="col">Price</th>
            <th scope="col" class="size-head">Size
            <table>
                <tr>
                    <td>EU</td>
                    <td>UK</td>
                    <td>US (M)</td>
                    <td>US (F)</td>
                </tr>
            </table>
            </th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>

        <tbody>
        @foreach($shoes as $shoe)
            <tr>
                <td>{{$shoe->brand}}</td>
                <td>{{$shoe->model}}</td>
                <td>{{$shoe->color}}</td>
                <td>{{$shoe->price}}</td>

                <td>

                <table >
                    <tr>
                        @foreach($sizes as $size)
                            @if($size->id == $shoe->size_id)
                                <td>{{$size->EU}}</td>
                                <td>{{$size->UK}}</td>
                                <td>{{$size->US_male}}</td>
                                <td>{{$size->US_female}}</td>
                                @break
                            @endif
                        @endforeach
                    </tr>
                </table>

                </td>




                <td><a href="/shoes/{{$shoe->id}}/edit"> <button type="button">Edit</button></a></td>
                <td>
                    <form class="delete" method="post" action="/shoes/{{$shoe->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button> </form>
                </td>
            </tr>
        @endforeach
        </tbody>


    </table>

@endsection
</body>
</html>
