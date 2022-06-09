<?php


function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'fusion-dynamic-css' ) );
    wp_enqueue_style( 'fontawesome-style',  'https://use.fontawesome.com/releases/v5.7.1/css/all.css', array( 'fusion-dynamic-css' ) );        
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );


function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyCgDszvDKusG93_tezrIE2MedL8eSsTaBg');
}

add_action('acf/init', 'my_acf_init');

add_action( 'wp_ajax_nopriv_userproof', 'prefix_send_userproof_notification' );
add_action( 'wp_ajax_userproof', 'prefix_send_userproof_notification' );
function prefix_send_userproof_notification () {   

		


	$name = $_POST['first_name'].' '.substr(ucfirst($_POST['last_name']),0,1);
	/*=======================
	*	location id is the page id on mail location linke point loma, hillcrest and north park
	*===============*/
	$location_id = ($_POST['location_id'])?$_POST['location_id'] : "";

	$webhook_url = "https://webhook.usetrue.com/cs/1YOnN0qprlJkDvo6nxBQEL3yj47agX/oXKwElAy32BkWPpR6va8mLVdbNYR46";

	if($location_id == 3179){
		$webhook_url = "https://webhook.usetrue.com/cs/1YOnN0qprlJkDvo6nxBQEL3yj47agX/zpWdQO4mAglGwxgjZP0byV81RjaBok";
	}

	if($location_id == 3505){
		$webhook_url = "https://webhook.usetrue.com/cs/1YOnN0qprlJkDvo6nxBQEL3yj47agX/R7m4b1A8ro2YqxVwzv3ZDMyKQOnBLe";
	}
    
    if($location_id == 4569 || $location_id == 4572){
		$webhook_url = "https://webhook.usetrue.com/cs/1YOnN0qprlJkDvo6nxBQEL3yj47agX/zpWdQO4mAglGwxgjZP0byV81RjaBok";
	}

	if($location_id == 4566){
		$webhook_url = "https://webhook.usetrue.com/cs/1YOnN0qprlJkDvo6nxBQEL3yj47agX/QZe5mpBDO4RNEPJ7Mx1dwGArJM2zYl";
	}


	// north park location webhook url
	/*switch ($location_id) {
	    case "1023":
	    	//=======north park location webhook
	        $webhook_url = "https://webhook.usetrue.com/cs/AjJbZMK7kmO8gxAzv5pE2RG64neoVw/47jQKBpOM1oXkPngrxbVEL3Aa8erzZ";
	        break;
	    case "859":
	    	//=======Point loma location webhook
	        $webhook_url = "https://webhook.usetrue.com/cs/AjJbZMK7kmO8gxAzv5pE2RG64neoVw/na43QKOLJVzmMP5QQPDjB5gYreA6Zb";
	        break;
	    case "858":
	    	//=======Point loma location webhook
	        $webhook_url = "https://webhook.usetrue.com/cs/AjJbZMK7kmO8gxAzv5pE2RG64neoVw/84XgR352bEaj1vb5OxrQA7KO0B6VJq";
	        break;
	    
	    default:
        	
	}*/



	$data = array("type" => "custom", "email" => $_POST['email'],'name'=> $name,'ip'=>$_SERVER['REMOTE_ADDR'],'city' => $_POST['city'], 'state' => $_POST['state'], 'country' => $_POST['country']);
	$data_string = json_encode($data);


	if($_POST['email'] != "" && trim($name) != "" ){
		
		if(!isset($_SESSION['userproof_signup']) || $_SESSION['userproof_signup']!=$_POST['email']){
			
			//$ch = curl_init('https://webhook.usetrue.com/cs/AjJbZMK7kmO8gxAzv5pE2RG64neoVw/QZe5mpBDO4RNEPJE791dwGArJM2zYl');
			$ch = curl_init($webhook_url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'Content-Type: application/json',
					'Content-Length: ' . strlen($data_string))
			);
			$_SESSION['userproof_signup'] = $_POST['email'];
			$result = curl_exec($ch); 
		  	print_r($result);
		}
	}

	
  die(1);
}



if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header ',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'acf-options',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'acf-options',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Map Locations',
		'menu_title'	=> 'Map Locations',
		'parent_slug'	=> 'acf-options',
	));
	
}




 



// function getMenuData($queried_object){
// 	$default_menu = 27;

// 	$arrayName = [];

// 	$requested_page_id = $queried_object->ID;
// 	$requested_post_parent = $queried_object->post_parent;


// 	if( have_rows('all_locations', 'option') ): 

