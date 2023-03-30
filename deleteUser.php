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

      <a href="homeUser.php">
        <button class="btn btn-secondary w-28 justify-between">Home <span class="material-symbols-outlined">
            home
          </span>
        </button>
      </a>
    </div>

    <div class="flex flex-col items-center justify-center h-fill mb-32">
      <div class="flex flex-col gap-y-2 bg-primary p-8 rounded-lg items-center">
        <h1 class="text-5xl text-primary-content font-extrabold text-center mb-2">
          Table of reservations
        </h1>

        <form action="deleteUser.php" method="post">
          <?php
          session_start();
          $username = $_SESSION['username'];

          echo "<h1 class='text-3xl text-primary-content font-extrabold text-center mb-8'>$username</h1>";

          $con = mysqli_connect("localhost", "root", null, "db_bed_and_breakfast");

          if (isset($_POST['delete'])) {
            if (isset($_POST["checkbox"])) {
              foreach ($_POST["checkbox"] as $id) {
                $delReservation = "DELETE FROM prenotazioni WHERE id='$id'";
                $resultReservation = mysqli_query($con, $delReservation);
              }
              if ($resultStay && $resultReservation) {
                echo "<b class='text-primary-content'>Deletion Successful. </b>";
              } else {
                echo "ERROR: Could not execute";
              }
            } else {
              echo "<b class='text-primary-content'>Please select at least one record to delete.</b>";
            }
          }
          ?>

          <table class="table table-zebra text-center">
            <thead>
              <tr>
                <th>#</th>
                <th>Room</th>
                <th>Arrival Date</th>
                <th>Departure Date</th>
              </tr>

              <?php
              $userId = $_SESSION['codice'];
              $con = mysqli_connect("localhost", "root", null, "db_bed_and_breakfast");
              $fqn = "SELECT * FROM prenotazioni
                        JOIN camere ON prenotazioni.Camera = camere.Numero
                        WHERE Cliente = '$userId' ORDER BY Cliente";
              $fqn_run = mysqli_query($con, $fqn);

              while ($row = mysqli_fetch_array($fqn_run)) :
              ?>
            </thead>
            <tbody>
              <tr>
                <td class="check"><input class="checkbox" name="checkbox[]" type="checkbox" value="<?php echo $row["id"]; ?>"></td>
                <td><?php echo $row['Descrizione']; ?></td>
                <td><?php echo $row['DataArrivo']; ?></td>
                <td><?php echo $row['DataPartenza']; ?></td>
              </tr><?php endwhile; ?>
            </tbody>
          </table>

          <div class="flex w-full justify-end">
            <button class="btn btn btn-error btn-outline justify-between mt-4" type="submit" name="delete">Delete <span class="material-symbols-outlined">
                delete
              </span>
            </button>
          </div>
        </form>
      </div>
    </div>

    
  </div>
</body>

</html>