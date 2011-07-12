CloudStack Client Generator
===========================

Command line tool that fetches and parses the online reference for CloudStack API and generates the client class in PHP. See https://github.com/qpleple/cloudstack-php-client for last generated.

The table of content of the API reference lists all the methods. Each method has its own page. The data that the script fetches for each method is :
* the method name
* the method description
* for each argument :
  * the argument name
  * the argument description
  * wether if the argument is required or not