// 		while ( have_rows('all_locations', 'option') ) : 
// 			$post = the_row();

// 			if( get_row_layout() == 'location' ):

// 				$location_page_obj 	= get_sub_field('location_url');
// 				$location_page_lnk 	= get_permalink($location_page_obj->ID);
// 				$location_page_id 	=  $location_page_obj->ID;

// 				$logo = get_sub_field('logo');

// 				$menu = [];
// 				$signup_text 		= get_sub_field('sign_up');
// 				$location_name 		= get_sub_field('location_name');
// 				$signup_link_obj 	= get_sub_field('sign_up_link');
				
// 				$sign_up_text 	= get_sub_field('sign_up_text');
// 				$sign_up_link 	= get_sub_field('sign_up_link');

// 				$sign_up_trials  = get_sub_field('sign_up_trials');

// 				$contact_no 	= get_sub_field('phone_number');

// 				$yelp 			= get_sub_field('yelp_text');

// 				$i=0;
// 				while ( have_rows('menu') ) : the_row();
									
// 					$menu_obj = get_sub_field('page_link');
// 					$name = get_sub_field('page_name');
// 					$page_link_link = "javascript:void(0);";
// 					if(isset($menu_obj->ID)){
// 						$page_link_link = get_permalink($menu_obj->ID);
// 					}
					

// 					$signup_link = get_permalink($signup_link_obj->ID);
					
// 					$menu[] = array('id' => $menu_obj->ID, 'slug' => $menu_obj->post_name, 'name' => $name,'page_link_link'=>$page_link_link);
					

// 					$sub_menu	= [];
					

// 					/* fetch sub menu  */
// 					while ( have_rows('sub_menu') ) : the_row();
						
// 						$sub_menu_obj = get_sub_field('sub_page_link');
// 						$sub_page_name = get_sub_field('sub_page_name');
// 						$sub_page_link = get_permalink($sub_menu_obj->ID);

// 						$signup_link = get_permalink($signup_link_obj->ID);
						
// 						$sub_menu[] = array('id' => $sub_menu_obj->ID, 'slug' => $sub_menu_obj->post_name, 'name' => $sub_page_name,'sub_page_link'=>$sub_page_link);

// 						$menu[$i]['sub_menu'] = $sub_menu;
						
						
// 					endwhile; /* END SUB PAGES WHILE LOOP */$i++;

// 				endwhile; /* END PAGES WHILE LOOP */

// 				$arrayName[$location_page_id] = array(
// 						'location_name'  		=> $location_name,
// 						'signup_text' 			=> $sign_up_text,
// 						'signup_link' 			=> $sign_up_link,
// 						'sign_up_trials' 		=> $sign_up_trials,
// 						'contact_no' 			=> $contact_no,
// 						'yelp'					=> $yelp,
// 						'menu' 					=> $menu,
// 						'logo_url' 				=> $location_page_lnk,
// 						'logo'					=> $logo,

// 					);
// 			endif;

// 		endwhile;

		
// 	endif;


// 	if(array_key_exists($requested_page_id, $arrayName)){
// 		$default_menu = $requested_page_id;
// 	}

// 	if($requested_post_parent !=0 && array_key_exists($requested_post_parent, $arrayName)){
// 		$default_menu = $requested_post_parent;
// 	}
	
// 	return $arrayName[$default_menu];
// }



