<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 */
final class IssueStatus extends Enum
{
    const Issued =   0;
    const Returned =   1;

    /**
     * @param int
     * @return string
     */
    public static function getLabel($key)
    {
        switch ($key) {
            case self::Issued:
                return "Issued";
            case self::Returned:
                return "Returned";
            default:
                return "";
        }
    }
}
