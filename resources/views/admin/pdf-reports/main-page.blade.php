<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />

  <link rel="stylesheet" type="text/css" href="{{asset('pdf/css/p1-title-page.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('pdf/css/p2-introduction-1.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('pdf/css/styleguide.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('pdf/css/globals.css')}}" />
</head>

<body style="margin: 0; background: #ffffff">
  <div class="container-center-horizontal">
    @include('admin.pdf-reports.front-page')
    @include('admin.pdf-reports.introduction')
  </div>
</body>

</html>