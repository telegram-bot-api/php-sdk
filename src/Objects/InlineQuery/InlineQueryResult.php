<?php

namespace Telegram\Bot\Objects\InlineQuery;

use Telegram\Bot\Objects\AbstractCreateObject;

/**
 * The base Inline Object Class
 *
 * To initialise quickly you can use the following array to construct the object:
 */
abstract class InlineQueryResult extends AbstractCreateObject
{
    protected string $type;

    /**
     * Create a new object.
     */
    public function __construct(array $fields = [])
    {
        $fields['type'] = $this->type;

        parent::__construct($fields);
    }
}
