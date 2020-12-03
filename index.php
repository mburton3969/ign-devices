<?php
include 'assets/php/connection.php';
$cache_buster = uniqid();
?>
<html>
  <head>
    <title>Device Donation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.5.9/css/uikit.min.css" integrity="sha512-Xqa8NIcI5CmhT3dLIwJ/NOX2lzdnApXaRsDOEXijQZJ/WVhZon1xLjD8/RppPqbvIoM2buTnXgi1/QsUVmixqw==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.5.9/js/uikit.min.js" integrity="sha512-OZ9Sq7ecGckkqgxa8t/415BRNoz2GIInOsu8Qjj99r9IlBCq2XJlm9T9z//D4W1lrl+xCdXzq0EYfMo8DZJ+KA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.5.9/js/uikit-icons.min.js" integrity="sha512-hcz3GoZLfjU/z1OyArGvM1dVgrzpWcU3jnYaC6klc2gdy9HxrFkmoWmcUYbraeS+V/GWSgfv6upr9ff4RVyQPw==" crossorigin="anonymous"></script>
    <link href="assets/css/style.css?cb=<?php echo $cache_buster; ?>" rel="stylesheet" />
  </head>
  <body>
    
    <?php include 'form-sections/main-logo.php'; ?>
    
    <form id="device_donation_form">
      
      <?php include 'form-sections/device-category.php'; ?>
    
      <?php include 'form-sections/device-type.php'; ?>
      
    </form>
      
    <?php include 'form-sections/device-submit.php'; ?>
    
  </body>
  <script src="assets/js/app.js?cb=<?php echo $cache_buster; ?>"></script>
</html>