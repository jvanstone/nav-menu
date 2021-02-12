<?php
/**
 * Plugin Name: Nav Menu
 * Description: Create a mobile friendly menu
 * Version: 1.0
 * Author: Vanstone Online | Jason Vanstone
 * Author URI: https://vanstoneonline.com
 *
 */


//Load necessary stylesheets and icons for navigation.
function nav_menu_plugin_scripts() {
  $plugin_url = plugin_dir_url( __FILE__ );
  wp_enqueue_style( 'nav-menu', $plugin_url . 'css/nav-menu.css' );
  wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css');
}
add_action( 'wp_enqueue_scripts', 'nav_menu_plugin_scripts' );

//create custom menu location
function nav_menu_plugin_location() {
  register_nav_menus(
    array(
      'mobile-menu' => __( 'Mobile Menu'),
    )
  );
}
add_action( 'init', 'nav_menu_plugin_location' );

if( !function_exists('vo_nav_menu') ) {
function vo_nav_menu(){ 
  
?>

<!-- Top Navigation Menu -->
<div class="topnav">
  <a href="#home" class="active">Main</a>
  <!-- Navigation links (hidden by default) -->
 <!--  <div id="myLinks"> -->
  <?php
  wp_nav_menu( array( 
    'theme_location' => 'mobile-menu', 
    'container_class' => 'myLinks' ) ); 
?>
<!--   </div> -->
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
   <!--  <i class="fa fa-bars"></i> -->
   [ v ]
  </a>
</div> 


  
  <script>
    /* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
    function myFunction() {
      var x = document.getElementById("menu-nav-menu");
      if (x.style.display === "block") {
        x.style.display = "none";
      } else {
        x.style.display = "block";
      }
    } 
  </script> 
 
<?php 

} // End function 
}



