<?php

namespace Kitpages\CacheControlBundle\Model;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\EventDispatcher\Event;

use Symfony\Component\HttpKernel\Log\LoggerInterface;

class CacheControlManager {
    protected $logger = null;
    
    public function __construct(
        LoggerInterface $logger
    )
    {
        $this->logger = $logger;
    }
    /**
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
//        $this->getLogger()->debug("CacheControlBundle, remove cache");
        $response = $event->getResponse();
        $response->headers->addCacheControlDirective('no-store');
        $response->headers->addCacheControlDirective('no-cache');
        $response->headers->addCacheControlDirective('must-revalidate');
        $response->headers->addCacheControlDirective('post-check','0');
        $response->headers->addCacheControlDirective('pre-check','0');
        $response->headers->set("Pragma", "no-cache");
        $response->setPrivate();
        $date = new \DateTime();
        $date->sub(new \DateInterval("P2Y"));
        $response->setExpires($date);
    }
}

?>
