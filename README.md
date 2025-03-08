# Запуск проекту

0. Інсталяція залежностей

```bash
composer i
```

```bash
npm i
```

<hr>

1. Створення .env файлу:

```bash
cp .env.example .env
```

1.1 Генерація APP_KEY:

```bash
php artisan key:generate
```

1.2  Добав пароль DB_PASSWORD

<hr>

2. Виконай міграції

```bash
php artisan migrate
```
<hr>

3. Виконай сидери

```bash
php artisan db:seed
```

<hr>

4. Запуск дев режиму

```bash
npm run build
```

```bash
composer run dev
```

або

```bash
php artisan serve
```