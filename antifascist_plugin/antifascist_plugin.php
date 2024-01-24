<?PHP
/*
Plugin Name: Antifascist Plugin
Plugin URI: https://github.com/weddige/antifascist-plugin
Description: Stop fascists from registering by making them very uncomfortable.
Version: 1.0.0
Author: Konstantin Weddige
Author URI: https://weddige.eu
*/

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

define('ANTIFASCIST_PLUGIN_VERSION', '1.0.0');

function antifascist_plugin_register_form()
{
    echo '<p>
        <label for="fascism_status" style="width:100%">' . __('I am') . '
            <select name="fascism_status" id="fascism_status" style="width:100%">
                <option value="antifascist" selected>' . __('an antifascist') . '</option>
                <option value="fascist">' . __('a fascist') . '</option>
            </select>
        </label>
    </p>';
}

function antifascist_plugin_register_post($login, $email, $errors)
{
    if ($_POST['fascism_status'] != 'antifascist') {
        $errors->add('antifascist_plugin_error', __('Hate is not an opinion.'));
    }
}

add_action('register_form', 'antifascist_plugin_register_form');
add_action('register_post', 'antifascist_plugin_register_post', 10, 3);

?>
