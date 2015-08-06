<?php
$protocol = $_SERVER["SERVER_PROTOCOL"];
if ( 'HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol )
    $protocol = 'HTTP/1.0';
header( "$protocol 503 Service Unavailable", true, 503 );
header( 'Content-Type: text/html; charset=utf-8' );
?>

<!DOCTYPE html>
<html lang="sv">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WordPress Sverige, Tillfälligt underhållsläge">
    <meta name="author" content="WordPress Sverige">
    <link rel="icon" href="maintenence/favicon.ico">

    <title>WordPress Sverige - Tillfälligt underhållsläge</title>

    <!-- Bootstrap core CSS -->
    <link href="maintenence/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="maintenence/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	
	<a href="http://wpsv.se" class="little-blue"><img src="maintenence/little-blue.png" width="60" height="112" alt="little blue"></a>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="inner cover">
					<div class="logo"><img src="maintenence/logo.png" alt="" /></div>
            <h1 class="cover-heading"><strong>WordPress</strong> Sverige<br>
						<span>Tillfälligt underhållsläge</span></h1>
            <p class="lead">WordPress Sverige är i tillfälligt underhållsläge. Det innebär att någon modul på WordPress Sverige just nu uppdateras.</p>
						<p class="lead">Dessa uppdateringar tar normalt <strong>bara några sekunder</strong>, ladda om sidan för att komma in igen.</p>
						<div class="row">
						<div class="col-md-12">
							<a href="http://wpsv.se" class="btn btn-lg btn-default btn-right">Ladda om WordPress Sverige</a>
						</div>
						</p>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="maintenence/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="maintenence/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php die(); ?>