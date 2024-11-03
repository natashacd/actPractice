<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> 
    <link rel="stylesheet" type="text/css" href="css/custom_login.css">
    <title>Static Login</title>
</head>
<body>
        
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accounts = [
        "Admin" => [
            ["username" => "admin", "password" => "Pass1234"],
            ["username" => "renmark", "password" => "Pogi1234"]
        ],
        "Content Manager" => [
            ["username" => "pepito", "password" => "manaloto"],
            ["username" => "juan", "password" => "delacruz"]
        ],
        "System User" => [
            ["username" => "pedro", "password" => "penduko"]
        ]
    ];

    $userType = $_POST["userType"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $isValid = false;

    if (isset($accounts[$userType])) {
        foreach ($accounts[$userType] as $account) {
            if ($account["username"] === $username && $account["password"] === $password) {
                $isValid = true;
                break;
            }
        }
    }

    if ($isValid) {
        $message = "Welcome to the System: $username";
        $messageClass = "success";
    } else {
        $message = "Invalid username or password.";
        $messageClass = "error";
    }
}
?>

<?php if (isset($message)) : ?>
    <div class="message-box <?php echo $messageClass; ?>">
        <span><?php echo $message; ?></span>
        <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
<?php endif; ?>

<div class="container">
    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        
        <form class="form-signin" method="POST" action="login.php">
            <select name="userType" class="form-control">
                <option value="Admin">Admin</option>
                <option value="Content Manager">Content Manager</option>
                <option value="System User">System User</option>
            </select>
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
        </form>
    </div>
</div>

</body>
</html>