function getMenuData($queried_object){
	$default_menu = 27;

	$main_locations = [ 27 => 'San Diego', 3182 => 'Denver', 3825 => 'Phoenix'];


	$arrayName = [];

	$requested_page_id = $queried_object->ID;
	$requested_post_parent = $queried_object->post_parent;


	while ( have_rows('all_locations', 'options') ) : the_row(); 
		while ( have_rows('sub_locations') ) :  $sublocations = the_row();
			$menu = [];
			$logo = get_sub_field('sub_location_logo');

			$location_name = $signup_link_obj = $location_page_lnk=$location_page_id ="";

			$location_name		= get_sub_field('sub_location_name');
			$sub_location_menu 	= get_sub_field('sub_location_menu');
 			$contact_no 	= get_sub_field('phone_number');
 			$sign_up_trials  = get_sub_field('sign_up_trials');
			$sign_up_text 	= get_sub_field('sign_up_text');
			$sign_up_link 	= get_sub_field('sign_up');
			$book_now_text 	= get_sub_field('book_now_text');
			$book_now_link 	= get_sub_field('book_now_link');
			


			$location_page_lnk 	= 'javascript:void(0);';
			$location_page_id 	=  '';


			if(!empty($sub_location_menu)){
				$location_page_lnk 	= get_permalink($sub_location_menu->ID);
				$location_page_id 	=  $sub_location_menu->ID;
			}

			
			$logo = get_sub_field('sub_location_logo');


			$signup_link = get_sub_field('sign_up');
			
			$yelp 			= get_sub_field('yelp_text');

			//===getting submenus udner sub locations
			if( have_rows('menu') ):

				$i=0;
				while ( have_rows('menu') ) : the_row();
					$page_link_link = "";
					$menu_obj = "";
					$name = get_sub_field('page_name');
					$is_location_dropdown = get_sub_field('is_location_dropdown');

                    $class 	= get_sub_field('class');

					//print_r($is_location_dropdown);
					$is_location_class = 'dropdown-menu';
					if(!empty($is_location_dropdown) && $is_location_dropdown == 'yes'){
						$is_location_class = 'dropdown-menu dropdown-location-menu';
					}




					$menu_obj = get_sub_field('page_link');

					$menu[] = getMenuArr($menu_obj, $name);

					$location_menu = [];

				
					
					/* fetch sub menu  */
					while ( have_rows('sub_menu') ) : the_row();
						$location_title = get_sub_field('title');
						$sub_menu = [];

						while ( have_rows('sub_menu_pages') ) : the_row();

							$sub_menu_obj = get_sub_field('sub_page_link');
							$sub_page_name = get_sub_field('sub_page_name');
							
							if(isset($sub_menu_obj->ID)){

								$sub_page_link = get_permalink($sub_menu_obj->ID);

								$sub_menu[] = array('id' => $sub_menu_obj->ID, 
													'slug' => $sub_menu_obj->post_name, 
													'name' => $sub_page_name,
													'sub_page_link'=>$sub_page_link
												);
							}
						
						endwhile; /* END SUB PAGES WHILE LOOP */
						$menu[$i]['is_location_class'] = $is_location_class;
						$loc_page_link ="";
						if(!empty($is_location_dropdown) && $is_location_dropdown == 'yes'){
							if(in_array($location_title,  $main_locations)){
								$loc_page_id = array_search ($location_title,$main_locations);
								$loc_page_link = get_permalink($loc_page_id);
							}
						}

						$menu[$i]['location_menu'][] = ['title' => $location_title, 'main_location_link'=>$loc_page_link, 'sub_menu' => $sub_menu];
					endwhile; /* END SUB PAGES WHILE LOOP */
					$i++;
				
				endwhile;
			endif;

				//print_r($menu);

			$arrayName[$location_page_id] = array(
													'location_name'  		=> $location_name,
													'signup_text' 			=> $sign_up_text,
													'signup_link' 			=> $sign_up_link,
													'book_now_text' 		=> $book_now_text,
													'book_now_link' 		=> $book_now_link,
													'sign_up_trials' 		=> $sign_up_trials,
													'contact_no' 			=> $contact_no,
													'yelp'					=> $yelp,
													'menu' 					=> $menu,
													'logo_url' 				=> $location_page_lnk,
													'logo'					=> $logo,													

												);



		endwhile;
	endwhile;
	//getUserLocation();
	if(array_key_exists($requested_page_id, $arrayName)){
		$default_menu = $requested_page_id;
	}

	if($requested_post_parent !=0 && array_key_exists($requested_post_parent, $arrayName)){
		$default_menu = $requested_post_parent;
	}

	if(is_404()){
		$default_menu = 27;

	}
	
	return $arrayName[$default_menu];
}




function getMenuArr($menu_obj,$name){

	$page_link = "javascript:void(0)";
	$slug = "";
	$menu_id = 0;
	if(isset($menu_obj) && isset($menu_obj->ID)){

		$page_link = get_permalink($menu_obj->ID);
		$slug = $menu_obj->post_name;
		$menu_id = $menu_obj->ID;
      

	}  $class111 	= get_sub_field('class');

	return array('id' => $menu_id, 
					'slug' => $slug, 
					'name' => $name,
					'class' => $class111,
					'page_link_link' => $page_link
				);

}










getUserLocation();

