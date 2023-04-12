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
            $("#10000").click(() => {
                $("#nominal").val("10000")
            })

            $("#25000").click(() => {
                $("#nominal").val("25000")
            })

            $("#50000").click(() => {
                $("#nominal").val("50000")
            })

            $("#100000").click(() => {
                $("#nominal").val("100000")
            })

            $("#200000").click(() => {
                $("#nominal").val("200000")
            })
        })
    </script>

    <title><?= $title ?></title>
</head>
<body>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 my-3">
            <div class="col">
                <a href="<?= base_url() ?>logout" class="btn btn-sdw" style="margin-right: 7px; align-item: center; border: 1px solid #000;">Log Out</a>
                <a href="<?= base_url() ?>history" class="btn btn-sdw-aqua">History</a>
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
        <div class="row justify-content-center my-3 sdw-azure">
            <div class="col">
                <form action="<?= base_url() ?>donate" method="POST">
                    <div class="form-margin">
                        <label for="nominal" class="form-label">Nominal : </label>
                        <input type="text" name="nominal" id="nominal" class="form" placeholder="Ketik Jumlah Dukungan">
                        <p style="margin-left: 10px; margin-top: 10px; color:grey;">Minimum alert : <span style="color:red;">Rp. 10.000</span></p>
                        <div class="btn-sdw-group">
                            <button type="button" class="btn btn-sdw" style="background-color: #FFE587;" value="10000" id="10000">Rp. 10.000</button>
                            <button type="button" class="btn btn-sdw" style="background-color: #BCFF87;" value="25000" id="25000">Rp. 25.000</button>
                            <button type="button" class="btn btn-sdw" style="background-color: #87FFCD;" value="50000" id="50000">Rp. 50.000</button>
                            <button type="button" class="btn btn-sdw" style="background-color: #87E9FF;" value="100000" id="100000">Rp. 100.000</button>
                            <button type="button" class="btn btn-sdw" style="background-color: #87B0FF;" value="200000" id="200000">Rp. 200.000</button>
                        </div>
                    </div>                    
                    <div class="form-margin">
                        <label for="from" class="form-label">From : <span style="color: red;">*</span></label>
                        <input type="text" name="from" id="from" class="form" placeholder="Alex">
                    </div>
                    <div class="form-margin">
                        <label for="donate" class="form-label">Donate To : <span style="color: red;">*</span></label>
                        <input type="text" name="donate" id="donate" class="form" placeholder="Windah Basurada">
                    </div>
                    <div class="form-margin">
                        <label for="email" class="form-label">Email : <span style="color: red;">*</span></label>
                        <input type="email" name="email" id="email" class="form" placeholder="alex@email.com">
                    </div>
                    <div class="form-margin">
                        <label for="message" class="form-label">Message : <span style="color: red;">*</span></label>
                        <input type="text" name="message" id="message" class="form" placeholder="Aku Alex">
                    </div>
                    <input type="number" name="time" id="time" value="<?= time() ?>" hidden>
                    <div class="form-margin text-end">
                        <button type="submit" class="btn btn-sdw-aqua">Donate</button>
                    </div>
                </form>
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