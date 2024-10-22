<?php

class CreateProductsTable
{
    public function up()
    {
        return 'CREATE TABLE products (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            description TEXT
        )';
    }

    public function down()
    {
        return 'DROP TABLE products';
    }

}
