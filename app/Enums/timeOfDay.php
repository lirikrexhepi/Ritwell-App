<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class timeOfDay extends Enum
{
    const OptionOne = "Breakfast";
    const OptionTwo = "Lunch";
    const OptionThree = "Dinner";
}
