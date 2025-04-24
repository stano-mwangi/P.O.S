<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern School Homepage</title>
     <!-- bootstrap core css -->
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}" />
      <!-- font awesome style -->
      <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
      <link href="{{asset('/font-awesome/css/all.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template-->
      <link href="{{asset('/css/style.css')}}" rel="stylesheet" /> 

   
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Your School Name</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section text-center">
        <div class="container">
            <h1 class="display-4">Welcome to Your School Name</h1>
            <p class="lead">A place to learn, grow, and succeed.</p>
            <a href="#about" class="btn btn-primary">Learn More</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="school_image.jpg" alt="School Image" class="img-fluid rounded">
                </div>
                <div class="col-md-6">
                    <h2>About Us</h2>
                    <p>Your School Name is dedicated to providing quality education with a focus on student development, innovation, and excellence.</p>
                    <ul>
                        <li><i class="fas fa-chalkboard-teacher"></i> Experienced Faculty</li>
                        <li><i class="fas fa-book"></i> Comprehensive Curriculum</li>
                        <li><i class="fas fa-school"></i> State-of-the-art Facilities</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Gallery</h2>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <img src="gallery1.jpg" class="img-fluid rounded" alt="Gallery Image 1">
                </div>
                <div class="col-md-4 mb-3">
                    <img src="gallery2.jpg" class="img-fluid rounded" alt="Gallery Image 2">
                </div>
                <div class="col-md-4 mb-3">
                    <img src="gallery3.jpg" class="img-fluid rounded" alt="Gallery Image 3">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2023 Your School Name. All rights reserved.</p>
            <p>
                <a href="#" class="text-white"><i class="fab fa-facebook-f mr-2"></i></a>
                <a href="#" class="text-white"><i class="fab fa-twitter mr-2"></i></a>
                <a href="#" class="text-white"><i class="fab fa-instagram mr-2"></i></a>
            </p>
        </div>
    </footer>

    @include('jquery')
    @include('js')
</body>
</html>
