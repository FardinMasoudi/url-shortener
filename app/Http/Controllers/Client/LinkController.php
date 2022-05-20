<?php

namespace App\Http\Controllers\Client;

use App\Services\HashLinkService;

class LinkController extends \App\Http\Controllers\ApiController
{
    // invoke_method
    public function handle($hash, HashLinkService $hashLinkService)
    {
        $hashUrl = $hashLinkService->getUrlByHash($hash);

        if (!$hashUrl['domain']) {
            return $this->responseError(['msg' => 'hash link is not found']);
        }

        return $this->responseOk($hashUrl);
    }

}