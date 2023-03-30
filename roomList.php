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

    <div class="grid grid-cols-3 mb-32 mx-64 mt-6 gap-y-8 gap-x-8 pb-16">
      <?php
      $con = mysqli_connect("localhost", "root", null, "db_bed_and_breakfast");

      // Connection check
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
      }

      $query = "SELECT * FROM camere";
      $result = mysqli_query($con, $query);

      while ($row = mysqli_fetch_array($result)) {
        echo "<div class='flex justify-center items-center'>
        <div class='card w-96 bg-base-300 shadow-xl h-96'>
          <figure><img src='https://source.unsplash.com/random/?" . $row["Descrizione"] . "' alt='Room' /></figure>
          <div class='card-body'>
            <h2 class='card-title'>" . $row['Descrizione'] . "</h2>
            <p>Available slots: " . $row['Posti'] . "</p>
            <div class='card-actions justify-end'>
              <a href='booking.php?room=" . $row['Numero'] . "'>
                <button class='btn btn-primary'>Book</button>
              </a>
            </div>
          </div>
        </div>
      </div>";
      }

      mysqli_close($con);
      ?>

    </div>
  </div>
</body>

</html>