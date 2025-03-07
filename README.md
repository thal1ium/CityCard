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

<hr>

2. Запуск дев режиму

```bash
npm run build
```

```bash
composer run dev
```

3. Виконай міграції

```bash
php artisan migrate
```

4. Виконай сидери

```bash
php artisan db:seed
```