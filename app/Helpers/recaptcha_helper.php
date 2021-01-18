<?php

function recaptcha($response, $secret)
{
    if ($secret != null) {
        $res = file_get_contents(
            'https://www.google.com/recaptcha/api/siteverify?secret=' .
            $secret . '&response=' . $response
        );
        $res = json_decode($res);
        if ($res->success == false) {
            return false;
        } else {
            return true;
        }
    } elseif ($secret == null) {
        return true;
    }
    return false;
}
