<?= $this->extend('template\base') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Absent Data</h1>
    <p class="mb-4">The attendance form is on a separate link . If you want to see<a target="_blank"
            href="../attendance.php?id=<?= $data ?>"> Here</a> Or Copy Button on navigation. </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($absent)) {
                            echo '<div class="alert alert-warning text-center" role="alert">Data not Result</div>';
                        } else {
                            foreach ($absent as $abs) {
                                echo "<tr>";
                                if (preg_match("/-/", $abs['kodeSiswa'])) {
                                    $posisi = strpos($abs['kodeSiswa'], '-');
                                    $NIM = substr($abs['kodeSiswa'], $posisi + 1);
                                    echo "<td>" . $NIM . "</td>";
                                } else {
                                    echo "<td>" . $abs['kodeSiswa'] . "</td>";
                                    // echo "<td>".$abs['NIM']."</td>";
                                }
                                echo "<td>" . $abs['namaSiswa'] . "</td>";
                                echo "<td>" . $abs['namaMatkul'] . "</td>";
                                echo "<td>" . $abs['tanggal'] . "</td>";
                                echo "<td>";
                                echo "<a href='../proses/delete.php?kode=" . $abs['idAbsen'] . "'  class='btn btn-danger' onclick='return confirm(\"Really delete?\")'>Delate</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>