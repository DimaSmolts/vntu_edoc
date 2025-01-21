1. Install composer

- Open the terminal and run the following command:
```
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

- Navigate to your project directory and run the following command to initialize Composer:

```
composer init
```
2. Add data to composer.json
```
{
    "require": {
        "spipu/html2pdf": "^5.2",
        "bramus/router": "^1.6",
        "vlucas/phpdotenv": "^5.6",
        "illuminate/database": "^11.32",
        "opis/closure": "^3.6",
        "illuminate/support": "^11.32",
        "illuminate/container": "^11.32",
        "illuminate/events": "^11.32",
        "illuminate/validation": "^11.32"
    },
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    }
}
```

3. Install all packages (run in project folder)

```
composer install
```

4. Create custom fonts for PDF (run in project folder)

```
php .\scripts\font-converter.php
```

5. Add justify styles to PDF

- Go to vendor/spipu/html2pdf/src/Html2Pdf.php

- Add these changes https://github.com/spipu/html2pdf/pull/802/files