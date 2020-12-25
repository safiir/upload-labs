FROM kuborgh/php-5.2

MAINTAINER c0ny1 <root@gv7.me>
ENV LC_ALL C.UTF-8
ENV TZ=Asia/Shanghai

COPY . /tmp/

# config apache && php
RUN cp /tmp/docker-php.conf /etc/apache2/sites-enabled/000-project.conf &&\
    cp /tmp/php.ini /etc/php/apache2-php5.2 &&\
    cp /tmp/php.ini /etc/php/cli-php5.2/ &&\
    mkdir /etc/apache2/htdocs -p

COPY . /etc/apache2/htdocs/

# install upload-labs
RUN chown www-data:www-data -R /etc/apache2/htdocs && \
    rm -rf /tmp/*

EXPOSE 80
