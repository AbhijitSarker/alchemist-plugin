<?php
class AlchemistPluginActivate
{
    public static function activate()
    {
        //flush rewrite rules
        flush_rewrite_rules();
    }
}
