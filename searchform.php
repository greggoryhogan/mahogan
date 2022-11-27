<!-- Search Form -->
<form class="search" action="<?php echo esc_url(home_url('/')); ?>" method="get">
  <input name="s" type="text" class="form-control" placeholder="Search.." value="<?php echo get_search_query(); ?>">
  <input type="submit" value="Search" class="hidden" />
</form>
<!-- End Search Form -->