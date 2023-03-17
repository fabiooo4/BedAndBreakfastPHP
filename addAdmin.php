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
        <h1 class="text-5xl font-extrabold text-center text-primary-content mb-8">
          Add a reservation
        </h1>

        <form action="addedAdmin.php" method="post" class="gap-y-4">
          <div class="flex flex-col gap-y-1">
            <?php
            $con = mysqli_connect("localhost", "root", null, "db_bed_and_breakfast");

            // Connection check
            if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              exit();
            }

            $query = "SELECT Codice, Nome, Cognome FROM clienti";
            $result = mysqli_query($con, $query);

            if (!$result) {
              echo "Error: " . $query . "<br>" . mysqli_error($con);
              exit();
            } else {
              echo "<label for='user' class='font-bold text-primary-content'>User</label>";
              echo "<select name='user' id='user' class='select bg-base-content text-base-100 select-bordered w-96' required>";
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['Codice'] . "'>" . $row['Codice'] . " - " . $row['Cognome'] . " " . $row['Nome'] . "</option>";
              }
              echo "</select>";
            }
            ?>
          </div>

          <div class="flex flex-col gap-y-1">
            <?php
            $con = mysqli_connect("localhost", "root", null, "db_bed_and_breakfast");

            // Connection check
            if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              exit();
            }

            $query = "SELECT Numero, Descrizione FROM camere";
            $result = mysqli_query($con, $query);

            if (!$result) {
              echo "Error: " . $query . "<br>" . mysqli_error($con);
              exit();
            } else {
              echo "<label for='room' class='font-bold text-primary-content'>Room</label>";
              echo "<select name='room' id='room' class='select bg-base-content text-base-100 select-bordered w-96' required>";
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['Numero'] . "'>" . $row['Numero'] . " - " . $row['Descrizione'] . "</option>";
              }
              echo "</select>";
            }

            mysqli_close($con);
            ?>
          </div>

          <div class="flex flex-col gap-y-1">
            <label for="arrivalDate" class="font-bold text-primary-content">Check-in</label>
            <input type="date" name="arrivalDate" id="arrivalDate" class="input bg-base-content text-base-100 input-bordered w-96" required>
          </div>

          <div class="flex flex-col gap-y-1">
            <label for="departureDate" class="font-bold text-primary-content
            ">Check-out</label>
            <input type="date" name="departureDate" id="departureDate" class="input bg-base-content text-base-100 input-bordered w-96" required>
          </div>

          <div class="flex w-full justify-end mt-4">
            <button type="submit" class="btn btn-secondary btn-outline text-primary-content hover:text-secondary-content focus:text-secondary-content w-28 justify-between">Add <span class="material-symbols-outlined">
                add
              </span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>