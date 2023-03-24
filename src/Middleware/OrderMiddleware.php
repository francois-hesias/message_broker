<?php

namespace App\Middleware;

use App\Message\OrderMessage;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;

class OrderMiddleware implements MiddlewareInterface
{
    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        // Récupérer le message de l'enveloppe
        $message = $envelope->getMessage();

        // Ajouter une propriété created_at au message s'il s'agit d'un OrderMessage
        if ($message instanceof OrderMessage) {
            $message->setCreatedAt(new \DateTime());
        }

        // Dispatcher le message vers le prochain middleware
        return $stack->next()->handle($envelope, $stack);
    }
}
