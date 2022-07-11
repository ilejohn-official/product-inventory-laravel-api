# Product Inventory Api

## Table of contents

-   [General Info](#general-info)
-   [Requirements](#requirements)
-   [Setup](#setup)
-   [Usage](#usage)

## General Info

This is a simple product inventory api built with [Laravel](Laravel.com)

## Requirements

-   [PHP >= 8.0](https://www.php.net/ "PHP")

## Setup

-   Clone the project and navigate to it's root path and install the required dependency packages using the below commands on the terminal/command line interface

    ```bash
    git clone https://github.com/ilejohn-official/product-inventory-laravel-api
    cd product-inventory-laravel-api
    ```

    ```
    composer install
    ```

-   Copy and paste the content of the .env.example file into a new file named .env in the same directory as the former and set it's values based on your environment's configuration.

-   Generate app key:

    ```
    php artisan key:generate
    ```

-   Run migrations:

    ```
    php artisan migrate
    ```

    Ensure to use a Mysql table that supports json field.

## Usage

-   To run local server.

    You can use

    ```
    php artisan serve
    ```

    | Routes               | Method | Function           |
    | -------------------- | ------ | ------------------ |
    | /api/products        | Get    | Fetch all products |
    | /api/add-product     | Post   | Add product        |
    | /api/delete-products | Post   | Delete products    |
