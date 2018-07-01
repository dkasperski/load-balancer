<?php

namespace AppBundle\Variant;

use AppBundle\Host\Host;

class LoadBySequenceVariant implements Variant
{
    /**
     * @param Host[] $hosts
     * @return Host
     */
    public function getNextRequest(array &$hosts)
    {
        return array_shift($hosts);
    }
}