<?php
$singular_class = '';

if (is_singular(array('post', 'project'))){
	$singular_class = 'main--singular';
}
  get_header();
?>

	<main class="main <?= $singular_class ?>">
		<div class="container container--narrower">
			<?php
				the_content();
			?>
		</div>
		
	</main>

<?php
get_footer();