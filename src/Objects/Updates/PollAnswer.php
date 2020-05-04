<?php

namespace Telegram\Bot\Objects\Updates;

use Telegram\Bot\Objects\BaseObject;
use Telegram\Bot\Objects\User;

/**
 * Class PollAnswer.
 *
 * @link https://core.telegram.org/bots/api#pollanswer
 *
 * @property string $poll_id     Unique poll identifier
 * @property User   $user        The user, who changed the answer to the poll
 * @property array  $option_ids  Array of Integer. 0-based identifiers of answer options, chosen by the user. May be empty if the user retracted their vote.
 */
class PollAnswer extends BaseObject
{
}
