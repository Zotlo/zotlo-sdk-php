<?php

namespace Zotlo\Connect\Response;

use Zotlo\Connect\Entity\Meta;
use Zotlo\Connect\Entity\Profile\Profile;

/**
 * Class SubscriptionFreezeResponse
 *
 * Represents the response object for a subscription freeze operation, containing metadata,
 * profile information, and an optional message.
 */
class SubscriptionFreezeResponse
{
    /**
     * @var Meta
     */
    private $meta;

    /**
     * @var Profile
     */
    private $profile;

    /**
     * @var string
     */
    private $message;

    /**
     * @return Meta
     */
    public function getMeta(): ?Meta
    {
        return $this->meta;
    }

    /**
     * @return Profile
     */
    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    /**
     * @return string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Constructor method to initialize the properties of the class.
     *
     * @param array $response The response data used to initialize the object.
     *                         Should contain 'result', 'meta', and optionally 'subscription' and 'message' keys.
     * @return void
     */
    public function __construct($response)
    {

        $this->meta = isset($response['meta']) ? new Meta($response['meta']) : null;

        if(!isset($response['result']) || $response['result'] == null) {
            return;
        }

        $result = $response['result'];

        $this->profile = isset($result['subscription']) && $result['subscription'] != null ? (new Profile($result['subscription'])) : null;
        $this->message = isset($result['message']) && $result['message'] != null ? $result['message'] : null;
    }
}