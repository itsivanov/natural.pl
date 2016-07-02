<?php
/*
Template Name:  Nasze rynki
*/
get_header();

      require('modules/model/flexible_content.php');

      require_once('modules/model/property_for_maps.php');

			// Coordinates and info for maps
			$in_js = !empty($coordinates_and_info) ? $coordinates_and_info : ''; ?>
			<input type="hidden" id="coordinates_and_info_for_maps" value="<?php echo $in_js; ?>" />

			<!-- Div for maps -->
			<div class="map_container">
			<?php for($i = 0; $i < count($count_div_for_maps); $i++) : ?>
					<div class="google_maps_<?php echo $i + 1 ; ?>">
						<button class="btn-close-map"></button>
						<div class="wrap-map_container" id="map_<?php echo $i + 1 ; ?>"></div>
					</div>
			<?php endfor; ?>
			</div>

			<div class="overlay"></div>

      </div>


<?php get_footer(); ?>
