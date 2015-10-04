<?php
namespace API\src\Endpoints\User\Auth\Login;

use API\src\Endpoints\Endpoints;
use API\src\Request\Request;


class OAuth1 extends Endpoints
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

    public function post()
    {
        Error::throwApiException('`POST` operations are not currently supported for the endpoint '.$this->request->endpoint, r_missing);
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