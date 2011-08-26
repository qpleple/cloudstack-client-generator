<?php
/*
 * This file is part of the CloudStack Client Generator.
 *
 * (c) Quentin Pleplé <quentin.pleple@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
// Check script is executed from CLI
if (!defined('STDIN')) {
  echo("Error: should only be executed from CLI.");  
  exit;
}

require_once dirname(__FILE__) . "/lib/loader.php";
require_once dirname(__FILE__) . "/src/dumper.php";
require_once dirname(__FILE__) . "/src/parser.php";

// Load liraries
$lib = new Lib();
// Load configuration files
$config = $lib->loadYaml("config.yml");

$dumper = new Dumper($lib, $config);


if ($argc > 1 && $argv[1] == "dump-links") {
    $dumper->dumpLinks();
    exit;
}

if ($argc > 2 && $argv[1] == "dump-method-data" ) {
    $dumper->dumpMethodData($argv[2]);
    exit;
}

if ($argc > 2 && $argv[1] == "method" ) {
    $method = $argv[2];
    $url = getRootUrl($config['api_ref_toc_url']) . "user/${method}.html";
    $methodData = fetchMethodData($url);
    
    $lib->render("method.php.twig", array(
        "method" => $methodData,
        "config" => $config,
    ));

    exit;
}


if ($argc > 1 && $argv[1] == "check-camel-case" ) {
    // Disable camel case auto lookup
    $config['php']['use_camel_case'] = false;
    
    // Download the API reference table of content 
    $html = $lib->fetchHtml($config['api_ref_toc_url']);
    $rootUrl = getRootUrl($config['api_ref_toc_url']);
    
    $missingNames = array();
    // walk through all links
    foreach (getAllLinks($html) as $link) {
        $url =  $rootUrl . $link['url'];
        echo "Fetching $url ...\n";
        $data = fetchMethodData($url);
        foreach ($data['params'] as $param) {
            if (!array_key_exists($param['name'], $config['camel_case'])) {
                $missingNames[] = $param['name'];
            }
        }
    }
    
    if (empty($missingNames)) {
        echo "No missing camel case values :)\n";
    } else {
        echo "Add the following values to the config file under \"camel_case\"\n :";
        print_r($missingNames);
    }
    
    exit;
}

if ($argc > 1 && $argv[1] == "class" ) {
    // Download the API reference table of content 
    $html = $lib->fetchHtml($config['api_ref_toc_url']);
    $rootUrl = getRootUrl($config['api_ref_toc_url']);
    
    $methods = array();
    // walk through all links
    foreach (getAllLinks($html) as $link) {
        $url =  $rootUrl . $link['url'];
        $methods[] = fetchMethodData($url);
    }
    
    $lib->render("class.php.twig", array(
        "methods" => $methods,
        "config" => $config,
    ));
    
    exit;
}
    
// Here : no valid arguments given, printing help and exiting
$lib->render("usage.cli.twig", array());
exit;

/******************
  Functions
 ******************/

