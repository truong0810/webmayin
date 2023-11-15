<?php
session_start();

// Kiểm tra xem có dữ liệu đã nhập được gửi từ trang process_signup.php không
if (isset($_SESSION['signup_data'])) {
  $signupData = $_SESSION['signup_data'];

  // Gán giá trị từ session vào các biến tương ứng (hoặc sử dụng trực tiếp $_SESSION['signup_data']['fullname'], $_SESSION['signup_data']['username'], ...)
  $fullname = $signupData['fullname'];
  $username = $signupData['username'];
  $email = $signupData['email'];
  $phone = $signupData['phone'];
  $address = $signupData['address'];
  $password = $signupData['password'];
  $confirmPassword = $signupData['confirm-password'];

  // Xóa dữ liệu đã lưu trữ trong session
  unset($_SESSION['signup_data']);
} else {
  // Khởi tạo các biến với giá trị mặc định
  $fullname = '';
  $username = '';
  $email = '';
  $phone = '';
  $address = '';
  $password = '';
  $confirmPassword = '';
}

// Xử lý form và gửi dữ liệu đến process_signup.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Lưu trữ dữ liệu đăng ký vào session
  $_SESSION['signup_data'] = $_POST;

  // Điều hướng đến trang process_signup.php
  header("Location: process_signup.php");
  exit();
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
    @layer base {

      input[type='number']::-webkit-outer-spin-button,
      input[type='number']::-webkit-inner-spin-button,
      input[type='number'] {
        -webkit-appearance: none;
        margin: 0;
      }
    }

    .hidden-scroll::-webkit-scrollbar {
      display: none;
    }

    .hidden-scroll {
      scrollbar-width: none;
    }

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
  <title>Sign Up</title>
</head>

<body>
  <div class="bg-gray-50">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 h-[500px] overflow-y-auto hidden-scroll">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl uppercase text-center">
            Đăng ký
          </h1>

          <form class="space-y-4" method="post" action="process_signup.php">
            <div>
              <label for="fullname" class="block mb-1 text-sm font-medium text-gray-900">Fullname</label>
              <input type="text" name="fullname" id="fullname" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Please enter your fullname" autocomplete="off" value="<?php echo $fullname; ?>" />
            </div>
            <div>
              <label for="username" class="block mb-1 text-sm font-medium text-gray-900">Username</label>
              <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Please enter your username" autocomplete="off" value="<?php echo $username; ?>" />
            </div>

            <div>
              <label for="email" class="block mb-1 text-sm font-medium <?= isset($_GET['emails']) ? 'text-red-600' : 'text-gray-900' ?>">Email</label>
              <input type="email" name="email" id="email" class="bg-gray-50 border sm:text-sm rounded-lg block w-full p-2.5 <?= isset($_SESSION['error_email']) ? 'border-red-600 text-red-600 focus:ring-red-600 focus:border-red-600'  : 'border-gray-300 text-gray-900 focus:ring-primary-600 focus:border-primary-600' ?>" value="<?php echo $confirmPassword; ?>" placeholder="name@company.com" autocomplete="off" value="<?php echo $email; ?>" />
              <?php if (isset($_SESSION['error_email'])) : ?>
                <p class="text-red-600 text-xs font-medium"><?= $_SESSION['error_email'] ?></p>
              <?php endif; ?>
              <?php unset($_SESSION['error_email']) ?>
            </div>

            <div>
              <label for="phone" class="block mb-1 text-sm font-medium text-gray-900">Phone</label>
              <input type="number" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Please enter your number phone" autocomplete="off" value="<?php echo $phone; ?>" />
            </div>

            <div>
              <label for="address" class="block mb-1 text-sm font-medium text-gray-900">Address</label>
              <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Please enter your address" autocomplete="off" value="<?php echo $address; ?>" />
            </div>

            <div class="password-toggle">
              <label for="password" class="block mb-1 text-sm font-medium text-gray-900">Password</label>
              <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="<?php echo $password; ?>" />
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
            <div class="password-toggle">
              <label for="confirm-password" class="block mb-1 text-sm font-medium <?= isset($_SESSION['error_confirmPassword']) ? 'text-red-600' : 'text-gray-900' ?>">Confirm password</label>
              <div class=" relative">
                <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border sm:text-sm rounded-lg block w-full p-2.5 <?= isset($_SESSION['error_confirmPassword']) ? 'border-red-600 text-red-600 focus:ring-red-600 focus:border-red-600'  : 'border-gray-300 text-gray-900 focus:ring-primary-600 focus:border-primary-600' ?>" value="<?php echo $confirmPassword; ?>" />
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

              <?php if (isset($_SESSION['error_confirmPassword'])) : ?>
                <p class="text-red-600 text-xs font-medium"><?= $_SESSION['error_confirmPassword'] ?></p>
              <?php endif; ?>
              <?php unset($_SESSION['error_confirmPassword']) ?>
            </div>

            <div class="flex items-start">
              <div class="flex items-center h-5">
                <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300" />
              </div>
              <div class="ml-3 text-sm">
                <label for="terms" class="font-light text-gray-500">I accept the
                  <a class="font-medium text-primary-600 hover:underline" href="#">Terms and Conditions</a></label>
              </div>
            </div>
            <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center uppercase" name="user_signup">
              Đăng Ký
            </button>
            <p class="text-sm font-light text-gray-500">
              Already have an account?
              <a href="signin.php" class="font-medium text-primary-600 hover:underline">Login here</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    const toggleButtons = document.querySelectorAll('.password-toggle .icon');

    toggleButtons?.forEach((toggleButton) => {
      toggleButton.addEventListener('click', function() {
        const input = this.closest('.password-toggle').querySelector(
          '.password-toggle input'
        );
        if (input) {
          const inputType = input.getAttribute('type');
          input.setAttribute(
            'type',
            inputType === 'password' ? 'text' : 'password'
          );
          const icons = this.children;
          [...icons].forEach((item) => item.classList.toggle('is-active'));
        }
      });
    });
  </script>
</body>

</html>