<?php

namespace Telegram\Bot\Methods;

use Telegram\Bot\Exceptions\TelegramSDKException;
use Telegram\Bot\Objects\Message as MessageObject;
use Telegram\Bot\Traits\Http;

/**
 * Class Message.
 *
 * @mixin Http
 */
trait Message
{
    /**
     * Send text messages.
     *
     * <code>
     * $params = [
     *       'chat_id'                   => '',  // int|string - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *       'text'                      => '',  // string     - Required. Text of the message to be sent
     *       'parse_mode'                => '',  // string     - (Optional). Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's message.
     *       'disable_web_page_preview'  => '',  // bool       - (Optional). Disables link previews for links in this message
     *       'disable_notification'      => '',  // bool       - (Optional). Sends the message silently. iOS users will not receive a notification, Android users will receive a notification with no sound.
     *       'reply_to_message_id'       => '',  // int        - (Optional). If the message is a reply, ID of the original message
     *       'reply_markup'              => '',  // string     - (Optional). Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#sendmessage
     *
     * @param array $params
     *
     * @throws TelegramSDKException
     *
     * @return MessageObject
     */
    public function sendMessage(array $params): MessageObject
    {
        $response = $this->post('sendMessage', $params);

        return new MessageObject($response->getDecodedBody());
    }

    /**
     * Forward messages of any kind.
     *
     * <code>
     * $params = [
     *       'chat_id'               => '',  // int|string - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *       'from_chat_id'          => '',  // int        - Required. Unique identifier for the chat where the original message was sent (or channel username in the format "@channelusername")
     *       'disable_notification'  => '',  // bool       - (Optional). Sends the message silently. iOS users will not receive a notification, Android users will receive a notification with no sound.
     *       'message_id'            => '',  // int        - Required. Message identifier in the chat specified in from_chat_id
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#forwardmessage
     *
     * @param array $params
     *
     * @throws TelegramSDKException
     *
     * @return MessageObject
     */
    public function forwardMessage(array $params): MessageObject
    {
        $response = $this->post('forwardMessage', $params);

        return new MessageObject($response->getDecodedBody());
    }

    /**
     * Send Photo.
     *
     * <code>
     * $params = [
     *       'chat_id'               => '',  // int|string       - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *       'photo'                 => '',  // InputFile|string - Required. Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new photo using multipart/form-data.
     *       'caption'               => '',  // string           - (Optional). Photo caption (may also be used when resending photos by file_id), 0-200 characters
     *       'parse_mode'            => '',  // string           - (Optional). Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     *       'disable_notification'  => '',  // bool             - (Optional). Sends the message silently. iOS users will not receive a notification, Android users will receive a notification with no sound.
     *       'reply_to_message_id'   => '',  // int              - (Optional). If the message is a reply, ID of the original message
     *       'reply_markup'          => '',  // string           - (Optional). Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#sendphoto
     *
     * @param array $params
     *
     * @throws TelegramSDKException
     *
     * @return MessageObject
     */
    public function sendPhoto(array $params): MessageObject
    {
        $response = $this->uploadFile('sendPhoto', $params, 'photo');

        return new MessageObject($response->getDecodedBody());
    }

    /**
     * Send regular audio files.
     *
     * <code>
     * $params = [
     *       'chat_id'               => '',  // int|string       - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *       'audio'                 => '',  // InputFile|string - Required. Audio file to send. Pass a file_id as String to send an audio file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an audio file from the Internet, or upload a new one using multipart/form-data.
     *       'caption'               => '',  // string           - (Optional). Audio caption, 0-200 characters
     *       'parse_mode'            => '',  // string           - (Optional). Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     *       'duration'              => '',  // int              - (Optional). Duration of the audio in seconds
     *       'performer'             => '',  // string           - (Optional). Performer
     *       'title'                 => '',  // string           - (Optional). Track name
     *       'thumb'                 => '',  // InputFile|string - (Optional). Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail‘s width and height should not exceed 90. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can’t be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>
     *       'disable_notification'  => '',  // bool             - (Optional). Sends the message silently. iOS users will not receive a notification, Android users will receive a notification with no sound.
     *       'reply_to_message_id'   => '',  // int              - (Optional). If the message is a reply, ID of the original message
     *       'reply_markup'          => '',  // string           - (Optional). Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * ]
     *
     * @link https://core.telegram.org/bots/api#sendaudio
     * </code>
     *
     * @param array $params
     *
     * @throws TelegramSDKException
     *
     * @return MessageObject
     */
    public function sendAudio(array $params): MessageObject
    {
        $response = $this->uploadFile('sendAudio', $params, 'audio');

        return new MessageObject($response->getDecodedBody());
    }

