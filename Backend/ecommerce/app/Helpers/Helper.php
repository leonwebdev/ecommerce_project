<?php

namespace App\Helpers;

use Pacewdd\Bx\_5bx;

class Helper 
{

    /**
     * Process transaction using _5bx library
     *
     * @return object
     */
    static function processTransaction(array $card_info, mixed $order_total, int $order_id)
    {
        $transaction = new _5bx(env('BX_LOGIN'), env('BX_KEY'));

        $transaction->amount($order_total); // total sale
        $transaction->card_num($card_info['card_number']); // credit card number
        $transaction->exp_date($card_info['card_expiry']); // expiry date month and year (august 2022)
        $transaction->cvv($card_info['card_cvv']); // Card Verification Value (cvv) number
        $transaction->ref_num($order_id); // reference or invoice number
        $transaction->card_type($card_info['card_type']); // card type (visa, mastercard, amex)

        return $transaction->authorize_and_capture(); // JSON object

    }
}