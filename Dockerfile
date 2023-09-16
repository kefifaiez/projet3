# Utilise une image PHP avec Apache
FROM php:7.4-apache

# Activer l'extension MySQLi
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copie les fichiers de l'application web dans le conteneur
COPY . /var/www/html/

# Expose le port 80 pour qu'il soit accessible depuis l'extérieur
EXPOSE 80

# Commande d'entrée par défaut
CMD ["apache2-foreground"]
