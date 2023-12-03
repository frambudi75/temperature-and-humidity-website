<title> Contoh Monitoring Suhu</title>
<h6> <center> Daftar Suhu berdasarkan ID perangkat </center> <h6>
<center><?php
// koneksi ke database
$servername = "localhost"; // sesuaikan dengan nama server MySQL pada XAMPP Anda
$username = "root"; // sesuaikan dengan nama pengguna database yang telah dibuat pada XAMPP Anda
$password = ""; // sesuaikan dengan kata sandi pengguna database yang telah dibuat pada XAMPP Anda
$dbname = "my_database"; // sesuaikan dengan nama database yang telah dibuat pada XAMPP Anda

// membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// query untuk menampilkan data suhu terbaru dari tabel sensor_data

//$sql = "SELECT temperature, timestamp FROM suhu_new WHERE device_id='1' ORDER BY id DESC LIMIT 1";
$sql = "SELECT temperature, timestamp, device_id FROM sensor_data WHERE device_id='1' ORDER BY id DESC LIMIT 1";

// mengeksekusi query dan menyimpan hasilnya dalam variabel $result
$result = $conn->query($sql);

// mengecek apakah query berhasil dieksekusi
if ($result->num_rows > 0) {
    // output data suhu dan waktu dari baris hasil query dalam tabel HTML

    echo "<table border=''>
    <tr>
    <th>&nbsp;&nbsp;Suhu&nbsp;&nbsp;</th>
    <th>Waktu</th>
    <th>device id</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["temperature"] . "</td>";
        echo "<td>" . $row["timestamp"] . "</td>";
        echo "<td>" . $row["device_id"] . "</td>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data suhu yang ditemukan.";
}

// menutup koneksi
$conn->close();
?> </center>
 <center><?php
// koneksi ke database
$servername = "localhost"; // sesuaikan dengan nama server MySQL pada XAMPP Anda
$username = "root"; // sesuaikan dengan nama pengguna database yang telah dibuat pada XAMPP Anda
$password = ""; // sesuaikan dengan kata sandi pengguna database yang telah dibuat pada XAMPP Anda
$dbname = "my_database"; // sesuaikan dengan nama database yang telah dibuat pada XAMPP Anda

// membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// query untuk menampilkan data suhu terbaru dari tabel sensor_data

//$sql = "SELECT temperature, timestamp FROM suhu_new WHERE device_id='1' ORDER BY id DESC LIMIT 1";
$sql = "SELECT temperature, timestamp, device_id FROM sensor_data WHERE device_id='2' ORDER BY id DESC LIMIT 1";

// mengeksekusi query dan menyimpan hasilnya dalam variabel $result
$result = $conn->query($sql);

// mengecek apakah query berhasil dieksekusi
if ($result->num_rows > 0) {
    // output data suhu dan waktu dari baris hasil query dalam tabel HTML

    echo "<table border=''>
    <tr>
    <th>&nbsp;&nbsp;Suhu&nbsp;&nbsp;</th>
    <th>Waktu</th>
    <th>device id</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["temperature"] . "</td>";
        echo "<td>" . $row["timestamp"] . "</td>";
        echo "<td>" . $row["device_id"] . "</td>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data suhu yang ditemukan.";
}

// menutup koneksi
$conn->close();
?> </center>
<center><?php
// koneksi ke database
$servername = "localhost"; // sesuaikan dengan nama server MySQL pada XAMPP Anda
$username = "root"; // sesuaikan dengan nama pengguna database yang telah dibuat pada XAMPP Anda
$password = ""; // sesuaikan dengan kata sandi pengguna database yang telah dibuat pada XAMPP Anda
$dbname = "my_database"; // sesuaikan dengan nama database yang telah dibuat pada XAMPP Anda

// membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// query untuk menampilkan data suhu terbaru dari tabel sensor_data

//$sql = "SELECT temperature, timestamp FROM suhu_new WHERE device_id='1' ORDER BY id DESC LIMIT 1";
$sql = "SELECT temperature, timestamp, device_id FROM sensor_data WHERE device_id='3' ORDER BY id DESC LIMIT 1";

// mengeksekusi query dan menyimpan hasilnya dalam variabel $result
$result = $conn->query($sql);

// mengecek apakah query berhasil dieksekusi
if ($result->num_rows > 0) {
    // output data suhu dan waktu dari baris hasil query dalam tabel HTML

    echo "<table border=''>
    <tr>
    <th>&nbsp;&nbsp;Suhu&nbsp;&nbsp;</th>
    <th>Waktu</th>
    <th>device id</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["temperature"] . "</td>";
        echo "<td>" . $row["timestamp"] . "</td>";
        echo "<td>" . $row["device_id"] . "</td>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data suhu yang ditemukan.";
}

// menutup koneksi
$conn->close();
?> </center>
<script>
// merefresh halaman setiap 5 detik
setInterval(function(){
    location.reload();
}, 30000);
</script>
