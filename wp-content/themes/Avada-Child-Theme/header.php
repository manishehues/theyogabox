<?php
/**
 * Header template.
 *
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<!DOCTYPE html>
<html class="<?php avada_the_html_class(); ?>" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<?php Avada()->head->the_viewport(); ?>

	<?php wp_head(); ?>
	<script type="text/javascript">
		var doc = document.documentElement;
		doc.setAttribute('data-useragent', navigator.userAgent);
	</script>
	<!-- Start of Woopra Code -->
	<script>
		(function(){
			var t,i,e,n=window,o=document,a=arguments,s="script",r=["config","track","identify","visit","push","call","trackForm","trackClick"],c=function(){var t,i=this;for(i._e=[],t=0;r.length>t;t++)(function(t){i[t]=function(){return i._e.push([t].concat(Array.prototype.slice.call(arguments,0))),i}})(r[t])};for(n._w=n._w||{},t=0;a.length>t;t++)n._w[a[t]]=n[a[t]]=n[a[t]]||new c;i=o.createElement(s),i.async=1,i.src="//static.woopra.com/js/w.js",e=o.getElementsByTagName(s)[0],e.parentNode.insertBefore(i,e)
		})("woopra");

		woopra.config({
			domain: 'theyogabox.com'
		});
		woopra.track();
	</script>
	<!-- End of Woopra Code -->

	<?php
	/**
	 *
	 * The settings below are not sanitized.
	 * In order to be able to take advantage of this,
	 * a user would have to gain access to the database
	 * in which case this is the least on your worries.
	 */
	echo apply_filters( 'avada_google_analytics', Avada()->settings->get( 'google_analytics' ) ); // WPCS: XSS ok.
	echo apply_filters( 'avada_space_head', Avada()->settings->get( 'space_head' ) ); // WPCS: XSS ok.
	echo apply_filters( 'avada_space_head', Avada()->settings->get( 'space_head' ) ); // phpcs:ignore WordPress.Security.EscapeOutput

	?>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133509092-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-133509092-1');
	</script>
	
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-N8CCDLZ');</script>
	<!-- End Google Tag Manager -->



	
	<script>
window['_fs_debug'] = false;
window['_fs_host'] = 'fullstory.com';
window['_fs_script'] = 'edge.fullstory.com/s/fs.js';
window['_fs_org'] = 'Y8JP1';
window['_fs_namespace'] = 'FS';
(function(m,n,e,t,l,o,g,y){
    if (e in m) {if(m.console && m.console.log) { m.console.log('FullStory namespace conflict. Please set window["_fs_namespace"].');} return;}
    g=m[e]=function(a,b,s){g.q?g.q.push([a,b,s]):g._api(a,b,s);};g.q=[];
    o=n.createElement(t);o.async=1;o.crossOrigin='anonymous';o.src='https://'+_fs_script;
    y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y);
    g.identify=function(i,v,s){g(l,{uid:i},s);if(v)g(l,v,s)};g.setUserVars=function(v,s){g(l,v,s)};g.event=function(i,v,s){g('event',{n:i,p:v},s)};
    g.anonymize=function(){g.identify(!!0)};
    g.shutdown=function(){g("rec",!1)};g.restart=function(){g("rec",!0)};
    g.log = function(a,b){g("log",[a,b])};
    g.consent=function(a){g("consent",!arguments.length||a)};
    g.identifyAccount=function(i,v){o='account';v=v||{};v.acctId=i;g(o,v)};
    g.clearUserCookie=function(){};
    g._w={};y='XMLHttpRequest';g._w[y]=m[y];y='fetch';g._w[y]=m[y];
    if(m[y])m[y]=function(){return g._w[y].apply(this,arguments)};
    g._v="1.2.0";
})(window,document,window['_fs_namespace'],'script','user');
</script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N8CCDLZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	
	<?php $queried_object = get_queried_object();
	//$all_locations = getAllLocations();
	$getMenuData = getMenuData($queried_object);
	//print_r($getMenuData);
	$page_id = $queried_object->ID;

	?>

	
</head>

