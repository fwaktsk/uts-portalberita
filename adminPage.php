<!-- <?php
    // if($_SESSION["adminlogin"] == true)
    // {
    //     session_start()
    // }
?> -->

<!DOCTYPE html>
<html>

<head>
    <title>Admin Mode</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <p class="navbar-brand">Kampung Naga News</>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    </div>
                    <button class="btn btn-outline-success" type="submit">Logout</button>
            </div>
        </nav>
    </div>

    <div class="btnAdd">
        <button type="button" class="btn btn-primary" onclick="window.location.href='#'" style="padding=10px;">Add
            News</button>
    </div>

    <br>

    <div class="container-content">
        <table id="dataTable" class="table table-striped table-bordered dataTable">
            <!-- header -->
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Konten Berita</th>
                    <th>Tanggal Publikasi</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- data -->
                <?php
                    

                ?>
            </tbody>
            <tfoot>
                <tr>
                <th>Nomor</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Konten Berita</th>
                    <th>Tanggal Publikasi</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
</body>

</html>