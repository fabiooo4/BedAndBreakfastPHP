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

      <a href="homeUser.php">
        <button class="btn btn-secondary w-28 justify-between">Home <span class="material-symbols-outlined">
            home
          </span>
        </button>
      </a>
    </div>

    <div class="flex flex-col items-center justify-center h-fill mb-32">
      <div class="flex flex-col gap-y-2 items-center bg-primary rounded-lg p-8">
        <h1 class="text-5xl text-primary-content font-extrabold text-center mb-2">
          Table of reservations
        </h1>
        <?php
        session_start();
        $id = $_SESSION['codice'];
        $username = $_SESSION['username'];
        $con = mysqli_connect("localhost", "root", null, "db_bed_and_breakfast");

        // Connection check
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          exit();
        }

        echo "<h1 class='text-3xl text-primary-content font-extrabold text-center mb-8'>$username</h1>";

        $query = "SELECT id, Descrizione, DataArrivo, DataPartenza FROM prenotazioni
                  JOIN camere ON prenotazioni.Camera = camere.Numero
                  WHERE Cliente = '$id'
                  ORDER BY Cliente";
        $result = mysqli_query($con, $query);

        // Query check
        if (!$result = mysqli_query($con, $query)) {
          exit(mysqli_error($con));
        }

        echo "<table class='table table-zebra text-center'>
            <thead>
              <tr class='text-center'>
                <th>Room</th>
                <th>Arrival Date</th>
                <th>Departure Date</th>
              </tr>
            </thead>
            <tbody>";

        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['Descrizione'] . "</td>";
          echo "<td>" . $row['DataArrivo'] . "</td>";
          echo "<td>" . $row['DataPartenza'] . "</td>";
          echo "</tr>";
        }

        echo "</tbody>
          </table>";

        mysqli_close($con);
        ?>
      </div>
    </div>
  </div>
</body>

</html>