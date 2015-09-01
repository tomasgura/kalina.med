<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function javascript_alert($lp_str)
{
    echo javascript_obal("alert('$lp_str');");
}

function javascript_obal($lp_script)
{
   return "\n<script type=\"text/javascript\">\n".$lp_script."\n</script>\n";
}
