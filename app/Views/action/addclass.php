<!doctype html>
<html lang="en">

<head>
    <title>ADD CLASS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">ADD CLASS </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Add Class</h3>
                        <form action="/prosesaddclass" method="POST" class="login-form">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <input type="hidden" name="iduser" class="form-control rounded-left" required
                                    value=<?php echo $_SESSION['id'] ?>>
                                <input type="text" name="nama" class="form-control rounded-left" placeholder="CLASS"
                                    required>
                            </div>
                            <?php
                            if (!empty($_SESSION['message'])) {
                                echo '<div class="alert alert-warning text-center" role="alert">' . $_SESSION['message'] . '</div>';
                                unset($_SESSION['message']);
                            }
                            ?>
                            <div class="form-group">
                                <button type="submit"
                                    class="form-control btn btn-primary rounded submit px-3">Submit</button>
                            </div>
                            <div class="row justify-content-center">
                                <span>Don't want to add ? <a href="/class" class="text-center">Come Back</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>