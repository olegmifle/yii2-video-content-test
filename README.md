To run project

```
- docker-compose up -d
- docker-compose exec php bash
- composer install
- php yii migrate
- php yii faker/generate --count=1000000 --dbprovider=YiiDAO generator_template=video dbprovider_table=video dbprovider_truncate=1
```
Open in browser http://localhost:8080/
