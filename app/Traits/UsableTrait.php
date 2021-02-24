<?php

namespace App\Traits;

use App\Models\AppSeeting;

trait UsableTrait {
    public function CodeIn($number,$digit='4')
    {
        $code_in=sprintf("%0".$digit."d",$number)."/". now()->year;
        return $code_in;
    }

    public function codeOut()
    {
        $code_out=AppSeeting::where('name','code_out');
        $number=(int)$code_out->value('value') +1;
        $text=AppSeeting::where('name','text_code')->value('value');
        $code= $text.$number."/". now()->year;
        $code_out->update(['value'=>$number]);

        return $code;
    }
}
