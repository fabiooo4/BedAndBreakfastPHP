<!DOCTYPE html>
<html lang="en" data-theme="halloween" style="background-image: url(background.png);" class="bg-repeat">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Letto e Colazione</title>
</head>

<body>
  <div class="flex flex-col h-screen">
    <h1 class="text-9xl text-primary text-center font-extrabold mt-4">
      Letto e Colazione
    </h1>

    <div class="flex m-2 justify-center gap-x-4">
      <a href="login.php">
        <button class="btn btn-error w-32 justify-between">Logout
          <span class="material-symbols-outlined">
            logout
          </span>
        </button>
      </a>

      <a href="homeAdmin.php">
        <button class="btn btn-secondary w-28 justify-between">Home <span class="material-symbols-outlined">
            home
          </span>
        </button>
      </a>
    </div>

    <div class="flex flex-col items-center justify-center h-full mb-32">
      <div class="flex flex-col gap-y-2 bg-primary p-8 rounded-lg items-center">
        <?php
        $con = mysqli_connect("localhost", "root", null, "db_bed_and_breakfast");

        // Connection check
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          exit();
        }

        if (isset($_POST['user']) && isset($_POST['room']) && isset($_POST['arrivalDate']) && isset($_POST['departureDate'])) {
          $userId = $_POST['user'];
          $roomId = $_POST['room'];
          $arrivalDate = $_POST['arrivalDate'];
          $departureDate = $_POST['departureDate'];

          $query = "INSERT INTO prenotazioni (Cliente, Camera, DataArrivo, DataPartenza) VALUES ('$userId', '$roomId', '$arrivalDate', '$departureDate')";

          // Query check
          if (!$result = mysqli_query($con, $query)) {
            echo "<script>alert('Reservation failed')</script>";
            header("Location: homeAdmin.php");
          } else {
            // echo "<p class='text-4xl font-extrabold text-center text-primary-content mb-8'>
            // Reservation added successfully!
            // </p>";
            header("Location: reservationsAdmin.php");
          }
        } else {
          echo "<script>alert('Reservation failed')</script>";
          header("Location: homeAdmin.php");
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>