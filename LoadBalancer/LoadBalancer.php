<?php

namespace AppBundle\LoadBalancer;

use AppBundle\Host\Host;
use AppBundle\Variant\Variant;
use AppBundle\Request\Request;

class LoadBalancer
{
    /**
     * @var Host[]
     */
    private $hosts = [];

    /**
     * @var Variant
     */
    private $variant = null;

    /**
     * @param Host[] $hosts
     * @param Variant $variant
     */
    public function __construct(array $hosts, Variant $variant)
    {
        $this->hosts = $hosts;
        $this->variant = $variant;
    }

    /**
     * @param Request $request
     */
    public function handleRequest(Request $request)
    {
        $host = $this->variant->getNextRequest($this->hosts);
        $host->handleRequest($request);
    }
}