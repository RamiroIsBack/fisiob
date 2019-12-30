<?php
	/*
	Plugin Name: WF Cookie Consent
	Plugin URI: http://www.wunderfarm.com/plugins/wf-cookie-consent
	Description: The wunderfarm-way to show how your website complies with the EU Cookie Law.
	Version: 1.1.4
	License: GNU General Public License v2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
	Author: wunderfarm
	Author URI: http://www.wunderfarm.com
	*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define ('WFCOOKIECONSENT_IUBENDA_DIRECT_URL', 'http://iubenda.refr.cc/N3792HZ');
define ('WFCOOKIECONSENT_IUBENDA_HELP_URL', 'https://www.iubenda.com/en/help/posts/3284');

/*
* Enqueue JS
*/
function wf_cookieconsent_scripts() {
	wp_enqueue_script('wf-cookie-consent-cookiechoices', plugin_dir_url( __FILE__ ) . 'js/cookiechoices.min.js', array(), false, true);
}
add_action( 'wp_enqueue_scripts', 'wf_cookieconsent_scripts' );


function wf_cookieconsent_get_options($language = null) {

  $options = get_option('wf_cookieconsent_options');
  if (!$language) $language = wf_get_language();

  $data = array(
    'wf_cookietext' => empty($options[$language]['wf_cookietext']) ? null : $options[$language]['wf_cookietext'],
    'wf_dismisstext' => empty($options[$language]['wf_dismisstext']) ? null : $options[$language]['wf_dismisstext'],
    'wf_linktext' => empty($options[$language]['wf_linktext']) ? null : $options[$language]['wf_linktext'],
    'wf_linkhref' => empty($options[$language]['wf_linkhref']) ? null : $options[$language]['wf_linkhref'],
    'wf_position' => empty($options['wf_position']) ? 'bottom' : $options['wf_position'],
    'language' => $language
  );

  switch ($data['language']) {

    case 'de':
      if (empty($data['wf_cookietext'])) $data['wf_cookietext'] = "Cookies erleichtern die Bereitstellung unserer Dienste. Mit der Nutzung unserer Dienste erklären Sie sich damit einverstanden, dass wir Cookies verwenden. ";
      if (empty($data['wf_dismisstext'])) $data['wf_dismisstext'] = "OK";
      if (empty($data['wf_linktext'])) $data['wf_linktext'] = "Weitere Informationen";
      break;

    case 'it':
      if (empty($data['wf_cookietext'])) $data['wf_cookietext'] = "I cookie ci aiutano ad erogare servizi di qualità. Utilizzando i nostri servizi, l'utente accetta le nostre modalità d'uso dei cookie.";
      if (empty($data['wf_dismisstext'])) $data['wf_dismisstext'] = "OK";
      if (empty($data['wf_linktext'])) $data['wf_linktext'] = "Ulteriori informazioni";
      break;

    case 'fr':
        if (empty($data['wf_cookietext'])) $data['wf_cookietext'] = "Les cookies nous permettent de vous proposer nos services plus facilement. En utilisant nos services, vous nous donnez expressément votre accord pour exploiter ces cookies.";
        if (empty($data['wf_dismisstext'])) $data['wf_dismisstext'] = "OK";
        if (empty($data['wf_linktext'])) $data['wf_linktext'] = "En savoir plus";
        break;

    case 'nl':
        if (empty($data['wf_cookietext'])) $data['wf_cookietext'] = "Cookies helpen ons bij het leveren van onze diensten. Door gebruik te maken van onze diensten, gaat u akkoord met ons gebruik van cookies.";
        if (empty($data['wf_dismisstext'])) $data['wf_dismisstext'] = "OK";
        if (empty($data['wf_linktext'])) $data['wf_linktext'] = "Meer informatie";
        break;

    case 'fi':
        if (empty($data['wf_cookietext'])) $data['wf_cookietext'] = "Evästeet auttavat meitä palvelujemme toimituksessa. Käyttämällä palvelujamme hyväksyt evästeiden käytön.";
        if (empty($data['wf_dismisstext'])) $data['wf_dismisstext'] = "Selvä";
        if (empty($data['wf_linktext'])) $data['wf_linktext'] = "Lisätietoja";
        break;

		case 'hu':
        if (empty($data['wf_cookietext'])) $data['wf_cookietext'] = "A weboldalon cookie-kat használunk, amik segítenek minket a lehető legjobb szolgáltatások nyújtásában. Weboldalunk további használatával jóváhagyja, hogy cookie-kat használjunk.";
        if (empty($data['wf_dismisstext'])) $data['wf_dismisstext'] = "OK";
        if (empty($data['wf_linktext'])) $data['wf_linktext'] = "További információk";
        break;

    default:
        if (empty($data['wf_cookietext'])) $data['wf_cookietext'] = "Cookies help us deliver our services. By using our services, you agree to our use of cookies.";
        if (empty($data['wf_dismisstext'])) $data['wf_dismisstext'] = "Got it";
        if (empty($data['wf_linktext'])) $data['wf_linktext'] = "Learn more";
        break;
  }
  return $data;
}


