<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Static Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

    <div class="alert alert-danger" role="alert" id="alert_danger_custom" style="display: none;">
        <button type="button" class="btn-close" aria-label="Close" id="close_danger"></button>
        Invalid Username/Password!
    </div>

    <div class="alert alert-success" role="alert" id="alert_success_custom" style="display: none;">
        <button type="button" class="btn-close" aria-label="Close" id="close_success"></button>
        Welcome to the System: <?= htmlspecialchars($_POST['floatingInput'] ?? ''); ?>
    </div>

    <div class="round-container text-center" id="cntnr">
        <div class="mb-4">
            <img src="blank.png" alt="Profile Picture" class="profile-pic">
        </div>

        <form method="post" id="loginForm">
            <div class="mb-3">
                <select class="form-select" name="options">
                    <option value="admin" selected>Admin</option>
                    <option value="content_manager">Content Manager</option>
                    <option value="system_user">System User</option>
                </select>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="floatingInput" id="floatingInput" placeholder="Username" required>
                <label for="floatingInput">User Name</label>
            </div>

            <div class="form-floating mb-4">
                <input type="password" class="form-control" name="floatingPassword" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>

            <button type="submit" class="btn btn-primary" name="sbtn">SIGN IN</button>
        </form>
    </div>

    <script>
        document.getElementById('close_danger').addEventListener('click', () => document.getElementById('alert_danger_custom').style.display = 'none');
        document.getElementById('close_success').addEventListener('click', () => document.getElementById('alert_success_custom').style.display = 'none');
        document.getElementById('loginForm').addEventListener('submit', () => {
            document.getElementById('alert_danger_custom').style.display = 'none';
            document.getElementById('alert_success_custom').style.display = 'none';
        });
    </script>

</body>
</html>

<?php
$accounts = [
    "admin" => ["admin" => "Pass1234", "renmark" => "Pogi1234"],
    "content_manager" => ["pepito" => "manaloto", "juan" => "delacruz"],
    "system_user" => ["juan" => "delacruz", "pedro" => "penduko"],
];

$alert = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $options = $_POST['options'] ?? '';
    $email = $_POST['floatingInput'] ?? '';
    $password = $_POST['floatingPassword'] ?? '';

    if (isset($accounts[$options][$email]) && $accounts[$options][$email] === $password) {
        $alert = 'success';
    } else {
        $alert = 'danger';
    }
}

if ($alert === 'success') {
    echo '<script>document.getElementById("alert_success_custom").style.display = "block";</script>';
} elseif ($alert === 'danger') {
    echo '<script>document.getElementById("alert_danger_custom").style.display = "block";</script>';
}
?>
