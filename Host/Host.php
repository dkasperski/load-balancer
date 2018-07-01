<?php

namespace AppBundle\Host;

use AppBundle\Request\Request;

class Host implements HostInterface
{
    /**
     * @var float
     */
    private $load = 0.00;

    public function __construct()
    {
        $this->load = round(mt_rand(0, mt_getrandmax() - 1) / mt_getrandmax(), 2);
    }

    /**
     * @return float
     */
    public function getLoad()
    {
        return $this->load;
    }

    /**
     * @param Request $request
     * @return void
     */
    public function handleRequest(Request $request)
    {
        echo $request->getName();
    }
}