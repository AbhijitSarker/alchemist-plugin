<?php

namespace Inc\Base;

class Deactivate
{
    public  function deactivate()
    {
        //flush rewrite rules
        flush_rewrite_rules();
    }
}
