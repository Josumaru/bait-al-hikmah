<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="col-md-12">
        <div class="col-md-4">&nbsp;</div>
        <div class="col-md-4">
            <h3>Isikan data Anda di sini</h3>
            <form method="post" action="/mvc-example/?act=simpan">
                <div class="form-group">
                    <label for="exampleInputNim">NIM</label>
                    <input type="text" class="form-control" id="exampleInputNim" name="nim" placeholder="NIM">
                </div>
                <div class="form-group">
                    <label for="exampleInputNama">Nama</label>
                    <input type="text" class="form-control" id="exampleInputNama" name="nama" placeholder="Nama">
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <br />
            <a href="/mvc-example/?act=tampil-data">Lihat Hasil Input</a>
        </div>
        <div class="col-md-4">&nbsp;</div>
    </div>
</body>

</html>