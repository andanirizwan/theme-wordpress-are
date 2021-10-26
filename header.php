<!DOCTYPE html>
<html>
<head>
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body>

<header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
         <?php /* menu */
				wp_nav_menu( array(
				  'theme_location' => 'main_menu',
				  'menu_class' => 'navbar-nav'
				  )
			);
			?>
      </li>
    </ul>
    <?php //search

    	get_search_form();

     ?>
  </div>
</nav>

	
<div class="jumbotron jumbotron-fluid">
	<div class="container">
	    <h1 class="display-3">Theme Wordpress are</h1>
	    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
</div>

</header>



</nav>