    /**
     * Send general files.
     *
     * <code>
     * $params = [
     *       'chat_id'               => '',  // int|string       - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *       'document'              => '',  // InputFile|string - Required. File to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data.
     *       'caption'               => '',  // string           - (Optional). Document caption (may also be used when resending documents by file_id), 0-200 characters
     *       'parse_mode'            => '',  // string           - (Optional). Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     *       'disable_notification'  => '',  // bool             - (Optional). Sends the message silently. iOS users will not receive a notification, Android users will receive a notification with no sound.
     *       'reply_to_message_id'   => '',  // int              - (Optional). If the message is a reply, ID of the original message
     *       'reply_markup'          => '',  // string           - (Optional). Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#senddocument
     *
     * @param array $params
     *
     * @throws TelegramSDKException
     *
     * @return MessageObject
     */
    public function sendDocument(array $params): MessageObject
    {
        $response = $this->uploadFile('sendDocument', $params, 'document');

        return new MessageObject($response->getDecodedBody());
    }

    /**
     * Send Video File, Telegram clients support mp4 videos (other formats may be sent as Document).
     *
     * <code>
     * $params = [
     *       'chat_id'               => '',  // int|string       - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *       'video'                 => '',  // InputFile|string - Required. Video to send. Pass a file_id as String to send a video that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a video from the Internet, or upload a new video using multipart/form-data.
     *       'duration'              => '',  // int              - (Optional). Duration of sent video in seconds
     *       'width'                 => '',  // int              - (Optional). Video width
     *       'height'                => '',  // int              - (Optional). Video height
     *       'caption'               => '',  // string           - Optional  Video caption (may also be used when resending videos by file_id), 0-200 characters.
     *       'parse_mode'            => '',  // string           - (Optional). Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     *       'supports_streaming'    => '',  // bool             - (Optional). Pass True, if the uploaded video is suitable for streaming
     *       'disable_notification'  => '',  // bool             - (Optional). Sends the message silently. iOS users will not receive a notification, Android users will receive a notification with no sound.
     *       'reply_to_message_id'   => '',  // int              - (Optional). If the message is a reply, ID of the original message
     *       'reply_markup'          => '',  // string           - (Optional). Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#sendvideo
     * @see  sendDocument
     *
     * @param array $params
     *
     * @throws TelegramSDKException
     *
     * @return MessageObject
     */
    public function sendVideo(array $params): MessageObject
    {
        $response = $this->uploadFile('sendVideo', $params, 'video');

        return new MessageObject($response->getDecodedBody());
    }

    /**
     * Send send animation files (GIF or H.264/MPEG-4 AVC video without sound).
     *
     * <code>
     * $params = [
     *       'chat_id'               => '',  // int|string       - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *       'animation'             => '',  // InputFile|string - Required. Animation to send. Pass a file_id as String to send an animation that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an animation from the Internet, or upload a new animation using multipart/form-data.
     *       'duration'              => '',  // int              - (Optional). Duration of sent animation in seconds
     *       'width'                 => '',  // int              - (Optional). Animation width
     *       'height'                => '',  // int              - (Optional). Animation height
     *       'thumb'                 => '',  // InputFile|string - (Optional). Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail‘s width and height should not exceed 90. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can’t be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>
     *       'caption'               => '',  // string           - (Optional). Document caption (may also be used when resending documents by file_id), 0-200 characters
     *       'parse_mode'            => '',  // string           - (Optional). Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     *       'disable_notification'  => '',  // bool             - (Optional). Sends the message silently. iOS users will not receive a notification, Android users will receive a notification with no sound.
     *       'reply_to_message_id'   => '',  // int              - (Optional). If the message is a reply, ID of the original message
     *       'reply_markup'          => '',  // string           - (Optional). Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#sendanimation
     *
     * @param array $params
     *
     * @throws TelegramSDKException
     *
     * @return MessageObject
     */
    public function sendAnimation(array $params): MessageObject
    {
        $response = $this->uploadFile('sendAnimation', $params, 'animation');

        return new MessageObject($response->getDecodedBody());
    }

    /**
     * Send voice audio files.
     *
     * <code>
     * $params = [
     *       'chat_id'               => '',  // int|string       - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *       'voice'                 => '',  // InputFile|string - Required. Audio file to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data.
     *       'caption'               => '',  // string           - (Optional). Voice message caption, 0-200 characters
     *       'parse_mode'            => '',  // string           - (Optional). Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     *       'duration'              => '',  // int              - (Optional). Duration of the voice message in seconds
     *       'disable_notification'  => '',  // bool             - (Optional). Sends the message silently. iOS users will not receive a notification, Android users will receive a notification with no sound.
     *       'reply_to_message_id'   => '',  // int              - (Optional). If the message is a reply, ID of the original message
     *       'reply_markup'          => '',  // string           - (Optional). Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#sendvoice
     *
     * @param array $params
     *
     * @throws TelegramSDKException
     *
     * @return MessageObject
     */
    public function sendVoice(array $params): MessageObject
    {
        $response = $this->uploadFile('sendVoice', $params, 'voice');

        return new MessageObject($response->getDecodedBody());
    }

