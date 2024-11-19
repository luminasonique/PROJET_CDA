<?php

namespace App\Enum;

enum Confirmed: string
{
    case ON = 'on';
    case OFF = 'off';
    case DELAYED = 'delayed';
    case CANCELED = 'canceled';  // Additional status if needed
    case COMPLETED = 'completed'; // If you want a completed status

    // Optional: Add a method to describe the status
    public function label(): string
    {
        return match($this) {
            self::ON => 'The course is ongoing.',
            self::OFF => 'The course is not available.',
            self::DELAYED => 'The course is delayed.',
            self::CANCELED => 'The course is canceled.',
            self::COMPLETED => 'The course has been completed.',
        };
    }
}