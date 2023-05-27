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
    <title>Bar Chart - Perbandingan Total Cases COVID-19</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>

<body>
    <div style="width: 50%">
        <canvas id="bar-chart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('bar-chart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($negara); ?>,
                datasets: [{
                    label: 'Total Cases',
                    data: <?php echo json_encode($total_cases); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
