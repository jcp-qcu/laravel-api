#!/bin/bash
#terminal commands : ./.sh {add parameter here or empty for default}

echo "### Initializing Developer's Commands ###"
if [[ "$1" == 'v' ]]
  then
    echo "################## Displaying Version ##################"
    # *******************************
    _commands="echo -e '\n***** LARAVEL VERSION *****'"
    _commands+="&& laravel -v &&"
    # *******************************
    _commands+="echo -e '\n***** COMPOSER VERSION *****'"
    _commands+="&& composer -v &&"
    # *******************************
    _commands+="echo -e '\n***** PHP VERSION *****'"
    _commands+="&& php -v"
    # *******************************
    eval $_commands
elif  [[ "$1" == 'kg' ]]
  then
    echo "################## Generate Key : ( php artisan key:generate ) ##################"
    eval "php artisan key:generate"
elif  [[ "$1" == 'gp' ]]
  then
    echo "################## Pull and Push Commits : ( git pull && git push ) ##################"
    eval "git pull && git push"
elif  [[ "$1" == 'rms' ]]
  then
    echo "################## ROLLBACK - MIGRATE - SEED ##################"
    eval "php artisan migrate:rollback && php artisan migrate && php artisan db:seed"
elif  [[ "$1" == 'ms' ]]
  then
    echo "################## MIGRATE - SEED ##################"
    eval "php artisan migrate && php artisan db:seed"
else
    echo "################## Default : ( php artian serve ) ##################"
    eval "php artisan serve"
fi
