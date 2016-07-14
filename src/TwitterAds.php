<?php

namespace PMG\TwitterAds;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

use PMG\TwitterAds\Exception\UnsupportedHttpMethod;

class TwitterAds
{
    /**
     * @var Auth
     */
    private $auth;

    /**
     * @var GuzzleHttp\Client
     */
    private $client;

    public function __construct($consumerKey, $consumerSecret, $token, $secret)
    {
        $this->auth = new Auth($consumerKey, $consumerSecret, $token, $secret);

        $stack = HandlerStack::create();
        $stack->push($this->auth->toGuzzleOAuth());
        $this->client = new Client([
            'handler' => $stack,
            'auth'    => 'oauth',
        ]);
    }

    /**
     * Sends off an oAuth 1.0 authenticated request
     *
     * @return Response
     */
    public function send(Request $request)
    {
        return Response::fromGuzzleResponse(
            call_user_func(
                [$this->client, strtolower($request->getMethod())],
                $request->getUrl(),
                $request->getParameters()
        ));
    }

    /**
     * Returns the http client
     *
     * @return string
     */
    public function getHttpClient()
    {
        return $this->client;
    }
}