<?php

class CreateUsersTable
{
    public function up()
    {
        return 'CREATE TABLE users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL
        )';
    }

    public function down()
    {
        return 'DROP TABLE users';
    }
}