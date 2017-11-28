<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    /**
     * @param $revenue
     * @return Revenue
     */
    public function getRevenue1Attribute($revenue)
    {
        return new Revenue($revenue);
    }


}
