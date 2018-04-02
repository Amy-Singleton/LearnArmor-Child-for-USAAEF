<?php
// Add custom pagination function
// Based on original work at http://www.kriesi.at/archives/how-to-build-a-wordpress-post-pagination-without-plugin


function learnarmor_content_nav(){  
	// Sets how many pages to show (leave it alone)
	$pages = '';
	// Sets how many buttons you want to show in the pagination area
	$range = 5;
	

	$showitems = ($range * 2)+1;  

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}   

	if(1 != $pages)
	{
		echo '<div class="col-sm-12"><ul class="pagination">';
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo '<li><a href="'.get_pagenum_link(1).'">&laquo;</a></li>';
		if($paged > 1 && $showitems < $pages) echo '<li>' . previous_posts_link('&laquo; Previous Entries') . '</li>';

		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? '<li class="current">'.$i.'</li>':'<li><a href="'.get_pagenum_link($i).'" class="inactive" >'.$i.'</a></li>';
			}
		}

		if ($paged < $pages && $showitems < $pages) echo '<li>' . next_posts_link('Next &raquo;','') . '</li>';  
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo '<li><a href="'.get_pagenum_link($pages).'">&raquo;</a></li>';
		echo '</ul></div>';
	}
}

// END pagination