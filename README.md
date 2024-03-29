## Тестовое задание для кандидата на должность «PHP-разработчик»


## Задание

### Разработать JSON API для работы с данными, хранящимися в XML-файле.

API должно соответствовать спецификации JSON:API:https://jsonapi.org/

Данные хранятся в XML-файле в формате «Яндекс Недвижимость»: 
https://yandex.ru/support/realty/requirements/requirements-sale-housing.html

Должна быть реализована возможность получать, изменять, добавлять, удалять данные из файла.

Вы можете использовать для реализации API готовую библиотеку (например, https://tobyzerner.github.io/json-api-server/
или любую другую) или реализовать функционал самостоятельно.

## Описание

В данном проекте разработана реализация backend JSON:API для работы с данными хранящимися в XML-файле.
Работа программы реализована непосредственно в XML файле, без использования базы данных.

Для работы программы необходимо поместить XML-файл в директорию public. Наименование файла должен быть fid.xml.

Для чтения всех записей методом GET отправляется запрос (/api/offer), для чтения одной записи методом GET отправляется 
запрос (/api/offer/id).

Для добавления записей используется методом POST отправляется запрос (/api/offer?key=value).

Для изменения записей используется методом PUT отправляется запрос (/api/offer/id?key=value).

Для удаления записей используется методом DELETE отправляется запрос (/api/offer/id).

Для добавления или изменения вложенных объектов необходимо key указывать через -> (location->country, 
location->metro->name) 
