<?php

namespace db\filed\enum;

use MyCLabs\Enum\Enum;

class taskState extends Enum
{
    const UNDEFINED = 0;
    const OPEN = 1;
    const CLOSE = 2;
}

// for blade template
define("TASK_OPEN", taskState::OPEN);

