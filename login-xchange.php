<?php
/*
Plugin Name: Login XChange
Plugin URI: http://vasthtml.com
Description: Lets you change the login and register pages.
Author: Eric Hamby
Version: 1.0
Author URI: http://erichamby.com
*/ 

function login_xchange_custom_login() {	
$pluginPath = "/wp-content/plugins/";
$pluginUrl = get_settings('siteurl') . $pluginPath . plugin_basename(dirname(__FILE__));
echo "<style type='text/css'>"; ?>
<?php if ( !get_option('plugin_login_active') ) : ?>
/* CSS Reset */
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, dl, dt, dd, ol, ul, li, fieldset, form, label, legend caption{ margin:0; padding:0; border:0; outline:0; font-weight:inherit; font-style:inherit; font-size:100%; font-family:inherit; vertical-align:baseline}
:focus{outline:0}
ol, ul{list-style:none}
blockquote:before, blockquote:after, q:before, q:after{content:""}
blockquote, q{quotes:"" ""}
strong{font-weight:bold}
em{font-style:normal}
a{text-decoration:none; cursor:pointer}

body{
	background: url('<?php echo $pluginUrl;?>/images/body-background.jpg') ;
	font-family: Calibri, Arial;
	font-size: 13px;
}

h1{
	width: 1000px;
	margin: 0 auto;
	height: 140px;
	background: url('<?php echo $pluginUrl;?>/images/header-bg.png') 0 0 no-repeat;
}
	h1 a{
		display: none;
	}

.message{
	display: none;
}
	
#backtoblog{
	width: 1000px;
	height: 35px;
	line-height: 35px;
	position: absolute;
	top: 97px;
	left: 50%;
	margin: 0 0 0 -550px;
	text-align: right;
}
	#backtoblog a{
		color: #fff;
	}
	#backtoblog a:hover{
		text-decoration: underline;
	}

#loginform,
#registerform,
#lostpasswordform{
	display: block;
	width: 360px;
	margin: 0 auto;
	padding: 140px 30px 0 30px;
	background: url('<?php echo $pluginUrl;?>/images/user-login-bg.png') 0 0 no-repeat;
}
#registerform{
	background-image: url('<?php echo $pluginUrl;?>/images/user-registration-bg.png');
}
#lostpasswordform{
	background-image: url('<?php echo $pluginUrl;?>/images/lost-password-bg.png');
}

#login p{
	padding: 10px 0;
	color: #51545c;
}

.input{
	width: 330px;
	height: 30px;
	padding: 5px;
	color: #6f737e;
	font-size: 24px;
	border: none;
	background: url('<?php echo $pluginUrl;?>/images/input-bg.png') right top no-repeat;
}

.submit{
	text-align: right;
}
#wp-submit{
	height: 24px;
	padding-left: 15px;
	padding-right: 15px;
	color: #fff;
	font-family: Arial;
	font-size: 14px;
	font-weight: bold;
	border: none;
	-moz-border-radius: 12px;
	-khtml-border-radius: 12px;
	-webkit-border-radius: 12px;
	border-radius: 12px;
	cursor: pointer;
	background: url('<?php echo $pluginUrl;?>/images/wp-submit-bg.png') 0 0 repeat-x;
}

#login #nav{
	display: block;
	width: 380px;
	margin: 0 auto;
	padding: 30px 20px;
	color: #fff;
	background: url('<?php echo $pluginUrl;?>/images/user-login-bg.png') 0 -1170px no-repeat;
}
	#login #nav a{
		color: #fff;
	}
	#login #nav a:hover{
		text-decoration: underline;
	}
    <?php else: ?>
<?php echo ($custom_text = get_option('plugin_login_css')); ?>
<?php endif; ?>
<?php echo'</style>'; 
}
 function xchange_wp_login_url() {

    echo bloginfo('url');
	
}
function xchange_wp_login_title() {

    echo 'Powered by ' . get_option('blogname');
	
}
if(!function_exists('wp_slider_kill_login_css'))
{
	function wp_slider_kill_login_css($tag) {
		if (basename($_SERVER['PHP_SELF']) == 'wp-login.php')
		{
			return '';
		}
		else
		{
			return $tag;
		}
		
	}
}
add_action('login_head', 'login_xchange_custom_login');
add_filter('login_headerurl', 'xchange_wp_login_url');
add_filter('login_headertitle', 'xchange_wp_login_title'); 

if ( !get_option('wp_login_active') ) :
add_action('style_loader_tag', 'wp_slider_kill_login_css'); 
endif;

