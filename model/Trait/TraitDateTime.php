<?php

namespace model\Trait;

use DateTime;
use Exception;
trait TraitDateTime
{
    protected function formatDateTime(null|string|DateTime $date, string $paramName)
    {
        if(!property_exists($this, $paramName)){
            return null;
        }
        if(is_string($date)){
            try {
                $date = new DateTime($date);
                $this->$paramName = $date->format("Y-m-d H:i:s");
            } catch (Exception $e) {
                $this->$paramName = null;
            }
        }elseif (is_object($date)){
            $this->$paramName = $date->format("Y-m-d H:i:s");
        }else{
            $this->$paramName = null;
        }
    }

}