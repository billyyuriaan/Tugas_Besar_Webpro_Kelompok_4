<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/bootstrap.min.css">

    <!-- Datatables -->
    <link rel="stylesheet" href="<?= base_url()?>assets/datatable/css/datatables.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/index.css">

    <!-- Jquery -->
    <script src="<?= base_url() ?>assets/jquery/js/jquery.min.js"></script>

    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/datatable/js/datatables.min.js"></script>

    <script>
        $(document).ready(() => {

        })
    </script>

    <title><?= $title ?></title>
</head>
<body>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center my-3 sdw-azure">
            <a href="<?= base_url() ?>" style="color: grey; text-decoration: none;">
                <p>< Back To Home Page</p>
            </a>
            <div class="col">
                <br>
                <br>
                <h1 class="text-center">Login Page</h1>
                <?php if (isset($error)) :?>
                    <div class="alert alert-warning text-center" role="alert">
                            <?= $error ?>
                    </div>
                <?php endif ?>
                <form action="">
                    <div class="form-margin">
                        <label for="email" class="form-label">Email : <span style="color: red;">*</span></label>
                        <input type="email" name="email" id="email" class="form" placeholder="Alex@gmail.com">
                    </div>
                    <div class="form-margin">
                        <label for="password" class="form-label">Password : <span style="color: red;">*</span></label>
                        <input type="password" name="password" id="password" class="form">
                    </div>
                    <br>
                    <div class="form-margin text-end">
                        <button type="submit" class="btn btn-sdw-aqua">Log in</button>
                    </div>
                </form>
            </div>
        </div>
        <br><br>
        <footer>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 my-3">
                <div class="col"><p>Made With Love From 86</p><p><b>PT. HARTA TAHTA WANITA</b></p></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col justify-content-end text-end">
                    <p><a href="">Term And Condition</a></p>
                    <p><a href="">FAQ</a></p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>