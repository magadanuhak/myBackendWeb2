<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lucru cu api</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body class="container">
<div class="register">
    <h1>Seteaza adresa catre serverul backend</h1>
    <div class="form-group">
        <label for="exampleInputName">adresa in format : http://numesite/</label>
        <input type="text" class="form-control addres" id="exampleInputName" aria-describedby="emailHelp" placeholder="Introdu nume">
    </div>
    <button type="button" class="btn btn-primary" id="setup">Seteaza</button>
</div>

<script >
    document.addEventListener('DOMContentLoaded',function () {
        document.querySelector('#setup').addEventListener('click', function () {
            localStorage.setItem('site', document.querySelector('.addres').value);
            document.location.href ="/"
        })
    });
</script>
</body>
</html>