function getFooterMenuData($queried_object){

	$default_menu = 27;
	$requested_page_id = $queried_object->ID;
	$requested_post_parent = $queried_object->post_parent;

	$arrayName = [];
	$menu = [];
	if( have_rows('locations-footer', 'option') ):

    	while ( have_rows('locations-footer', 'option') ) : $post = the_row();
			$locations = "";
			$main_location_name = get_sub_field('location_name');
			$location_page_obj 	= get_sub_field('location_url');
			$location_page_lnk 	= get_permalink($location_page_obj->ID);
			$location_page_id 	=  $location_page_obj->ID;

			$menu = getFooterMenus();
			
			$arrayName[$location_page_id] = array(
						'location_name'  	=> $main_location_name,
						'location_page_lnk' => $location_page_lnk,
						'menu' 				=> $menu,
						
					);

		endwhile;
	endif;



	if(array_key_exists($requested_page_id, $arrayName)){

		$default_menu = $requested_page_id;
	}

	if($requested_post_parent !=0 && array_key_exists($requested_post_parent, $arrayName)){

		$default_menu = $requested_post_parent;
	}

	if(is_404()){
		$default_menu = 27;

	}


	return $arrayName[$default_menu];
}

function getFooterMenus() {


	$menu = [];
	$i= 0;
	if( have_rows('location_menu') ):
		while ( have_rows('location_menu') ) : the_row();
			$page_link_link = "";					
			$menu_obj = get_sub_field('location_page_link');
			$name = get_sub_field('location_page_name');

			$page_link_link = get_permalink($menu_obj->ID);
			
			if(!empty($menu_obj)){
				$page_link_link = get_permalink($menu_obj->ID);
			}
					
			$menu[] = array('id' => $menu_obj->ID, 'name' => $name,'page_link_link'=>($page_link_link)?$page_link_link : "javascript:void(0);");
						
		endwhile; // END PAGES WHILE LOOP 
	endif;

	return $menu;

}


function getUserLocation(){

	$cookie_name = "detected_location";
	if(!isset($_COOKIE[$cookie_name])) {

		"Cookie named '" . $cookie_name . "' is not set!";

		$ip =  $_SERVER['REMOTE_ADDR'];
		$access_key = '046e36372a9ce396ce0eb45050d97769';

		// Initialize CURL:
		$ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Store the data:
		$json = curl_exec($ch);
		curl_close($ch);
		// Decode JSON response:
		$api_result = json_decode($json, true);
		// Output the "capital" object inside "location"
		$location_id = getLocationID($api_result);
		setcookie($cookie_name, $location_id, time() + (86400), "/"); // 86400 = 1 day

	} else {
		$location_id = $_COOKIE[$cookie_name];
	}

	if($location_id != "root" && !isset($_COOKIE['is_redirect'])){

		$url = site_url($location_id);
		setcookie('is_redirect', $location_id);

		wp_redirect($url);

	}

	//return $location_id;


}


function getLocationID($api_result){
	$location_id = "";
	$city = strtolower(trim($api_result['city']));

	write_log($city);

	switch ($city) {
		case 'pacific beach':
			$location_id = "pacific-beach";
			break;

		case 'pacific beach':
			$location_id = "pacific-beach";
			break;

		case 'ocean beach':
			$location_id = "ocean-beach";
			break;

		case 'north park':
			$location_id = "north-park";
			break;

		case 'hillcrest':
			$location_id = "hillcrest";
			break;
			
		case 'denver':
			$location_id = "denver";
			break;

		default:
			$location_id = "root";
			break;

		
	}


	return $location_id;

}


function getMapLocations($queried_object){
	$default_menu = 27;

	$requested_page_id = $queried_object->ID;
	$requested_post_parent = $queried_object->post_parent;

	$location_data = [];
	while ( have_rows('all_map_locations', 'options') ) : the_row(); 

		$main_location_id = get_sub_field('main_location_title');

		while ( have_rows('map_sub_locations') ) :  $sublocations = the_row();

			$location_title		= get_sub_field('location_title');
			$contact_no 	= get_sub_field('contact_no');
 			$location  = get_sub_field('location');

 			$location_data[$main_location_id][] = ["location_title"=>$location_title,
 													"contact_no"=>$contact_no,
 													"location"=>$location,
 												];

		endwhile;
	endwhile;

	if(array_key_exists($requested_page_id, $location_data)){
		$default_menu = $requested_page_id;
	}

	if($requested_post_parent !=0 && array_key_exists($requested_post_parent, $location_data)){
		$default_menu = $requested_post_parent;
	}


	if(is_404()){
		$default_menu = 27;

	}
	return json_encode($location_data[$default_menu]);


	


}


function write_log($log) {
    if (true === WP_DEBUG) {
        if (is_array($log) || is_object($log)) {
            error_log(print_r($log, true));
        } else {
            error_log($log);
        }
    }
}
    
    