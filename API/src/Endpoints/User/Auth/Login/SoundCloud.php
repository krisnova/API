<?php
namespace API\src\Endpoints\User\Auth\Login;

use API\src\Endpoints\Endpoints;
use API\src\Request\Request;
use API\src\Error\Error;
use Njasm\Soundcloud\SoundcloudFacade;
use API\src\Config\Config;

class SoundCloud extends Endpoints
{

    public $request;

    /**
     * Send an empty request here
     *
     * The API will forward the request to the SoundCloud API, prompt the user to login
     * Return the token and login URL to the consumer for reference
     * We are now logged in with SoundCloud, and can start scraping user data
     */
    public function get()
    {
        $callback = 'http://' . Config::getConfig('Hostname') . '/User/Auth/Login/SoundCloud/index.php';
        $facade = new SoundcloudFacade(Config::getConfig('SoundCloudAppId'), Config::getConfig('SoundCloudSecret'), $callback);
        $url = $facade->getAuthUrl();
        if (isset($_GET['code'])) {
            $code = $_GET['code'];
            $token = $facade->codeForToken($code);
            $rBody = $token->bodyArray();
            $body['soundcloudAccessToken'] = $rBody['access_token'];
            $body['loginUrl'] = $url;
            $this->request->response->body = $body;
            $this->request->response->code = r_success;
            return $this->request;
        } else {
            header('Location: ' . $url);
        }
    }

    public function post()
    {
        Error::throwApiException('`POST` operations are not currently supported for the endpoint ' . $this->request->endpoint, r_missing);
    }

    public function put()
    {
        Error::throwApiException('`GET` operations are not currently supported for the endpoint ' . $this->request->endpoint, r_missing);
    }

    public function delete()
    {
        Error::throwApiException('`DELETE` operations are not currently supported for the endpoint ' . $this->request->endpoint, r_missing);
    }

    public function getResponse()
    {
        //
    }
}