<?php
$object_id      = get_queried_object_id();
$c_page_id      = Avada()->fusion_library->get_page_id();
$wrapper_class  = 'fusion-wrapper';
$wrapper_class .= ( is_page_template( 'blank.php' ) ) ? ' wrapper_blank' : '';
?>
<body <?php body_class(); ?> <?php fusion_element_attributes( 'body' ); ?>>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'Avada' ); ?></a>
	<?php
	do_action( 'avada_before_body_content' );

	$boxed_side_header_right = false;
	$page_bg_layout = 'default';
	if ( $c_page_id && is_numeric( $c_page_id ) ) {
		$fpo_page_bg_layout = get_post_meta( $c_page_id, 'pyre_page_bg_layout', true );
		$page_bg_layout = ( $fpo_page_bg_layout ) ? $fpo_page_bg_layout : $page_bg_layout;
	}

	?>
	<?php if ( ( ( 'Boxed' === Avada()->settings->get( 'layout' ) && ( 'default' === $page_bg_layout || '' == $page_bg_layout ) ) || 'boxed' === $page_bg_layout ) && 'Top' != Avada()->settings->get( 'header_position' ) ) : ?>
		<div id="boxed-wrapper">
		<?php endif; ?>
		<?php if ( ( ( 'Boxed' === Avada()->settings->get( 'layout' ) && 'default' === $page_bg_layout ) || 'boxed' === $page_bg_layout ) && 'framed' === Avada()->settings->get( 'scroll_offset' ) ) : ?>
			<div class="fusion-sides-frame"></div>
		<?php endif; ?>
		<div id="wrapper" class="<?php echo esc_attr( $wrapper_class ); ?> ss">

			<div class="headBorder">
				<div class="container">
					<div class="headerMenu">
						<div class="contactBtn">
							<p><?php echo $getMenuData['contact_no'] ?></p>
							<p><?php echo $getMenuData['sign_up_trials'] ?></p>
							<div class="BtnSign">
								<a href="<?php echo $getMenuData['signup_link']; ?>" class="txtsignup"><?php echo $getMenuData['signup_text']; ?></a>
							</div>
						</div>
						<div class="checkOut">
							<p><?php echo $getMenuData['yelp']; ?></p> 
						</div>
					</div>
					
				</div>
			</div>
			
			<div class="fusion-header" id="mobile_nav">
			
				<div class="fusion-row">
					<div class="fusion-logo">
						<a class="fusion-logo-link" href="<?php echo $getMenuData['logo_url']; ?>">
							<img  class="fusion-mobile-logo" src="<?php echo $getMenuData['logo']; ?>" alt=" " >
							<?php if($getMenuData['location_name'] != 'San Diego'): ?>
									<span><?php echo $getMenuData['location_name']?></span>
							<?php endif; ?>
						</a>

					</div>
			
					<div class="customnavbar">
						<div class="overLay"></div>
						<div class="fusion-secondary-main-menu mbcustommenu">
						
							

						<div class="fusion-row">
							<div class="fusion-mobile-menu-icons">
								<a href="#" class="fusion-icon fusion-icon-bars" aria-label="Toggle mobile menu" aria-expanded="false" aria-controls="mobile-menu-main-menu-1"></a>			
			
			
							</div>
							<div class="fusion-mobile-navigation" aria-label="Main Menu">
								<!-- <div class="closeMenu">
									<div class="closeBar one"></div>
									<div class="closeBar two"></div>
								</div>  -->
							<div class="head">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mobile-logo.jpg" alt="">
							</div>

							
						
							<ul id="menu-main-menu-1" class="fusion-menu">
								<?php 
									if(isset($getMenuData['menu']) && !empty($getMenuData['menu'])) : 

										foreach ($getMenuData['menu'] as $key => $menu) {
											$active = ""; 
											if($menu['id'] == $page_id){
												$active = "active";
											}
											$has_child = ""; 
											if(isset($menu['location_menu'])){
												$has_child = "has_child";
											}
										?>
												<li id="menu-item-<?php echo $menu['id']?>" class="<?php echo $has_child; ?> ">
													
													<a href="<?php echo $menu['page_link_link'] ?>" class="fusion-bar-highlight <?php echo $menu['class']?>" role="menuitem"><span class="menu-text"><?php echo $menu['name'] ?></span></a>
													
													<?php if(isset($menu['location_menu'])) : ?>
													
													<div class="MobileSubMenu">
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
															<?php if(!empty($menu['is_location_class']) && $menu['is_location_class'] != 'dropdown-menu'): ?>

																<a class="seeAll" href="<?php echo site_url('locations'); ?>">See All Locations</a>

															<?php endif;?>
														</div>
												<?php endif;?>

													<?php /*if(isset($menu['sub_menu'])) : ?>
														<i class="fas fa-angle-down"></i>
														<ul class="subMenu submenus sub-menu">
															<?php foreach ($menu['sub_menu'] as $key => $submenu) { ?>
																<li><a href="<?php echo $submenu['sub_page_link'] ?>"><?php echo $submenu['name'] ?></a></li>
															<?php } ?>
														</ul>
													<?php endif;*/ ?>

												</li>
										<?php } 
									endif;
									?>

							</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- </div> -->
	</div>
</div>

	
	<?php avada_header_template( 'Below', ( is_archive() || Avada_Helper::bbp_is_topic_tag() ) && ! ( class_exists( 'WooCommerce' ) && is_shop() ) ); ?>
			<?php if ( 'Left' === Avada()->settings->get( 'header_position' ) || 'Right' === Avada()->settings->get( 'header_position' ) ) : ?>
				<?php avada_side_header(); ?>
			<?php endif; ?>

			<?php avada_sliders_container(); ?>

			<?php //avada_header_template( 'Above', ( is_archive() || Avada_Helper::bbp_is_topic_tag() ) && ! ( class_exists( 'WooCommerce' ) && is_shop() ) ); ?>

			<?php if ( has_action( 'avada_override_current_page_title_bar' ) ) : ?>
				<?php do_action( 'avada_override_current_page_title_bar', $c_page_id ); ?>
			<?php else : ?>
				<?php avada_current_page_title_bar( $c_page_id ); ?>
			<?php endif; ?>
			<?php do_action( 'avada_after_page_title_bar' ); ?>

			<?php
			$main_css   = '';
			$row_css    = '';
			$main_class = '';

			if ( apply_filters( 'fusion_is_hundred_percent_template', false, $c_page_id ) ) {
				$main_css = 'padding-left:0px;padding-right:0px;';
				$hundredp_padding = get_post_meta( $c_page_id, 'pyre_hundredp_padding', true );
				if ( Avada()->settings->get( 'hundredp_padding' ) && ! $hundredp_padding ) {
					$main_css = 'padding-left:' . Avada()->settings->get( 'hundredp_padding' ) . ';padding-right:' . Avada()->settings->get( 'hundredp_padding' );
				}
				if ( $hundredp_padding ) {
					$main_css = 'padding-left:' . $hundredp_padding . ';padding-right:' . $hundredp_padding;
				}
				$row_css    = 'max-width:100%;';
				$main_class = 'width-100';
			}
			do_action( 'avada_before_main_container' );
			?>
			<main id="main" role="main" class="clearfix <?php echo esc_attr( $main_class ); ?>" style="<?php echo esc_attr( $main_css ); ?>">
				<div class="" style="<?php echo esc_attr( $row_css ); ?>">
