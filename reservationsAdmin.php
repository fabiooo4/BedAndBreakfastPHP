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
    <div>
      <h1 class="text-9xl text-primary text-center font-extrabold mt-4">
        Letto e Colazione
      </h1>
    </div>

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

    <div class="flex flex-col items-center justify-center h-fill mb-32">
      <div class="flex flex-col gap-y-2 bg-primary p-8 rounded-lg items-center">
        <h1 class="text-5xl font-extrabold text-center text-primary-content mb-8">
          Table of reservations
        </h1>
        <?php
        $con = mysqli_connect("localhost", "root", null, "db_bed_and_breakfast");

        // Connection check
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          exit();
        }

        $query = "SELECT id, Numero, Cliente, Codice, nome, cognome, Descrizione, DataArrivo, DataPartenza FROM prenotazioni
                    JOIN clienti ON prenotazioni.Cliente = clienti.codice
                    JOIN camere ON prenotazioni.Camera = camere.Numero";
        $result = mysqli_query($con, $query);

        // Query check
        if (!$result = mysqli_query($con, $query)) {
          exit(mysqli_error($con));
        }

        echo "<table class='table table-zebra text-center'>
            <thead>
              <tr class='text-center'>
                <th>Surname</th>
                <th>Name</th>
                <th>Room</th>
                <th>Arrival Date</th>
                <th>Departure Date</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tbody>";

        while ($row = mysqli_fetch_array($result)) {
          echo "<td>" . $row['cognome'] . "</td>";
          echo "<td>" . $row['nome'] . "</td>";
          echo "<td>" . $row['Descrizione'] . "</td>";
          echo "<td>" . $row['DataArrivo'] . "</td>";
          echo "<td>" . $row['DataPartenza'] . "</td>";
          echo "<td>
                  <a href='editReservation.php?id=" . $row['id'] . "' class='text-base-content'>
                    <span class='material-symbols-outlined'>
                      edit
                    </span>
                  </a>
                </td>";
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