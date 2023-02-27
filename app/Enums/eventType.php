<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class eventType extends Enum
{
    const Value1 = "Holidays";
    const Value2 = "Exchange";
    const Value3 = "Absent";
}
