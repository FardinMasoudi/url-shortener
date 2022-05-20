<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Services\LinkService;

class LinkController extends ApiController
{
    private $linkService;

    public function __construct(LinkService $linkService)
    {
        $this->linkService = $linkService;
    }

    public function index()
    {
        $links = $this->linkService->getLinkList();

        return $this->responseOk($links);
    }

    public function store(): \Laminas\Diactoros\Response\JsonResponse
    {
        $this->linkService->makeLink();

        return $this->responseOk();
    }

    public function update($id): \Laminas\Diactoros\Response\JsonResponse
    {
        $this->linkService->update($id);

        return $this->responseOk();
    }

    public function destroy($id)
    {
        $this->linkService->delete($id);

        return $this->responseOk();
    }
}