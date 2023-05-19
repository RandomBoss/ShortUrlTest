<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Сокращение ссылок</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }
        .bd-mode-toggle {
            z-index: 1500;
        }
    </style>

</head>
<body class="d-flex h-100 text-center text-bg-dark">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
    </header>
    <main class="mb-auto">
        <form id="short-form"
              method="get"
              action="/shortUrl">
        <h1>Сократить ссылку</h1>
        <p class="lead">Введите ссылку</p>
        <p class="lead">
            <div class="container">
                <input name = "input-url" type="url" class="form-control" id="input-url" placeholder="example.com">
            </div>
        </p>
        <p class="lead">
            <button id="getShortUrl" class="btn btn-lg btn-light fw-bold border-white bg-white"">Сократить</button>
        </p>
        </form>
        <div id="shortUrlResult" class="container-md rounded-4" >
                <input type="text" readonly class="rounded 4" id="shortUrlAddress" value="">
                <button id="shortUrlCopy" class="rounded-2">Copy</button>
        </div>
    </main>
    <footer class="mb-auto">

    </footer>
</div>
</body>


<script>
    $(document).ready(function(){
        $('#shortUrlResult').hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="input-url]').attr('content')
            }
        });
        $('#short-form').submit(function(e){
            e.preventDefault();

            $.ajax({
                url: "/getUrl",
                method: 'get',
                data: {
                    url: $('#input-url').val(),
                },
                success: function(response){
                    var result = window.location.origin + '/' + response['short-key'];
                    $('#shortUrlResult').show();
                    $("#shortUrlAddress").val(result);
                }});
        });

        $('#shortUrlCopy').click(function ()
        {
            copyToClipboard();
        });

        function copyToClipboard(){
            var temp = $("<input>");
            $("body").append(temp);
            temp.val($('#shortUrlAddress').val()).select();
            document.execCommand("copy");
            temp.remove();
        }
    });
</script>

</html>
