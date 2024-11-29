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

    $progressoSemanal = buscarProgresso('semanal', 7, $conecta, $id);
    $datas = [];
    $totais = [];

    while ($row = $progressoSemanal->fetch_assoc()) {
        $datas[] = $row['data'];
        $totais[] = $row['total'];
    }
    


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Semanal</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Relatório de Progresso Semanal</h1>
    <canvas id="graficoSemanal" width="400" height="200"></canvas>
    <script>
        const ctx = document.getElementById('graficoSemanal').getContext('2d');
        const graficoSemanal = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($datas) ?>,
                datasets: [{
                    label: 'Progresso Semanal',
                    data: <?= json_encode($totais) ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
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