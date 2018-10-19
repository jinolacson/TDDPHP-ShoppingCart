<?php
/*
 * @Author: Jino Lacson 
 * @Date: 2018-10-19 14:35:01 
 * @Last Modified by: jlacson@wylog.com
 * @Last Modified time: 2018-10-19 14:35:23
 */

namespace Models;

use Classes\Connection;

class Products extends Connection
{
    private $conn;

    public function __construct(Connection $connection)
    {
        $this->conn = $connection;
    }

    /**
     * Function to add Products in database
     *
     * @param int $product_id
     * @param int $quantity
     * @param string $name
     * @param int $price
     * @return void
     * access public
     */
    public function addProducts($product_id, $quantity, $name, $price)
    {
        $stmt = $this->conn->prepare("insert into products(product_id, quantity, name, price) values ( ?, ?, ?, ?)");
        $stmt->execute([$product_id, $quantity, $name, $price]);
    }

    /**
     * Reset/Truncate products table
     *
     * @param string $table
     * @return void
     * access public
     */
    public function empty($table = null)
    {
        $stmt = $this->conn->prepare("TRUNCATE TABLE ".$table);
        $stmt->execute();
    }

    /**
     * drop table
     *
     * @param string $table
     * @return void
     * access public
     */
    public function drop($table = null)
    {
        $stmt = $this->conn->prepare("DROP TABLE ".$table);
        $stmt->execute();
    }

    /**
     * close connection for Products class
     * access public
     */
    public function __destruct()
    {
        Connection::closeConnection($this->conn);
    }
}
