<?php

namespace App\Model;

interface OroCRMModel
{
    /**
     * @param array $request
     * @return self
     */
    public static function fromRequest(array $request);
}