    /**
     * Send rounded square mp4 videos of up to 1 minute long. Use this method to send video messages.
     *
     * <code>
     * $params = [
     *       'chat_id'               => '',  // int|string       - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *       'video_note'            => '',  // InputFile|string - Required. Video note to send. Pass a file_id as String to send a video note that exists on the Telegram servers (recommended) or upload a new video using multipart/form-data.
     *       'duration'              => '',  // int              - (Optional). Duration of sent video in seconds
     *       'length'                => '',  // int              - (Optional). Video width and height
     *       'thumb'                 => '',  // InputFile|string - (Optional). Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail‘s width and height should not exceed 90. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can’t be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>
     *       'disable_notification'  => '',  // bool             - (Optional). Sends the message silently. iOS users will not receive a notification, Android users will receive a notification with no sound.
     *       'reply_to_message_id'   => '',  // int              - (Optional). If the message is a reply, ID of the original message
     *       'reply_markup'          => '',  // string           - (Optional). Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#sendvideonote
     *
     * @param array $params
     *
     * @throws TelegramSDKException
     *
     * @return MessageObject
     */
    public function sendVideoNote(array $params): MessageObject
    {
        $response = $this->uploadFile('sendVideoNote', $params, 'video_note');

        return new MessageObject($response->getDecodedBody());
    }

    /**
     * Send a group of photos or videos as an album.
     *
     * <code>
     * $params = [
     *       'chat_id'               => '',  // int|string - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *       'media'                 => '',  // array      - Required. A JSON-serialized array describing photos and videos to be sent, must include 2–10 items
     *       'duration'              => '',  // int        - (Optional). Duration of sent video in seconds
     *       'disable_notification'  => '',  // bool       - (Optional). Sends the message silently. iOS users will not receive a notification, Android users will receive a notification with no sound.
     *       'reply_to_message_id'   => '',  // int        - (Optional). If the message is a reply, ID of the original message
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#sendmediagroup
     *
     * @param array $params
     *
     * @throws TelegramSDKException
     *
     * //TODO Check this return type.
     * @return MessageObject
     */
    public function sendMediaGroup(array $params)
    {
        $response = $this->uploadFile('sendMediaGroup', $params, 'media');

        return new MessageObject($response->getDecodedBody());
    }

    /**
     * Send information about a venue.
     *
     * <code>
     * $params = [
     *       'chat_id'               => '',  // int|string - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *       'latitude'              => '',  // float      - Required. Latitude of the venue
     *       'longitude'             => '',  // float      - Required. Longitude of the venue
     *       'title'                 => '',  // string     - Required. Name of the venue
     *       'address'               => '',  // string     - Required. Address of the venue
     *       'foursquare_id'         => '',  // string     - (Optional). Foursquare identifier of the venue
     *       'foursquare_type'       => '',  // string     - (Optional). Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
     *       'disable_notification'  => '',  // bool       - (Optional). Sends the message silently. iOS users will not receive a notification, Android users will receive a notification with no sound.
     *       'reply_to_message_id'   => '',  // int        - (Optional). If the message is a reply, ID of the original message
     *       'reply_markup'          => '',  // string     - (Optional). Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#sendvenue
     *
     * @param array $params
     *
     * @throws TelegramSDKException
     *
     * @return MessageObject
     */
    public function sendVenue(array $params): MessageObject
    {
        $response = $this->post('sendVenue', $params);

        return new MessageObject($response->getDecodedBody());
    }

    /**
     * Send phone contacts.
     *
     * <code>
     * $params = [
     *       'chat_id'               => '',  // int|string - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *       'phone_number'          => '',  // string     - Required. Contact's phone number
     *       'first_name'            => '',  // string     - Required. Contact's first name
     *       'last_name'             => '',  // string     - Required. Contact's last name
     *       'vcard'                 => '',  // string     - (Optional). Additional data about the contact in the form of a vCard, 0-2048 bytes
     *       'disable_notification'  => '',  // bool       - (Optional). Sends the message silently. iOS users will not receive a notification, Android users will receive a notification with no sound.
     *       'reply_to_message_id'   => '',  // int        - (Optional). If the message is a reply, ID of the original message
     *       'reply_markup'          => '',  // string     - (Optional). Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#sendcontact
     *
     * @param array $params
     *
     * @throws TelegramSDKException
     *
     * @return MessageObject
     */
    public function sendContact(array $params): MessageObject
    {
        $response = $this->post('sendContact', $params);

        return new MessageObject($response->getDecodedBody());
    }

