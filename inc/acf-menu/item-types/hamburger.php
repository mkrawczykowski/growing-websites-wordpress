
<?php 
	$custom_classes = get_sub_field('custom_classes');
  $id_attribute = ($custom_id = get_sub_field('custom_id', false, true, true)) ? 'id="main-nav__hamburger ' . $custom_id . '"' : 'id="main-nav__hamburger"';
?>
		
<li <?= $id_attribute; ?> class="main-nav__list-item main-nav__hamburger <?= $custom_classes; ?>">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
</li>