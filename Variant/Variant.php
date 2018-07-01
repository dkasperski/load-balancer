<?php

namespace AppBundle\Variant;

use AppBundle\Host\Host;

interface Variant
{
    /**
     * @param Host[] $hosts
     * @return Host
     */
    public function getNextRequest(array &$hosts);
}