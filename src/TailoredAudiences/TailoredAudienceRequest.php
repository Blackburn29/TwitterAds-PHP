<?php

namespace Blackburn29\TwitterAds\TailoredAudiences;

use Blackburn29\TwitterAds\HttpMethods;
use Blackburn29\TwitterAds\Request;

class TailoredAudienceRequest extends Request
{
    /**
     * A list of accepted API endpoints and their default http method. You can 
     * override the http method via the constructor.
     */
    const ROUTES = [
        'accounts/:account_id/tailored_audience_memberships'         => HttpMethods::POST,
        'accounts/:account_id/tailored_audiences'                    => HttpMethods::GET,
        'accounts/:account_id/tailored_audiences/:id'                => HttpMethods::GET,
        'accounts/:account_id/tailored_audiences/:id/permissions'    => HttpMethods::GET,
        'accounts/:account_id/tailored_audiences/:id/reach_estimate' => HttpMethods::GET,
        'accounts/:account_id/tailored_audiences_changes'            => HttpMethods::GET,
        'accounts/:account_id/tailored_audiences/global_opt_out'     => HttpMethods::PUT,
    ];
}