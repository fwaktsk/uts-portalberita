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
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    
        <style>
        body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        }
    
        .topnav {
        overflow: hidden;
        background-color: #333;
        }
    
        .topnav a {
        float: left;
        display: block;
        color: #000;
        text-align: center;
        padding: 8px 16px;
        text-decoration: none;
        font-size: 17px;
        height: 40px;
        }
    
        .topnav a:hover {
        background-color: #222;
        color: white;
        }
    
        .topnav a.active {
        background-color: #222;
        color: white;
        }
    
        .topnav .icon {
        display: none;
        }
    
        @media screen and (max-width: 600px) {
        .topnav a:not(:first-child) {display: none;}
        .topnav a.icon {
            float: right;
            display: block;
        }
        }
    
        @media screen and (max-width: 600px) {
        .topnav.responsive {position: relative;}
        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }
        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
        }
        }
        </style>
    
    </head>
    
    <body>
        <div class="header" style="background-color: black;">
            <div class="navbar-title">
                <nav class="navbar navbar-light bg-light mb-2" style="height:70px;">
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
        </div>
    
        
        <div class="topnav">
                <nav class="navbar navbar-light bg-light mb-2">
                <a href="#" class="active">Category</a>
                <a href="#">Category</a>
                <a href="#">Category</a>
                <a href="#">Category</a>
                <a href="#">Category</a>
                <a href="#">Category</a>
                <a href="#">Category</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
                </nav>
            </div>
    
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="card mb-4" data-aos="fade-right" data-aos-offset="300">
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