/*
* Load cookie consent
*/
function wf_cookieconsent_load() {

  $data = wf_cookieconsent_get_options();
	if(is_numeric($data['wf_linkhref'])) {
		$data['wf_linkhref'] = get_page_link($data['wf_linkhref']);
	}

?>
<script type="text/javascript">
	window._wfCookieConsentSettings = <?php print json_encode($data) ?>;
</script>
<?php
}
add_action('wp_footer', 'wf_cookieconsent_load', 100, 1);


/*
* Admin Page
*/

// add settings link on plugin page
function wf_cookieconsent_settings_link($links) {
  $settings_link = '<a href="options-general.php?page=wf-cookieconsent">Settings</a>';
  array_unshift($links, $settings_link);
  return $links;
}
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'wf_cookieconsent_settings_link' );


// add the admin options page
function wf_cookieconsent_admin_add_page() {
	add_options_page('WF Cookie Consent Settings', 'WF Cookie Consent', 'manage_options', 'wf-cookieconsent', 'wf_cookieconsent_options_page');
}
add_action('admin_menu', 'wf_cookieconsent_admin_add_page');

// display the admin options page
function wf_cookieconsent_options_page(){

?>
	<div class="wrap">
		<h2>WF Cookie Consent - Settings</h2>
		<form action="options.php" method="post">
  		<?php settings_fields('wf_cookieconsent_options'); ?>
  		<?php do_settings_sections('wf-cookieconsent'); ?>
  		<input name="Submit" type="submit" class="button button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
		</form>
	</div>
<?php
}

// add the admin settings and such
function wf_cookieconsent_admin_init(){
  $languages = wf_get_languages();
	register_setting( 'wf_cookieconsent_options', 'wf_cookieconsent_options' );

  $sectionKey = 'plugin_main';
	add_settings_section($sectionKey, count($languages) > 1 ? esc_html__('General settings', 'wf-cookie-consent') : '', '', 'wf-cookieconsent');

	add_settings_field(
    'wf_position',
    esc_html__('Position'),
    'wf_cookieconsent_setting_radio',
    'wf-cookieconsent',
    'plugin_main',
    array(
      'fieldname' => 'wf_position',
      'fielddescription' => esc_html__('Choose the position for the banner', 'wf-cookie-consent'),
      'radioFields' => array( 'top' , 'bottom')
    )
  );

	foreach($languages as $lang) {
    if (count($languages) > 1) {
        $sectionKey = 'plugin_main_' . $lang;
        add_settings_section($sectionKey, esc_html__('Language specific settings: ' . $lang, 'wf-cookie-consent'), '', 'wf-cookieconsent');
    }
    add_settings_field(
      'wf_cookietext',
      esc_html__('Info text', 'wf-cookie-consent'),
      'wf_cookieconsent_setting_textarea',
      'wf-cookieconsent',
      $sectionKey,
      array(
        'fieldname' => 'wf_cookietext',
        'fielddescription' => '',
        'lang' => $lang
      )
    );
    add_settings_field(
      'wf_linkhref',
      esc_html__('Cookie policy page', 'wf-cookie-consent'),
      'wf_cookieconsent_setting_page_selector',
      'wf-cookieconsent',
      $sectionKey,
      array(
        'fieldname' => 'wf_linkhref',
        'fielddescription' => sprintf( wp_kses( __( '<a href="%s" target="_blank">Add your policy</a>', 'wf-cookie-consent' ), array('a'=>array('href'=>array(), 'target'=>array()))), esc_url(WFCOOKIECONSENT_IUBENDA_DIRECT_URL)),
        'lang' => $lang
      )
    );
		add_settings_field(
      'wf_linktext',
      esc_html__('Cookie policy link text', 'wf-cookie-consent'),
      'wf_cookieconsent_setting_input_text',
      'wf-cookieconsent',
      $sectionKey,
      array(
        'fieldname' => 'wf_linktext',
        'fielddescription' => '',
        'lang' => $lang
      )
    );
		add_settings_field(
      'wf_dismisstext',
      esc_html__('Dismiss text', 'wf-cookie-consent'),
      'wf_cookieconsent_setting_input_text',
      'wf-cookieconsent',
      $sectionKey,
      array(
        'fieldname' => 'wf_dismisstext',
        'fielddescription' => '',
        'lang' => $lang
      )
    );
	}
}
add_action('admin_init', 'wf_cookieconsent_admin_init');

