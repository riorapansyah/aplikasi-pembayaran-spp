<?php
include('./component/header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container-fluid mx-auto border p-3 bg-waring justify-content-center align-items-center" style="height: 100pv; display: flex;">
        <div class="p-5 shadow rounded-4" style="width: 70pv;">
            <div class="p-3 shadow- mx-auto rounded-circle" style="width: max-conntent;">
                <i class="fa-regular fa-user fs-1"></i>
            </div>
            <h3 class="text-center fw-bold mt-3">Login</h3>
            <form action="login_aksi.php" method="POST" class="mt-3">
                <div class="mb-3 form-floating">
                    <input type="text" name="username" class="form-control" id="floatinginput" placeholder="username" required>
                    <label for="floatinginput">username</label>
                </div>
                <div class="mb-3 form-floating">
                    <input type="password" name="password" class="form-control" id="floatingpassword" placeholder="password" required>
                    <label for="floatingpassword">password</label>
                </div>
                <button type="submit" id="tombol" class="btn btn-warning text-white fw-bold mt-4">Login</button>

            </form>

        </div>

    </div>
</body>

</html>