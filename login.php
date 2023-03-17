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

  if (isset($_POST['username']) && isset($_POST['email'])) {
    $username = $_POST['username'];
    $user = explode(" ", $username);
    $email = $_POST['email'];

    if (count($user) == 1) {
      $user[1] = "";
    }

    $query = "SELECT * FROM clienti WHERE Nome = '$user[1]' AND Cognome = '$user[0]' AND Email = '$email'";

    if ($username == "admin" && $email == "admin") {
      header("Location: homeAdmin.php");
    } else if ($username != "admin" && $email != "admin" && $username != "" && $email != "") {
      $result = mysqli_query($con, $query);

      $row = mysqli_fetch_array($result);
      if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['codice'] = $row['Codice'];
        header("Location: homeUser.php");
      }
    }
  }
  ?>
  <div class="flex flex-col h-screen">
    <h1 class="text-9xl text-primary text-center font-extrabold mt-4">
      Letto e Colazione
    </h1>

    <p class="text-2xl text-base-content font-bold text-center mt-4">
      Welcome to Letto e Colazione, the best bed and breakfast in the world!
    </p>

    <div class="flex flex-col items-center justify-center h-full mb-48">

      <div class="flex flex-col gap-y-2 bg-primary rounded-lg p-8 items-center">
        <h1 class="text-5xl text-primary-content font-extrabold text-center mb-8">
          Login
        </h1>
        <!-- Username and email -->
        <form action="login.php" method="post">
          <div class="flex flex-col gap-y-2 items-center text-primary-content">
            <label for="username" class="font-bold">Username (Surname Name)</label>
            <input type="text" name="username" id="username" placeholder="Username" required class="input bg-base-content text-base-100">
            <label for="email" class="font-bold">Email</label>
            <input type="text" name="email" id="email" placeholder="Email" required class="input bg-base-content text-base-100">
            <div class="flex w-full justify-end">
              <button type="submit" class="btn btn-secondary btn-outline text-primary-content focus:text-base-content hover:text-base-content mt-4 w-1/2 px-4 justify-between">Login <span class="material-symbols-outlined">
                  person
                </span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>