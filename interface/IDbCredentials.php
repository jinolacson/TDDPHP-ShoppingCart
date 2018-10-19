<?php 
/*
 * @Author: Jino Lacson 
 * @Date: 2018-10-19 14:35:01 
 * @Last Modified by: jlacson@wylog.com
 * @Last Modified time: 2018-10-19 14:36:33
 */

declare(strict_types=1);

namespace Interfaces;

interface IDbCredentials
{
    const host     = "mysql:dbname=shopping_cart;host=127.0.0.1";
    const username = "root";
    const password = "";
    const database = "shopping_cart";

    public static function getNewConnection();
    public static function closeConnection(&$conn);
    public static function getHost() : string;
    public static function getUsername() : string;
    public static function getPassword() : string;
    public static function getDatabase() : string;
}