<?php

// Test if executed from CLI
if (!defined('STDIN')) {
  echo("Error : Should only be executed from CLI.");  
  exit;
}

// Templating library
// see http://www.twig-project.org/
require_once dirname(__FILE__) . "/lib/Twig/Autoloader.php";
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(dirname(__FILE__) . "/templates");
$twig = new Twig_Environment($loader);

// YAML format parser libray
// see http://components.symfony-project.org/yaml/
require_once dirname(__FILE__) . "/lib/Yaml/sfYamlParser.php";
$yaml = new sfYamlParser();
try {
    $config = file_get_contents(dirname(__FILE__) . "/config.yml");
    $value = $yaml->parse($config);
} catch (InvalidArgumentException $e) {
  // an error occurred during parsing
  echo "Unable to parse the configuration file : " . $e->getMessage();
  exit;
}

// HTML parsing lirary
require_once "lib/simple_html_dom.php";
?>