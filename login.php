<?php

$koneksi = mysqli_connect("localhost","root","","uas");



function login($username, $password, $role) {
    global $koneksi;

    $stmt = $koneksi->prepare("SELECT id, role FROM loginn WHERE username=? AND password=? AND role=?");
    $stmt->bind_param("sss", $username, $password, $role);
 
    $stmt->execute();
    
    $stmt->bind_result($id, $role);

    
    if ($stmt->fetch()) {
        
        session_start();
        $_SESSION['user_id'] = $id;
        $_SESSION['role'] = $role;

        if ($role == 'admin') {
            header("Location: dashboard_admin.php");
            exit();
        } elseif ($role == 'kepala') {
            header("Location: dashboard_kepala.php");
            exit();
        } else {
            header("Location: dashboard_user.php");
            exit();
        }
    } else {
        
        $error = "Login gagal. Periksa kembali username, password, dan role.";
    }
   
    $stmt->close();

    return $error;
}

$error = "";

if (isset($_POST['submit'])) {
    $usernameInput = $_POST['username'];
    $passwordInput = $_POST['password'];
    $roleInput = $_POST['role'];

   $error = login($usernameInput, $passwordInput, $roleInput);
}

$koneksi->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>LOGIN</title>
</head>
<body>

        

       <form action="" method="post">
        <div class="box">
            
            <h2>Login</h2>

            <?php
            if (isset($error)) {
                echo '<div style="color: red; text-align: center; margin-top: 10px;">' . $error . '</div>';
            }
            ?>

            <div class="username" >
                <label for="username"><i class="bi bi-person-circle"></i> Username </label>
               
                <input type="text" name="username" id="username" placeholder="Username" required>
            </div>
            

            <div class="password">
                <label for="password"><i class="bi bi-lock-fill"></i> Password </label>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>

            <div class="role">
            <select id="role" name="role" required>
                <option value="user"> User</option>
                <option value="admin">Admin</option>
                <option value="kepala">Kelapa</option>
            </select>
            </div>
 
            <button type="sumbit" name="submit" class="button"><i class="bi bi-box-arrow-in-right"></i> Login</button>
           
        </div>
            

       </form>
</body>
<style>

        body {
            background-image: url('3.JPG');
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h2 {
            text-align: center;
        }

        .box {
            font-family: times;
            width: 400px;
            height: 380px;
            margin-top: 100px;
            margin-bottom: 100px;
            background-color: rgba(255, 255, 255, 0.8); 
            border-radius: 10px; 
            padding: 20px;
        }

        .username, .password, .role {
            display: flex;
            flex-direction: column;
            padding: 8px;
        }
        .button{
            background-color: #007BFF; 
            color: #fff;
            padding: 10px 15px;
            border: 2px solid #007BFF;
            border-radius: 5px;
            cursor: pointer;
            transition:  0.3s ease;
            margin: auto;
            display: flex;
            display: block;
            width: 95%;
        }
        button:hover {
            background-color: #0056b3; 
            border: 2px solid blue;
        }
        input {
            width: 95%;
            padding: 7px; 
            margin-bottom: 10px; 
            border-radius: 10px;
            border: 2px solid darkgray;
         }

        select {
            width: 100%;
            padding: 8px; 
            margin-top: 5px;
            margin-bottom: 10px;
            border-radius: 10px;
            border: 2px solid darkgray;
            text-align: center;
            display: flex;
            display: block;
        }
        option{
            text-align: center;
            display: block;
            display: flex;
        }
        #role {
            text-align: center;
            display: flex;
        }
        ::placeholder{
            text-align: center;
        }
        .pesan{
            color: red;
            text-align: center;
        }
        p{
            text-align: center;
        }
        a{
            text-align: center;
            display: block;
            text-decoration: none;
        }
</style>
</html>