function wf_cookieconsent_setting_input_text($args) {
	$options = wf_cookieconsent_get_options($args['lang']);
	$esc_value = esc_attr($options[$args['fieldname']]);
	echo "<input id='wf_cookieconsent_options[{$args['lang']}][{$args['fieldname']}]' name='wf_cookieconsent_options[{$args['lang']}][{$args['fieldname']}]' size='40' type='text' value='{$esc_value}' />";
	echo (empty($args['fielddescription']) ? '' :  "<p class='description'>". $args['fielddescription'] ."</p>");
}

function wf_cookieconsent_setting_textarea($args) {
	$options = wf_cookieconsent_get_options($args['lang']);
	$esc_value = esc_attr($options[$args['fieldname']]);
	echo "<textarea id='wf_cookieconsent_options[{$args['lang']}][{$args['fieldname']}]' name='wf_cookieconsent_options[{$args['lang']}][{$args['fieldname']}]' cols='40' rows='5'>{$esc_value}</textarea>";
	echo (empty($args['fielddescription']) ? '' :  "<p class='description'>". $args['fielddescription'] ."</p>");
}

function wf_cookieconsent_setting_page_selector($args) {
	$options = wf_cookieconsent_get_options($args['lang']);
	$wf_page_query = new WP_Query( array(
	     'post_type' => 'page',
	     'suppress_filters' => true, // With this option, WPML will not use any filter
	     'orderby' => 'title',
	     'order'=>'asc',
	     'lang'=>'all', // With this option, Polylang will return all languages
	     'nopaging'=>true
	 ) );
	echo "<select name='wf_cookieconsent_options[".$args['lang']."][".$args['fieldname']."]' id='wf_cookieconsent_options[".$args['lang']."][".$args['fieldname']."]'>";
	foreach ( $wf_page_query->posts as $post ) {
		$wf_language_information = wf_get_language_information($post->ID);
		if(!empty($wf_language_information)) {
			$wf_language_information = "(" .  $wf_language_information . ")";
		}
		if($options[$args['fieldname']] == $post->ID) {
		  echo "<option class='level-0' value='" . $post->ID . "' selected='selected'>" . sanitize_title($post->post_title) . " " . $wf_language_information . "</option>";
		} else {
		  echo "<option class='level-0' value='" . $post->ID . "'>" . sanitize_title($post->post_title) . " " . $wf_language_information . "</option>";
		}
	}
	echo "</select>";
	echo (empty($args['fielddescription']) ? '' :  "<p class='description'>". $args['fielddescription'] ."</p>");
}

