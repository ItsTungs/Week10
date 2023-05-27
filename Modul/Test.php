<?php
include('koneksi.php');
$data = mysqli_query($koneksi, "SELECT negara, total_cases, new_cases, total_death, new_death, total_recovered, active_cases FROM data_covid ORDER BY total_cases DESC LIMIT 10");

$negara = array();
$total_cases = array();
$new_cases = array();
$total_death = array();
$new_death = array();
$total_recovered = array();
$active_cases = array();

while ($row = mysqli_fetch_array($data)) {
    $negara[] = $row['negara'];
    $total_cases[] = $row['total_cases'];
    $new_cases[] = $row['new_cases'];
    $total_death[] = $row['total_death'];
    $new_death[] = $row['new_death'];
    $total_recovered[] = $row['total_recovered'];
    $active_cases[] = $row['active_cases'];
}
?>

<!doctype html>
<html>

<head>
    <title>Data Covid-19</title>
    <script type="text/javascript" src="Chart.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <!-- Bar Chart - All Cases -->
            <div class="col-md-6">
                <h3>Bar Chart</h3>
                <canvas id="bar-chart"></canvas>
            </div>

            <!-- Line Chart - All Cases -->
            <div class="col-md-6">
                <h3>Line Chart</h3>
                <canvas id="line-chart"></canvas>
            </div>
        </div>

        <div class="row">
            <!-- Pie Chart - Total Cases -->
            <div class="col-md-6">
                <h3>Total Cases</h3>
                <canvas id="pie-chart-total-cases"></canvas>
            </div>

            <!-- Doughnut Chart - Total Cases -->
            <div class="col-md-6">
                <h3>Total Cases</h3>
                <canvas id="doughnut-chart-total-cases"></canvas>
            </div>
        </div>

        <div class="row">
            <!-- Pie Chart - New Cases -->
            <div class="col-md-6">
                <h3>New Cases</h3>
                <canvas id="pie-chart-new-cases"></canvas>
            </div>

            <!-- Doughnut Chart - New Cases -->
            <div class="col-md-6">
                <h3>New Cases</h3>
                <canvas id="doughnut-chart-new-cases"></canvas>
            </div>
        </div>

        <div class="row">
            <!-- Pie Chart - Total Death -->
            <div class="col-md-6">
                <h3>Total Death</h3>
                <canvas id="pie-chart-total-death"></canvas>
            </div>

            <!-- Doughnut Chart - Total Death -->
            <div class="col-md-6">
                <h3>Total Death</h3>
                <canvas id="doughnut-chart-total-death"></canvas>
            </div>
        </div>

        <div class="row">
            <!-- Pie Chart - New Death -->
            <div class="col-md-6">
                <h3>New Death</h3>
                <canvas id="pie-chart-new-death"></canvas>
            </div>

            <!-- Doughnut Chart - New Death -->
            <div class="col-md-6">
                <h3>New Death</h3>
                <canvas id="doughnut-chart-new-death"></canvas>
            </div>
        </div>

        <div class="row">
            <!-- Pie Chart - Total Recovered -->
            <div class="col-md-6">
                <h3>Total Recovered</h3>
                <canvas id="pie-chart-total-recovered"></canvas>
            </div>

            <!-- Doughnut Chart - Total Recovered -->
            <div class="col-md-6">
                <h3>Total Recovered</h3>
                <canvas id="doughnut-chart-total-recovered"></canvas>
            </div>
        </div>


        <div class="row">
            <!-- Pie Chart - Active Cases -->
            <div class="col-md-6">
                <h3>Active Cases</h3>
                <canvas id="pie-chart-active-cases"></canvas>
            </div>

            <!-- Doughnut Chart - Active Cases -->
            <div class="col-md-6">
                <h3>Active Cases</h3>
                <canvas id="doughnut-chart-active-cases"></canvas>
            </div>
        </div>
        <script>
            var ctxBar = document.getElementById('bar-chart').getContext('2d');
            var barChart = new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($negara); ?>,
                    datasets: [{
                        label: 'Total Cases',
                        data: <?php echo json_encode($total_cases); ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }, {
                        label: 'New Cases',
                        data: <?php echo json_encode($new_cases); ?>,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Total Death',
                        data: <?php echo json_encode($total_death); ?>,
                        backgroundColor: 'rgba(255, 205, 86, 0.5)',
                        borderColor: 'rgba(255, 205, 86, 1)',
                        borderWidth: 1
                    }, {
                        label: 'New Death',
                        data: <?php echo json_encode($new_death); ?>,
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Total Recovered',
                        data: <?php echo json_encode($total_recovered); ?>,
                        backgroundColor: 'rgba(153, 102, 255, 0.5)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Active Cases',
                        data: <?php echo json_encode($active_cases); ?>,
                        backgroundColor: 'rgba(255, 159, 64, 0.5)',
                        borderColor: 'rgba(255, 159, 64, 1)',
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

            var ctxLine = document.getElementById('line-chart').getContext('2d');
            var lineChart = new Chart(ctxLine, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($negara); ?>,
                    datasets: [{
                        label: 'Total Cases',
                        data: <?php echo json_encode($total_cases); ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        fill: false
                    }, {
                        label: 'New Cases',
                        data: <?php echo json_encode($new_cases); ?>,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        fill: false
                    }, {
                        label: 'Total Death',
                        data: <?php echo json_encode($total_death); ?>,
                        backgroundColor: 'rgba(255, 205, 86, 0.5)',
                        borderColor: 'rgba(255, 205, 86, 1)',
                        borderWidth: 1,
                        fill: false
                    }, {
                        label: 'New Death',
                        data: <?php echo json_encode($new_death); ?>,
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false
                    }, {
                        label: 'Total Recovered',
                        data: <?php echo json_encode($total_recovered); ?>,
                        backgroundColor: 'rgba(153, 102, 255, 0.5)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1,
                        fill: false
                    }, {
                        label: 'Active Cases',
                        data: <?php echo json_encode($active_cases); ?>,
                        backgroundColor: 'rgba(255, 159, 64, 0.5)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1,
                        fill: false
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

            // Pie Chart - Total Cases
            var ctxPieTotalCases = document.getElementById('pie-chart-total-cases').getContext('2d');
            var pieChartTotalCases = new Chart(ctxPieTotalCases, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($negara); ?>,
                    datasets: [{
                        label: 'Total Cases',
                        data: <?php echo json_encode($total_cases); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Total Cases',
                            position: 'bottom'
                        }
                    }
                }
            });

            // Pie Chart - Total Cases
            var ctxPieTotalCases = document.getElementById('pie-chart-total-cases').getContext('2d');
            var pieChartTotalCases = new Chart(ctxPieTotalCases, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($negara); ?>,
                    datasets: [{
                        label: 'Total Cases',
                        data: <?php echo json_encode($total_cases); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Total Cases',
                            position: 'bottom'
                        }
                    }
                }
            });


            // Doughnut Chart - Total Cases
            var ctxDoughnutTotalCases = document.getElementById('doughnut-chart-total-cases').getContext('2d');
            var doughnutChartTotalCases = new Chart(ctxDoughnutTotalCases, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode($negara); ?>,
                    datasets: [{
                        label: 'Total Cases',
                        data: <?php echo json_encode($total_cases); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Pie Chart - New Cases
            var ctxPieNewCases = document.getElementById('pie-chart-new-cases').getContext('2d');
            var pieChartNewCases = new Chart(ctxPieNewCases, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($negara); ?>,
                    datasets: [{
                        label: 'New Cases',
                        data: <?php echo json_encode($new_cases); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Doughnut Chart - New Cases
            var ctxDoughnutNewCases = document.getElementById('doughnut-chart-new-cases').getContext('2d');
            var doughnutChartNewCases = new Chart(ctxDoughnutNewCases, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode($negara); ?>,
                    datasets: [{
                        label: 'New Cases',
                        data: <?php echo json_encode($new_cases); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Pie Chart - Total Death
            var ctxPieTotalDeath = document.getElementById('pie-chart-total-death').getContext('2d');
            var pieChartTotalDeath = new Chart(ctxPieTotalDeath, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($negara); ?>,
                    datasets: [{
                        label: 'Total Death',
                        data: <?php echo json_encode($total_death); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Doughnut Chart - Total Death
            var ctxDoughnutTotalDeath = document.getElementById('doughnut-chart-total-death').getContext('2d');
            var doughnutChartTotalDeath = new Chart(ctxDoughnutTotalDeath, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode($negara); ?>,
                    datasets: [{
                        label: 'Total Death',
                        data: <?php echo json_encode($total_death); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Pie Chart - New Death
            var ctxPieNewDeath = document.getElementById('pie-chart-new-death').getContext('2d');
            var pieChartNewDeath = new Chart(ctxPieNewDeath, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($negara); ?>,
                    datasets: [{
                        label: 'New Death',
                        data: <?php echo json_encode($new_death); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Doughnut Chart - New Death
            var ctxDoughnutNewDeath = document.getElementById('doughnut-chart-new-death').getContext('2d');
            var doughnutChartNewDeath = new Chart(ctxDoughnutNewDeath, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode($negara); ?>,
                    datasets: [{
                        label: 'New Death',
                        data: <?php echo json_encode($new_death); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Pie Chart - Total Recovered
            var ctxPieTotalRecovered = document.getElementById('pie-chart-total-recovered').getContext('2d');
            var pieChartTotalRecovered = new Chart(ctxPieTotalRecovered, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($negara); ?>,
                    datasets: [{
                        label: 'Total Recovered',
                        data: <?php echo json_encode($total_recovered); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Doughnut Chart - Total Recovered
            var ctxDoughnutTotalRecovered = document.getElementById('doughnut-chart-total-recovered').getContext('2d');
            var doughnutChartTotalRecovered = new Chart(ctxDoughnutTotalRecovered, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode($negara); ?>,
                    datasets: [{
                        label: 'Total Recovered',
                        data: <?php echo json_encode($total_recovered); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Pie Chart - Active Cases
            var ctxPieActiveCases = document.getElementById('pie-chart-active-cases').getContext('2d');
            var pieChartActiveCases = new Chart(ctxPieActiveCases, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($negara); ?>,
                    datasets: [{
                        label: 'Active Cases',
                        data: <?php echo json_encode($active_cases); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Doughnut Chart - Active Cases
            var ctxDoughnutActiveCases = document.getElementById('doughnut-chart-active-cases').getContext('2d');
            var doughnutChartActiveCases = new Chart(ctxDoughnutActiveCases, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode($negara); ?>,
                    datasets: [{
                        label: 'Active Cases',
                        data: <?php echo json_encode($active_cases); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });
        </script>

        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>