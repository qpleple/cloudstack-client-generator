<?php
// Test if executed from CLI
if (!defined('STDIN')) {
  echo("Error : Should only be executed from CLI.");  
  exit;
}

// Load liraries
$lib = require_once dirname(__FILE__) . "/lib/loader.php";
// Load configuration files
$config = $lib->loadYaml("config.yml");


/**
 * The command "links" outputs the list of all the links
 * 
 */
if ($argc > 1 && $argv[1] == "dump-links") {
    // Download the API reference table of content 
    $html = $lib->fetchHtml($config['api_ref_toc_url']);
    $links = getAllLinks($html);
    foreach ($links as $link) {
        echo $link . "\n";
    }
    
    exit;
}

/**
 * The command "method-data"
 */
if ($argc > 2 && $argv[1] == "dump-method-data" ) {
    $method = $argv[2];
    $url = getRootUrl($config['api_ref_toc_url']) . "user/${method}.html";
    print_r(fetchMethodData($url));

    exit;
}


/**
 * The command "method"
 */
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
        $url =  $rootUrl . $link;
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
        $url =  $rootUrl . $link;
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

/**
 * Get all the hyperlinks from the HTML document given
 * and return them in an array
 */
function getAllLinks($html) {
    $links = array();
    
    foreach($html->find('a') as $a) {
        $url = $a->href;
        
        // Links black list
        // Exclude page that are not method documentation
        // You may need to edit the rules if the documentation has changed
        if ($url == "http://cloud.com" || substr($url, 0, 8) == "user/2.2") {
            continue;
        }
        
        $links[] = $url;
    }
    
    return $links;
}

/**
 * Match the root of the table of content
 * for http://download.cloud.com/releases/2.2.0/api_2.2.4/TOC_User.html
 * the root is http://download.cloud.com/releases/2.2.0/api_2.2.4/
 */
function getRootUrl($url) {
    preg_match("/^(.*\/)[^\/]+$/", $url, $matches);
    return $matches[1];
}

/**
 * Fetch the data of the reference page of one method
 * and returns it in an array
 */
function fetchMethodData($url) {
    global $lib;
    global $config;
    
    $html = $lib->fetchHtml($url);
    // The name of the method is in the first and only one h1
    $title = $html->find('h1', 0);
    if ($title == null) {
        die("Error getting $url");
    }
    $data = array(
        'name' => trim($title->plaintext),
        // The description of the method is in the next block
        'description' => trim($title->next_sibling()->plaintext),
    );
    
    // The arguments of the method are all in the first table
    $params_table = $html->find('table', 0);

    // then, capturing the 3 cells of each lines :
    // parameter name, description of the paramter and wether if it is required or not
    foreach($params_table->find('tr') as $tr) {
        $name = trim($tr->find('td', 0)->plaintext);
        if ($name != "Parameter Name") {
            $data['params'][] = array(
                "name" => $name,
                "nameCamelCase" => $config['php']['use_camel_case'] ? getCamelCase($name) : "",
                "description" => trim($tr->find('td', 1)->plaintext),
                "required" => trim($tr->find('td', 2)->plaintext),
            );
        }
    }
    
    // All the methods strating with list have a additionnal parameter
    // for pagination, not required
    if (substr($data['name'], 0, 4) == "list") {
        $data['params'][] = array(
            "name" => "page",
            "nameCamelCase" => "page",
            "description" => "Pagination",
            "required" => "false",
        );
    }

    return $data;
}


function getCamelCase($name) {
    global $config;
    
    // The API may change and you may have to add yourself some values in the config file
    if (!array_key_exists($name, $config['camel_case'])) {
        die("No camel case value for \"$name\".\nPlease add it in the configuration file and run the command again.");
    }
    
    return $config['camel_case'][$name];
}