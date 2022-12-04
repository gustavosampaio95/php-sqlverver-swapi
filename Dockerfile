FROM ubuntu:22.04

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

WORKDIR /work

RUN apt-get update && apt-get install -y \
    gnupg2 \
    curl \
    software-properties-common \
    apt-transport-https \
    unixodbc \
    unixodbc-dev \
    freetds-common \
    git

RUN add-apt-repository ppa:ondrej/php -y

RUN apt-get update && apt-get install -y \
    php8.2 \
    php8.2-curl \
    php8.2-cli \
    php8.2-odbc \
    php8.2-sybase \
    php8.2-mbstring \
    php8.2-xml \
    php8.2-xsl \
    php8.2-zip

# instalar composer a partir do outro container
COPY --from=composer:2.3.10 /usr/bin/composer /usr/bin/composer

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "-t", "src/"]