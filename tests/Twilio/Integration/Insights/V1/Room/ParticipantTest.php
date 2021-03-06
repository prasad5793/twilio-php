<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Insights\V1\Room;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class ParticipantTest extends HolodeckTestCase {
    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->insights->v1->rooms("RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                       ->participants("PAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://insights.twilio.com/v1/Video/Rooms/RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Participants/PAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "publisher_info": {},
                "edge_location": "Ashburn",
                "join_time": "2015-07-30T20:00:00Z",
                "leave_time": "2015-07-30T20:00:00Z",
                "end_reason": "disconnected_via_api",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "error_code": 0,
                "call_sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "media_region": "us1",
                "properties": {},
                "room_sid": "RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "error_code_url": "error_code_url",
                "participant_sid": "PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "codecs": [
                    "VP8"
                ],
                "status": "in_progress",
                "duration_sec": 50000000,
                "participant_identity": "participant_identity",
                "url": "https://insights.twilio.com/v1/Video/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->insights->v1->rooms("RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                             ->participants("PAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();

        $this->assertNotNull($actual);
    }

    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->insights->v1->rooms("RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                       ->participants->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://insights.twilio.com/v1/Video/Rooms/RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Participants'
        ));
    }

    public function testReadEmptyResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "url": "https://insights.twilio.com/v1/Video/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants?PageSize=50&Page=0",
                    "key": "participants",
                    "first_page_url": "https://insights.twilio.com/v1/Video/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants?PageSize=50&Page=0",
                    "page_size": 50,
                    "next_page_url": null,
                    "page": 0,
                    "previous_page_url": null
                },
                "participants": []
            }
            '
        ));

        $actual = $this->twilio->insights->v1->rooms("RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                             ->participants->read();

        $this->assertNotNull($actual);
    }

    public function testReadFullResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "url": "https://insights.twilio.com/v1/Video/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants?PageSize=50&Page=0",
                    "key": "participants",
                    "first_page_url": "https://insights.twilio.com/v1/Video/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants?PageSize=50&Page=0",
                    "page_size": 50,
                    "next_page_url": null,
                    "page": 0,
                    "previous_page_url": null
                },
                "participants": [
                    {
                        "publisher_info": {},
                        "edge_location": "Ashburn",
                        "join_time": "2015-07-30T20:00:00Z",
                        "leave_time": "2015-07-30T20:00:00Z",
                        "end_reason": "disconnected_via_api",
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "error_code": 53205,
                        "call_sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "media_region": "us1",
                        "properties": {},
                        "room_sid": "RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "error_code_url": "error_code_url",
                        "participant_sid": "PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "codecs": [
                            "VP8"
                        ],
                        "status": "in_progress",
                        "duration_sec": 50000000,
                        "participant_identity": "participant_identity",
                        "url": "https://insights.twilio.com/v1/Video/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                    }
                ]
            }
            '
        ));

        $actual = $this->twilio->insights->v1->rooms("RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                             ->participants->read();

        $this->assertGreaterThan(0, \count($actual));
    }
}