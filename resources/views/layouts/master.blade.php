<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <?php
    $base = __DIR__ . '/../';
    function getBaseUrl() {
// output: /myproject/index.php
        $currentPath = $_SERVER['PHP_SELF'];

// output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index )
        $pathInfo = pathinfo($currentPath);

// output: localhost
        $hostName = $_SERVER['HTTP_HOST'];

// output: http://
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';


// return: http://localhost/myproject/
        return $protocol.$hostName.$pathInfo['dirname']."/../";
    }

    // var_dump( getBaseUrl() );
    $baseUrl = getBaseUrl();

    ?>
    <script type="text/javascript">
        console.log('$base = {{$baseUrl}}' );
        var baseUrl = '{{ $baseUrl }}';
    </script>

    <title>@yield('pageTitle')</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ $baseUrl }}../bootstrap_garden/bootstrapcdn/font-awesome_4.7.0/font-aweaome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../../../../bootstrap_garden/MaterialDesignForBootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../../../../bootstrap_garden/MaterialDesignForBootstrap/css/mdb.min.css" rel="stylesheet">

    <!-- Compiled min -->
    <link href="../../../../bootstrap_garden/MaterialDesignForBootstrap/css/compiled.min.css" rel="stylesheet">

    <link href="../../../../bootstrap_garden/toastr/toastr.css" rel="stylesheet" />
    <link href="../../../../assets/jquery/jquery-confirm.css" rel="stylesheet" />


    <link rel="stylesheet" href="../../../../markdown/highlight/github.min.css">

    <!-- Your custom styles (optional) -->
    <link href="../../../../bootstrap_garden/MaterialDesignForBootstrap/css/style.css" rel="stylesheet">

    @yield('myCss')

</head>

<body>

@yield('pageBody')

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="../../../../assets/jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../../../assets/jquery/jquery-confirm.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../../../../bootstrap_garden/MaterialDesignForBootstrap/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../../../../bootstrap_garden/MaterialDesignForBootstrap/js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../../../../bootstrap_garden/MaterialDesignForBootstrap/js/mdb.min.js"></script>

<script src="../../../../bootstrap_garden/toastr/toastr.min.js"></script>

<script src="../../../../markdown\sparksuite-simplemde-markdown-editor-1.11.2-0-g6abda7a\dist\simplemde.min.js"></script>

<script src="../../../../markdown/highlight/highlight.min.js"></script>

<script src="{{asset('js/myApp.js')}}"></script>

@yield('myJavascript')

</body>

</html>
