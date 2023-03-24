<?php

namespace App\MessageHandler;

use App\Message\OrderProcessedMessage;
use App\Service\MessageManager;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\Transport\AmqpExt\AmqpStamp;

class OrderProcessedMessageHandler implements MessageHandlerInterface
{
    public function __construct(private MessageManager $messageManager)
    {
    }

    /**
     * Fonction qui traite le message OrderProcessedMessage
     *
     * @param OrderProcessedMessage $message
     */
    public function __invoke(OrderProcessedMessage $message)
    {
        // Utilisation du service MessageManager pour traiter le message
        $return = $this->messageManager->orderProcessedMessageBuilder($message);

        // Affichage des résultats dans la console
        print_r($return.PHP_EOL);
    }
}
