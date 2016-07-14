<?php

namespace PMG\TwitterAds;

abstract class Request
{
    /**
     * Gets the HTTP Method type
     * 
     * @return string
     */
    abstract public function getMethod();

    /**
     * Gets the url to send the request to. (This should be fully qualified)
     *
     * @return string
     */
    abstract public function getUrl();

    /**
     * Gets the parameters associated with the request, including any query parameters.
     *
     * @return associative array
     */
    abstract public function getParameters();

    /**
     * Gets all headers assoicated with the request. 
     *
     * @return associative array
     */
    abstract public function getHeaders();
}