function wf_cookieconsent_setting_radio($args) {
  $options = wf_cookieconsent_get_options();
	if(empty($options[$args['fieldname']])) {
		$options[$args['fieldname']] = '';
	}
	echo "<fieldset>";
	if(!empty($args['radioFields'])) {
		foreach ($args['radioFields'] as $radioField) {
			echo "<input type='radio' id='wf_rad_" . $radioField . "' name='wf_cookieconsent_options[{$args['fieldname']}]' value='{$radioField}'" . ($radioField == $options[$args['fieldname']] ? 'checked' : '')."><label for='wf_rad_" . $radioField . "'>" . $radioField . "</label><br />";
		}
	}
	echo (empty($args['fielddescription']) ? '' :  "<p class='description'>". $args['fielddescription'] ."</p>");
	echo "</fieldset>";
}


function wf_cookieconsent_admin_notice__iubenda() {
	global $pagenow;
	if ($pagenow == 'options-general.php' && isset($_GET['page']) && $_GET['page'] == 'wf-cookieconsent') {
?>
  <div class="notice notice-info">
    <p>
			<?php print wp_kses( __( 'Websites that use third-party cookies as well as their own cookies for tracking and analytics must comply with the Cookie law and are required to obtain explicit consent from the user. Users must be provided with a clear, comprehensible and visible notice about the use of cookies by the website.', 'wf-cookie-consent' ), array('b'=>array())); ?>
		</p>
		<p>
			<?php print sprintf( wp_kses( __( '<b>The WF Cookie Consent banner is only one part of the requirement</b>, you must provide a link to a more detailed actual cookie policy. <a href="%s" target="_blank">Click here to learn more on how to generate a cookie policy.</a>', 'wf-cookie-consent' ), array('b'=>array(),'a'=>array('href'=>array(), 'target'=>array()))), esc_url(WFCOOKIECONSENT_IUBENDA_HELP_URL) ); ?>
		</p>
  </div>
<?php
	}
}
add_action( 'admin_notices', 'wf_cookieconsent_admin_notice__iubenda' );


/*
* Helpers
*/
if (!function_exists('wf_get_language')) {

	function wf_get_language() {
		$language = null;
		//get language from polylang plugin https://wordpress.org/plugins/polylang/
		if(function_exists('pll_current_language'))
			$language = pll_current_language();
		//get language from wpml plugin https://wpml.org
		elseif(defined('ICL_LANGUAGE_CODE'))
			$language = ICL_LANGUAGE_CODE;
		//return wp get_locale() - first 2 chars (en, it, de ...)
		else
			$language = substr(get_locale(),0,2);

		return $language;
	}

}

if (!function_exists('wf_get_languages')) {

	function wf_get_languages() {
		$languages = array();
		//get all languages from polylang plugin https://wordpress.org/plugins/polylang/
		global $polylang;
		if (function_exists('PLL')) {
			// for polylang versions > 1.8
			$pl_languages = PLL()->model->get_languages_list();
		} else if (isset($polylang)) {
			// for older polylang version
			$pl_languages = $polylang->model->get_languages_list();
		}
		if (isset($pl_languages)) {
			// iterate through polylang language list
			foreach ($pl_languages as $pl_language) {
				$languages[] = $pl_language->slug;
			}
		} else if(function_exists('icl_get_languages')) {
			//get all languages with icl_get_languages for wpml
			$wpml_languages = icl_get_languages('skip_missing=0');
			foreach ($wpml_languages as $wpml_language) {
				$languages[] = !empty($wpml_language['language_code']) ? $wpml_language['language_code'] : $wpml_language['code'];
			}
		}
		else {
			//return wp get_locale() - first 2 chars (en, it, de ...)
			$languages[] = substr(get_locale(),0,2);
		}
		return $languages;
	}

}

if (!function_exists('wf_get_language_information')) {

	function wf_get_language_information($post_id) {
		$locale = '';
		$language_information = '';
		if (function_exists('pll_get_post_language')) {
			// for polylang versions > 1.7
			$locale = pll_get_post_language($post_id);
		} else if (has_filter('wpml_post_language_details') ) {
			// for wpml versions > 3.2
			$language_information = apply_filters( 'wpml_post_language_details', NULL, $post_id ) ;
		} else if (function_exists('wpml_get_language_information') ) {
			// for older wpml versions
			$language_information = wpml_get_language_information($post_id);
		}
		if(is_wp_error($language_information) || empty($language_information))
			$locale = '';
		else
			$locale = $language_information['display_name'];
		return $locale;
	}

}

?>
