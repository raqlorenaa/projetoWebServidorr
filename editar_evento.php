<?php 
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idevento'])) {
    $idevento = $_POST['idevento'];
    $nova_data_evento = $_POST['nova_data_evento'];
    $nova_desc_evento = $_POST['nova_desc_evento'];
    $novo_idevento = $_POST['novo_idevento'];
    $nova_info_contato = $_POST['nova_info_contato'];
    $novo_local_evento = $_POST['novo_local_evento'];
    $novo_nome_evento = $_POST['novo_nome_evento'];
    $novo_status_proposta = $_POST['novo_status_proposta'];

    $sql_atualizar_evento = "UPDATE proposta_evento SET 
                            data_evento = '$nova_data_evento', 
                            desc_evento = '$nova_desc_evento', 
                            idevento = '$novo_idevento', 
                            info_contato = '$nova_info_contato', 
                            local_evento = '$novo_local_evento', 
                            nome_evento = '$novo_nome_evento',
                            status_proposta = '$novo_status_proposta' 
                            WHERE idevento = $idevento";

    $resultado_evento = $mysqli->query($sql_atualizar_evento);
    if ($resultado_evento) {
        header("Location: paginaadmin.php");
        exit;
    } else {
        echo "Erro ao atualizar evento.";
    }
}

if (isset($_GET['idevento'])) {
    $idevento = $_GET['idevento'];
    $sql_evento = "SELECT * FROM proposta_evento WHERE idevento = $idevento";
    $resultado_evento = $mysqli->query($sql_evento);
    if ($resultado_evento->num_rows == 1) {
        $evento = $resultado_evento->fetch_assoc();
    } else {
        echo "Evento não encontrado.";
    }
} else {
    $evento = [];
    echo "ID do evento não fornecido.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box; 
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            display: inline-block;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box; 
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Editar Evento</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="idevento" value="<?php echo $evento['idevento']; ?>">
            <label for="data_evento">Data do Evento:</label>
            <input type="date" id="data_evento" name="nova_data_evento" value="<?php echo $evento['data_evento']; ?>" required>

            <label for="desc_evento">Descrição do Evento:</label>
            <textarea id="desc_evento" name="nova_desc_evento" rows="4" required><?php echo $evento['desc_evento']; ?></textarea>

            <label for="idevento">ID do Evento:</label>
            <input type="text" id="idevento" name="novo_idevento" value="<?php echo $evento['idevento']; ?>" required>

            <label for="info_contato">Informações de Contato:</label>
            <input type="text" id="info_contato" name="nova_info_contato" value="<?php echo $evento['info_contato']; ?>" required>

            <label for="local_evento">Local do Evento:</label>
            <input type="text" id="local_evento" name="novo_local_evento" value="<?php echo $evento['local_evento']; ?>" required>

            <label for="nome_evento">Nome do Evento:</label>
            <input type="text" id="nome_evento" name="novo_nome_evento" value="<?php echo $evento['nome_evento']; ?>" required>

            <label for="status_proposta">Status da Proposta:</label>
            <select id="status_proposta" name="novo_status_proposta" required>
                <option value="esperando análise" <?php if ($evento['status_proposta'] == 'esperando análise') echo 'selected'; ?>>Esperando análise</option>
                <option value="rejeitado" <?php if ($evento['status_proposta'] == 'rejeitado') echo 'selected'; ?>>Rejeitado</option>
                <option value="em contato" <?php if ($evento['status_proposta'] == 'em contato') echo 'selected'; ?>>Em contato</option>
            </select>

            <input type="submit" value="Salvar">
        </form>
    </div>
</body>

</html>
