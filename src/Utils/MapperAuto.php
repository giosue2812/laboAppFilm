<?php


namespace App\Utils;

use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\Configuration\AutoMapperConfig;

class MapperAuto
{
    public function mapp($source, $destination)
    {
        return $mapper = AutoMapper::initialize(function (AutoMapperConfig $config) use ($source,$destination){
            $config->registerMapping($source,$destination);
        });
    }
}