add_action('admin_menu', 'login_xchange'); 
function login_xchange() {
  add_menu_page('Login XChange', 'Login XChange', 8, 'login_xchange_info', 'login_xchange_info', 'http://vasthtml.com/images/vasthtml-menu-logo.png');
}
function login_xchange_info() {
  echo '<div class="wrap">';
  echo '<div id="icon-plugins" class="icon32"><br /></div>
  <h2>Login XChange</h2><p>
 <table class="widefat">
   <thead>
      <tr>
        <th>Login XChange</th>
		<th><span style="float:right"><small>1.0</small></span></th>
      </tr>
    </thead>
		<tr class="alternate">
			<td>Plugin Name:</td>
			<td>Login XChange</td>
		</tr>
		<tr class="alternate">
			<td>Plugin Version:</td>
			<td>1.0</td>
	
		</tr>
		<tr class="alternate">
				<td>Plugin Build:</td>
			  	<td>100</td>
			</tr>
		
		<tr class="alternate">
			<td>Rec. Wordpress Version:</td>
			<td>2.7+</td>
		</tr>
		<tr class="alternate">
			<td>Plugin Site:</td>
			<td><a href="http://vasthtml.com/js/login-xchange-plugin/ " target="_blank">Vast HTML</a></td>
		</tr>
		
				
		<tr class="alternate">
			<td>Author:</td>
		  	<td><a href="http://erichamby.com" target="_blank">Eric Hamby</a></td>
		</tr>
		
			<tr class="alternate">
				<td>Release Date:</td>
			  	<td>8/13/2009</td></tr>
			
	<tr class="alternate">
				<td>Support Forums:</td>
			  	<td><a href="http://vasthtml.com/support/" target="_blank">Vast HTML Support</a></td>
			</tr>
			
			<tr class="alternate">
				<td>Donations:</td>
			  	<td><a href="http://vasthtml.com/donations/" target="_blank">Donations Page</a></td>
			</tr>
			
			<tr class="alternate">
				<td>FAQ:</td>
			  	<td><a href="http://vasthtml.com/faq/" target="_blank">FAQ Page</a></td>
			</tr>
							
		<tr class="alternate">
			<td colspan="2">
			<span class="button" style="float:left"><a href="http://vasthtml.com" target="_blank">Vast HTML</a></span>
			<span class="button" style="float:right"><a href="http://erichamby.com" target="_blank">Eric Hamby</a></span>
		</tr></table></p></div>';
}


add_action('admin_menu', 'login_xchange_one');
function login_xchange_one() {
  add_submenu_page('login_xchange_info', 'Styles', 'Styles', 8, 'login_xchange_sub', 'login_xchange_sub');
}
function login_xchange_sub() {

echo '<div class="wrap">';
  echo '<div id="icon-plugins" class="icon32"><br /></div>
  <h2>Login XChange</h2><p>
 <table class="widefat">'; ?>
<form method="post" action="options.php">
  <?php wp_nonce_field('update-options'); ?>
  <?php echo '<thead>
      <tr>
        <th>Style Maker</th>
		<th><span style="float:right"><small>1.0</small></span></th>
      </tr>
    </thead>
	
<tr class="alternate">
<td width="200">Login.CSS</td>
<td>'; ?> <input name="wp_login_active" value="true" type="checkbox"<?php checked("true", get_option("wp_login_active")); ?> />
<?php echo 'Activate'; ?>
        <?php echo '<br />This activates the Wordpress Login.CSS. Use this if you need a little help or want your login to look more like the original.'; ?>
  <?php echo '</td></tr>'; ?> 
  
  <?php echo '<tr class="alternate">
<td width="200">Plugin CSS</td>
<td>'; ?>   <input name="plugin_login_active" value="true" type="checkbox"<?php checked("true", get_option("plugin_login_active")); ?> />
<?php echo 'Disable'; ?>
        <?php echo '<br />This will disable this plugins Login.CSS and let you use your own style below. '; ?>
  <?php echo '</td></tr>'; ?>
  
  <?php echo '<tr class="alternate">
<td width="200">Your CSS</td>
<td>'; ?>  <textarea rows="30" cols="70" name="plugin_login_css" type="text"/>
  <?php echo get_option('plugin_login_css'); ?>
  </textarea>
  <?php echo '<br />Do not add the < style > tags, just the css. '; ?>
  <?php echo '</td></tr>'; ?>
  
   <?php echo '<tr class="alternate">
<td width="200">CSS Tags</td>
<td>'; ?> 
body,
h1,
h1 a,
.message,
#backtoblog,
#backtoblog a,
#backtoblog a:hover,
#loginform,
#registerform,
#lostpasswordformsterform,
#lostpasswordform,
#login p,
.input,
.submit,
#wp-submit,
#login #nav,
#login #nav a,
#login #nav a:hover
  <?php echo '</td></tr>'; ?> 

 
<?php echo '<tr><td>&nbsp;</td><td>';  ?>
  <input type="hidden" name="action" value="update" />
  <input type="hidden" name="page_options" value="wp_login_active,plugin_login_active,plugin_login_css" />
  <span style="float:right">
  <input type="submit" class="button" value="Save Options" />
  </span> <?php echo '</td></tr>'; ?>
</form>
<?php echo '</table></p></div>';
}
?>