    /**
     * Send a poll.
     *
     * Use this method to send a native poll. A native poll can't be sent to a private chat.
     *
     * <code>
     * $params = [
     *       'chat_id'                 => '',  // int|string - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername"). A native poll can't be sent to a private chat.
     *       'question'                => '',  // string     - Required. Poll question, 1-255 characters
     *       'options'                 => '',  // array      - Required. List of answer options, 2-10 strings 1-100 characters each
     *       'is_anonymous'            => '',  // bool       - (Optional). True, if the poll needs to be anonymous, defaults to True
     *       'type'                    => '',  // string     - (Optional). Poll type, “quiz” or “regular”, defaults to “regular”
     *       'allows_multiple_answers' => '',  // bool       - (Optional). True, if the poll allows multiple answers, ignored for polls in quiz mode, defaults to False
     *       'correct_option_id'       => '',  // int        - (Optional). 0-based identifier of the correct answer option, required for polls in quiz mode
     *       'explanation'             => '',  // string     - (Optional). Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters with at most 2 line feeds after entities parsing
     *       'explanation_parse_mode'  => '',  // string     - (Optional). Mode for parsing entities in the explanation. See formatting options for more details.
     *       'open_period'             => '',  // int        - (Optional). Amount of time in seconds the poll will be active after creation, 5-600. Can't be used together with close_date.
     *       'close_date'              => '',  // int        - (Optional). Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5 and no more than 600 seconds in the future. Can't be used together with open_period.
     *       'is_closed'               => '',  // bool       - (Optional). Pass True, if the poll needs to be immediately closed. This can be useful for poll preview.
     *       'disable_notification'    => '',  // bool       - (Optional). Sends the message silently. Users will receive a notification with no sound.
     *       'reply_to_message_id'     => '',  // int        - (Optional). If the message is a reply, ID of the original message
     *       'reply_markup'            => '',  // string     - (Optional). Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#sendpoll
     *
     * @param array $params
     *
     * @throws TelegramSDKException
     *
     * @return MessageObject
     */
    public function sendPoll(array $params): MessageObject
    {
        $params['options'] = json_encode($params['options']);
        $response = $this->post('sendPoll', $params);

        return new MessageObject($response->getDecodedBody());
    }

    /**
     * Send a dice.
     *
     * Use this method to send a dice, which will have a random value from 1 to 6
     *
     * <code>
     * $params = [
     *       'chat_id'               => '',  // int|string - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername"). A native poll can't be sent to a private chat.
     *       'emoji'                 => '',  // string     - (Optional). Emoji on which the dice throw animation is based. Currently, must be one of "🎲" or "🎯". Defaults to "🎲"
     *       'disable_notification'  => '',  // bool       - (Optional). Sends the message silently. Users will receive a notification with no sound.
     *       'reply_to_message_id'   => '',  // int        - (Optional). If the message is a reply, ID of the original message
     *       'reply_markup'          => '',  // string     - (Optional). Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#senddice
     *
     * @param array $params
     *
     * @throws TelegramSDKException
     *
     * @return MessageObject
     */
    public function sendDice(array $params): MessageObject
    {
        $response = $this->post('sendDice', $params);

        return new MessageObject($response->getDecodedBody());
    }

    /**
     * Broadcast a Chat Action.
     *
     * <code>
     * $params = [
     *       'chat_id'  => '',  // int|string - Required. Unique identifier for the target chat or username of the target channel (in the format "@channelusername")
     *       'action'   => '',  // string     - Required. Type of action to broadcast. Choose one, depending on what the user is about to receive: typing for text messages, upload_photo for photos, record_video or upload_video for videos, record_audio or upload_audio for audio files, upload_document for general files, find_location for location data.
     * ]
     * </code>
     *
     * @link https://core.telegram.org/bots/api#sendchataction
     *
     * @param array $params
     *
     * @throws TelegramSDKException
     *
     * @return bool
     */
    public function sendChatAction(array $params): bool
    {
        $validActions = [
            'typing',
            'upload_photo',
            'record_video',
            'upload_video',
            'record_audio',
            'upload_audio',
            'upload_document',
            'find_location',
            'record_video_note',
            'upload_video_note',
        ];

        if (isset($params['action']) && in_array($params['action'], $validActions, true)) {
            $this->post('sendChatAction', $params);

            return true;
        }

        throw new TelegramSDKException('Invalid Action! Accepted value: ' . implode(', ', $validActions));
    }
}
