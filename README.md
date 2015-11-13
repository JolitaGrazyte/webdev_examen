# webdev_examen
Zeal Optics Wedstrijd 

Applicatie

Het is een applicatie voor een wedstrijd van Zeal Optic. 
Men kan hier een waanzinnige ski-bril met ingebouwde HD camera winnen.
In deze applicatie moet je je registreren om deel te nemen.
Daarna kunt je een photo van je ski vakantie uploadden.
Iedereen mag maar een keer aan deel nemen.
Iedereen mag ook maar een keer voor een photo stemmen (een stem per photo).
Drie photos met de meeste stemmen winnen.
Elke periode zijn er dus drie winnaars die op de front-pagina komen te staan.
Applicatie kan de winnaars naar de verantwoordelijke via mail versturen als de cron jobs ingesteld zijn.
Applicatie kan ook een lijst van mensen die deel hebben genomen, dus een excel document opmaken en elke nacht naar de verantwoordelijke via mail versturen.
Er is een administratieve gedeelte voorzien. Daarvoor moet men inloggen.
Als admin kan je de periodes van de wedstrijd aanpassen of meer periodes toevoegen.

Installatie

Server requirements:
•	PHP >= 5.5.9
•	OpenSSL PHP Extension
•	PDO PHP Extension
•	Mbstring PHP Extension
•	Tokenizer PHP Extension

Om sommige zaken automatisch te kunnen generen hebben we ook composer nodig:

Composer installeren:

- curl -sS https://getcomposer.org/installer | php
- mv composer.phar /usr/local/bin/composer
- echo 'export PATH="$PATH:~/.composer/vendor/bin"' >> ~/.bashrc
- source ~/.bashrc 

Installatie van de applicatie

    download repository in /var/www of in je gewenste pad /var/www/your_path: 
            git clone https://github.com/JolitaGrazyte/webdev_examen.git
    
    - site directory root voor apache site configuratie file is nu:
            /var/www/your_path/webdev_examen/public 
    
    als je applicatie in een andere directory wilt:
    
    verplaats alle files van  webdev_examen map naar je gewenste pad
        bv.: /var/www/your_path/public
    
    ga naar applicatie root (zoals nu naar  /var/www/your_path/webdev_examen/ )
        
    applicatie heeft een .env file nodig
        
        - daarom kopieer .env.toReplace  file en verander de gegevens voor databank:
        mv .env.toReplace .env  of cp .env.toReplace .env
            
        pas de volgende aan in .env  file:
    
            DB_DATABASE=YOUR_DB_NAME # must be changed
            DB_USERNAME=YOUR_DB_USER # must be changed
            DB_PASSWORD=YOUR_DB_PASSWORD # must be changed
    
    verder run de volgende commandos: 
        
        composer install of composer install
        chmod -R 777 storage of sudo chmod -R 777 storage
        chmod -R 777 bootstrap/cache of sudo chmod -R 777 bootstrap/cache
    

    in de root of de application run volgende commandos:
        
        php artisan migrate (om databank tabellen automatisch aan te maken)
        almost ready to use! :-)
    
    Om applicatie  te kunnen testen met ‘fake’ data run volgende commandos:
            php artisan db:seed
    
    Om proper opnieuw te beginnen:
        php artisan migrate:rollback
        php artisan migrate
        seed alleen maar admin account:
        php artisan db:seed --class=SeedOnlyAdmin

Nu kunt je inloggen naar administratieve gedeelte met volgende gegevens:
    username: admin
    password: test
    
In administratieve gedeelte kunt je periodes toevoegen. 
Je kunt ook je email adres en password veranderen.

Als je wilt alleen periodes automatisch aanmaken, kunt je de volgende commando runnen:

    php artisan db:seed --class=PeriodsSeeder

Nu is het klaar om te gebruiken.

Om een email met de winnaars en de mensen die hebben meegedaan te kunnen ontvangen dan moet je nog cron installeren.
    Run commando:  crontab -e 
    Zet de volgende lijn in je crontab: 

* * * * php /path/to/artisan schedule:run >> /dev/null 2>&1






