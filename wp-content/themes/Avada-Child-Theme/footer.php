<?php
/**
 * The footer template.
 *
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
						<?php do_action( 'avada_after_main_content' ); ?>

					</div>  <!-- fusion-row -->
				</main>  <!-- #main -->
				
			</div> <!-- wrapper -->
		</div> <!-- #boxed-wrapper -->
		<div class="fusion-top-frame"></div>
		<div class="fusion-bottom-frame"></div>
		<div class="fusion-boxed-shadow"></div>
		<a class="fusion-one-page-text-link fusion-page-load-link" tabindex="-1" href="#" aria-hidden="true"><?php esc_html_e( 'Page load link', 'Avada' ); ?></a>
		<?php

			$queried_object = get_queried_object();
			$headerMenu = getMenuData($queried_object);
			$footerContent = getfooterMenuData($queried_object);

		?>

		
		<footer class="footerLinks" role="footer">
			<ul>

				<?php foreach ($footerContent['menu'] as $menu) {  ?>
					<li><a role="<?php echo $menu['name']; ?>" aria-label="<?php echo $menu['name']; ?>" href="<?php echo $menu['page_link_link']; ?>"><?php echo $menu['name']; ?></a></li>
				<?php } ?>


				<!-- <li>
					<a href="https://www.theyogabox.com/schedule/">Schedule</a>
				</li>
				<li>
					<a href="https://www.theyogabox.com/programs/">Programs</a>
				</li>
				<li>
					<a href="https://www.theyogabox.com/pricing/">Pricing</a>
				</li>
				<li>
					<a href="https://www.theyogabox.com/yoga-sculpt/">Sculpt</a>
				</li> -->
			</ul>
		</footer>

		<div class="footerlogo">
			<?php dynamic_sidebar( 'avada-custom-sidebar-footerlogo' ); ?>
			<!-- <img src="https://www.theyogabox.com/wp-content/uploads/2019/08/footerLogo.svg" alt="theyogabox.com" /> -->
		</div>

		<div id="socialLinks" class="loction-addres socialIcons">
			<h4 >Follow Us</h4>
			<ul>
				<li><a aria-label="Facebook" href="https://www.facebook.com/yogaboxyoga/" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
				<li><a aria-label="Instagram" href="https://www.instagram.com/yogabox/" target="_blank"><i class="fab fa-instagram"></i></a></li>
			</ul>
		</div>

		<div class="copyRight">
			<?php dynamic_sidebar( 'avada-custom-sidebar-footercopyright' ); ?>
			<!-- <p>copyright 2019 all rights reserved</p> -->
		</div>		

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$(".fusion-icon-bars").click(function(){
					$(".customnavbar").toggleClass("openMenu");
				});
				$(".overLay").click(function(){
					$(".customnavbar").removeClass("openMenu");
				});
				$(".closeMenu").click(function(){
					$(".customnavbar").removeClass("openMenu");
				});


                
                
				jQuery(".has_child").click(function(){

					jQuery(this).toggleClass('show-submenu');

				});


				// $(".has_child").click(function(){
				// 	jQuery(this).find(".submenus").toggle();
				// })

				$("video").attr("playsinline",true); 





				jQuery("#accordian-2 h4.panel-title").each(function(){
						jQuery(this).find("a").attr("href","javascript:void(0);");
					})
					

					$("#mobile-locations > .locationLabel").click(function(){
		    			$("#mobile-locations").toggleClass("openLocation");
	  				});
					
					var flag = true;
					formHandler = function()
					{	



						var form = '#registration_form_135805338da';

						var register_page_id = "<?php echo get_the_ID(); ?>";

						if(register_page_id == 3179){
							var form = '#registration_form_ae11779044c7';
						}

						if(register_page_id == 3505){
							var form = '#registration_form_7711918741ff';
						}

						if(register_page_id == 4566){
							var form = '#registration_form_d3126217a7ad';
						}
                        
                        if(register_page_id == 4569 || register_page_id == 4572){
							var form = '#registration_form_ae11779044c7';
						}


						





						if($(form).length == 0)
						{
							setTimeout(formHandler,3000);
						} else {
							console.log('testing form');		
							var submitButton  = $(form).find("#hc-register")[0];
							var spinner       = $(form).find("#hc-register-spinner")[0];
							$(submitButton).on('click', function (e) {
								e.preventDefault();
							  	/*if($('#registrations_liability_release').prop('checked'))
							  	{*/
							  	  
								var first_name = $('#registrations_first_name').val();
								var last_name = $('#registrations_last_name').val();
								var city  = $('#registrations_city').val();
								var email = $('#registrations_email').val();
								var country = $('#registrations_country').val();
								var state = $('select#registrations_state').val();
								var location_id = "<?php echo get_the_ID(); ?>";
								if(first_name != '' && email != '' && city != '' && state != '' && flag){ 

									flag = false;
									var ajaxurl = '/wp-admin/admin-ajax.php';
									jQuery.ajax({
										type: 'POST',
										url: ajaxurl,
										data: "action="+"userproof" + "&first_name=" + first_name + "&email="+email + "&last_name="+last_name +"&city="+city + "&country=" + country + "&state=" + state + "&location_id=" + location_id,
										datatype: "html",
										success: function(response,status) {
											return true;		
										}
									});
								}	
													 										  								 
							  //}
							  							  
							});
						}

						jQuery(".hc-prospect-comment").next().addClass('div_content');
						jQuery(".hc-prospect-comment").next().css("width","100%");
						jQuery(".hc-prospect-comment").next().css("clear","both");
					}


					

					setTimeout(formHandler,3000);
				
					setTimeout(function(){
						console.log('click now');

						jQuery("body").on("click",".bw-widget__signup-now", function() {
							
							ga('send', 'event', { eventCategory: 'Booker', eventAction: 'Click', eventLabel: 'Schedule'});

							console.log('clicked');

						});
        				
    					}, 3000);




			});
		</script>

		<?php
		/**
		 * Check if boxed side header layout is used; if so close the #boxed-wrapper container.
		 */
		$page_bg_layout = 'default';
		if ( $c_page_id && is_numeric( $c_page_id ) ) {
			$fpo_page_bg_layout = get_post_meta( $c_page_id, 'pyre_page_bg_layout', true );
			$page_bg_layout = ( $fpo_page_bg_layout ) ? $fpo_page_bg_layout : $page_bg_layout;
		}
		?>
		<?php if ( ( ( 'Boxed' === Avada()->settings->get( 'layout' ) && 'default' === $page_bg_layout ) || 'boxed' === $page_bg_layout ) && 'Top' !== Avada()->settings->get( 'header_position' ) ) : ?>
			</div> <!-- #boxed-wrapper -->
		<?php endif; ?>
		<?php if ( ( ( 'Boxed' === Avada()->settings->get( 'layout' ) && 'default' === $page_bg_layout ) || 'boxed' === $page_bg_layout ) && 'framed' === Avada()->settings->get( 'scroll_offset' ) && 0 !== intval( Avada()->settings->get( 'margin_offset', 'top' ) ) ) : ?>
			<div class="fusion-top-frame"></div>
			<div class="fusion-bottom-frame"></div>
			<?php if ( 'None' !== Avada()->settings->get( 'boxed_modal_shadow' ) ) : ?>
				<div class="fusion-boxed-shadow"></div>
			<?php endif; ?>
		<?php endif; ?>
		<a class="fusion-one-page-text-link fusion-page-load-link"></a>


		<!-- Store locations -->
			<!-- <div id="map_canvas" style="width: 100%; height: 600px;"></div> -->
		<!-- Store locations -->



		<?php wp_footer(); ?>
		<style type="text/css">
			#main { padding-right: 15px; }
			.infoWindow { width: 220px; }
		</style>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgDszvDKusG93_tezrIE2MedL8eSsTaBg"></script>
		<script>
			$(document).ready(function($) {


				

				$('h4.panel-title').click(function(){
					var $this = $(this);
					$('html, body').animate({
						scrollTop: $(this).parent().offset().top - 50
					}, 1000);
				});


				var class_arr = ['',"orange","green","blue"];
				var n = localStorage.getItem('on_load_counter');
				 
				if (n === null) {
				    n = 0;
				}

				if(n >= 3){
					n = 0;
				}
				n++;

				var class_name = class_arr[n];

				localStorage.setItem("on_load_counter", n);

				$(".fusion-logo-link").addClass(class_name);

				/*get google map locations */
				var map;

				// Ban Jelačić Square - City Center
				var geocoder = new google.maps.Geocoder();
				var infowindow = new google.maps.InfoWindow();
				 var styledMapType = new google.maps.StyledMapType([
								            {
								                "elementType": "geometry",
								                "stylers": [
								                    {
								                        "color": "#eaeaea"
								                    }
								                ]
								            },
								            {
								                "elementType": "labels.icon",
								                "stylers": [
								                    {
								                        "saturation": -100
								                    },
								                    {
								                        "visibility": "simplified"
								                    }
								                ]
								            },
								            {
								                "elementType": "labels.text.fill",
								                "stylers": [
								                    {
								                        "color": "#616161"
								                    }
								                ]
								            },
								            {
								                "elementType": "labels.text.stroke",
								                "stylers": [
								                    {
								                        "color": "#eee"
								                    }
								                ]
								            },
								            {
								                "featureType": "administrative.land_parcel",
								                "elementType": "labels.text.fill",
								                "stylers": [
								                    {
								                        "color": "#bdbdbd"
								                    }
								                ]
								            },
								            {
								                "featureType": "poi",
								                "elementType": "geometry",
								                "stylers": [
								                    {
								                        "color": "#eeeeee"
								                    }
								                ]
								            },
								            {
								                "featureType": "poi",
								                "elementType": "labels.text.fill",
								                "stylers": [
								                    {
								                        "color": "#757575"
								                    }
								                ]
								            },
								            {
								                "featureType": "poi.park",
								                "elementType": "geometry",
								                "stylers": [
								                    {
								                        "color": "#e5e5e5"
								                    }
								                ]
								            },
								            {
								                "featureType": "poi.park",
								                "elementType": "labels.text.fill",
								                "stylers": [
								                    {
								                        "color": "#9e9e9e"
								                    }
								                ]
								            },
								            {
								                "featureType": "road",
								                "elementType": "geometry",
								                "stylers": [
								                    {
								                        "color": "#ffffff"
								                    }
								                ]
								            },
								            {
								                "featureType": "road.arterial",
								                "elementType": "labels.text.fill",
								                "stylers": [
								                    {
								                        "color": "#757575"
								                    }
								                ]
								            },
								            {
								                "featureType": "road.highway",
								                "elementType": "geometry",
								                "stylers": [
								                    {
								                        "color": "#dadada"
								                    }
								                ]
								            },
								            {
								                "featureType": "road.highway",
								                "elementType": "labels.text.fill",
								                "stylers": [
								                    {
								                        "color": "#616161"
								                    }
								                ]
								            },
								            {
								                "featureType": "road.local",
								                "elementType": "labels.text.fill",
								                "stylers": [
								                    {
								                        "color": "#9e9e9e"
								                    }
								                ]
								            },
								            {
								                "featureType": "transit.line",
								                "elementType": "geometry",
								                "stylers": [
								                    {
								                        "color": "#e5e5e5"
								                    }
								                ]
								            },
								            {
								                "featureType": "transit.station",
								                "elementType": "geometry",
								                "stylers": [
								                    {
								                        "color": "#eeeeee"
								                    }
								                ]
								            },
								            {
								                "featureType": "water",
								                "elementType": "geometry",
								                "stylers": [
								                    {
								                        "color": "#c9c9c9"
								                    }
								                ]
								            },
								            {
								                "featureType": "water",
								                "elementType": "labels.text.fill",
								                "stylers": [
								                    {
								                        "color": "#9e9e9e"
								                    }
								                ]
								            }
								        ],{name: 'Styled Map'});


				if(document.getElementById("map_canvas")){

					var data = JSON.parse('<?php echo getMapLocations($queried_object); ?>');
					
					var center = new google.maps.LatLng(data[0].location.lat,data[0].location.lng);
					//var center = new google.maps.LatLng(32.7784534,-117.0933415);

					var mapOptions = {
							zoom: 13,
							center: center,
							//mapTypeId: google.maps.MapTypeId.ROADMAP,
							mapTypeId: 'styled_map'
						}

					map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

					map.mapTypes.set('styled_map', styledMapType);
	    			map.setMapTypeId('styled_map');

					
					for (var i = 0; i < data.length; i++) {
						displayLocation(data[i],map,infowindow);
					}
				}
			});



		function displayLocation(location,map,infowindow) {


			var content = '<div class="infoWindow"><strong>'
						+location.location_title+'</strong>'
						+ '<br/>'
						+ location.location.address
						+ '<br/>' 
						+location.contact_no 
						+'</div>';

			var position = new google.maps.LatLng(parseFloat(location.location.lat), parseFloat(location.location.lng));

			var marker = new google.maps.Marker({
								map: map,
								position: position,
								title: location.location_title,
								icon: '<?php echo site_url()?>/wp-content/uploads/2020/10/mapicon.png',
							});

			google.maps.event.addListener(marker, 'click', function() {
				infowindow.setContent(content);
				infowindow.open(map,marker);
			});


			/*if (parseInt(location.lat) == 0) {
				geocoder.geocode( { 'address': location.address }, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {

						var marker = new google.maps.Marker({
											map: map,
											position: results[0].geometry.location,
											title: location.name
										});

						google.maps.event.addListener(marker, 'click', function() {
							infowindow.setContent(content);
							infowindow.open(map,marker);
						});
					}
				});
			} else {
				var position = new google.maps.LatLng(parseFloat(location.lat), parseFloat(location.lng));
				var marker = new google.maps.Marker({
									map: map,
									position: position,
									title: location.name
								});

				google.maps.event.addListener(marker, 'click', function() {
					infowindow.setContent(content);
					infowindow.open(map,marker);
				});
			}*/

		}
				

			
		</script>
		<!-- True | Pixel -->
			<script id="true-script">!function(){function b(){var a=(new Date).getTime(),b=document.createElement('script');b.type='text/javascript',b.async=!0,b.src='https://cdn.usetrue.com/assets/embed/latest/peachy.js?'+a;var c=document.getElementsByTagName('script')[0];c.parentNode.insertBefore(b,c)}var a=window;a.attachEvent?a.attachEvent('onload',b):a.addEventListener('load',b,!1),window.peachy_config={acc:'1YOnN0qprlJkDvo6nxBQEL3yj47agX', v:'1.1'}}()</script>
		<!-- End True -->


		<script>	

				jQuery(document).ready(function(){
					
					// jQuery("#accordian-2 h4.panel-title").each(function(){
					// 	jQuery(this).find("a").attr("href","javascript:void(0);");
					// })
					

					// $("#mobile-locations > .locationLabel").click(function(){
		   //  			$("#mobile-locations").toggleClass("openLocation");
	  		// 		});
					
					// var flag = true;
					// formHandler = function()
					// {	



					// 	var form = '#registration_form_135805338da';

					// 	var register_page_id = "<?php echo get_the_ID(); ?>";

					// 	if(register_page_id == 3179){
					// 		var form = '#registration_form_ae11779044c7';
					// 	}





					// 	if($(form).length == 0)
					// 	{
					// 		setTimeout(formHandler,3000);
					// 	} else {
					// 		console.log('testing form');		
					// 		var submitButton  = $(form).find("#hc-register")[0];
					// 		var spinner       = $(form).find("#hc-register-spinner")[0];
					// 		$(submitButton).on('click', function (e) {
					// 			e.preventDefault();
					// 		  	/*if($('#registrations_liability_release').prop('checked'))
					// 		  	{*/
							  	  
					// 			var first_name = $('#registrations_first_name').val();
					// 			var last_name = $('#registrations_last_name').val();
					// 			var city  = $('#registrations_city').val();
					// 			var email = $('#registrations_email').val();
					// 			var country = $('#registrations_country').val();
					// 			var state = $('select#registrations_state').val();
					// 			var location_id = "<?php echo get_the_ID(); ?>";
					// 			if(first_name != '' && email != '' && city != '' && state != '' && flag){ 

					// 				flag = false;
					// 				var ajaxurl = '/wp-admin/admin-ajax.php';
					// 				jQuery.ajax({
					// 					type: 'POST',
					// 					url: ajaxurl,
					// 					data: "action="+"userproof" + "&first_name=" + first_name + "&email="+email + "&last_name="+last_name +"&city="+city + "&country=" + country + "&state=" + state + "&location_id=" + location_id,
					// 					datatype: "html",
					// 					success: function(response,status) {
					// 						return true;		
					// 					}
					// 				});
					// 			}	
													 										  								 
					// 		  //}
							  							  
					// 		});
					// 	}

					// 	jQuery(".hc-prospect-comment").next().addClass('div_content');
					// 	jQuery(".hc-prospect-comment").next().css("width","100%");
					// 	jQuery(".hc-prospect-comment").next().css("clear","both");
					// }


					

					// setTimeout(formHandler,3000);
				
					// setTimeout(function(){
					// 	console.log('click now');

					// 	jQuery("body").on("click",".bw-widget__signup-now", function() {
							
					// 		ga('send', 'event', { eventCategory: 'Booker', eventAction: 'Click', eventLabel: 'Schedule'});

					// 		console.log('clicked');

					// 	});
        				
    	// 				}, 3000);

			});	



		</script>

		<?php  
			$page_ids = [3261,3263,3254,3259];  


			
			if(!in_array($queried_object->ID, $page_ids)): 
				//echo "ddddddddddddddd";

		?>		
	
		<?php endif; ?>

		<div class="avada-footer-scripts">
			<?php wp_footer(); ?>
		</div>

		<?php get_template_part( 'templates/to-top' ); ?>
	</body>
</html>
