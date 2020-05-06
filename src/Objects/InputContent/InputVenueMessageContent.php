<?php

namespace Telegram\Bot\Objects\InputContent;

use Telegram\Bot\Objects\InlineQuery\InlineBaseObject;

/**
 * Class InputVenueMessageContent.
 *
 * Represents the content of a venue message to be sent as the result of an inline query.
 *
 * <code>
 * [
 *   'latitude'          => '',  //  float   - Required. Latitude of the location in degrees
 *   'longitude'         => '',  //  float   - Required. Longitude of the location in degrees
 *   'title'             => '',  //  string  - Required. Name of the venue
 *   'address'           => '',  //  string  - Required. Address of the venue
 *   'foursquare_id'     => '',  //  string  - (Optional). Foursquare identifier of the venue, if known
 *   'foursquare_type'   => '',  //  string  - (Optional). Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * ]
 * </code>
 *
 * @link https://core.telegram.org/bots/api#inputvenuemessagecontent
 *
 * @method $this latitude($float)             Required. Latitude of the location in degrees
 * @method $this longitude($float)            Required. Longitude of the location in degrees
 * @method $this title($string)               Required. Name of the venue
 * @method $this address($string)             Required. Address of the venue
 * @method $this foursquareIdTitle($string)   (Optional). Foursquare identifier of the venue, if known
 * @method $this foursquareType($string)      (Optional). Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 */
class InputVenueMessageContent extends InlineBaseObject
{
}
