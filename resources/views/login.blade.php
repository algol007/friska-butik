<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login - Frisqa Butik</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/costum.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
      <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center relative bg-login">
        <div class="h-screen w-full absolute z-10 bg-black opacity-40"></div>

        @if(session('error'))
        <div class="text-white py-2 w-full md:w-1/2 lg:w-1/3 shadow-xl rounded text-center relative z-20 bg-red-500">
            <b>Opps!</b> {{session('error')}}
        </div>
        @endif

        <div class="bg-white w-full md:w-1/2 lg:w-1/3 shadow-xl rounded p-8 relative z-20">
          <h1 class="text-3xl font-bold text-center text-primary">FRISQA BUTIK</h1>

          <form method="POST" action="/login" class="space-y-5 mt-5" onsubmit="login()">
            @csrf
            <div>
              <label for="username" class="text-primary font-bold">Username</label>
              <input type="text" id="username" name="username" class="w-full rounded text-gray-600 text-sm border border-primary p-3" placeholder="Masukan Username" />
            </div>
            <div>
              <label for="password" class="text-primary font-bold">Password</label>
              <input type="password" id="password" name="password" class="w-full rounded text-gray-600 text-sm border border-primary p-3" placeholder="Masukan Password" />
            </div>

            <button type="submit" class="text-center w-full bg-secondary rounded-md text-white py-3 font-medium" onclick="login()">Login</button>
          </form>
        </div>
      </div>

      <script>
        localStorage.clear();

        function login() {
          localStorage.setItem("login", true);
        }
      </script>
    </body>
</html>
