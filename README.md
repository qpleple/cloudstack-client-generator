CloudStack Client Generator
===========================

Command line tool that fetches and parses the online reference for CloudStack API and generates the client class in PHP or Python with in-code documentation. You can generate a client in any other language (Java, C++, ObjectiveC, etc.) by adding class templates to the ``templates/`` directory.

See https://github.com/qpleple/cloudstack-php-client for last PHP client generated.

Description
-----------

The table of content of the API reference lists all the methods. Each method has its own page. The data that the script fetches for each method is:

* the method name
* the method description
* for each argument:
  * the argument name
  * the argument description
  * wether if the argument is required or not
  
Here is an example of a method generated that has one argument required (`$id`) and one not (`$forced`):

    /**
    * Stops a virtual machine.
    *
    * @param string $id The ID of the virtual machine
    * @param string $forced Force stop the VM.  The caller knows the VM is stopped.
    */
    
    public function stopVirtualMachine($id, $forced = "") {
        $this->request("stopVirtualMachine", array(
            'id' => $id,
            'forced' => $forced,
        ));
    }
    
Usage
-----
Just run the script, it will generate all the methods.

    php generator.php class

Output:

    abstract class BaseCloudStackClient {
        abstract protected function request($method, $args);
    
        /**
        * Stops a virtual machine.
        *
        * @param string $id The ID of the virtual machine
        * @param string $forced Force stop the VM.  The caller knows the VM is stopped.
        */
        
        public function stopVirtualMachine($id, $forced = "") {
            $this->request("stopVirtualMachine", array(
                'id' => $id,
                'forced' => $forced,
            ));
        }
    
        ...
    }

Configuration
-------------

The configuration is set in `config.yml` with the Yaml format:

    # URL of the API reference table of contents
    # check out if you have the latest version url here:
    # http://cloud.mindtouch.us/CloudStack_Documentation/API_Reference%3A_CloudStack
    api_ref_toc_url: http://download.cloud.com/releases/2.2.0/api_2.2.4/TOC_User.html

    # Language for generated code (supported: php, python)
    language: php

    # Generated class name
    class_name: CloudStackClient

    # Use camel case variable or not
    use_camel_case: true

    # Camel case values
    camel_case:
        account: account
        accounts: accounts
        # ...
        
Camel Case
----------
You can either choose to have generated code with the same variable names than in the documentation, `securitygroupnames` for instance, or to have them in camel case, like `securityGroupNames` by setting `use_camel_case` to `true` in the configuration file.

Debuging
--------

As the DOM of the online documentation may change, here is some tools to inquire the change. Three steps are crucial:

* The URL of the online documentation table of content of the **latest** version of the API. To be modified in the config file.
* The link black list: links to ignore in all the links from the table of content. To be modified in the function `getAllLinks()` of `generator.php`.
* The page scraper if the DOM change, to be modified in the function `fetchMethodData()` in `generator.php`.

The code is well documented, it should not be too difficult to understand and tweak it.

### Dump links ###
This command is great to debug a change in the URL pattern of the online documentation. It should output all the links that are on the table of contents (the URL is in the config file):

    php generator.php links
    
Example:

    $ php generator.php links
    user/deployVirtualMachine.html
    user/destroyVirtualMachine.html
    user/rebootVirtualMachine.html
    user/startVirtualMachine.html
    user/stopVirtualMachine.html
    user/resetPasswordForVirtualMachine.html
    ...


### Dump method data ###
This command shows what data is fetched from the page of one method.

Example:

    $ php generator.php method-data stopVirtualMachine
    Array
    (
        [name] => stopVirtualMachine
        [description] => Stops a virtual machine.
        [params] => Array
            (
                [0] => Array
                    (
                        [name] => id
                        [description] => The ID of the virtual machine
                        [required] => true
                    )
    
                [1] => Array
                    (
                        [name] => forced
                        [description] => Force stop the VM.  The caller knows the VM is stopped.
                        [required] => false
                    )
    
            )
    
    )

### Method ###
This command generates the PHP code for that method. The following example will output the code given at the begin of this document:

    php generator.php method stopVirtualMachine
