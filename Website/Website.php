<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link rel="stylesheet" href="../Website/website.css">
    </style>
</head>
<body>
<header>
    <div class="container">
        <h1 class="header-title">TechWizards Solutions</h1>
        <nav class="header-nav">
            <ul>
                <li><a href="../Website/Website.php">Home</a></li>
                <li><a href="../Login/Login.php">Login</a></li>
                <li><a href="../SignUP/index.php">Add User</a></li>

                <!-- Add other navigation links as needed -->
            </ul>
        </nav>
    </div>
</header>


<main>
    <div class="description">
        <h2>Welcome to TechWizards Solutions</h2>
        <p>
        At TechWizards Solutions, we combine cutting-edge innovation with deep industry <br> expertise to deliver seamless solutions 
        tailored to your business needs. Whether <br> you're looking for intuitive mobile apps, robust enterprise systems, or transformative 
        <br> digital solutions, we are your trusted partners in driving technological excellence. <br> Join us on a journey of innovation and
         efficiency, where we harness the power of <br> technology to empower your business and exceed your goals. Experience the magic <br> of
           technology with TechWizards Solutions.
        </p>
    </div>

    <div class="slideshow-container">
        <!-- Full-width images with number and caption text -->
        <img class="mySlides fade" src="../Img/Second.jpg">
        <img class="mySlides fade" src="../Img/f2.jpg">
        <img class="mySlides fade" src="../Img/f3.jpeg">
        <!--<img class="mySlides fade" src="../Img/1.jpg">-->

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
</main>


    <footer>
        <p>&copy; 2024 User Management System. All rights reserved.</p>
    </footer>

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex-1].style.display = "block";
            setTimeout(showSlides, 3000); // Change image every 3 seconds
        }

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
    </script>
</body>
</html>
