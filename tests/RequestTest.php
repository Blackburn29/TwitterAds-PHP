<?php
/*
 * This file is part of pmg/twitterads
 *
 * Copyright (c) PMG <https://www.pmg.com>
 *
 * For full copyright information see the LICENSE file distributed
 * with this source code.
 *
 * @license     https://opensource.org/licenses/MIT MIT
 */

namespace PMG\TwitterAds;

use PMG\TwitterAds\Fixtures\TestRequest;
use PMG\TwitterAds\Request;

class RequestTest extends UnitTestCase
{
    public function testUrlParametersWillBeParsedCorrectly()
    {
        $url = 'accounts/:accountid/test/:testid';
        $assertion = Request::BASE_URL.'accounts/1234/test/foo';

        $request = new TestRequest(HttpMethods::GET, $url, [
            'accountid'     => '1234',
            'testid'        => 'foo',
            'other'         => false,
        ]);

        list($parsedUrl, $params) = $request->getParsedUrlAndParams();

        $this->assertEquals($assertion, $parsedUrl);
        $this->assertCount(1, $params);
        $this->assertArrayHasKey('other', $params);
    }
}
