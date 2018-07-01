<?php

namespace AppBundle\Variant;

use AppBundle\Host\Host;

class LoadByRankVariant implements Variant
{
    /**
     * @param Host[] $hosts
     * @return Host
     */
    public function getNextRequest(array &$hosts)
    {
        $orderedHosts = $hosts;
        uasort($orderedHosts, array($this, 'compare'));
        reset($orderedHosts);

        if (isset($orderedHosts[key($orderedHosts)]) && $orderedHosts[key($orderedHosts)]->getLoad() < 0.75) {
            $nextHost = $orderedHosts[key($orderedHosts)];
            unset($hosts[key($orderedHosts)]);
            return $nextHost;
        }

        return array_shift($hosts);
    }

    /**
     * @param Host $a
     * @param Host $b
     * @return int
     */
    private function compare(Host $a, Host $b)
    {
        return strcmp($a->getLoad(), $b->getLoad());
    }
}