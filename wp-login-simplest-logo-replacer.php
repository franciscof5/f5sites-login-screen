<?php
/*
Plugin Name: Wp-Login Simplest Logo Replacer
Plugin URI: www.f5sites.com/wp-login-simplest-logo-replacer
Description: Simple and elegant update your logo on wp-admin just put it on /mu-plugins folder and change it's folder content
Author: Francisco Matelli Matulovic
Author URI: www.franciscomat.com
Version: 2016.11
Tags: logo, wp-login, customization, quickly
*/

add_action( 'login_enqueue_scripts', 'my_login_logo' );
add_filter( 'login_headerurl', 'my_login_logo_url' );
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function my_login_logo() {
	#wp_dequeue_script("jquery");
	#wp_enqueue_script("jquery");
	echo '<style type="text/css">
		#login h1 a, .login h1 a {
			height:inherit !important;
			background-image: url('.site_url().'/wp-content/mu-plugins/wp-login-logo.png);
			padding-bottom: 30px;
			min-width:200px;
			min-height:50px;
		}
		body, html, .wp-core-ui .button-primary {
			background: #006599 !important;
		}
		a {
			color:#999 !important;
		}
		.login form {
			border-radius: 15px;
		}
		#f5alert {
			text-align:center;color:#FFF;
			font-weight:600;
		}
		.message {
			display: none !important;
		}
		</style>

	<script type="text/javascript">
	
	(function() {
	    // Load the script
	    var script = document.createElement("SCRIPT");
	    script.src = "https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js";
	    script.type = "text/javascript";
	    document.getElementsByTagName("head")[0].appendChild(script);

	    // Poll for jQuery to come into existance
	    var checkReady = function(callback) {
		if (window.jQuery) {
		    callback(jQuery);			
		}
		else {
		    window.setTimeout(function() { checkReady(callback); }, 100);
		}
	    };

	    // Start polling...
	    checkReady(function($) {
		// Use $ here...
		//alert("foi jQuery");
		$("<p id=f5alert>Você está acessando: <a href='.home_url().' alt='.get_bloginfo("description").'>'.get_bloginfo("name").'</strong></a></br>'.get_bloginfo("description").'</br>Use sua conta F5 Sites</p>").insertBefore("#loginform");
	    });
	})();

	</script>';
}

function my_login_logo_url() {
    return home_url();
}

function my_login_logo_url_title() {
    #get_bloginfo("description")
    return get_bloginfo("name").get_bloginfo("description");
}

?>

