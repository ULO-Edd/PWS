# Fatura+

Invoicing web application developed for the **PWS (Programação Web Servidor)** course, 2nd year / 2nd semester (2021/22) of the TeSP in Programação de Sistemas de Informação (IPL).

Built in plain PHP with an MVC structure and the PHP ActiveRecord ORM.

## Authors

- Eduardo Amado (2202420)
- Tiago Tavares (2202418)

## Features

- **Authentication** with three roles: administrator, employee (*funcionário*) and client
- **Company** (`Empresa`) details
- **Products** (`Produto`) and **VAT rates** (`Iva`)
- **Invoices** (`Fatura`) and **invoice lines** (`LinhaFatura`)
- **User management** (`User`)

## Tech stack

- PHP with a custom MVC structure (`router.php?c=<controller>&a=<action>`)
- [php-activerecord](https://github.com/jpfuentes2/php-activerecord) ORM
- [Carbon](https://carbon.nesbot.com/) for dates
- MySQL
- Bootstrap 5

## Project structure

```
Projeto_PWS_2ANO/
├── router.php        # Entry point / front controller
├── startup/boot.php  # Autoload + ActiveRecord database connection
├── controllers/      # One controller per entity + BaseController
├── models/           # ActiveRecord models
├── views/            # Views per entity + layouts
└── public/           # CSS, JS and images
```

## Setup

1. Install dependencies:
   ```bash
   composer install
   ```
2. Create the MySQL database `proj_pws` with the project's SQL script (`projeto_pws.sql`). The script is not included in this repository.
3. Check the connection string in `startup/boot.php`. The default is `mysql://root@localhost/proj_pws`.
4. Put the project in your local server's web root (WAMP `www/` or XAMPP `htdocs/`) and open:
   ```
   http://localhost/Projeto_PWS_2ANO/router.php
   ```
