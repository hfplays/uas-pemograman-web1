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
    <nav class="navbar">
        <span>UAS Hilmi Fauzan</span>
        </div>
    </nav>
    <div class="container">
        <br>
        <h4>
            <center>DAFTAR MAHASISWA BARU</center>
        </h4>
        <?php

        include "connect.php";

        if (isset($_GET['id_mahasiswa'])) {
            $id_mahasiswa = (int) $_GET['id_mahasiswa'];

            $sql = "DELETE FROM mahasiswa WHERE id_mahasiswa=$id_mahasiswa";
            $hasil = mysqli_query($kon, $sql);

            if ($hasil) {
                header("Location: index.php");
                exit;
            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }
        ?>


        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Asal Sekolah</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "connect.php";
                    $sql = "select * from mahasiswa order by id_mahasiswa desc";

                    $hasil = mysqli_query($kon, $sql);
                    $no = 0;
                    while ($data = mysqli_fetch_array($hasil)) {
                        $no++;
                        ?>
                        <tr>
                            <td data-label="No"><?php echo $no; ?></td>
                            <td data-label="Nama"><?php echo htmlspecialchars($data["nama"]); ?></td>
                            <td data-label="Program Studi"><?php echo htmlspecialchars($data["prodi"]); ?></td>
                            <td data-label="Asal Sekolah"><?php echo htmlspecialchars($data["asal_sekolah"]); ?></td>
                            <td data-label="No Hp"><?php echo htmlspecialchars($data["no_hp"]); ?></td>
                            <td data-label="Alamat"><?php echo htmlspecialchars($data["alamat"]); ?></td>
                            <td data-label="Aksi">
                                <div class="actions">
                                    <a href="update.php?id_mahasiswa=<?php echo htmlspecialchars($data['id_mahasiswa']); ?>"
                                        class="btn-update">Update</a>
                                    <a href="index.php?id_mahasiswa=<?php echo htmlspecialchars($data['id_mahasiswa']); ?>"
                                        class="btn-delete" onclick="return confirm('Hapus data ini?')">Delete</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="action-row">
            <a href="create.php" class="btn-tambah-data btn-submit">Tambah Data</a>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy;2026 HF Plays. All Rights Reserved.</p>
    </div>
    </footer>
</body>

</html>