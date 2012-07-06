<?php

class Parser
{
    /**
     * Get all the hyperlinks from the HTML document given
     * and return them in an array
     */
    public static function getAllLinks($html)
    {
        $links = array();

        foreach($html->find('a') as $a) {
            $url = $a->href;

            // Links black list
            // Exclude page that are not method documentation
            // You may need to edit the rules if the documentation has changed
            if ((substr($url, 0, 5) != "user/" && substr($url, 0, 11) != "root_admin/" && substr($url, 0, 13) != "domain_admin/")|| substr($url, 0, 8) == "user/2.2" ) {
                continue;
            }

            $links[] = array(
                'url' => $url,
                'name' => trim($a->plaintext),
            );
        }

        return $links;
    }

    /**
     * Fetch the data of the reference page of one method
     * and returns it in an array
     */
    public static function getMethodData($html, $useCamelCase = false, $camelCaseValues = array())
    {
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
                    "nameCamelCase" => $useCamelCase ? self::getCamelCase($name, $camelCaseValues) : "",
                    "description" => trim($tr->find('td', 1)->plaintext),
                    "required" => trim($tr->find('td', 2)->plaintext),
                );
            }
        }

        // All the methods starting with list have a additionnal parameter
        // for pagination, not required
        /* That's not true anymore with CS 3.x, page params are in the documentation
        if (substr($data['name'], 0, 4) == "list") {
            $data['params'][] = array(
                "name" => "page",
                "nameCamelCase" => "page",
                "description" => "Pagination",
                "required" => "false",
            );
        }*/


        return $data;
    }


    private static function getCamelCase($name, $camelCaseValues)
    {
        // The API may change and you may have to add yourself some values in the config file
        if (!array_key_exists($name, $camelCaseValues)) {
            die("No camel case value for \"$name\".\nPlease add it in the configuration file and run the command again.");
        }

        return $camelCaseValues[$name];
    }
}
