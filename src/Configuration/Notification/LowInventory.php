<?php namespace Anomaly\ProductsModule\Configuration\Notification;

use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\Streams\Platform\Notification\Message\MailMessage;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

/**
 * Class LowInventory
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class LowInventory extends Notification implements ShouldQueue
{

    use Queueable;

    /**
     * The product instance.
     *
     * @var ConfigurationInterface
     */
    protected $configuration;

    /**
     * Create a new NewProduct instance.
     *
     * @param ConfigurationInterface $configuration
     */
    public function __construct(ConfigurationInterface $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  UserInterface $notifiable
     * @return array
     */
    public function via(UserInterface $notifiable)
    {
        return ['mail'];
    }

    /**
     * Return the mail message.
     *
     * @param  UserInterface $notifiable
     * @return MailMessage
     */
    public function toMail(UserInterface $notifiable)
    {
        $data = $this->configuration->toArray();

        return (new MailMessage())
            ->view('anomaly.module.products::notifications.low_inventory')
            ->subject(trans('anomaly.module.products::notification.low_inventory.subject', $data))
            ->greeting(trans('anomaly.module.products::notification.low_inventory.greeting', $data))
            ->line(trans('anomaly.module.products::notification.low_inventory.instructions', $data))
            ->action(
                trans('anomaly.module.products::notification.low_inventory.button', $data),
                url(
                    'admin/products/' . $this->configuration->getProductId()
                    . '/configurations/edit/' . $this->configuration->getId()
                )
            );
    }
}
