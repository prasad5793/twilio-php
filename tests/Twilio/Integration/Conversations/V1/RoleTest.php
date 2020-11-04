<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Conversations\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Serialize;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class RoleTest extends HolodeckTestCase {
    public function testCreateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->conversations->v1->roles->create("friendly_name", "conversation", ["permission"]);
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = [
            'FriendlyName' => "friendly_name",
            'Type' => "conversation",
            'Permission' => Serialize::map(["permission"], function($e) { return $e; }),
        ];

        $this->assertRequest(new Request(
            'post',
            'https://conversations.twilio.com/v1/Roles',
            null,
            $values
        ));
    }

    public function testCreateResponse(): void {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "chat_service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "Conversation Role",
                "type": "conversation",
                "permissions": [
                    "sendMessage",
                    "leaveConversation",
                    "editOwnMessage",
                    "deleteOwnMessage"
                ],
                "date_created": "2016-03-03T19:47:15Z",
                "date_updated": "2016-03-03T19:47:15Z",
                "url": "https://conversations.twilio.com/v1/Roles/RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->conversations->v1->roles->create("friendly_name", "conversation", ["permission"]);

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->conversations->v1->roles("RLXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update(["permission"]);
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = ['Permission' => Serialize::map(["permission"], function($e) { return $e; }), ];

        $this->assertRequest(new Request(
            'post',
            'https://conversations.twilio.com/v1/Roles/RLXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
            null,
            $values
        ));
    }

    public function testUpdateResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "chat_service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "Conversation Role",
                "type": "conversation",
                "permissions": [
                    "sendMessage",
                    "leaveConversation",
                    "editOwnMessage",
                    "deleteOwnMessage"
                ],
                "date_created": "2016-03-03T19:47:15Z",
                "date_updated": "2016-03-03T19:47:15Z",
                "url": "https://conversations.twilio.com/v1/Roles/RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->conversations->v1->roles("RLXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update(["permission"]);

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->conversations->v1->roles("RLXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://conversations.twilio.com/v1/Roles/RLXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testDeleteResponse(): void {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->conversations->v1->roles("RLXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();

        $this->assertTrue($actual);
    }

    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->conversations->v1->roles("RLXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://conversations.twilio.com/v1/Roles/RLXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "chat_service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "Conversation Role",
                "type": "conversation",
                "permissions": [
                    "sendMessage",
                    "leaveConversation",
                    "editOwnMessage",
                    "deleteOwnMessage"
                ],
                "date_created": "2016-03-03T19:47:15Z",
                "date_updated": "2016-03-03T19:47:15Z",
                "url": "https://conversations.twilio.com/v1/Roles/RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->conversations->v1->roles("RLXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();

        $this->assertNotNull($actual);
    }

    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->conversations->v1->roles->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://conversations.twilio.com/v1/Roles'
        ));
    }

    public function testReadFullResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://conversations.twilio.com/v1/Roles?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://conversations.twilio.com/v1/Roles?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "roles"
                },
                "roles": [
                    {
                        "sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "chat_service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "friendly_name": "Conversation Role",
                        "type": "conversation",
                        "permissions": [
                            "sendMessage",
                            "leaveConversation",
                            "editOwnMessage",
                            "deleteOwnMessage"
                        ],
                        "date_created": "2016-03-03T19:47:15Z",
                        "date_updated": "2016-03-03T19:47:15Z",
                        "url": "https://conversations.twilio.com/v1/Roles/RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                    }
                ]
            }
            '
        ));

        $actual = $this->twilio->conversations->v1->roles->read();

        $this->assertGreaterThan(0, \count($actual));
    }

    public function testReadEmptyResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://conversations.twilio.com/v1/Roles?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://conversations.twilio.com/v1/Roles?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "roles"
                },
                "roles": []
            }
            '
        ));

        $actual = $this->twilio->conversations->v1->roles->read();

        $this->assertNotNull($actual);
    }
}