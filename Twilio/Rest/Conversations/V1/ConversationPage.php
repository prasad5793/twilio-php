<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Conversations\V1;

use Twilio\Page;

class ConversationPage extends Page {
    public function __construct($version, $response) {
        parent::__construct($version, $response);
        
        // Path Solution
        $this->solution = array();
    }

    public function buildInstance(array $payload) {
        return new ConversationInstance(
            $this->version,
            $payload
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Conversations.V1.ConversationPage]';
    }
}