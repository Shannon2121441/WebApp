<!DOCTYPE html>
<html>
<head>
    <title>KM9 Minimart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300&family=Geologica&family=Quicksand:wght@500&family=Rubik&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<canvas id="myChart" width="400" height="400"></canvas>
</body>
</html>
<?php
$labels = [];            // Array to store product labels
$receivedData = [];      // Array to store received data
$releasedData = [];      // Array to store released data
$inStockData = [];       // Array to store in-stock data

if ($inventory->list_instock() != false) {
    foreach ($inventory->list_instock() as $value) {
        extract($value);
        $labels[] = $prod_name;
        $receivedData[] = $inventory->get_product_receive_inv($prod_id);
        $releasedData[] = $inventory->get_product_release_inv($prod_id);
        $inStockData[] = $inventory->get_product_receive_inv($prod_id) - $inventory->get_product_release_inv($prod_id);
    }
}
?>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [
                {
                    label: 'Received',
                    data: <?php echo json_encode($receivedData); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)'
                },
                {
                    label: 'Released',
                    data: <?php echo json_encode($releasedData); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)'
                },
                {
                    label: 'In stock',
                    data: <?php echo json_encode($inStockData); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)'
                }
            ]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>