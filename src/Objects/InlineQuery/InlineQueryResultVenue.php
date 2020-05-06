<?php

namespace Telegram\Bot\Objects\InlineQuery;

/**
 * Class InlineQueryResultVenue.
 *
 * Represents a venue. By default, the venue will be sent by the user. Alternatively, you can use
 * input_message_content to send a message with the specified content instead of the venue.
 *
 * <code>
 * [
 *   'id'                     => '',  //  string                - Required. Unique identifier for this result, 1-64 Bytes
 *   'latitude'               => '',  //  float                 - Required. Latitude of the venue location in degrees
 *   'longitude'              => '',  //  float                 - Required. Longitude of the venue location in degrees
 *   'title'                  => '',  //  string                - Required. Title of the venue
 *   'address'                => '',  //  string                - Required. Address of the venue
 *   'foursquare_id'          => '',  //  string                - (Optional). Foursquare identifier of the venue if known
 *   'foursquare_type'        => '',  //  string                - (Optional). Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 *   'reply_markup'           => '',  //  InlineKeyboardMarkup  - (Optional). Inline keyboard attached to the message
 *   'input_message_content'  => '',  //  InputMessageContent   - (Optional). Content of the message to be sent instead of the venue
 *   'thumb_url'              => '',  //  string                - (Optional). Url of the thumbnail for the result
 *   'thumb_width'            => '',  //  int                   - (Optional). Thumbnail width
 *   'thumb_height'           => '',  //  int                   - (Optional). Thumbnail height
 * ]
 * </code>
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultvenue
 *
 * @method $this id($string)                     Required. Unique identifier for this result, 1-64 Bytes
 * @method $this latitude($float)                Required. Latitude of the venue location in degrees
 * @method $this longitude($float)               Required. Longitude of the venue location in degrees
 * @method $this title($string)                  Required. Title of the venue
 * @method $this address($string)                Required. Address of the venue
 * @method $this foursquareId($string)           (Optional). Foursquare identifier of the venue if known
 * @method $this foursquareType($string)         (Optional). Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @method $this replyMarkup($object)            (Optional). Inline keyboard attached to the message
 * @method $this inputMessageContent($object)    (Optional). Content of the message to be sent instead of the venue
 * @method $this thumbUrl($string)               (Optional). Url of the thumbnail for the result
 * @method $this thumbWidth($int)                (Optional). Thumbnail width
 * @method $this thumbHeight($int)               (Optional). Thumbnail height
 */
class InlineQueryResultVenue extends InlineBaseObject
{
    protected static string $type = 'venue';
}
