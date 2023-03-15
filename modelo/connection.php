<?php
class Connection
{
    const hostname = "localhost";
    const username = "m78loW23bNsAe";
    const password = "3sgBnL92HwySa";
    const database = "clothick";

    static public function getConnection()
    {
        return new mysqli(self::hostname, self::username, self::password, self::database);
    }
}
