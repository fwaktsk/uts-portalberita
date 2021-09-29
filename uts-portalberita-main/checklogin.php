<!DOCTYPE html>
    <body>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <?php
            if(isset($_POST['signin']))
            {
                $captcha = $_POST['g-recaptcha-response'];
                if(!$captcha)
                {
                    echo "<h2>Please check the captcha form.</h2>";
                    exit;
                }

                $str = "https://www.google.com/recaptcha/api/siteverify?secret=(secretkey)".
                       "&response=".
                       $captcha.
                       "&remoteip=".
                       $_SERVER['REMOTE_ADDR'];

                $response = file_get_contents($str);
                $response_arr = (array) json_decode($response);

                if($response_arr["success"] == false)
                {
                    echo "<h2>Spam detected! Please retry in a few minutes.<h2>";
                    exit;
                }

                include("../include/connection.php");

                $username = mysqli_real_escape_string($_POST['username']);
                $query = mysqli_query($sql, "SELECT * FROM accounts WHERE username='$username'");
                $result = $query->fetch_assoc();

                $password = md5($_POST['password'].$result['salt']);

                $query = mysqli_query($sql, "SELECT * FROM accounts WHERE username='$username' AND pass='$password'");
                $result = $query->fetch_assoc();

                if($result > 0 && $result['is_admin'] > 0)
                {
                    //Login Success Admin
                    // $_SESSION["adminlogin"] = true;
                    // $_SESSION["username"] = $username;
                    header("location:adminPage.php");
                }
                else
                {
                    if($result > 0 && $result['is_admin'] == 0)
                    {
                        //Login success user biasa
                        // $_SESSION["userlogin"] = true;
                        // $_SESSION["username"] = $username;
                        header("location:userPage.php");
                    }
                    else
                    {
                        $_SESSION["login"] = false;
                        echo "Login tidak terdaftar, silahkan coba lagi atau daftar untuk pengguna baru.";
                    }
                }
            }

            if(isset($_POST['signup']))
            {
                header("location:signup.php");
            }
        ?>
    </body>
</html>