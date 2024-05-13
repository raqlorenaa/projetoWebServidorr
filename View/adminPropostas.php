<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../conexao.php';

use App\Controller\PropostaEventoController;

$propostaEventoController = new PropostaEventoController($mysqli);
$propostas = $propostaEventoController->lerPropostas();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update'])) {
        $idevento = $_POST['idevento'];
        $desc_evento = $_POST['desc_evento'];
        $data_evento = $_POST['data_evento'];
        $local_evento = $_POST['local_evento'];
        $info_contato = $_POST['info_contato'];
        $status_proposta = $_POST['status_proposta'];
        echo $propostaEventoController->atualizarProposta($idevento, $desc_evento, $data_evento, $local_evento, $info_contato, $status_proposta);
    } elseif (isset($_POST['delete'])) {
        $idevento = $_POST['idevento'];
        echo $propostaEventoController->deletarProposta($idevento);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerenciar Propostas de Evento</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        h1 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #3a3a3a;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333333;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #2c2c2c;
        }

        tr:hover {
            background-color: #3a3a3a;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        form {
            display: flex;
            align-items: center;
        }

        form td {
            padding: 5px;
        }

        select, input[type="text"], input[type="email"], input[type="date"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
            background-color: #333333;
            border: 1px solid #4a4a4a;
            border-radius: 5px;
            color: #ffffff;
        }

        select:focus, input[type="text"]:focus, input[type="email"]:focus, input[type="date"]:focus {
            border-color: #80bdff;
            outline: none;
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            th, td {
                padding: 8px;
            }

            button {
                padding: 8px 12px;
                font-size: 12px;
            }

            select, input[type="text"], input[type="email"], input[type="date"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerenciar Propostas de Evento</h1>
        <table border="1">
            <tr>
                <th>ID Evento</th>
                <th>Descrição do Evento</th>
                <th>Data do Evento</th>
                <th>Local do Evento</th>
                <th>Informações de Contato</th>
                <th>Status da Proposta</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($propostas as $proposta): ?>
            <tr>
                <form method="post">
                    <td><input type="hidden" name="idevento" value="<?= $proposta['idevento'] ?>"><?= $proposta['idevento'] ?></td>
                    <td><input type="text" name="desc_evento" value="<?= $proposta['desc_evento'] ?>"></td>
                    <td><input type="date" name="data_evento" value="<?= $proposta['data_evento'] ?>"></td>
                    <td><input type="text" name="local_evento" value="<?= $proposta['local_evento'] ?>"></td>
                    <td><input type="text" name="info_contato" value="<?= $proposta['info_contato'] ?>"></td>
                    <td>
                        <select name="status_proposta">
                            <option value="esperando análise" <?= $proposta['status_proposta'] == 'esperando análise' ? 'selected' : '' ?>>Esperando Análise</option>
                            <option value="rejeitado" <?= $proposta['status_proposta'] == 'rejeitado' ? 'selected' : '' ?>>Rejeitado</option>
                            <option value="em contato" <?= $proposta['status_proposta'] == 'em contato' ? 'selected' : '' ?>>Em Contato</option>
                        </select>
                    </td>
                    <td>
                        <button type="submit" name="update">Atualizar</button>
                        <button type="submit" name="delete">Deletar</button>
                    </td>
                </form>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
