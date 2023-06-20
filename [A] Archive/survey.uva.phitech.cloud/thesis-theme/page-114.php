<?php
	$query = new WP_Query(['post_type' => 'source', 'nopaging' => true]);
?>


<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/wp-content/themes/thesis-theme/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="/wp-content/themes/thesis-theme/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/wp-content/themes/thesis-theme/css/main.css">

        <script src="/wp-content/themes/thesis-theme/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Lucas Johnston's Thesis</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form id="loginform" class="navbar-form navbar-right" action="https://survey.uva.phitech.cloud/wp-login.php" role="form" method="post">
            <div class="form-group">
              <input autocomplete="username" autocapitalize="none" name="log" id="user_login" type="text" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <input id="user_pass" type="password" name="pwd" class="form-control" autocomplete="current-password">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>


    <div class="jumbotron">
      <div class="container">
        <h1>Literature Overview</h1>
        <p></p>
      </div>
    </div>

    <div class="container">
      
	  
	  
	  
	  <?php 
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$resource = new Resource(get_the_ID());
				echo '<h2>' . get_the_title() . '</h2>';
				echo '<h3>Abstract</h3>';
				echo "<p>" . $resource->meta['abstract'][0] . "</p>";
				echo '<h3>Notes</h3>';
				echo "<p>" . $resource->meta['notes'][0] . "</p>";
				echo '<h3>Authors</h3>';
				echo $resource->serialize_authors();
				echo '<h3>Journal</h3>';
				echo "Name: <i>" . $resource->get_journal() . "</i>";
				echo "<br>Volume: " . $resource->meta['journal_volume'][0];
				echo "<br>Issue: " . $resource->meta['journal_issue'][0];
				echo '<h3>Search method</h3>';
				echo "<p>" . $resource->meta['search_method'][0] . "</p>";
				echo '<h3>Search engine</h3>';
				echo $resource->get_search_engine();
				echo '<h3>Retrieved date</h3>';
				echo "<p>" . $resource->meta['retrieved_date'][0] . "</p>";
				echo '<h3>Review level</h3>';
				echo "<p>" . $resource->meta['review_level'][0] . "</p>";
				echo '<h3>File</h3>';
				echo "<p>" . $resource->meta['file'][0] . "</p>";
				echo '<h3>DOI</h3>';
				echo "<p><a href='" . $resource->meta['doi'][0] . "'>" . $resource->meta['doi'][0] . "</a></p>";
				echo '<h3>Relevance</h3>';
				echo "<p>" . $resource->meta['relevance'][0] . "</p>";
				echo "<h3>Reference</h3>";
				echo "<textarea class='form-control' rows='6' readonly='true'>" . $resource->get_reference() . "</textarea>";
				//echo "<br>meta = " . print_r($resource->meta, true) . "<br>";
				//print_r(get_the_tags()); // Tags (topics)
				//print_r(get_the_terms(get_the_ID(), 'journals')); // Journal
				//print_r(get_the_terms(get_the_ID(), 'search_engines')); // Search Engine
			}
		} else {
			// no posts found
		}
	  ?>
	  
	  

      <hr>

      <footer>
        <p></p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/wp-content/themes/thesis-theme/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="/wp-content/themes/thesis-theme/js/vendor/bootstrap.min.js"></script>

        <script src="/wp-content/themes/thesis-theme/js/main.js"></script>
    </body>
</html>
