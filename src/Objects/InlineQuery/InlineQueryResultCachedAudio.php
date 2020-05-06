<?php

namespace Telegram\Bot\Objects\InlineQuery;

/**
 * Class InlineQueryResultCachedAudio.
 *
 * Represents a link to an MP3 audio file stored on the Telegram servers. By default, this audio file will be sent
 * by the user. Alternatively, you can use input_message_content to send a message with the specified content
 * instead of the audio.
 *
 * <code>
 * [
 *   'id'                     => '',  //  string                - Required. Unique identifier for this result, 1-64 bytes
 *   'audio_file_id'          => '',  //  string                - Required. A valid file identifier for the audio file
 *   'caption'                => '',  //  string                - (Optional). Caption, 0-200 characters
 *   'parse_mode'             => '',  //  string                - (Optional). Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
 *   'reply_markup'           => '',  //  InlineKeyboardMarkup  - (Optional). Inline keyboard attached to the message
 *   'input_message_content'  => '',  //  InputMessageContent   - (Optional). Content of the message to be sent instead of the photo
 * ]
 * </code>
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedaudio
 *
 * @method $this id($string)                     Required. Unique identifier for this result, 1-64 bytes
 * @method $this audioFileId($string)            Required. A valid file identifier for the audio file
 * @method $this caption($string)                (Optional). Caption, 0-200 characters
 * @method $this parseMode($string)              (Optional). Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
 * @method $this replyMarkup($object)            (Optional). Inline keyboard attached to the message
 * @method $this inputMessageContent($object)    (Optional). Content of the message to be sent instead of the photo
 */
class InlineQueryResultCachedAudio extends InlineBaseObject
{
    protected static string $type = 'audio';
}
