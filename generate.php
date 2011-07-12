#!/usr/bin/env php
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
// Download the API reference table of content 
$html = $lib->fetchHtml($config['api_ref_toc_url']);


/**
 * The command "links" outputs the list of all the links
 * 
 */
if ($argc > 1 && $argv[1] == "links") {
    foreach (getAllLinks($html) as $link) {
        echo $link . "\n";
    }
    exit;
}

/**
 * The command "method-data"
 */
if ($argc > 2 && $argv[1] == "methoddata" ) {
    $method = $argv[2];
    $url = getRootUrl($config['api_ref_toc_url']) . $method . ".html";
    var_dump(fetchMethodData($url));
    exit;
}

/**
 * The command "method-code"
 */
if ($argc > 2 && $argv[1] == "method" ) {
    $method = $argv[2];
    $url = getRootUrl($config['api_ref_toc_url']) . $method . ".html";
    $methodData = fetchMethodData($url);
    $lib->render("clientClass.php.twig", $methodData);
    exit;
}

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
    return $matches[1] . "user/";
}

/**
 * Fetch the data of the reference page of one method
 * and returns it in an array
 */
function fetchMethodData($url) {
    global $lib;
    $html = $lib->fetchHtml($url);
    // The name of the method is in the first and only one h1
    $title = $html->find('h1', 0);
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
        if (trim($tr->find('td', 0)->plaintext) != "Parameter Name") {
            $data['params'][] = array(
                "name" => trim($tr->find('td', 0)->plaintext),
                "description" => trim($tr->find('td', 1)->plaintext),
                "required" => trim($tr->find('td', 2)->plaintext),
            );
        }
    }
    
    // All the methods strating with list have a additionnal parameter
    // for pagination, not required
    if (substr($data['name'], 0, 4) == "list") {
        $data['params']['page'] = array(
            "description" => "Pagination",
            "required" => "false",
        );
    }
    
    return $data;
}

exit;


foreach($html->find('a') as $a) {
    $url = $a->href;
    try {
        // Class generation
        $method = extract_method_data($base_url . $url, false);
        dump_method($method);

        // Test generation
        //$method = extract_method_data($base_url . $url, true);
        //dump_test_call($method);
        //
        //myecholn();

        // List of params
        //$method = extract_method_data($base_url . $url, false);
        //echo_params_names($method);

    } catch (Exception $e) { }
}

function extract_method_data($url, $test = false) {
    $html = file_get_html($url);
    $method = array(
        'name' => $html->find('h1', 0)->plaintext,
        'description' => $html->find('span', 0)->plaintext
    );
    
    $params_table = $html->find('table', 0);

    foreach($params_table->find('tr') as $tr) {
        if ($tr->find('td', 0)->plaintext != "Parameter Name" && (!$test || $tr->find('td', 2)->plaintext == "true")) {
            $param_name = $tr->find('td', 0)->plaintext;
            $method['params'][$param_name] = array(
                $tr->find('td', 1)->plaintext,
                $tr->find('td', 2)->plaintext
            );
        }
    }
    
    if (substr($method['name'], 0, 4) == "list") {
        $method['params']['page'] = array("Pagination", "false");
    }
    
    return $method;
}

function dump_test_call($method) {
    myecholn("// " . $method['description']);
    
    if ($method['params']) {
        myecholn("/*");
        myecholn("\$res = \$client->{$method['name']}(");
        $count = 0;
        foreach ($method['params'] as $param => $fields) {
            $count++;
            myecholn(
                "    \"\""
                . ($count == count($method['params']) ? "  " : ", ")
                . " // \$"
                . camelCase($param)
                . " : {$fields[0]}"
            );
        }
        myecholn(");");
        myecholn("var_dump(\$res);");
        myecholn("*/");
    } else {
        myecholn("// \$client->{$method['name']}();");
    }
}

function dump_method($method) {
    myecholn("/**");
    myecholn(" * " . $method['description']);
    myecholn(" *");
    if ($method['params']) {
        foreach ($method['params'] as $param => $fields) {
            myecholn(
                " * @param string \$" 
                . camelCase($param)
                . ($fields[0] == "true" ? " (required)" : "")
                . " {$fields[0]}"
            );
        }
    }
    myecholn(" */");
    myecholn();
    
    echo "public function {$method['name']}(";
    if ($method['params']) {
        $count = 0;
        foreach ($method['params'] as $param => $fields) {
            $count++;
            $default = $param == "page" ? " = \"1\"" : ($fields[1] == "true" ? "" : " = \"\"");
            echo "\$" . camelCase($param) . $default . ($count == count($method['params']) ? "" : ", ");
        }
    }
    myecholn(")");
    myecholn("{");
    myecholn("    \$this->request(\"{$method['name']}\", array(");
    if ($method['params']) {
        $count = 0;
        foreach ($method['params'] as $param => $fields) {
            $count++;
            myecholn(
                "       '{$param}' => \$"
                . camelCase($param)
                . ($count == count($method['params']) ? "" : ", ")
            );
        }
    }
    myecholn("    ));");
    myecholn();
    myecholn("}");
}

function echo_params_names($method) {
    if ($method['params']) {
        foreach ($method['params'] as $param => $fields) {
            myecholn($param);
        }
    }
}
?>