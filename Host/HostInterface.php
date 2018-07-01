<?php

namespace AppBundle\Host;

use AppBundle\Request\Request;

interface HostInterface
{
    /**
     * @return float
     */
    public function getLoad();

    /**
     * @param Request $request
     * @return void
     */
    public function handleRequest(Request $request);
}