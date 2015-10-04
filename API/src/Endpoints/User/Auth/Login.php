<?php
namespace API\src\Endpoints\User\Auth;

use API\src\Endpoints\Endpoints;
use API\src\Request\Request;

/**
 * The login endpoint
 *
 *
 * Oct 3, 2015
 * @author Kris Nova <kris@nivenly.com> github.com/kris-nova
 */
class Login extends Endpoints
{
	
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get()
    {
        Error::throwApiException('`GET` operations are not currently supported for the endpoint '.$this->request->endpoint, r_missing);
    }

    /**
     * Will attempt to create a new user
     * 
     * @see \API\src\Endpoints\Endpoints::post()
     */
    public function post()
    {
        die('we got here');
    }

    public function put()
    {
        Error::throwApiException('`GET` operations are not currently supported for the endpoint '.$this->request->endpoint, r_missing);
    }

    public function delete()
    {
        Error::throwApiException('`DELETE` operations are not currently supported for the endpoint '.$this->request->endpoint, r_missing);
    }

    public function getResponse()
    {
        //
    }
}