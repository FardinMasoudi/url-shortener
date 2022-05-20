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

- Don`t usage framework
- Don`t usage orm
- Usage composer to manage classes
- Usage jwt for authentication
- Written wrapper for return response as ApiController
- Usage never write custom actions technique
- Usage invokable method in controllers that have only one method
- Usage validation request
- Usage repository pattern
- Usage ioc container
- Usage middleware for check token
- Dockerized project with docker-compose

### <a id="build-process"> Build </a>

- git clone https://github.com/FardinMasoudi/project-managment.git
- install docker and docker compose
- exec to container and write commands:
    - composer install
    - php artisan migrate
    - php artisan db:seed
    - copy `* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1`  and paste to
      /etc/cron.tab to run schecdule command
    - php artisan test

