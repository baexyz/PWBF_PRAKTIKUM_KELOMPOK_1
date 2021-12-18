<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> @yield('title') </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/img/dashboard/favicon.png" rel="icon">
  <link href="/img/dashboard/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  {{-- <link href="/vendor/dashboard/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  {{-- <link href="/vendor/dashboard/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link href="/vendor/dashboard/remixicon/remixicon.css" rel="stylesheet">
  <link href="/vendor/dashboard/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/vendor/dashboard/quill/quill.snow.css" rel="stylesheet">
  <link href="/vendor/dashboard/quill/quill.bubble.css" rel="stylesheet">
  {{-- <link href="/vendor/dashboard/simple-datatables/style.css" rel="stylesheet"> --}}
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">


  <!-- Template Main CSS File -->
  <link href="/css/dashboard/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

 @yield('main')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  {{-- <script src="/vendor/dashboard/bootstrap/js/bootstrap.bundle.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="/vendor/dashboard/php-email-form/validate.js"></script>
  <script src="/vendor/dashboard/quill/quill.min.js"></script>
  <script src="/vendor/dashboard/tinymce/tinymce.min.js"></script>
  {{-- <script src="/vendor/dashboard/simple-datatables/simple-datatables.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
  <script src="/vendor/dashboard/chart.js/chart.min.js"></script>
  <script src="/vendor/dashboard/apexcharts/apexcharts.min.js"></script>
  <script src="/vendor/dashboard/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="/js/dashboard/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Custom JS Script -->
  @yield('customscript')

</body>

</html>