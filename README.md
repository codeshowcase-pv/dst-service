# DST Service
Приложение для получения времени в городе или всемирное координационное время

## Разворачивалось с Phpstorm PHP-web-server

- composer install

#### для экономии времени не описывались модель и сервис и бд

## Документация api:
1. ```/api/get-local-time?city_id=``` => ```local_time=```
- city_id - код города,
- local_time - локальное время города

2) ```/api/get-utc-time?city_id=``` => ```utc_time=```
- city_id - код города,
- utc_time - utc время