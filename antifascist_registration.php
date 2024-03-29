<?PHP
/*
Plugin Name: Antifascist Registration
Plugin URI: https://github.com/weddige/antifascist-plugin
Description: Stop fascists from registering by making them very uncomfortable.
Version: 1.0.0
Author: Konstantin Weddige
Author URI: https://weddige.eu
License: MIT
Text Domain: antifascist-registration
*/

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

define('ANTIFASCIST_REGISTRATION_VERSION', '1.0.0');


function antifascist_register_load_textdomain()
{
    load_plugin_textdomain('antifascist-registration', false, dirname(plugin_basename(__FILE__)));
}

add_action('init', 'antifascist_register_load_textdomain');

function antifascist_register_form()
{
    echo '<p>
        <label for="fascism_status" style="width:100%">' . __('I am', 'antifascist-registration') . '
            <select name="fascism_status" id="fascism_status" style="width:100%">
                <option value="antifascist" selected>' . __('an antifascist', 'antifascist-registration') . '</option>
                <option value="fascist">' . __('a fascist', 'antifascist-registration') . '</option>
            </select>
        </label>
    </p>';
}

function antifascist_register_post($login, $email, $errors)
{
    if ($_POST['fascism_status'] != 'antifascist') {
        $errors->add('antifascist_plugin_error', __('Hate is not an opinion.', 'antifascist-registration'));
    }
}

add_action('register_form', 'antifascist_register_form');
add_action('register_post', 'antifascist_register_post', 10, 3);

?>
