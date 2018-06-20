<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Article;
use App\Exception\ArticleNotFoundException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class ArticleManager implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
      //      KernelEvents::REQUEST => ['checkArticleAvailability', EventPriorities::POST_DESERIALIZE],
        ];
    }

    public function checkArticleAvailability(GetResponseEvent $event): void
    {
        $request = $event->getRequest();
        $article = $request->attributes->get('data');

        if (!$article instanceof Article) {
            return;
        }

        if ($article->getStatus() == 0) {
            // Using internal codes for a better understanding of what's going on
            throw new ArticleNotFoundException(sprintf('The Article "%s" does not exist.', $article->getId()));
        }
    }
}