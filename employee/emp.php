<?php
session_start();
//echo $_SESSION['user'];
if(isset($_SESSION['user']))
{

    if(isset($_GET['emp']))
    {
        $empid1=$_GET['emp'];
    }
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    </style>
</head>

<body>
    <div class="container-xxxl">
        <div class="row">
            <div class="col-3 bg-light">
                <div class="d-flex flex-column flex-shrink-0 bg-light" style="width:110%; height:200%; padding:0% 2%">
                    <h1 style="color:black;font-weight:bold; margin:8% 0%">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        Employee
                    </h1>
                    <hr class="hrr">
                    <div style="margin:1% 0%; padding:0%" class="d-flex flex-column mb-3">
                        <div class="p-2">
                            <a href="emp.php" class="d-block p-3 link-dark text-decoration-none" title="Icon-only"
                                data-bs-toggle="tooltip" data-bs-placement="right">
                                <button type="button" style="margin: -15% -12%" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-house-door" viewBox="0 0 16 16">
                                        <path
                                            d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                                    </svg>
                                    Dashboard
                                </button>
                            </a>
                        </div>
                        <hr style="margin:0%">
                        <p style="margin:0% 4%; font-weight:bold">Log</p>
                        <div class="p-2" style="padding:0%">
                            <div class="fs-4 mb-3">
                                <a class="aa" href="empSalary.php?empid=<?php echo $empid1 ?>"style="font: size 12px"
                                    class="d-block p-3 link-dark text-decoration-none" title="Icon-only"
                                    data-bs-toggle="tooltip" data-bs-placement="right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
                                        class="bi bi-hourglass-split" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z" />
                                    </svg>
                                    <font size="+1">Salary info</font>
                                </a>
                            </div>
                        </div>
                        <div class="p-2" style=" margin:-5% 1%">
                            <div class="fs-4 mb-3">
                                <a class="aa" href="empInfo.php?empid=<?php echo $empid1 ?>" style="font: size 12px"
                                    class="d-block p-3 link-dark text-decoration-none" title="Icon-only"
                                    data-bs-toggle="tooltip" data-bs-placement="right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor"
                                        class="bi bi-people-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        <path fill-rule="evenodd"
                                            d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                        <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                    </svg>
                                    <font size="+1">Employee info</font>
                                </a>
                            </div>
                        </div>
                        
                 
                    </div>
                </div>
            </div>
            <div class="col" style="width:97%;padding:0% 1.3%">
                <nav class="navbar" style="width:102%; height:18%; background-color:gainsboro">
                    <!-- Navbar content -->
                    <form role="search" id="form" style="margin:0% 2%">
                        <input type="search" id="query" name="q" placeholder="Search..."
                            aria-label="Search through site content">
                        <button id="bb">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                              </svg>
                        </button>
                    </form>

                    <a href="../logoutemp.php">
                        <button class="btn btn-primary" style="margin-right:25px">
                           Log out
                        </button>
                    </a>
                </nav>
            </div>
            
        </div>
    </div>
    </body>
    </html>
    <?php
    }
else
{
    echo"<script>alert('ONLY EMPLOYEE CAN ACCESS THE PAGE!!')</script>";
    echo '<script>window.location.href="../logine.php";</script>';
    unset($_SESSION['user']);
}?>