<?php
session_start();

// Check if booth is logged in
if (!isset($_SESSION['BoothID'])) {
    header("Location: Boothpage.php");
    exit();
}

$conn = mysqli_connect('localhost', 'root', '', 'user');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$BoothID = $_SESSION['BoothID'];

// Handle user ID submission
if(isset($_POST['submit-user'])) {
    $UserID = $_POST['UserID'];
    
    // Verify user exists
    $stmt = $conn->prepare("SELECT * FROM userregistration WHERE UserId = ?");
    $stmt->bind_param("i", $UserID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['CurrentUserID'] = $UserID;
        $user_found = true;
    } else {
        $user_error = "User not found. Please check the User ID.";
    }
    $stmt->close();
}

// Handle vaccine record submission
if(isset($_POST['submit-vaccine']) && isset($_SESSION['CurrentUserID'])) {
    $UserID = $_SESSION['CurrentUserID'];
    $VaccineName = $_POST['VaccineName'];
    $VaccineDose = $_POST['VaccineDose'];
    $VaccineDate = $_POST['VaccineDate'];
    
    $stmt = $conn->prepare("INSERT INTO `records`(`id`, `Uid`, `VaccineName`, `VaccineDose`, `VaccineDate`) VALUES ('', ?, ?, ?, ?)");
    $stmt->bind_param("isss", $UserID, $VaccineName, $VaccineDose, $VaccineDate);
    $stmt->execute();
    $stmt->close();
}

// Fetch vaccine records if user is selected
if(isset($_SESSION['CurrentUserID'])) {
    $UserID = $_SESSION['CurrentUserID'];
    $fetchingQuery = $conn->prepare("SELECT `id`, `VaccineName`, `VaccineDose`, `VaccineDate` FROM `records` WHERE Uid = ?");
    $fetchingQuery->bind_param("i", $UserID);
    $fetchingQuery->execute();
    $vacc_result = $fetchingQuery->get_result();
    $vacc_records = array();

    while($vacc_row = $vacc_result->fetch_assoc()) {
        $vacc_records[] = $vacc_row;
    }
    $fetchingQuery->close();
}

// Handle record deletion
if(isset($_POST['delete'])) {
    $record_id = $_POST['record_id'];
    $deleteQuery = $conn->prepare("DELETE FROM `records` WHERE id = ?");
    $deleteQuery->bind_param("i", $record_id);
    $deleteQuery->execute();
    $deleteQuery->close();
}

// Handle change user
if(isset($_POST['change_user'])) {
    unset($_SESSION['CurrentUserID']);
    header("Location: third.php");
    exit();
}

// Fetch user details if user is selected
$user_data = null;
if(isset($_SESSION['CurrentUserID'])) {
    $user_id = $_SESSION['CurrentUserID'];
    $user_query = $conn->prepare("SELECT ChildName, UserId FROM userregistration WHERE UserId = ?");
    $user_query->bind_param("i", $user_id);
    $user_query->execute();
    $user_result = $user_query->get_result();
    $user_data = $user_result->fetch_assoc();
    $user_query->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCL - Add Vaccine Record</title>
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
            background: var(--white);
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

        .box1forbooth {
            background: var(--white);
            border: 1px solid var(--accent-color);
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1.5rem;
            margin: 1rem;
        }

        .temp4 {
            background: var(--white);
            border: 1px solid var(--accent-color);
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1.5rem;
            margin: 1rem;
            max-height: 500px;
            overflow-y: auto;
        }

        .umi {
            background: var(--light-bg);
            border: 1px solid var(--accent-color);
            border-radius: 8px;
            padding: 1rem;
            margin: 0.5rem 0;
        }

        .deletebtn {
            background: var(--primary-color);
            color: var(--white);
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
        }

        .section-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .form-control {
            background: var(--light-bg);
            border: 2px solid transparent;
            border-radius: 10px;
            padding: 12px 15px;
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
        }

        .btn-primary:hover {
            background: var(--secondary-color);
        }

        .error-message {
            color: #E53E3E;
            margin-top: 1rem;
            text-align: center;
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
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <?php if(!isset($_SESSION['CurrentUserID'])): ?>
            <!-- User ID Input Form -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="box1forbooth">
                        <h3 class="section-title text-center">Enter User ID</h3>
                        <?php if(isset($user_error)): ?>
                            <div class="error-message"><?php echo $user_error; ?></div>
                        <?php endif; ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">User ID</label>
                                <input type="number" class="form-control" name="UserID" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" name="submit-user">Continue</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Vaccine Record Form -->
            <div class="row">
                <div class="col-md-4">
                    <div class="box1forbooth">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="section-title mb-0">Add Vaccine Record</h3>
                            <form method="POST" class="d-inline">
                                <button type="submit" class="btn btn-outline-primary" name="change_user">Change User</button>
                            </form>
                        </div>
                        
                        <div class="user-details mb-3 p-3" style="background: var(--light-bg); border-radius: 8px;">
                            <h5 class="mb-2">Current User:</h5>
                            <p class="mb-1"><strong>Name:</strong> <?php echo htmlspecialchars($user_data['ChildName']); ?></p>
                            <p class="mb-0"><strong>ID:</strong> <?php echo htmlspecialchars($user_data['UserId']); ?></p>
                        </div>

                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Vaccine Name</label>
                                <input type="text" class="form-control" name="VaccineName" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vaccine Dose</label>
                                <input type="text" class="form-control" name="VaccineDose" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vaccine Date</label>
                                <input type="date" class="form-control" name="VaccineDate" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" name="submit-vaccine">Add Record</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="temp4">
                        <h3 class="section-title">Vaccine Records</h3>
                        <div id="vaccineRecords">
                            <?php
                            if(isset($vacc_records) && !empty($vacc_records)) {
                                foreach($vacc_records as $record) {
                                    echo '<div class="umi">';
                                    echo '<strong>' . htmlspecialchars($record['VaccineName']) . '</strong> - ';
                                    echo 'Dose: ' . htmlspecialchars($record['VaccineDose']) . ' - ';
                                    echo 'Date: ' . htmlspecialchars($record['VaccineDate']);
                                    echo '<form method="POST" class="mt-2">';
                                    echo '<input type="hidden" name="record_id" value="' . $record['id'] . '">';
                                    echo '<button type="submit" class="deletebtn" name="delete">Delete</button>';
                                    echo '</form>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<p>No vaccine records found.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the database connection at the very end
mysqli_close($conn);
?>