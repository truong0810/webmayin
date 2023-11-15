<?php
require_once("admin/config/config.php");
session_start();

if (isset($_COOKIE['remember'])) {
  $token = $_COOKIE['remember'];
  $sql = "SELECT * FROM user WHERE token = '$token' LIMIT 1";
  $result = mysqli_query($mysqli, $sql);
  $num_rows = mysqli_num_rows($result);
  if ($num_rows == 1) {
    $each = mysqli_fetch_array($result);
    $_SESSION['name_user'] = $each['fullname'];
    $_SESSION['id_user'] = $each['id'];
    $_SESSION['avatar_user'] = $each['avatar'];
    $_SESSION['email_user'] = $each['email'];
  }
}
// Nếu mà có id thì tức là đang có tài khoản đăng nhập => điều hướng về lại index
if (isset($_SESSION['id_user'])) {
  header('Location:index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php
  require_once("pages/general.php")
  ?>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              50: '#eff6ff',
              100: '#dbeafe',
              200: '#bfdbfe',
              300: '#93c5fd',
              400: '#60a5fa',
              500: '#3b82f6',
              600: '#2563eb',
              700: '#1d4ed8',
              800: '#1e40af',
              900: '#1e3a8a',
              950: '#172554',
            },
          },
        },
        fontFamily: {
          body: ['Montserrat', 'sans-serif'],
        },
      },
    };
  </script>
  <style>
    .password-toggle {
      position: relative;
    }

    .eye-open,
    .eye-close {
      position: absolute;
      right: 10px;
      bottom: 0;
      transform: translateY(-30%);
      cursor: pointer;
    }

    .eye-close {
      display: none;
      visibility: hidden;
      opacity: 0;
    }

    .password-toggle .is-active {
      display: inline-block;
      visibility: visible;
      opacity: unset;
    }
  </style>
  <title>Sign In</title>
</head>

<body>
  <section class="bg-gray-50">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900  text-center uppercase">
            Đăng nhập
          </h1>
          <form class="space-y-4" action="process_signin.php" method="post">
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900"> Email</label>
              <input type="email" name="email" id="email" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" />
            </div>
            <div class="password-toggle">
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
              <div>
                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                <div class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 eye-open">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 eye-close">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                  </svg>
                </div>
              </div>
            </div>

            <?php if (isset($_GET['error'])) : ?>
              <p class="text-red-600 text-xs font-medium"><?= $_GET['error'] ?></p>
            <?php endif; ?>

            <div class="flex items-center justify-between">
              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input id="remember" name="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300" />
                </div>
                <div class="ml-3 text-sm">
                  <label for="remember" class="text-gray-500">Remember me</label>
                </div>
              </div>
              <a href="#" class="text-sm font-medium text-primary-600 hover:underline ">Forgot password?</a>
            </div>

            <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase" name="user_signin">
              Đăng nhập
            </button>
            <p class="text-sm font-light text-gray-500">
              Don’t have an account yet?
              <a href="signup.php" class="font-medium text-primary-600 hover:underline">Sign up</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script>
    const input = document.querySelector('.password-toggle input');
    const btnIcon = document.querySelector('.password-toggle .icon');
    btnIcon?.addEventListener('click', function() {
      const inputType = input?.getAttribute('type');
      input?.setAttribute(
        'type',
        inputType === 'password' ? 'text' : 'password'
      );
      const icons = this.children;
      [...icons].forEach((item) => item.classList.toggle('is-active'));
    });
  </script>
</body>

</html>