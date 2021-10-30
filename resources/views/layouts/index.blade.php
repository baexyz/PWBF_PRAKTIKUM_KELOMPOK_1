<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> @yield('title') </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ request()->getSchemeAndHttpHost() }}/img/dashboard/favicon.png" rel="icon">
  <link href="{{ request()->getSchemeAndHttpHost() }}/img/dashboard/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ request()->getSchemeAndHttpHost() }}/vendor/dashboard/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ request()->getSchemeAndHttpHost() }}/vendor/dashboard/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ request()->getSchemeAndHttpHost() }}/vendor/dashboard/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ request()->getSchemeAndHttpHost() }}/vendor/dashboard/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ request()->getSchemeAndHttpHost() }}/vendor/dashboard/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ request()->getSchemeAndHttpHost() }}/vendor/dashboard/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ request()->getSchemeAndHttpHost() }}/vendor/dashboard/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ request()->getSchemeAndHttpHost() }}/css/dashboard/style.css" rel="stylesheet">

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
  <script src="{{ request()->getSchemeAndHttpHost() }}/vendor/dashboard/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/vendor/dashboard/php-email-form/validate.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/vendor/dashboard/quill/quill.min.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/vendor/dashboard/tinymce/tinymce.min.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/vendor/dashboard/simple-datatables/simple-datatables.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/vendor/dashboard/chart.js/chart.min.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/vendor/dashboard/apexcharts/apexcharts.min.js"></script>
  <script src="{{ request()->getSchemeAndHttpHost() }}/vendor/dashboard/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ request()->getSchemeAndHttpHost() }}/js/dashboard/main.js"></script>

</body>

</html>