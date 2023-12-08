<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
        <!-- Font Awesome JS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="index.css">
        <title>RDO | Home</title>
        <link rel="icon" href="images/rdo_logo.png">
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand">RDO</a>
                
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="signin" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                            <!-- <a class="nav-link active" aria-current="page" href="#home">Login</a> -->
                        </li>
                    </ul>
            </div>
        </nav>

        <section id="home" class="page-section">
            <div class="landing-text"> 
                <div class="row container mx-auto">
                    <div class="col-md-6 my-auto" >
                        <h1 class="mb-4 title">Research and Development Office</h1>
                        <input class="form-control" type="text" name="" id="" placeholder="Search Research Code or Name">
                        <p class="mt-4 subtext">One of the main offices of BPSU, mandated to initiate, promote, develop and implement the research thrusts of the University. This site showcases RDO's activities, on-going projects and accomplishments.</p>
                    </div>
                    <div class="col-md-6 my-auto" >
                        <img src="images/programming.svg" alt="" style="max-width: 100%;">
                    </div>
                </div>
            </div>
        </section>

        <section id="vision-mission" class="container">
            <div class="row py-5">
                <div class="col-md-6">
                    <img src="images/visionary.svg" alt="..." >
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="text" >
                        <div class="vision mb-5">
                            <h3 style="color: #F2BA49;">
                                Vision
                            </h3>
                            <h6>
                                A globally recognized academic institution through sustainable entrepreneurial ecosystem and market-ready research innovations by 2030.
                            </h6>
                        </div>
                        <div class="mission">
                            <h3 style="color: #F2BA49;">
                                Mission
                            </h3>
                            <h6>
                                To undertake and strengthen multidisciplinary researches that will catalyse socio-economic development of the province ,the region and of the country through wide dissemination and utilization of outcomes-based research programs, innovative R & D outputs and established research centers. 
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div id="fixed"></div>
        <section id="vision-mission" class=" p-5 d-flex bg-dar justify-content-center">
            <div class="card" style="box-shadow: 0px 0px 15px;">
                <div class="card-body">
                    <h3>Get in Touch!</h3>
                    <div class="mb-3">
                        <label for="exampleInputName1" class="form-label">Name</label>
                        <input type="email" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputMessage1" class="form-label">Message</label>
                        <textarea name="" id="exampleInputMessage1" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <!-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            <div style="position: absolute; height: 200px; width: 100%; background: rgb(231,38,38); background: linear-gradient(90deg, rgba(231,38,38,1) 0%, rgba(255,157,8,1) 100%); z-index:-1; margin: 180px;"></div>
        </section>
        <footer class="container-fluid text-center  bg-secondary">
            <div class="row pt-4 ">
                <div class="col-sm-4 pb-3">
                    <img src="images/rdo_logo.png" alt="logo" class="icon-footer">
                </div>
                <div class="col-sm-4 pb-3">
                    <h5>Connect</h5>
                    <br>
                    <div class="socmed-links">
                        <a href="#"><i class="fa-brands fa-facebook fa-2xl p-2"></i></a>
                        <a href="#"><i class="fa-brands fa-google fa-2xl p-2"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube fa-2xl p-2"></i></i></a>
                        <a href="#"><i class="fa-brands fa-instagram fa-2xl p-2"></i></a>
                    </div>
                </div>
                <div class="col-sm-4 pb-3">
                    <h6 class="text-uppercase fw-bold">Contact Us</h6>
                    <br>
                    <p><i class="fa-solid fa-mobile-screen"></i> 0968 8535 728</p>
                    <p><i class="fa-solid fa-envelope"></i> rdo@bpsu.edu.ph</p>
                    <p><i class="fa-solid fa-location-dot"></i> Capitol Compound, Brgy. Tenejero, Balanga City Bataan 2100</p>
                </div>
            </div>
                <div class="text-center pb-3">
                    <span>2022 BPSU Research and Development Office Information System - All Rights Reserved</span>
                </div>
        </footer>
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Welcome to RDO-OIS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="login.php">
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="********" name="password" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="showPassword" onclick="showPassword1()">
                                <label class="form-check-label" for="showPassword">Show Password</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary loginBtn" name="login">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- bootstrap and jquery plugin -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script>
            function showPassword1(){
                var x = document.getElementById("floatingPassword");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </body>
</html>