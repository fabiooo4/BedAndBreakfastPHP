<!DOCTYPE html>
<html lang="en" data-theme="halloween" style="background-image: url(background.png)" class="bg-repeat">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Letto e Colazione</title>
</head>

<body>
  <?php
  session_start();
  $con = mysqli_connect("localhost", "root", null, "db_bed_and_breakfast");

  if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['telephone'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $telephone = $_POST['telephone'];

    $query = "SELECT * FROM clienti WHERE Nome = '$name' AND Cognome = '$surname' AND Email = '$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
      echo "<script>alert('User already exists!')</script>";
    } else {
      $query = "INSERT INTO clienti (Nome, Cognome, Email, Indirizzo, Telefono) VALUES ('$name', '$surname', '$email', '$address', '$telephone')";
      $result = mysqli_query($con, $query);

      if ($result) {
        echo "<script>alert('User registered successfully!')</script>";
        header("Location: login.php");
      } else {
        echo "<script>alert('Invalid data')</script>";
      }
    }
  }
  ?>
  <div class="flex flex-col h-screen">
    <h1 class="text-9xl text-primary text-center font-extrabold mt-4">
      Letto e Colazione
    </h1>

    <p class="text-2xl text-base-content font-bold text-center my-4">
      Welcome to Letto e Colazione, the best bed and breakfast in the world!
    </p>

    <div class="flex flex-col items-center justify-center h-full mb-48">


      <div class="flex flex-col gap-y-2 bg-primary rounded-lg p-8 items-center">
        <h1 class="text-5xl text-primary-content font-extrabold text-center mb-8">
          Register
        </h1>

        <div class="flex relative">
          <form action="register.php" method="post">
            <div class="flex flex-col gap-y-2 items-center text-primary-content">
              <!-- Name -->
              <label for="name" class="font-bold">Name</label>
              <input type="text" name="name" id="name" placeholder="Name" required class="input bg-base-content text-base-100">
              <!-- Surname -->
              <label for="surname" class="font-bold">Surname</label>
              <input type="text" name="surname" id="surname" placeholder="Surname" required class="input bg-base-content text-base-100">
              <!-- Email -->
              <label for="email" class="font-bold">Email</label>
              <input type="email" name="email" id="email" placeholder="Email" required class="input bg-base-content text-base-100">
              <!-- Address -->
              <label for="address" class="font-bold">Address</label>
              <input type="text" name="address" id="address" placeholder="Address" required class="input bg-base-content text-base-100">
              <!-- Telephone -->
              <label for="telephone" class="font-bold">Telephone</label>
              <input type="tel" name="telephone" id="telephone" placeholder="+39" required class="input bg-base-content text-base-100">
              <div class="flex w-full justify-end items-center">

                <button type="submit" class="btn btn-secondary btn-outline text-primary-content focus:text-base-content hover:text-base-content ml-1 mt-4 w-1/2 px-4 justify-between">Register</button>
              </div>
            </div>
          </form>
          <a href="login.php" class="absolute left-0 bottom-0">
            <button class="btn btn-accent btn-ghost text-primary-content mt-4 mr-1">Back <span class="material-symbols-outlined">
                undo
              </span>
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>