#!/usr/bin/env bash
set -e

role=${CONTAINER_ROLE:-magnat-back}

if [ "$role" = "magnat-back" ]; then
    exec php-fpm
else
    echo "Could not match the container role \"$role\""
    exit 1
fi
