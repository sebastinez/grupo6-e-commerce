<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Agregar Disco</h1>
        <form action="/albums" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input name="name" type="text" class="form-control"
                    id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Release Date</label>
                <input name="release_date" type="date" class="form-control"
                    id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Label</label>
                <input name="label" type="text" class="form-control"
                    id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Cover</label>
                <input name="cover" type="text" class="form-control"
                    id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Total Tracks</label>
                <input name="total_tracks" type="number" class="form-control"
                    id="exampleFormControlInput1">
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
</body>

</html>