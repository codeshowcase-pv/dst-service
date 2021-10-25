# DST Service
Приложение для получения времени в городе или всемирное координационное время

## Документация api:
1. ```/api/get-local-time?city_id=&utc_time=``` => ```local_time=```
- city_id - код города,
- utc_time - utc время
- local_time - локальное время города

2) ```/api/get-utc-time?city_id=&local_time=``` => ```utc_time=```
- city_id - код города,
- local_time - локальное время города
- utc_time - utc время