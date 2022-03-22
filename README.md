# Getting Started with PupDates

## Project Requirements

- Docker https://docs.docker.com/get-docker/
- Composer https://getcomposer.org/download/
- Laravel Cli https://github.com/golevelup/laravel-cli

### Set-up Steps:
1. Create a new .env file.
- copy the contents of env.example into your env file. 
2. run 'mkdir vendor' 
- create a vendor folder to house all dependencies
3. run 'lvl up'
- boots up the project in docker and sets up all the containers
4. run 'lvl composer install'
- installs all project dependencies 
5. run 'lvl artisan key:generate'
- edits the .env and sets the app key
6. run 'lvl artisan migrate'
- sets up the database to be up to date with the system 
7. run 'lvl artisan db:seed'
- Seeds the database with fake data. 

# Starting Project 
- Start docker container
- run 'lvl up'
- run 'lvl artisan migrate'