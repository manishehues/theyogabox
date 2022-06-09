<?php
/**
 * Header-v5 template.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       http://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

	$queried_object = get_queried_object();
	//$all_locations = getAllLocations();
	$getMenuData = getMenuData($queried_object);

	$page_id = $queried_object->ID;

?> 



<div class="fusion-header-sticky-height"></div>
<div class="fusion-sticky-header-wrapper"> <!-- start fusion sticky header wrapper -->
	<div class="fusion-header">
		<div class="fusion-row">
			<div class="container">
				<div class="fusion-logo">
					<a class="fusion-logo-link" href="<?php echo $getMenuData['logo_url']; ?>">
						<img src="<?php echo $getMenuData['logo']; ?>" alt="<?php echo $getMenuData['location_name']?> yogabox classes" >
						<?php /* if($getMenuData['location_name'] != 'San Diego'): ?>
							<span><?php echo $getMenuData['location_name']?></span>
						<?php endif; */?>
					</a>
				</div>
				<!-- <div class="fusion-mobile-menu-icons">
						<a href="#" class="fusion-icon fusion-icon-bars" aria-label="Toggle mobile menu" aria-expanded="true" aria-controls="mobile-menu-main-menu-1"></a>
				</div> -->
				<div class="customnavbar" id="desktop_nav">
					<!-- <div class="overLay"></div> -->
					<div class="fusion-secondary-main-menu mbcustommenu">
						<div class="fusion-row">
							<nav class="fusion-main-menu" aria-label="Main Menu">
								<ul id="menu-main-menu" class="fusion-menu">
									<?php 
										if(isset($getMenuData['menu']) && !empty($getMenuData['menu'])) : 

											foreach ($getMenuData['menu'] as $key => $menu) {
												$active = ""; 
												$name = '';
												if (isset($menu['name'])) {
													$name = $menu['name'];
												}

												if( isset($menu['id']) && $menu['id'] == $page_id){
													$active = "active";
												}
											?>
												<li id="menu-item-<?php echo $menu['id']?>" class="<?php echo $menu['is_location_class']?> menu-item menu-item-type-post_type" data-item-id="<?php echo $menu['id']?>">
													<a href="<?php echo $menu['page_link_link'] ?>" class="fusion-bar-highlight <?php echo $menu['class'] ?>" role="menuitem"><span class="menu-text"><?php echo $name ?></span></a>

													<div class="mobSub-Menu">
														<?php if(isset($menu['location_menu'])) : ?>
															<div class="subMenu">
																<div class="allSubLocations">
																	<?php foreach ($menu['location_menu'] as $key => $location) { ?>
																		<div class="singleSubLoc">
																			<h2 class="locTitle"><a href="<?php echo $location['main_location_link']; ?>"><?php echo $location['title']; ?></a></h2>
																			<ul>														
																				<?php if( isset($location['sub_menu']) ):
																					foreach ($location['sub_menu'] as  $sub_menu) { ?>
																						<li>
																							<a class="select_loc" href="<?php echo $sub_menu['sub_page_link']; ?>" rel="<?php echo $sub_menu['id'] ?>"><?php echo $sub_menu['name']; ?></a>
																						</li>
																				<?php } endif; ?>
																			</ul>																		
																		</div>																	
																	<?php } ?>
																</div>

																<?php if(!empty($menu['is_location_class']) && $menu['is_location_class'] != 'dropdown-menu'): ?>

																	<a class="seeAll" href="<?php echo site_url('locations'); ?>">See All Locations</a>

																<?php endif;?>

															</div>
														<?php endif;?>
													</div>													
												</li>
											<?php } 
										endif;
									?>

								</ul>
							</nav>
						</div>
					</div>
				</div>
				<div class="locBook">

					<!-- <div class="locations" id="locations">
							<a href="javascript:void(0);" class="locationLabel">Locations</a>									
							<div class="subloc">
								<div class="allLocal">
									<?php
									// check if the flexible content field has rows of data
									if( have_rows('all_locations', 'options') ):
										// loop through the rows of data
										while ( have_rows('all_locations', 'options') ) : the_row();
											if( get_row_layout() == 'main_location' ):?>
											<div class="singleSubLoc <?php the_sub_field('class'); ?>">
												<h2 class="locTitle"><?php the_sub_field('main_location_title'); ?></h2>
												<ul>														
													<?php if( have_rows('sub_locations') ):
															while ( have_rows('sub_locations') ) : the_row();
																$subLocation = get_sub_field('sub_location_menu');
																$url = get_permalink($subLocation->ID);?>
																<li><a class="select_loc" data-location="<?php echo $url; ?>" href="<?php echo $url; ?>" rel="<?php echo $subLocation->ID ?>"> <?php the_sub_field('sub_location_name'); ?></a></li>
															<?php endwhile;
														else :
													endif;?>
												</ul>
											</div>	
											<?php elseif( get_row_layout() == '' ): ?>
												<?php endif;
											endwhile;
										else :
											// no layouts found
										endif;
									?>
								</div>
							</div>
						</div> -->

					<div class="loc_name_book">
						<div class="locationName">				
							<?php //print_r($getMenuData); 
							if(!empty($getMenuData['location_name']) && $getMenuData['location_name'] != 'San Diego'): ?>
								<span><i role="Location" class="fas fa-map-marker-alt"></i> <?php echo $getMenuData['location_name']?></span>
							<?php endif; ?>
						</div>
						<div class="bookNow">
							<!--<a href="<?php echo $getMenuData['signup_link']; ?>" class="btn">Book Now</a>-->
							<a href="<?php echo $getMenuData['book_now_link']; ?>" class="btn"><?php echo $getMenuData['book_now_text']; ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- </div> -->
	</div>
</div>