<?php
class AlchemistPluginDeactivate
{
    public static function deeactivate()
    {
        //flush rewrite rules
        flush_rewrite_rules();
    }
}
