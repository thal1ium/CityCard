@section('title', '404')

<x-layout>
    <style>
        * {
            transition: all 0.6s;
        }

        .fail {
            font-family: 'Lato', sans-serif;
            color: #888;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            font-size: 50px;
            display: inline-block;
            padding-right: 12px;
            animation: type .5s alternate infinite;
        }

        @keyframes type {
            from {
                box-shadow: inset -3px 0px 0px #888;
            }

            to {
                box-shadow: inset -3px 0px 0px transparent;
            }
        }
    </style>

    <div class="fail">
        <h1>404 Page not found</h1>
        <a href='/'>Home</a>
    </div>
</x-layout>
