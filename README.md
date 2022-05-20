## Table of Contents

- **[Introduction](#Introduction)**
- **[Features](#Features)**
- **[Techniques](#techniques)**
- **[Build Process](#build-process)**

### <a id="Introduction"> Introduction </a>

The project is a link shortener

<p>Example.com/url-short-test-aparat-active-link</p>  
<p>Example.com/ajf23e</p>

### <a id="Features"> Features </a>

A few of the things you can do with project-managment

- Register And Login
- Link Management
- Return url by hash(shortener link)

### <a id="techniques"> Techniques </a>

A few of the techniques you can do see in shortener link system

- Don`t using framework
- Don`t using orm
- Using Redis for cache urls
- Using composer to manage classes
- Using jwt for authentication
- Written wrapper for return response as ApiController
- Using never write custom actions technique
- Using invokable method in controllers that have only one method
- Using validation request
- Using repository pattern
- Using ioc container
- Using middleware for check token
- Dockerized project with docker-compose

### <a id="build-process"> Build </a>

- git clone https://github.com/FardinMasoudi/url-shortener.git
- install docker and docker compose
- exec to url-shorter_app_1 container and write commands:
    - composer install
- get urls.sql in root directory and import to phpmyadmin    
