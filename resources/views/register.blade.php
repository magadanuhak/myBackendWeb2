<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lucru cu api</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body class="container">
<div class="register">
    <h1>Inregistrare</h1>
    <div class="form-group">
        <label for="exampleInputName">Name</label>
        <input type="text" class="form-control name" id="exampleInputName" aria-describedby="emailHelp" placeholder="Introdu nume">
        <small id="emailHelp" class="form-text text-muted">Introdu Nume</small>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">Introdu Email</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Parola</label>
        <input type="password" class="form-control password" id="exampleInputPassword1" placeholder="Parola">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Re-introdu Parola</label>
        <input type="password" class="form-control password_confirmation"  placeholder=" Reintrodu parola">
    </div>
    <button type="button" class="btn btn-primary" id="registerBtn">Inregistrare</button>
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
        document.querySelector('#registerBtn').addEventListener('click', function () {
            console.log('apasat pe inregistrare');
            let url = "http://myorar/register";
            let data = {};
            data.name = document.querySelector('.register .name').value;
            data.email = document.querySelector('.register .email').value;
            data.password = document.querySelector('.register .password').value;
            data.password_confirmation = document.querySelector('.register .password_confirmation').value;
            data = JSON.stringify(data);
            $.ajax({
                url:url,
                type:"POST",
                data:data,
                contentType:"application/json",
                dataType:"json",
                success: function(result){
                    document.querySelector('.register').style.display = "none"
                    document.querySelector('#token').value = result.data.api_token
                    localStorage.setItem('token', result.data.api_token)
                    document.location.href = "/"
                },
                error: function(data){
                    // document.body.innerText =`E-mail se repeta!`;
                }
            });
        })
    });
</script>
</body>
</html>
