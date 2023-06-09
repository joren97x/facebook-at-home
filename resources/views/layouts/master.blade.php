<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    {{-- <link rel="icon" type="image/x-icon" href="{{ asset('images/me.png') }}"> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>

        /* body {
        background-color: #ffffff;
        color: #000000;
        } */

        /* body {
            background-color: rgb(24,25,26);
            color: #ffffff;
        }

        body a{
            
            color: #ffffff;
        }

        body .card {
            background-color: rgb(36,37,38);
            color: #ffffff;
        }

        body .card .post-author .container{
            background-color: rgb(58,59,60);
        }

        body .card button{
            color: #ffffff;

        } */

     

        a {
            text-decoration: none;
            color:black;
        }
        img {
            object-fit: cover;
        }
        body {
            background-color: rgb(240,242,245);
        }
        textarea {
            resize: none;
        }
    </style>
</head>
<body>
    @yield('content')
</body>

</html>