<?php

namespace Telegram\Bot\Objects\InlineQuery;

/**
 * Class InlineQueryResultCachedMpeg4Gif.
 *
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound) stored on the Telegram servers.
 * By default, this animated MPEG-4 file will be sent by the user with an optional caption. Alternatively, you can use
 * input_message_content to send a message with the specified content instead of the animation.
 *
 * <code>
 * [
 *   'id'                     => '',  //  string                - Required. Unique identifier for this result, 1-64 bytes
 *   'mpeg4_file_id'          => '',  //  string                - Required. A valid file identifier for the MP4 file
 *   'title'                  => '',  //  string                - (Optional). Title for the result
 *   'caption'                => '',  //  string                - (Optional). Caption of the MPEG-4 file to be sent, 0-200 characters
 *   'parse_mode'             => '',  //  string                - (Optional). Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
 *   'reply_markup'           => '',  //  InlineKeyboardMarkup  - (Optional). Inline keyboard attached to the message
 *   'input_message_content'  => '',  //  InputMessageContent   - (Optional). Content of the message to be sent instead of the photo
 * ]
 * </code>
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedmpeg4gif
 *
 * @method $this id($string)                     Required. Unique identifier for this result, 1-64 bytes
 * @method $this mpeg4FileId($string)            Required. A valid file identifier for the MP4 file
 * @method $this title($string)                  (Optional). Title for the result
 * @method $this caption($string)                (Optional). Caption of the MPEG-4 file to be sent, 0-200 characters
 * @method $this parseMode($string)              (Optional). Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
 * @method $this replyMarkup($object)            (Optional). Inline keyboard attached to the message
 * @method $this inputMessageContent($object)    (Optional). Content of the message to be sent instead of the photo
 */
class InlineQueryResultCachedMpeg4Gif extends InlineBaseObject
{
    protected string $type = 'mpeg4_gif';
}
