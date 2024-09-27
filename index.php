<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CAVALCANNTE</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Cadastro de Vinho</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">


        Nome: <input type="text" name="nome"><br>


        Tipo: 
        <select name="tipo">
            <option value="Vinho Tinto">Vinho Tinto</option>
            <option value="Vinho Branco">Vinho Branco</option>
            <option value="Vinho Rosé">Vinho Rosé</option>
            <option value="Vinho Espumante">Vinho Espumante</option>
            <option value="Vinho Licoroso/Fortificado">Vinho Licoroso/Fortificado</option>
            <option value="Vinho Seco">Vinho Seco</option>
            <option value="Vinho Suave">Vinho Suave</option>
            <option value="Vinho Doce">Vinho Doce</option>
        </select><br>


        Preço: <input type="text" name="preco"><br>

        <!--Não nego aqui tive que apelar para o famoso, mais não é tão difícil quanto imaginei -->
        Data:  
        <select name="data">
            <?php 
            $anoAt = date("Y");
            for ($ano = $anoAt; $ano >= 1850; $ano--) {
                echo "<option value='$ano'>$ano</option>";
            }
            ?>

        </select><br>
        <input type="submit" value="Cadastrar Vinho">
    </form>


    <?php
    require_once('Vinho.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $preco = $_POST['preco'];
        $data = $_POST['data'];

        $vinho = new Vinho($nome, $tipo, $preco, $data);
        echo "<p>".$vinho->texto()."</p>";

        if ($vinho->desconto($preco)) {
            echo '<p>Produto a preço de banana "Oferta"!</p>';
        } else {
            echo '<p>Sem desconto senta e chora "Valor Normal"!</p>';
        }
    }
    ?>
</body>
</html>
