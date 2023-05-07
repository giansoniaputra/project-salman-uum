<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sistem Informasi SMAC</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon.png">
    <link href="/css/style.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">

                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="images/logo-full.png" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4 text-white">Silahkan Buat Akun</h4>
                                    <form action="index.html">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Username</strong></label>
                                            <input type="text" class="form-control" placeholder="Masukan Username">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email" class="form-control" placeholder="contoh@gmail.com">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" class="form-control"
                                                placeholder="Masukan Password Anda" name="password" id="password">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Konfirmasi Password</strong></label>
                                            <input type="password" class="form-control"
                                                placeholder="Masukan Password Anda" name="conf_password"
                                                id="conf_password">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Pilih Role</strong></label>
                                            <select class="form-control form-control-sm default-select">
                                                <option selected>Pilih Role</option>
                                                <option>Super Admin</option>
                                                <option>Admin</option>
                                                <option>Member</option>
                                            </select>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit"
                                                class="btn bg-white text-primary btn-block">Daftar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
	Scripts
***********************************-->

    <!-- Required vendors -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            let inputElement = $('input[name="conf_password"]');
            var feedbackElement = $('<div class="invalid-feedback"></div>');
            var feedbackElement2 = $('<div class="valid-feedback"></div>');

            $("#conf_password").on("change", function () {
                if ($("#password").val() !=  $("#conf_password").val()) {
                    $(".pesan").html('')
                    inputElement.addClass('is-invalid');
                    inputElement.removeClass('is-valid');
                    feedbackElement.append($('<p class="text-danger pesan">Password Tidak Sama</p>'))
                    inputElement.after(feedbackElement)
                } else if ($("#password").val() ==  $("#conf_password").val()) {
                    inputElement.removeClass('is-invalid');
                    inputElement.addClass('is-valid');
                    feedbackElement2.append($('<p class="text-danger">Password Sesuai</p>'))
                }

                if($("#password").val() == ''){
                    inputElement.removeClass('is-valid');
                }
            })
        })

    </script>
    <script src="./vendor/global/global.min.js"></script>
    <script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/deznav-init.js"></script>

</body>

</html>
