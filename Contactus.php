<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCL - Contact Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2B6CB0;
            --secondary-color: #4299E1;
            --accent-color: #63B3ED;
            --text-color: #2D3748;
            --light-bg: #EBF8FF;
            --white: #FFFFFF;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--light-bg) 0%, var(--white) 100%);
            min-height: 100vh;
            color: var(--text-color);
            padding-top: 60px;
        }

        .navbar {
            background: var(--white) !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 0.5rem 1rem;
            height: 60px;
        }

        .navbar-brand {
            color: var(--primary-color) !important;
            font-weight: 600;
            font-size: 1.3rem;
            padding: 0.5rem 0;
        }

        .nav-link {
            color: var(--text-color) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem !important;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary-color) !important;
        }

        .navbar-toggler {
            padding: 0.25rem 0.5rem;
            font-size: 1rem;
        }

        .card {
            background: var(--white);
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .form-control {
            background: var(--light-bg);
            border: 2px solid transparent;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: var(--white);
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(99, 179, 237, 0.2);
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        .section-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 2rem;
        }

        .contact-info {
            background: var(--light-bg);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }

        .contact-info:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .contact-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .contact-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .contact-text {
            color: var(--text-color);
            margin-bottom: 0;
        }

        .container {
            padding-top: 2rem;
        }

        textarea.form-control {
            min-height: 150px;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-heartbeat me-2"></i>TCL
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Contactus.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">User Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Boothpage.php">Booth Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center section-title">Contact Us</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="contact-info text-center">
                                    <i class="fas fa-map-marker-alt contact-icon"></i>
                                    <h5 class="contact-title">Address</h5>
                                    <p class="contact-text">123 Health Street<br>Medical District<br>City, State 12345</p>
                                </div>
                                <div class="contact-info text-center">
                                    <i class="fas fa-phone contact-icon"></i>
                                    <h5 class="contact-title">Phone</h5>
                                    <p class="contact-text">+1 (123) 456-7890<br>+1 (123) 456-7891</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-info text-center">
                                    <i class="fas fa-envelope contact-icon"></i>
                                    <h5 class="contact-title">Email</h5>
                                    <p class="contact-text">info@tcl.com<br>support@tcl.com</p>
                                </div>
                                <div class="contact-info text-center">
                                    <i class="fas fa-clock contact-icon"></i>
                                    <h5 class="contact-title">Working Hours</h5>
                                    <p class="contact-text">Monday - Friday: 9:00 AM - 5:00 PM<br>Saturday: 10:00 AM - 2:00 PM</p>
                                </div>
                            </div>
                        </div>
                        <form method="POST" class="mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Subject</label>
                                <input type="text" class="form-control" name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Message</label>
                                <textarea class="form-control" name="message" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="submit-contact">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
if(isset($_POST['submit-contact'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'user');
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = $_POST['message'];
    
    $sql = "INSERT INTO querys (name, email, query) 
            VALUES ('$name', '$email', '$query')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Message sent successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
    
    mysqli_close($conn);
}
?>