<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .hrr {
            margin: 0%;
        }

        #form {
            background-color: #ebecf1;
            width: 300px;
            height: 44px;
            border-radius: 5px;
            display: flex;
            flex-direction: row;
            align-items: left;
        }

        input {
            all: unset;
            font: 16px system-ui;
            color: solid black;
            height: 100%;
            width: 100%;
            padding: 6px 10px;
        }

        ::placeholder {
            color: solid rgb(0, 0, 0);
            opacity: 0.7;
        }

        .aa {
            margin: 0%;
            text-decoration: none;
            color: black;
        }

        #bb {
            all: unset;
            cursor: pointer;
            width: 44px;
            height: 44px;
        }

        .nn {
            color: #fff;
            fill: currentColor;
            width: 24px;
            height: 24px;
            padding: 10px;
        }

        td {
            font-family: arial;
            color: blue;
            font-weight: bolder;

        }

        th {
            font-family: arial;
            color: black;
            font-weight: border;
            margin: 0%;

        }
    </style>
</head>

<body>
    <div class="container-xxxl" style="display:inline-block;max-width:135%;min-width:110%">
        <div class="row">
            <div class="col-3 bg-light" style="padding:0% 2%">
                <div class="d-flex flex-column flex-shrink-0 bg-light" style="width:110%; height:150%">
                    <a href="../admin/adminModify.php" style="text-decoration:none"></a:href>
                        <h1 style="color:black;font-weight:bold; margin:8% 0%">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                            Admin
                        </h1>
                    </a>
                    <hr class="hrr">
                    <div style="margin:1% 0%; padding:0%" class="d-flex flex-column mb-3">
                        <div class="p-2">
                            <a href="admin.php" class="d-block p-3 link-dark text-decoration-none" title="Icon-only" data-bs-toggle="tooltip" data-bs-placement="right">
                                <button type="button" style="margin: -15% -12%" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                                    </svg>
                                    Dashboard
                                </button>
                            </a>
                        </div>
                        <hr style="margin:0%">
                        <p style="margin:0% 4%; font-weight:bold">Log</p>
                        <div class="p-2" style="padding:0%">
                            <div class="fs-4 mb-3">
                                <a class="aa" href="status.php" style="font: size 12px" class="d-block p-3 link-dark text-decoration-none" title="Icon-only" data-bs-toggle="tooltip" data-bs-placement="right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                                        <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z" />
                                    </svg>
                                    <font size="+1">Status</font>
                                </a>
                            </div>
                        </div>
                        <div class="p-2" style=" margin:-5% 1%">
                            <div class="fs-4 mb-3">

                                <a class="aa" href="staff.php" style="font: size 12px" class="d-block p-3 link-dark text-decoration-none" title="Icon-only" data-bs-toggle="tooltip" data-bs-placement="right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                        <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                    </svg>
                                    <font size="+1">Staffs</font>
                                </a>
                            </div>
                        </div>
                        <div class="p-2" style=" margin:-3% 1%">
                            <div class="fs-4 mb-3">
                                <a class="aa" href="category.php" style="font: size 12px" class="d-block p-3 link-dark text-decoration-none" title="Icon-only" data-bs-toggle="tooltip" data-bs-placement="right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-apple" viewBox="0 0 16 16">
                                        <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282z" />
                                        <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282z" />
                                    </svg>
                                    <font size="+1">Food category</font>
                                </a>
                            </div>
                        </div>
                        <div class="p-2" style="margin:-3% 0%">
                            <a class="aa" href="item.php" style="font: size 12px" class="d-block p-3 link-dark text-decoration-none" title="Icon-only" data-bs-toggle="tooltip" data-bs-placement="right">
                                <i size="+1" class='fas fa-utensils' style='font-size:24px'></i>
                                <font size="+1">Menu</font>
                            </a>
                        </div>
                        <div class="p-2" style="margin:1% 0%">
                            <a class="aa" href="order.php" style="font: size 12px" class="d-block p-3 link-dark text-decoration-none" title="Icon-only" data-bs-toggle="tooltip" data-bs-placement="right">
                                <div class="fs-4 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                    </svg>
                                    <font size="+1">Orders</font>
                                </div>
                            </a>
                        </div>
                        <div class="p-2" style=" margin:-5% 0%">
                            <div class="fs-4 mb-3">
                                <button style="background: orangered; width:150px; margin:-1%; border-radius:10px; padding:1%">
                                    <a class="aa" href="staff.php" style="font: size 12px" class="d-block p-3 link-dark text-decoration-none" title="Icon-only" data-bs-toggle="tooltip" data-bs-placement="right">

                                        <i class='fas fa-user-circle' style='font-size:24px'></i>

                                        <font size="+1">Customers</font>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col" style="margin:-1% 0%; padding:1% 0%">
                <nav class="navbar" style="width:100%; height:80px; background-color:gainsboro">
                    <!-- Navbar content -->
                    <!-- <form role="search" id="form" style="margin:0% 2%">
                        <input type="search" id="query" name="q" placeholder="Search..."
                            aria-label="Search through site content">
                        <button id="bb">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                              </svg>
                        </button>
                    </form> -->
                    <!-- logout button -->
                    <a href="../logoutadm.php">
                        <button class="btn btn-primary" style="float:right;margin-left:900px">
                            Log out
                        </button>
                    </a>

                </nav>

                <div>
                    <table align="center" bgcolor="white" cellpadding="12px" cellspacing="4px">
                        <tr cellpadding='2px'>
                            <td>#</td>
                            <td>First name</td>
                            <td>Last name</td>
                            <td>Email id</td>
                            <td>Address</td>
                            <td>User id</td>
                            <td>Password</td>
                            <td>Action</td>
                        </tr>
                        <?php
                        $con = mysqli_connect('localhost', 'root', '', 'foodkart');
                        $result = $con->query("select * from customer");
                        $i = 0;
                        //echo"<table align='center' bgcolor='white' border='2px' cellpadding='12px' cellspacing='20px'>";
                        while ($r = $result->fetch_assoc()) {
                            $i++;
                            $id = $r['user'];
                            echo '<tr>
                                <th>' . $i . '</th>
                                <th>' . $r['frstname'] . '</th>
                                <th>' . $r['lstname'] . '</th>
                                <th>' . $r['email'] . '</th>
                                <th>' . $r['address'] . '</th>
                                <th>' . $r['user'] . '</th>
                                <th>' . $r['pwd'] . '</th>
                               
                                <th><a style="color:white; text-decoration:none" href="updateUser.php?update1=' . $id . '"><button class="btn btn-primary" style="margin:0px 3px">Modify</button></a>
                                <a style="color:white; text-decoration:none" href="deleteUser.php?did1=' . $id . '"><button class="btn btn-danger" style="margin:3px">Delete</button></a>
                                </th></tr>';
                        }
                        $con->close();
                        ?>
                    </table>
                </div>

            </div>
        </div>
    </div>
</body>

</html>