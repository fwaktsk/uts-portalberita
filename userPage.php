<!-- <?php
    // if($_SESSION["userlogin"] == true)
    // {
    //     session_start()
    // }
?> -->

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>

<body>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

    <div class="header">
        <div class="navbar-title">
            <nav class="navbar navbar-light bg-light mb-2">
                <div class="container-fluid">
                    <a href="#" class="navbar-brand ms-4">Kampung Naga News</a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <button class="btn btn-outline-success" type="submit" onclick="window.location.href='login.php'">Login</button>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="topnav" id="myTopnav">
            <nav class="navbar navbar-light bg-light mb-2">
                <a href="#" class="active">Category</a>
                <a href="#">Category</a>
                <a href="#">Category</a>
                <a href="#">Category</a>
                <a href="#">Category</a>
                <a href="#">Category</a>
                <a href="#">Category</a>
                <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
            </nav>
        </div>
            <!-- <div class="dropdown">
                    <button class="dropbtn">Dropdown 
                    <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                    </div>
                </div>  -->
            </div>
    </div>

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="card mb-4">
                    <img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"
                        alt="<?php echo htmlentities($row['posttitle']);?>">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
                        <p><b>Category : </b> <a
                                href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a>
                        </p>

                        <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"
                            class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on <?php echo htmlentities($row['postingdate']);?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0);">
                © 2020 Copyright:
                <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
</body>

</html>