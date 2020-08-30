<meta charset="utf-8">
<title>
    {{ isset($title) ? $title : 'داشبورد' }}
</title>
<meta name="description" content="Page Titile">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
<!-- Call App Mode on ios devices -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<!-- CsrfToken -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Remove Tap Highlight on Windows Phone IE -->
<meta name="msapplication-tap-highlight" content="no">
<!-- base css -->
<link rel="stylesheet" media="screen, print" href="/admin/css/app.css">
<!-- Place favicon.ico in the root directory -->
<link rel="apple-touch-icon" sizes="180x180" href="/admin/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/admin/img/favicon/favicon-32x32.png">
<link rel="mask-icon" href="/admin /favicon/safari-pinned-tab.svg" color="#5bbad5">
<!--<link rel="stylesheet" media="screen, print" href="css/your_styles.css">-->
