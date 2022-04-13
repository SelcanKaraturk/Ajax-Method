<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
          integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>Document</title>
    <style>
        i {
            font-size: 24px;
            padding-left: 6px;
        }

        .form-check-input.active {
            background-color: cornflowerblue;
            font-size: larger;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="col-8 mx-auto">
        <div id="alert">

        </div>
        <div class="row">
            <div class="col-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio"
                           value="all" id="radio1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        All
                    </label>
                </div>
            </div>
            <div class="col-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio"
                           value="kadın" id="radio1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Kadın
                    </label>
                </div>
            </div>
            <div class="col-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio"
                           value="erkek" id="radio2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Erkek
                    </label>
                </div>
            </div>
        </div>

        <table class="table" id="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Cinsiyet</th>
                <th>Düzenle/Sil</th>
            </tr>
            </thead>
            <tbody>
            @foreach($person as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->cinsiyet}}</td>
                    <td>
                        <a href="javascript:void(0)" onclick="deleteFunction({{$item->id}})"><i
                                class="fa-solid fa-circle-minus"></i></a>
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editModal"
                           onclick="editFunction({{$item->id}})"><i class="fa-solid fa-square-pen"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="idForm" action="{{route('addPerson')}}" data="">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Ad</label>
                        <input type="text" class="form-control" name="name" value="" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="selectCinsiyet" class="form-label">Cinsiyet</label>
                        <select class="form-select" name="cinsiyet" id="selectCinsiyet">
                            <option value="kadın">Kadın</option>
                            <option value="erkek">Erkek</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script>

    /*function showFunction(){
        $('#editModal').modal('show');
    }*/
    function deleteFunction(id) {
        console.log(id);
    }

    function editFunction(id) {
        $.get(window.location, {edit: 'edit', data: id}).done(function (response) {
            $("#editModal input[name='name']").val(response.name);
            $("#editModal form").attr('data', id);
            let select = $("#editModal select option");
            $.each(select, function (key, value) {
                if (value.value === response.cinsiyet) {
                    $(this).attr('selected', 'selected')
                }
            })
        })
    }

    $("input[name='radio']").change(function () {
        $gender = $(this).val();
        $('.form-check-input').removeClass('active');
        $(this).addClass('active');
        $.get(window.location, {sec: 'secim', data: $gender}).done(function (response) {
            $('#table tbody').empty();
            $.each(response, function (key, value) {
                $('#table tbody').append('<tr>' +
                    '<td>' + value.name + '</td>' +
                    '<td>' + value.cinsiyet + '</td>' +
                    '<td><a href="javascript:void(0)" onclick="deleteFunction(' + value.id + ')"><i class="fa-solid fa-circle-minus"></i></a>' +
                    '<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editFunction(' + value.id + ')">' +
                    '<i class="fa-solid fa-square-pen"></i></a></td>'
                    + '</tr>')
            })
            $('#alert').empty();
            $('#alert').append('<div class="alert alert-success small" role="alert">başarılı</div>');
        })
    });

    $("#idForm").submit(function (e) {
        e.preventDefault();
        //let formData = $(this).serialize();
        let id = $(this).attr('data');
        //let actionUrl = form.attr('action')
        let _token = $("meta[name = csrf-token]").attr('content');
        let name = $("#idForm input[name='name']").val();
        let cinsiyet = $("#idForm select option:selected").val();
        let formData = {
            name: name,
            cinsiyet: cinsiyet
        }
        $.ajax({
            type: 'POST',
            url: "{{route('addPerson')}}",
            data: {formdata: formData, id: id, _token: _token}
        }).done(function (response) {
            console.log(response.data)
            $('#table tbody').empty();
            $.each(response.data, function (key, value) {
                console.log(value.name)
                $('#table tbody').append('<tr>' +
                    '<td>' + value.name + '</td>' +
                    '<td>' + value.cinsiyet + '</td>' +
                    '<td><a href="javascript:void(0)" onclick="deleteFunction(' + value.id + ')"><i class="fa-solid fa-circle-minus"></i></a>' +
                    '<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editFunction(' + value.id + ')">' +
                    '<i class="fa-solid fa-square-pen"></i></a></td>'
                    + '</tr>')
            })
            $('#editModal .close').click();
            $('#alert').empty();
            $('#alert').append('<div class="alert alert-' + response.type + ' small" role="alert">' + response.status + '</div>');

        })
    });
</script>

</body>
</html>

