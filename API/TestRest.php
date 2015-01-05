<?php
require_once 'API.php';
class MyAPI extends API
{
    protected $Profile;

    public function __construct($request, $origin) {
        parent::__construct($request);

        // Abstracted out for example
        $APIKey = new Models\APIKey();
        $Profile = new Models\Profile();

        if (!array_key_exists('apiKey', $this->request)) {
            throw new Exception('No API Key provided');
        } else if (!$APIKey->verifyKey($this->request['apiKey'], $origin)) {
            throw new Exception('Invalid API Key');
        } else if (array_key_exists('token', $this->request) &&
             !$Profile->get('token', $this->request['token'])) {

            throw new Exception('Invalid Profile Token');
        }

        $this->Profile = $Profile;
    }

    /**
     * Example of an Endpoint
     */
     protected function example() {
        if ($this->method == 'GET') {
            return "Your name is " . $this->Profile->name;
        } else {
            return "Only accepts GET requests";
        }
     }
 }

?>