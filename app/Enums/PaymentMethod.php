<?php

namespace App\Enums;

enum PaymentMethod : string
{
    case CASH = 'cash';
    case PAYCONIQ = 'payconiq';
    case WERO = 'wero';
    case BANK_TRANSFER = 'bank_transfer';
    case CREDIT_CARD = 'credit_card';

    public function displayName(): string
    {
        return match ($this) {
            self::CASH => 'Cash',
            self::PAYCONIQ => 'Payconiq',
            self::WERO => 'Wero',
            self::BANK_TRANSFER => 'Overschrijving',
            self::CREDIT_CARD => 'Credit Card',
        };
    }

    public static function toArray(): array
    {
        return [
            self::CASH->value => self::CASH->displayName(),
            self::PAYCONIQ->value => self::PAYCONIQ->displayName(),
            self::WERO->value => self::WERO->displayName(),
            self::BANK_TRANSFER->value => self::BANK_TRANSFER->displayName(),
            self::CREDIT_CARD->value => self::CREDIT_CARD->displayName(),
        ];
    }
}
