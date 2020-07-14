<?php
/*
  Plugin name: FreeFunnel
  Plugin URI: https://github.com/Squishy123/freefunnel
  Description: You're Welcome
  Author: Christian Wang @Squishy123
  Author URI: https://github.com/Squishy123
  Version: 1.0b
  */

// Version 
define('PLUGIN_NAME_VERSION', '1.0b');

// Plugin Activation
function activate_freefunnel()
{
    require_once plugin_dir_path(__FILE__) . 'includes/setup/activator.php';
    FreeFunnelActivator::activate();
}

// Plugin Deactivation
function deactivate_freefunnel()
{
    require_once plugin_dir_path(__FILE__) . 'includes/setup/deactivator.php';
    FreeFunnelDeactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_freefunnel');
register_deactivation_hook(__FILE__, 'deactivate_freefunnel');


// Core plugin class
require plugin_dir_path(__FILE__).'includes/freefunnel.php';

// Start plugin execution
function run_freefunnel() {
    $plugin = new FreeFunnel();
    $plugin->run();
}

run_freefunnel();