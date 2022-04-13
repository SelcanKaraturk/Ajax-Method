<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset=utf-8>
    <meta name=viewport content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Fonts -->
    <link href="//fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src=//stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js></script>
</head>
<body>

    <div class="container text-center mt-5">
    <a href="javascript:;" class="btn btn-success " id="getData">Get Data</a>
        <div class="text-left">
            <h1 id="title"></h1>
            <p id="description"></p>
        </div>
    </div>



    <script src=//code.jquery.com/jquery-3.5.1.min.js integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin=anonymous></script>
    <script type=text/javascript>
        $(document).ready(function () {
            $("#getData").click(function () {
                $.ajax({  //create an ajax request to display.php
                    type: "GET",
                    url: "list/",
                    success: function (data) {
                        data.forEach(myFunction)

                        function myFunction(item) {
                            $("#title").append(item.title+'<br>')
                            $("#description").append(item.description+'<br>')
                        }

                    }
                });
            });
        });

    </script>


</body>
</html>
