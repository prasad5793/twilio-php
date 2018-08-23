<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Video\V1\Room;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class RoomRecordingTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->video->v1->rooms("RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                    ->recordings("RTXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://video.twilio.com/v1/Rooms/RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Recordings/RTXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "status": "processing",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T21:00:00Z",
                "date_deleted": "2015-07-30T22:00:00Z",
                "sid": "RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "source_sid": "MTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "size": 0,
                "type": "audio",
                "duration": 0,
                "container_format": "mka",
                "codec": "OPUS",
                "track_name": "A name",
                "grouping_sids": {
                    "room_sid": "RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                },
                "media_external_location": "https://my-super-duper-bucket.s3.amazonaws.com/my/path/",
                "encryption_key": "public_key",
                "room_sid": "RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "url": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Recordings/RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "links": {
                    "media": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Recordings/RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Media"
                }
            }
            '
        ));

        $actual = $this->twilio->video->v1->rooms("RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                          ->recordings("RTXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();

        $this->assertNotNull($actual);
    }

    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->video->v1->rooms("RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                    ->recordings->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://video.twilio.com/v1/Rooms/RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Recordings'
        ));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "recordings": [],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Recordings?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Recordings?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "recordings"
                }
            }
            '
        ));

        $actual = $this->twilio->video->v1->rooms("RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                          ->recordings->read();

        $this->assertNotNull($actual);
    }

    public function testReadResultsResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "recordings": [
                    {
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "status": "completed",
                        "date_created": "2015-07-30T20:00:00Z",
                        "date_updated": "2015-07-30T21:00:00Z",
                        "date_deleted": "2015-07-30T22:00:00Z",
                        "sid": "RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "source_sid": "MTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "size": 23,
                        "type": "audio",
                        "duration": 10,
                        "container_format": "mka",
                        "codec": "OPUS",
                        "track_name": "A name",
                        "grouping_sids": {
                            "room_sid": "RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "participant_sid": "PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                        },
                        "media_external_location": "https://my-super-duper-bucket.s3.amazonaws.com/my/path/",
                        "encryption_key": "public_key",
                        "room_sid": "RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "url": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Recordings/RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "links": {
                            "media": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Recordings/RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Media"
                        }
                    }
                ],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Recordings?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Recordings?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "recordings"
                }
            }
            '
        ));

        $actual = $this->twilio->video->v1->rooms("RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                          ->recordings->read();

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->video->v1->rooms("RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                    ->recordings("RTXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://video.twilio.com/v1/Rooms/RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Recordings/RTXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testDeleteResponse() {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->video->v1->rooms("RMXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                          ->recordings("RTXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();

        $this->assertTrue($actual);
    }
}