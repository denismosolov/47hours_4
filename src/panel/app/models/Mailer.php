<?php

/**
 * Created by IntelliJ IDEA.
 * User: leonid
 * Date: 08.11.14
 * Time: 20:18
 */
class Mailer
{
    public static $from = "denismosolov@gmail.com";

    public static function sendMail($emailTo, $topic, $message)
    {
        ini_set("SMTP", "smtp.gmail.com");
        ini_set("sendmail_from", Mailer::$from);
        $headers = "From: " . Mailer::$from;
        mail($emailTo, $topic, $message, $headers);
    }
}