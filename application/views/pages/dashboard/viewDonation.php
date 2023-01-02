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
            $("#myTable").DataTable()
        })
    </script>

    <title><?= $title ?></title>
</head>
<body>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 my-3">
            <div class="col">
                <a href="<?= base_url() ?>logout" class="btn btn-sdw" style="margin-right: 7px; align-item: center; border: 1px solid #000;">Log Out</a>
                <a href="<?= base_url() ?>" class="btn btn-sdw-aqua">Donate More</a>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col">
                <a href="<?= base_url() ?>userprofile">
                    <span>Hello, <?= $this->session->user ?></span>
                    <img src="<?= $data[0]->picture ?>" alt="Profile Picture" class="avatar">
                </a>

            </div>
        </div>
        <br><br><br>
        <div class="row justify-content-center my-3">
            <?php if($this->session->flashdata("error")) : ?>
                <div class="alert alert-warning text-center" role="alert">
                        <?= $this->session->flashdata("error") ?>
                </div>
            <?php endif?>

            <?php if($this->session->flashdata("message")) : ?>
                <div class="alert alert-warning text-center" role="alert">
                        <?= $this->session->flashdata("message") ?>
                </div>
            <?php endif?>
            <div class="col">
                <?php if($this->User->getUserByEmail($this->session->user)[0]->userType == "1") :?>
                    <h5>Welcome Back Admin, This Is All The Donation From User</h5>
                <?php else: ?>
                    <h5>This Is Your Donation History :)</h5>
                <?php endif ?>
                <br><br>
                <table class="table sdw" id="myTable">
                    <thead>
                        <tr>
                        <th scope="col" class="table-warning">Donate To</th>
                        <th scope="col" class="table-info">Ammout</th>
                        <th scope="col" class="table-success">Message</th>
                        <th scope="col" class="table-secondary">Alias</th>
                        <th scope="col" class="table-primary">Payment Methode</th>
                        <th scope="col" class="table-danger">Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr> -->
                        <?php foreach ($datas as $data) :?>
                            <tr>
                                <?php if($this->User->getUserByEmail($this->session->user)[0]->userType == "1") :?>
                                    <th scope="row"><?= $data->donateTo ?></th>
                                    <td><?= $data->ammout?></td>
                                    <td><?= $data->message ?></td>
                                    <td><?= $data->alias ?></td>
                                    <td><?= $data->payMethode ?></td>
                                    <td><?= $data->donateDate ?></td>
                                <?php else: ?>
                                    <th scope="row"><?= $data->donateTO ?></th>
                                    <td><?= $data->ammout?></td>
                                    <td><?= $data->message ?></td>
                                    <td><?= $data->alias ?></td>
                                    <td><?= $data->payMethode ?></td>
                                    <td><?= $data->donateDate ?></td>
                                <?php endif ?>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
                <br><br><br><br>     
            </div>
        </div>
        <br><br><br>
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