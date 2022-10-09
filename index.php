<!DOCTYPE html>
<html lang="en">

<?php require_once('./php/conecta_banco.php');

$sql = $conn->prepare('SELECT * FROM estados');
$sql->execute();
$consulta = $sql->fetchAll(PDO::FETCH_OBJ);

$sql = $conn->prepare('SELECT * FROM rup left join endereco on (rup.id = endereco.fk_rup)');
$sql->execute();
$dadosRup = $sql->fetchAll(PDO::FETCH_OBJ);

/* $sql = $conn->prepare('DELETE FROM rup WHERE nome  ');
$sql->execute();
$deleteRup = $sql-> */

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AULA 4</title>
</head>

<body>
    <div  id="after_submit"></div>
    <form class="containerPrincipal" id="contact_form" action="./php/montarDados.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <label class="required" for="email">CPF/CNPJ:</label><br />
            <input id="email" class="input" name="cpfcnpj" type="text" value="" size="30" /><br />
        </div>
        <div class="row">
            <label class="required" for="name">Nome:</label><br />
            <input id="name" class="input" name="name" type="text" value="" size="30" /><br />
        </div>
        <div class="row">
            <label class="required" for="email">E-mail:</label><br />
            <input id="email" class="input" name="email" type="text" value="" size="30" /><br />
        </div>
        <div class="row">
            <label class="required" for="email">Nascimento:</label><br />
            <input id="email" class="input" name="nascimento" type="text" value="" size="30" /><br />
        </div>
        <div class="row">
            <label class="required" for="email">UF:</label><br />
            <select name="uf" id="uf">
                <?php foreach ($consulta as $uf) { ?>
                    <option value='<?php echo $uf->id ?>'><?php echo $uf->uf ?></option>
                <?php } ?>
            </select>
            <br />
        </div>
        <div class="row">
            <label class="required" for="message">Mensagem:</label><br />
            <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />
        </div>

        <input id="submit_button" type="submit" value="Enviar" />
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Logradouro</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dadosRup as $dado) : ?>
                <tr>
                    <td><?= $dado->nome ?></td>
                    <td><?= $dado->email ?></td>
                    <td><?= $dado->logradouro ?></td>
                    <td><button>Editar</button></td>
                    <td><button>Excluir</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>