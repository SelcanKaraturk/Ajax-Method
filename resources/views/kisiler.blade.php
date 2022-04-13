<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <div class="col-8 mx-auto">
        <div class="row">
            <div class="col-2">
                <div class="form-check">
                    <input class="form-check-input" onchange="location=this.value" type="radio" name="radio"
                           value="?cinsiyet=all" id="radio1" {{Request::get('cinsiyet')==='all'? 'checked':''}}>
                    <label class="form-check-label" for="flexRadioDefault1">
                        All
                    </label>
                </div>
            </div>
            <div class="col-2">
                <div class="form-check">
                    <input class="form-check-input" onchange="location=this.value" type="radio" name="radio"
                           value="?cinsiyet=kadın" id="radio1" {{Request::get('cinsiyet')==='kadın'? 'checked':''}}>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Kadın
                    </label>
                </div>
            </div>
            <div class="col-2">
                <div class="form-check">
                    <input class="form-check-input" onchange="location = this.value" type="radio" name="radio"
                           value="?cinsiyet=erkek" id="radio2" {{Request::get('cinsiyet')==='erkek'? 'checked':''}}>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Erkek
                    </label>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Cinsiyet</th>
            </tr>
            </thead>
            <tbody>
            @foreach($person as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->cinsiyet}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <button id="deneme">Button</button>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script>

    $("input[name='radio']").change(function () {
        $gender = $(this).val();
        $.get(window.location, {sec: 'secim', data: $gender});
    })

</script>
</body>
</html>

