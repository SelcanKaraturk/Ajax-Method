
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src=//stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($blog as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <form>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="text" class="form-control" name="name" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
                <button class="btn btn-success btn-submit"> Gönder </button>
            </form>
            <button id="tikla"> fgdf</button>
        </div>
    </div>
</div>
<script src=//code.jquery.com/jquery-3.5.1.min.js integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin=anonymous></script>
<script type="text/javascript">



    $(".btn-submit").click(function(e){
 let _token = $('meta[name="csrf-token"]').attr('content');
        e.preventDefault();

        var name = $("input[name=name]").val();
        var description= $("input[name=description]").val();


        $.ajax({
           type:'POST',
           url:"{{ route('blogPost') }}",
           data:{name:name, description:description, _token:_token},
           success:function(data){
              alert(data.success);
           }
        });

    });
</script>


</body>
</html>
