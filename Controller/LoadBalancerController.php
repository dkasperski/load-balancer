<?php

namespace AppBundle\Controller;

use AppBundle\Host\Host;
use AppBundle\LoadBalancer\LoadBalancer;
use AppBundle\Variant\LoadByRankVariant;
use AppBundle\Variant\LoadBySequenceVariant;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Request\Request as LoadBalancerRequest;

class LoadBalancerController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $hostsCollection = [];
        for ($i = 1; $i <= 10; $i++) {
            $hostsCollection[] = new Host();
        }

        $variant = new LoadByRankVariant();
        $loadBalancer = new LoadBalancer($hostsCollection, $variant);

        for ($j = 1; $j <= 10; $j++) {
            $loadBalancer->handleRequest(new LoadBalancerRequest(sprintf('request number %s <br />', $j)));
        }

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
