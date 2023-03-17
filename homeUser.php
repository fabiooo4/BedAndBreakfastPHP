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
    </div>

    <?php
    session_start();
    $username = $_SESSION['username'];

    echo "<p class='text-3xl text-base-content font-bold text-center mt-4'>
            Welcome $username!
          </p>"
    ?>


    <div class="flex flex-col items-center justify-center h-full mb-32">
      <div class="flex flex-col gap-y-2 items-center bg-primary rounded-lg p-8 ">
        <h1 class="text-4xl text-primary-content font-bold text-center mb-8">
          What do you want to do?
        </h1>
        <a href="reservationsUser.php">
          <button class="btn btn-lg w-52 justify-between btn-info">Reservations <span class="material-symbols-outlined">
              visibility
            </span>
          </button>
        </a>
        <a href="roomList.php">
          <button class="btn btn-lg w-52 justify-between btn-success">Add <span class="material-symbols-outlined">
              add
            </span>
          </button>
        </a>
        <a href="deleteUser.php">
          <button class="btn btn-lg w-52 justify-between btn-error">Remove <span class="material-symbols-outlined">
              delete
            </span>
          </button>
        </a>
      </div>
    </div>
  </div>
</body>

</html>