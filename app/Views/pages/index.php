<?= $this->extend('template\base') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p class="mb-4">The data here is data about student absentee.</p>

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
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (empty($mahasiswa)) {
                            echo '<div class="alert alert-warning text-center" role="alert">Data not Result</div>';
                        } else {
                            // dd($mahasiswa);
                            foreach ($mahasiswa as $mhs) {
                                echo "<tr>";
                                if (preg_match("/-/", $mhs['IDSISWA'])) {
                                    $posisi = strpos($mhs['IDSISWA'], '-');
                                    $NIM = substr($mhs['IDSISWA'], $posisi + 1);
                                    echo "<td>" . $NIM . "</td>";
                                } else {
                                    echo "<td>" . $mhs['IDSISWA'] . "</td>";
                                }
                                echo "<td>" . $mhs['NAMASISWA'] . "</td>";
                                #button edit and delete
                                echo "<td>";
                                echo "<a href='/editstudent/" .session()->get('id')."/". $mhs['IDSISWA'] . "' class='btn btn-primary m-1'>Edit</a>";
                                echo "<a href='/deletestudent/".session()->get('id')."/" . $mhs['IDSISWA'] . "'  onclick=confirm('"."SURE?"."')  class='btn btn-danger' onclick='return confirm(\"Really delete?\")'>Delate</a>";
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