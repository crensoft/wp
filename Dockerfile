FROM alpine:3.9 as build

ENV DEBIAN_FRONTEND=noninteractive

COPY . /wp

RUN apk update && apk upgrade && \
  apk add zip && \
  apk add --no-cache php7 \
  php7-common \ 
  php7-json \
  php7-mbstring \
  php7-opcache \
  php7-openssl \
  php7-phar && \
  EXPECTED_SIGNATURE="$(wget -q -O - https://composer.github.io/installer.sig)" && \
  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
  ACTUAL_SIGNATURE="$(php -r "echo hash_file('sha384', 'composer-setup.php');")" && \
  if [ "$EXPECTED_SIGNATURE" != "$ACTUAL_SIGNATURE" ]; \
  then \
      >&2 echo 'ERROR: Invalid installer signature' && \
      rm composer-setup.php && \
      exit 1; \
  fi && \
  php composer-setup.php --quiet --install-dir=/usr/local/bin --filename=composer && \
  RESULT=$? && \
  rm composer-setup.php && \
  exit $RESULT

RUN cd /wp && composer install --no-ansi --no-dev \
  --no-interaction --no-progress \
  --no-scripts --optimize-autoloader && \
  rm Dockerfile .dockerignore && \
  zip -mr wp.zip * && \
  rm -rf .git

# ---

FROM scratch

COPY --from=build wp/wp.zip /wp/wp.zip


