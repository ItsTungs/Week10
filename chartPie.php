<?php
include('koneksi.php');
$data = mysqli_query($koneksi, "SELECT negara, total_cases FROM data_covid ORDER BY total_cases DESC LIMIT 10");

$negara = array();
$total_cases = array();

while ($row = mysqli_fetch_array($data)) {
    $negara[] = $row['negara'];
    $total_cases[] = $row['total_cases'];
}
?>

<!doctype html>
<html>

<head>
    <title>Pie Chart - Perbandingan Total Cases COVID-19</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>

<body>
    <div style="width: 50%">
        <canvas id="pie-chart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('pie-chart').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($negara); ?>,
                datasets: [{
                    data: <?php echo json_encode($total_cases); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>

</html>
