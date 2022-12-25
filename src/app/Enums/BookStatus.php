<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static getLabel()
 */
final class BookStatus extends Enum
{
    const Available =   0;
    const Issued =   1;

    /**
     * @param int
     * @return string
     */
    public static function getLabel($key)
    {
        switch ($key) {
            case self::Available:
                return "Available";
            case self::Issued:
                return "Issued";
            default:
                return "";
        }
    }
}
