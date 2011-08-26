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
require_once dirname(__FILE__) . "/src/Dumper.php";
require_once dirname(__FILE__) . "/src/Parser.php";

// Load external liraries
$lib = new Lib();
// Load configuration files
$config = $lib->loadYaml("config.yml");

$dumper = new Dumper($lib, $config);

if ($argc > 1 && $argv[1] == "links") {
    $dumper->dumpLinks();
    exit;
}

if ($argc > 2 && $argv[1] == "method-data" ) {
    $methodName = $argv[2];
    $dumper->dumpMethodData($methodName);
    exit;
}

if ($argc > 2 && $argv[1] == "method" ) {
    $methodName = $argv[2];
    $dumper->dumpMethod($methodName);
    exit;
}

if ($argc > 1 && $argv[1] == "check-camel-case" ) {
    $dumper->checkCamelCase();
    exit;
}

if ($argc > 1 && $argv[1] == "class" ) {
    $dumper->dumpClass();
    exit;
}
    
// Here : no valid arguments given, printing help and exiting
$lib->render("usage.cli.twig", array());
exit;