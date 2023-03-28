FROM ubuntu

ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update \ 
    && apt-get install -y --no-install-recommends \
        gpg \
        gpg-agent \
        software-properties-common \
    && LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php \
    && apt-get update \ 
    && apt-get install -y --no-install-recommends \
        git \
        curl \
        make \
        nginx \
        php8.2 \
        php8.2-cli \
        php8.2-curl \
        php8.2-fpm \
        php8.2-intl \
        php8.2-gd \
        php8.2-mbstring \
        php8.2-mysql \
        php8.2-opcache \
        php8.2-sqlite3 \
        php8.2-xdebug \
        php8.2-xml \
        php8.2-zip \
    && rm -rf /var/lib/apt/lists/*

RUN git config --global user.email "you@example.com" \
    && git config --global user.name "Your Name"

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /build/symfony
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony \
    && rm -f /tmp/*

WORKDIR /home/dbw
CMD /etc/init.d/php8.2-fpm start && nginx -g "daemon off;"
#CMD ["nginx", "-g", "daemon off;"]
