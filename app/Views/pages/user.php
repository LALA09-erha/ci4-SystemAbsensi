<?= $this->extend('template\base') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p class="mb-4">The data here is data about user.</p>

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
                            <th>No</th>
                            <th>Role</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        // $sql = "SELECT * FROM users ";
                        // $result = mysqli_query($conn, $sql);
                        // $no = 1;
                        // if (mysqli_num_rows($result) > 0) {
                        //     while ($row = mysqli_fetch_assoc($result)) {
                        //         echo "<tr>";
                        //         echo "<td>" . $no . "</td>";
                        //         echo "<td>" . $row['role'] . "</td>";
                        //         echo "<td>" . $row['username'] . "</td>";
                        //         echo "<td>" . $row['email'] . "</td>";
                        //         #button edit and delete
                        //         echo "<td>";
                        //         echo "<a href='edituser.php?iduser=" . $row['idUser'] . "' class='btn btn-primary m-1'>Edit</a>";
                        //         echo "<a href='../proses/delete.php?iduser=" . $row['idUser'] . "'  class='btn btn-danger' onclick='return confirm(\"Really delete?\")'>Delate</a>";
                        //         echo "</td>";
                        //         echo "</tr>";
                        //         $no++;
                        //     }
                        // } else {
                        //     echo '<div class="alert alert-warning text-center" role="alert">Data not Result</div>';
                        // }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>