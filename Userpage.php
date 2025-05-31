<?php
session_start();

if (!isset($_SESSION['UserID'])) {
    header("Location: index.php");
    exit();
}

$conn = mysqli_connect('localhost', 'root', '', 'user');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$UserID = $_SESSION['UserID'];
$sql = "SELECT * FROM userregistration WHERE UserId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $UserID);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Calculate age
$bday = new DateTime($row['BirthDate']);
$today = new DateTime();
$age = $today->diff($bday)->y;

// Fetch vaccine records
$fetchingQuery = $conn->prepare("SELECT `id`, `VaccineName`, `VaccineDose`, `VaccineDate` FROM `records` WHERE Uid = ?");
$fetchingQuery->bind_param("i", $UserID);
$fetchingQuery->execute();
$vacc_result = $fetchingQuery->get_result();
$vacc_records = array();

while($vacc_row = $vacc_result->fetch_assoc()) {
    $vacc_records[] = $vacc_row;
}

$stmt->close();
$fetchingQuery->close();
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCL - TRUE LIFE CARE</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            margin-bottom: 20px;
        }

        .user-info-section {
            padding: 20px;
        }

        .user-info-section label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .vaccine-records {
            background: var(--white);
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .vaccine-records h3 {
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .vaccine-record-item {
            border-bottom: 1px solid var(--light-bg);
            padding: 10px 0;
        }

        .vaccine-record-item:last-child {
            border-bottom: none;
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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="user-info-section">
                                    <h3>Personal Information</h3>
                                    <label>Child Name: <?php echo htmlspecialchars($row['ChildName']); ?></label>
                                    <label>Father Name: <?php echo htmlspecialchars($row['FatherName']); ?></label>
                                    <label>Mother Name: <?php echo htmlspecialchars($row['MotherName']); ?></label>
                                    <label>Birth Date: <?php echo htmlspecialchars($row['BirthDate']); ?></label>
                                    <label>Email: <?php echo htmlspecialchars($row['Email']); ?></label>
                                    <label>Mobile Number: <?php echo htmlspecialchars($row['Contact']); ?></label>
                                    <label>Address: <?php echo htmlspecialchars($row['Address']); ?></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="user-info-section">
                                    <h3>Medical Information</h3>
                                    <label>Age: <?php echo $age; ?></label>
                                    <label>Height: <?php echo htmlspecialchars($row['Height']); ?> cm</label>
                                    <label>Weight: <?php echo htmlspecialchars($row['Weight']); ?> kg</label>
                                    <label>Blood Group: <?php echo htmlspecialchars($row['BloodGroup']); ?></label>
                                    <label>Gender: <?php echo htmlspecialchars($row['Gender']); ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="vaccine-records">
                    <h3>Vaccine Records</h3>
                    <div id="vaccineRecords">
                        <?php
                        if(isset($vacc_records) && !empty($vacc_records)) {
                            foreach($vacc_records as $record) {
                                echo '<div class="vaccine-record-item">';
                                echo '<strong>' . htmlspecialchars($record['VaccineName']) . '</strong> - ';
                                echo 'Dose: ' . htmlspecialchars($record['VaccineDose']) . ' - ';
                                echo 'Date: ' . htmlspecialchars($record['VaccineDate']);
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
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>