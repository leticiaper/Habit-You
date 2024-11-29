<?php

    include 'php/config.php';
    session_start();

    if((!isset($_SESSION['login']) === true) || (!isset($_SESSION['senha']) === true)){
        session_unset();
        session_destroy();
        echo `
            <script>
                window.location.href = 'index.php'
            </script>
        `;
    }

    $id = $_SESSION['id'];

    function buscarProgresso($categoria, $dias, $conecta, $id) {
        $sql = "
            SELECT 
                DATE(data_criacao) AS data, 
                COUNT(*) AS total 
            FROM 
                metas 
            WHERE 
                categoria = '$categoria' 
                AND fk_user =  $id
                AND status_meta = 'concluida' 
                AND data_criacao >= DATE_SUB(CURDATE(), INTERVAL $dias DAY)
            GROUP BY 
                DATE(data_criacao)
            ORDER BY 
                data ASC;
        ";
        return $conecta->query($sql);
    }

    $progressoAnual = buscarProgresso('anual', 365, $conecta, $id);
    $datas = [];
    $totais = [];

    while ($row = $progressoAnual->fetch_assoc()) {
        $datas[] = $row['data'];
        $totais[] = $row['total'];
    }
    


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Anual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/relatorios.css">
</head>
<body class="container-fluid">
    <div class="row">
        <header class="container-fluid nav-container">
            <nav class="navbar">
                <ul class="navbar-nav ml-auto">
                    <div class="nav-item" >
                        <a class = "home"href="index.php">
                            <h3>|Habit You</h3>
                        </a>
                    </div> 
                </ul>
            </nav>
        </header>
    </div>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <h1 class="titulo">Relatório de Progresso Anual</h1>
            <canvas id="graficoAnual" width="400" height="200"></canvas>
        </div>
        <div class="col-lg-2"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        const ctx = document.getElementById('graficoAnual').getContext('2d');
        const graficoAnual = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($datas) ?>,
                datasets: [{
                    label: 'Progresso Anual',
                    data: <?= json_encode($totais) ?>,
                    backgroundColor: 'rgba(255, 159, 64, 0.5)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1,
                    barThickness: 50, // Define a espessura fixa das barras
                    maxBarThickness: 50, // Espessura máxima (se responsivo)
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>