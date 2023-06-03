
<?php if (session()->getFlashdata('error')) { ?>
           
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
        <p class="font-bold">Warning</p>
        <p>  <?php echo session()->getFlashdata('error') ?>.</p>
    </div>
    
            
 <?php } ?>
<div class="container lg:mx-auto py-5 lg:flex lg:justify-center bg-gradient-to-br from-cyan-500 to-blue-500">

<div class="flex flex-col items-center justify-center lg:w-5/12 px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-slate-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                 LOGIN ADMIN
              </h1>
              <form class="space-y-4 md:space-y-6"  action="<?= base_url(); ?>/login/process" method="POST">
                  <div>
                      <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                      <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-cyan-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="password" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-cyan-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                  <div class="flex items-center justify-between">
                     
                  </div>
                  <button type="submit" class="w-full text-white bg-cyan-600 hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                 
              </form>
          </div>
      </div>
  </div>




<script>
    const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#inputPassword');
 
  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>