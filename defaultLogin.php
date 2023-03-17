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
  <div class="flex flex-col h-screen">
    <h1 class="text-9xl text-primary text-center font-extrabold mt-4">
      Letto e Colazione
    </h1>

    <p class="text-2xl text-base-content font-bold text-center mt-4">
      Welcome to Letto e Colazione, the best bed and breakfast in the world!
    </p>

    <div class="flex flex-col items-center justify-center h-full mb-48">
      <h1 class="text-4xl text-base-content font-bold text-center mb-8">
        Please select a way to log-in
      </h1>
      <div class="flex flex-col gap-y-2 items-center">
        <a href="loginUser.php">
          <button class="btn btn-lg w-52 px-4 btn-secondary justify-between">Login as User <span class="material-symbols-outlined">
              person
            </span>
          </button>
        </a>
        <a href="homeAdmin.php">
          <button class="btn btn-lg w-52 px-4 btn-secondary justify-between">Login as Admin <span class="material-symbols-outlined">
              admin_panel_settings
            </span>
          </button>
        </a>
      </div>
    </div>
  </div>
</body>

</html>