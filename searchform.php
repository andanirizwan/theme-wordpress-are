<form class="form-inline my-2 my-lg-0" method="get" action="<?php echo home_url('/'); ?>">

    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="s" id="search" value="<?php the_search_query(); ?>" required>
    
     <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>

</form>
