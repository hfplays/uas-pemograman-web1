<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HF Plays</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <?php

        include "connect.php";

        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if (isset($_GET['id_mahasiswa'])) {
            $id_mahasiswa = input($_GET["id_mahasiswa"]);

            $sql = "select * from mahasiswa where id_mahasiswa=$id_mahasiswa";
            $hasil = mysqli_query($kon, $sql);
            $data = mysqli_fetch_assoc($hasil);


        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id_mahasiswa = htmlspecialchars($_POST["id_mahasiswa"]);
            $nama = input($_POST["nama"]);
            $prodi = input($_POST["prodi"]);
            $asal_sekolah = input($_POST["asal_sekolah"]);
            $no_hp = input($_POST["no_hp"]);
            $alamat = input($_POST["alamat"]);

            $sql = "update mahasiswa set
			nama='$nama',
			prodi='$prodi',
			asal_sekolah='$asal_sekolah',
			no_hp='$no_hp',
			alamat='$alamat'
			where id_mahasiswa=$id_mahasiswa";

            $hasil = mysqli_query($kon, $sql);

            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

            }

        }

        ?>
        <br>
        <h2>Update Data</h2>
        <br>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama"
                    value="<?php echo htmlspecialchars($data['nama']); ?>" required />

            </div>
            <div class="form-group">
                <label>Program Studi:</label>
                <input type="text" name="prodi" class="form-control" placeholder="Masukan Nama Sekolah"
                    value="<?php echo htmlspecialchars($data['prodi']); ?>" required />
            </div>
            <div class="form-group">
                <label>Asal Sekolah:</label>
                <input type="text" name="asal_sekolah" class="form-control" placeholder="Masukan Jurusan"
                    value="<?php echo htmlspecialchars($data['asal_sekolah']); ?>" required />
            </div>
            <div class="form-group">
                <label>No HP:</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP"
                    value="<?php echo htmlspecialchars($data['no_hp']); ?>" required />
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <textarea name="alamat" class="form-control" rows="5" placeholder="Masukan Alamat"
                    required><?php echo htmlspecialchars($data['alamat']); ?></textarea>
            </div>

            <input type="hidden" name="id_mahasiswa" value="<?php echo $data['id_mahasiswa']; ?>" />

            <div class="form-actions">
                <button type="submit" name="submit" class="btn-submit">Submit</button>
                <a href="index.php" class="btn-cancel">Batal</a>
            </div>
        </form>
        <br>
    </div>
    <div class="footer-bottom">
        <p>&copy;2026 HF Plays. All Rights Reserved.</p>
    </div>
    </footer>
</body>

</html>