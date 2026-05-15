# Minimal MVC Framework

- [x] - Front Controller
- [x] - PSR-4 autoloading (`spl_autoload_register`)
- [x] - Router
    - [x] - Route parameters
- [x] - Views
- [x] - Controllers
- [x] - Data store (via array in src/Core/Models/Post.php)

---

## Инструкция запуска

1. `make run`  или `php -S localhost:3000 -t public`

---

## Примечания

- Обычно в Makefile описываю `setup`
- Если захотим отдавать другой статус (например из исключения) - `http_response_code($e->getCode())` в app.php на 31 строке.