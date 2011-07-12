#!/usr/bin/env php
<?php
// Test if executed from CLI
if (!defined('STDIN')) {
  echo("Error : Should only be executed from CLI.");  
  exit;
}

$lib = require_once dirname(__FILE__) . "/lib/loader.php";
$config = $lib->loadYaml("config.yml");
$html = $lib->loadHtml($config['complete_url']);


function getAllLinks($html) {
    foreach($html->find('a') as $a) {
        echo $a->href . '\n';
    }
}

exit;
foreach($html->find('a') as $a) {
    $url = $a->href;
    if ($url == "index.html" || substr($url, 0, 8) == "user/2.2") {
        continue;
    }
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

function myecholn($var = "") {
    echo $var . "\n";
}

function echo_params_names($method) {
    if ($method['params']) {
        foreach ($method['params'] as $param => $fields) {
            myecholn($param);
        }
    }
}
?>