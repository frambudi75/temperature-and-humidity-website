<!DOCTYPE html>
<html>
<head>
  <title>Data Suhu dan Grafik</title>
  <div>
  <style>
    /* CSS untuk tabel dan canvas */
    table {
        width: 40%;
        font-size: 12px;
        margin-top: 20px;
    }
    th, td {
        padding: 5px;
        border: 1px solid #ddd;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }

  canvas#suhuChart {
        width: 10px; /* Ubah lebar sesuai kebutuhan */
        height: 240px; /* Ubah tinggi sesuai kebutuhan */
        margin-top: 2px; /* Tambahkan margin atas jika diperlukan */
    }
  </style>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<h2>Data Suhu dan Kelembapan</h2>
<div>
<!-- Form untuk memilih device ID -->
<form method="post" action="">
    <label for="device_id">Pilih ID Perangkat:</label>
    <select name="device_id" id="device_id">
        <option value="1">Device 1</option>
        <option value="2">Device 2</option>
        <option value="3">Device 3</option>
        <!-- Tambahkan opsi lainnya jika ada lebih banyak device -->
    </select>
    <input type="submit" value="Submit" class="select-button">
</form>
</div>
<div>
<table>
  <tr>
    <th>ID</th>
    <th>Suhu (&deg;C)</th>
    <th>Kelembapan (%)</th>
    <th>ID Perangkat</th>
    <th>Waktu</th>
  </tr>

  <!-- PHP untuk menampilkan data -->
  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $device_id = $_POST['device_id'];
        
        function displayData($device_id) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "sensor_data";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, temperature, humidity, device_id, timestamp 
                    FROM sensor_data 
                    WHERE device_id = $device_id 
                    ORDER BY timestamp DESC 
                    LIMIT 10";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["id"]."</td>
                            <td>".$row["temperature"]."</td>
                            <td>".$row["humidity"]."</td>
                            <td>".$row["device_id"]."</td>
                            <td>".$row["timestamp"]."</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data yang ditemukan.</td></tr>";
            }
            $conn->close();
        }
        
        // Tampilkan data untuk device ID yang dipilih
        displayData($device_id);
    }
  ?>
</table>
</div>
<!-- Grafik -->
<div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sensor_data";

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $device_id = $_POST['device_id'];

    $sql = "SELECT temperature, device_id, timestamp 
            FROM sensor_data 
            WHERE device_id = $device_id
            ORDER BY timestamp DESC 
            LIMIT 10";
    $result = $conn->query($sql);

    $temperatureData = [];
    $timestampData = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $temperatureData[] = $row["temperature"];
            $timestampData[] = $row["timestamp"];
        }
    }
}

$conn->close();
?>
</div>
<!-- Element canvas untuk menampilkan grafik suhu -->
<div><canvas id="suhuChart" width="0000.0000001px" height="0000.0000001px"></div>


<script>
    // Data yang diambil dari PHP
    var temperatureData = <?php echo json_encode($temperatureData); ?>;

    // Konfigurasi Chart.js

    var ctx = document.getElementById('suhuChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($timestampData); ?>,
            datasets: [{
                label: 'Suhu (째C)',
                data: temperatureData,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true, // Mengatur agar dimulai dari nol
            // Atau jika ingin mengatur nilai minimum dan maksimum secara manual:
            min: 0, // Nilai minimum
            max: 50, // Nilai maksimum
                }
            }
        }
    });
</script>
</canvas>


 <script>
    function refreshPage() {
        location.reload(); // Memuat ulang halaman
    }

    // Setelah 10 detik, panggil fungsi refreshPage
    setTimeout(refreshPage, 300000);
</script>
</body>
</html>
