<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Input PHP</title>
</head>
<body>

    <h1>Program PHP Sederhana</h1>

    <?php
    // Inisialisasi variabel
    $nama = "";
    $tanggal_lahir = "";
    $pekerjaan = "";
    $umur = 0;
    $gaji = 0;

    // Cek apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai dari form
        $nama = isset($_POST["nama"]) ? htmlspecialchars($_POST["nama"]) : "";
        $tanggal_lahir = isset($_POST["tanggal_lahir"]) ? $_POST["tanggal_lahir"] : "";
        $pekerjaan = isset($_POST["pekerjaan"]) ? $_POST["pekerjaan"] : "";

        // Perhitungan umur berdasarkan tanggal lahir
        $tanggal_lahir_obj = new DateTime($tanggal_lahir);
        $sekarang = new DateTime();
        $umur = $sekarang->diff($tanggal_lahir_obj)->y;

        // Penentuan gaji berdasarkan pekerjaan
        switch ($pekerjaan) {
            case 'Programmer':
                $gaji = 5000000;
                break;
            case 'Desainer':
                $gaji = 4500000;
                break;
            case 'Marketing':
                $gaji = 4000000;
                break;
            default:
                $gaji = 0;
                break;
        }
    }
    ?>

    <form method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required>
        
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" required>
        
        <label for="pekerjaan">Pekerjaan:</label>
        <select id="pekerjaan" name="pekerjaan" required>
            <option value="Programmer">Programmer</option>
            <option value="Desainer">Desainer</option>
            <option value="Marketing">Marketing</option>
        </select>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    // Tampilkan output
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Output:</h2>";
        echo "Nama: $nama <br>";
        echo "Tanggal Lahir: $tanggal_lahir <br>";
        echo "Umur: $umur tahun <br>";
        echo "Pekerjaan: $pekerjaan <br>";
        echo "Gaji: Rp. " . number_format($gaji, 0, ',', '.') . ",00";
    }
    ?>

</body>
</html>
