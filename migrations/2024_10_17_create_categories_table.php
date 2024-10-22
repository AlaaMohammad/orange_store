<?php

class CreateCategoriesTable
{
    public function up()
    {
        return 'CREATE TABLE categories (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL
        )';
    }

    public function down()
    {
        return 'DROP TABLE categories';
    }

}
