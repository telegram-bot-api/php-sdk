<?php

namespace Telegram\Bot\Objects\Keyboard;

use Telegram\Bot\Objects\BaseCreateObject;

/**
 * Class InlineKeyboardButton.
 *
 * Represents one button of an inline keyboard. You must use exactly one of the optional fields.
 *
 * @link https://core.telegram.org/bots/api#inlinekeyboardbutton
 *
 *
 * @method $this text($string)                    Required. Label text on the button
 * @method url($string)                           (Optional). HTTP or tg:// url to be opened when button is pressed
 * @method loginUrl($LoginUrl)                    (Optional). An HTTP URL used to automatically authorize the user. Can be used as a replacement for the Telegram Login Widget.
 * @method callbackData($string)                  (Optional). Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
 * @method switchInlineQuery($string)             (Optional). If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot‘s username and the specified inline query in the input field. Can be empty, in which case just the bot’s username will be inserted.
 * @method switchInlineQueryCurrentChat($string)  (Optional). If set, pressing the button will insert the bot‘s username and the specified inline query in the current chat’s input field. Can be empty, in which case only the bot's username will be inserted.
 * @method callbackGame($string)                  (Optional). Description of the game that will be launched when the user presses the button. NOTE: This type of button must always be the first button in the first row.
 * @method pay($bool)                             (Optional). Specify True, to send a Pay button. NOTE: This type of button must always be the first button in the first row.
 */
class InlineKeyboardButton extends BaseCreateObject
{
}
