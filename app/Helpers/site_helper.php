<?php


if(!function_exists('imgAsset'))
{
    function imgAsset ($resource)
    {
        return base_url('assets/img/'.$resource);
    }
}