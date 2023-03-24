namespace App\MessageHandler;

use App\Message\OrderMessage;
use App\Message\OrderProcessedMessage;
use App\Service\MessageManager;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Transport\AmqpExt\AmqpStamp;
use Symfony\Component\Uid\Uuid;

class OrderMessageHandler implements MessageHandlerInterface
{
    public function __construct(
        private MessageBusInterface $messageBus,
        private MessageManager $messageManager
    ) {}

    /**
     * Fonction appelée pour traiter le message OrderMessage.
     * @param OrderMessage $message le message à traiter
     */
    public function __invoke(OrderMessage $message)
    {
        // Générer un numéro de commande unique avec l'UID de Symfony
        $commandeNumber = Uuid::v4();

        try {
            // Appeler la méthode orderMessageBuilder de MessageManager pour gérer la commande
            $return = $this->messageManager->orderMessageBuilder($commandeNumber, $message);
            print_r($return.PHP_EOL);

            // Si tout s'est bien passé, créer un message OrderProcessedMessage avec le statut "true"
            $orderProcessedMessage = new OrderProcessedMessage(true);
        } catch (\Exception $e) {
            // Si une exception a été levée, créer un message OrderProcessedMessage avec le statut "false"
            $orderProcessedMessage = new OrderProcessedMessage(false);
        }

        // Ajouter le numéro de commande généré au message OrderProcessedMessage
        $orderProcessedMessage->setOrderId($commandeNumber);

        // Envoyer le message OrderProcessedMessage à la file de messages pour notification
        $this->messageBus->dispatch($orderProcessedMessage);
    }
}
