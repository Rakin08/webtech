<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vital infusion</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">

    <style>
        .slideshow-container {
            width: 100%;
            position: relative;
        }

        .mySlides {
            display: none;
        }

        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
        }

        .next {
            right: 0;
        }

        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }
    </style>
</head>

<body>

    <nav>
        <div class="logo">
            <div>
                <img class="logo-image" src="images/logo.png" alt="">
            </div>
            <h2 class="logo-name">Vital Infusion</h2>
        </div>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="Login.php">Login</a></li>
            <li><a href="Signup.php">Signup</a></li>
            <div>
                <input type="text" name="" id="" placeholder="Search">
                <button class="search-button" onclick="window.location.href = `https://www.google.com`;">Search</button>
            </div>
        </ul>
    </nav>

    <div class="slideshow-container">
        <div class="mySlides">
            <img src="images/iStock-648709040-e1518410546589-1024x703.jpg" style="width:100%">
        </div>

        <div class="mySlides">
            <img src="images/pexels-павел-сорокин-2324837.jpg" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    
    <br>

    <!-- <header>
        <img src="images/iStock-648709040-e1518410546589-1024x703.jpg" alt="">
    </header> -->

    <main>
        <div class=" main-info">
            <h3>Household Help</h3>
            <p>Supported by an office staff of specialists,
                , nursing, quality management, franchise
                development, and revenue cycle management,</p>
        </div>
        <div class="main-info2">
            <h3>Customer Care</h3>
            <p>How can I help you?</p>
        </div>
        <div class="main-info">
            <h3>Medical service</h3>
            <p>Our passion since 2021 is improving the lives of patients and healthcare professionals through locally
                owned franchise locations across the Bangladesh. </p>
        </div>

    </main>
    <hr>

    <section class="section1">
        <div class="about">
            <h2>About Us</h2>
        </div>
        <div class="about-details">
            <p>Our passion since 2021 is improving the lives of our customers, patients and healthcare professionals
                through locally owned franchise locations across the Bangladesh. We have an expert team of mechanics,
                house-maids and electricians to make our consumer’s life easy. We also have 20 franchised pharmacy and
                60 hospitals .</p>
        </div>
    </section>
    <script src="script.js"></script>
</body>

</html>