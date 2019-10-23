<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logare api</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body class="container">

<div class="login">
    <h1>Logare</h1>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">Introdu Email</small>
    </div>
    <div class="form-group">
        <label for="password">Parola</label>
        <input type="password" class="form-control password" id="password" placeholder="Parola">
    </div>

    <button type="button" class="btn btn-primary" id="loginBtn">Logare</button>
</div>
<div class="token row">
    <div class="container">
        <h5>Logati-va pentru a primi token</h5>
        <div class="form-group">
            <label for="token">API token</label>
            <input type="text" class="form-control token" id="token" placeholder="Token">
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script >
    document.addEventListener('DOMContentLoaded',function () {
        document.querySelector('#loginBtn').addEventListener('click', function () {
            console.log('apasat pe logare')
            let url = "http://tezas.md/api/login"
            let data = {}
            data.email = document.querySelector('.login .email').value
            data.password = document.querySelector('.login .password').value
            data = JSON.stringify(data);
            $.ajax({
                url:url,
                type:"POST",
                data:data,
                contentType:"application/json",
                dataType:"json",
                success: function(result){
                    document.querySelector('.login').style.display = "none"
                    document.querySelector('#token').value = result.data.api_token
                    localStorage.setItem('token', result.data.api_token)
                    console.log(result.data)
                },
                error: function(data){
                    alert('eroare logare')
                }
            });
        })
    });
</script>
</body>
</html>
