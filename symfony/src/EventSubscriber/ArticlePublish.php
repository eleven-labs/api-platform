<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Article;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class ArticlePublish implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['publish', EventPriorities::POST_WRITE],
        ];
    }

    public function publish(GetResponseForControllerResultEvent $event)
    {
        $article = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$article instanceof Article || Request::METHOD_POST !== $method) {
            return;
        }

      //  var_dump($article);
    }
}