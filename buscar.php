<?php
    include_once ('api.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ---->Consultar CEP</title>

    <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSS -->
        <link rel="stylesheet" href="style.css">


</head>

<body>

<div class="p-3 mb-2 bg-dark text-white">
<div class="loader"></div>
    <form  method="post">
        <h2> Olá, Digite o CEP para encontrar o endereço: </h2>
        <input type="text" placeholder="Digite um cep..." name="cep">
        <button type="submit" class="btn btn-primary"> Buscar</button>
        
    </form>

    <form>
    <h4> Resultado da sua busca:<br><br>
    <?php if (!empty($endereco)): ?>
        <span class="font-weight-bold">Logradouro: </span> <?php echo $endereco['logradouro']?> <br/>
        <span class="font-weight-bold">Bairro: </span> <?php echo $endereco['bairro']?> <br/>
        <span class="font-weight-bold">Localidade: </span> <?php echo $endereco['localidade']?> <br/>
        <span class="font-weight-bold">Complemento: </span> <?php echo $endereco ['complemento'] ?> <br/>
    <?php endif; ?>
    </div>
    </form>
</body>
</html>

<script>
    < linkrel= "scripts" href="script.js">
   echo '<script>'
               echo 'console.log(greetingMessage());'
               echo '</script>';
</script>