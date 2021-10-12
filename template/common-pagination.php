<?php
global $wp_rewrite;
$paginate_base = get_pagenum_link(1);
if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
	$paginate_format = '';
	$paginate_base = add_query_arg('paged','%#%');
}
else{
	$paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
	user_trailingslashit('page/%#%/','paged');;
	$paginate_base .= '%_%';
}

if( is_post_type_archive( array( 'history') ) ) {
  $total = $wp_query;
} else {
  $total = $the_query;
}

$paginate_links = paginate_links(array(
	'base' => $paginate_base,
	'format' => $paginate_format,
	'total' => $total->max_num_pages,
	'current' => ($paged ? $paged : 1),
	'prev_text' => '&lt;',
	'next_text' => '&gt;',
	'type'    => 'list'
));
?>
                                <nav class="p-pagination">
<?php echo $paginate_links;?>
                                </nav>