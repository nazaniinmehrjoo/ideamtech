# راه‌اندازی پروژه «برناگستر پارسی» (Laravel 8)

این پروژه یک وب‌سایت چندزبانه (fa/en) بر پایه Laravel 8 است. آدرس اصلی به صورت خودکار به زبان پیش‌فرض هدایت می‌شود و مسیرها با پیشوند `{locale}` تعریف شده‌اند.

## پیش‌نیازها

- PHP 7.3+ یا 8.x
- Composer
- Node.js 14+ و npm
- پایگاه‌داده (پیش‌فرض MySQL/MariaDB)
- افزونه‌های رایج PHP: `pdo_mysql`, `openssl`, `mbstring`, `tokenizer`, `xml`, `ctype`, `json`, `curl`

## نصب و اجرای سریع

در ریشه پروژه:

1) نصب وابستگی‌های PHP

```
composer install
```

2) ساخت فایل تنظیمات محیطی (`.env`)

این پروژه فایل `.env.example` ندارد. یک فایل `.env` بسازید و حداقل مقادیر زیر را قرار دهید:

```
APP_NAME="برناگستر پارسی"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

APP_LOCALE=fa
APP_FALLBACK_LOCALE=en

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ideamtech
DB_USERNAME=root
DB_PASSWORD=

FILESYSTEM_DRIVER=public
SESSION_DRIVER=file
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```

3) تولید کلید اپلیکیشن

```
php artisan key:generate
```

4) اجرای مایگریشن‌ها

```
php artisan migrate
```

5) ساخت لینک استوریج (برای دسترسی به فایل‌های آپلودی)

```
php artisan storage:link
```

6) نصب و ساخت فایل‌های فرانت‌اند (در صورت توسعه رابط کاربری)

```
npm install
npm run dev
```

7) اجرای سرور توسعه

```
php artisan serve
```

آدرس‌های قابل دسترسی:

- `http://localhost:8000/fa`
- `http://localhost:8000/en`

## نکات دیتابیس

- اتصال پیش‌فرض روی MySQL تنظیم شده است.
- اگر می‌خواهید از SQLite استفاده کنید، فایل `database/database.sqlite` بسازید و در `.env` مقدار `DB_CONNECTION=sqlite` را قرار دهید.
- در صورت نیاز به داده آزمایشی، می‌توانید Seederها را به صورت دستی اجرا کنید:

```
php artisan db:seed --class=ProductSeeder
php artisan db:seed --class=ServiceSeeder
php artisan db:seed --class=ProjectSeeder
```

## دسترسی ادمین و پنل

قابلیت‌های مدیریتی با فیلد `is_admin` در جدول `users` کنترل می‌شود. برای اکانت ادمین:

1) از مسیر ثبت‌نام، یک کاربر بسازید.
2) مقدار `is_admin` کاربر را در دیتابیس به `1` تغییر دهید.

بعد از ورود، ادمین به مسیر `/fa/documents` هدایت می‌شود و به داشبورد دسترسی دارد:

- `/fa/dashboard`
- `/fa/documents`

## ثبت‌نام و ورود

صفحات احراز هویت داخل گروه مسیرهای دارای پیشوند زبان هستند. برای ثبت‌نام و ورود از این مسیرها استفاده کنید:

- ثبت‌نام: `/{locale}/register` (مثال: `/fa/register`)
- ورود: `/{locale}/login` (مثال: `/fa/login`)

بعد از ثبت‌نام، اگر `is_admin=1` باشد کاربر به صفحه اسناد هدایت می‌شود، و در غیر این صورت به صفحه اصلی زبان مربوطه منتقل می‌شود.

## راهنمای کار با داشبورد

بعد از ورود به عنوان ادمین، از مسیر `/fa/dashboard` به داشبورد دسترسی دارید. بخش‌های اصلی داشبورد:

- مدیریت محصولات: `/fa/products`
- مدیریت خدمات: `/fa/services`
- مدیریت پروژه‌ها: `/fa/projects`
- مدیریت مشتریان (فرم‌ها): `/fa/customer`
- مدیریت مقالات: `/fa/dashboard/blog`
- اسناد و فایل‌ها: `/fa/documents`

نکته‌ها:

- برای مشاهده لیست اسناد، نقش ادمین یا ویوئر نیاز است.
- برای ایجاد/ویرایش محتوا، نقش ادمین لازم است.

## دستورات مفید

```
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

## خطاهای رایج

- **ارور دسترسی به پوشه‌ها**: مطمئن شوید پوشه‌های `storage` و `bootstrap/cache` قابل نوشتن هستند.
- **عدم نمایش فایل‌های آپلودی**: دستور `php artisan storage:link` را اجرا کرده باشید.
- **خطای اتصال دیتابیس**: مقادیر `DB_*` در `.env` را بررسی کنید.

## ساختار زبان‌ها

ترجمه‌ها در مسیر `resources/lang/fa` و `resources/lang/en` قرار دارند. زبان پیش‌فرض در تنظیمات `config/app.php` مقدار `fa` است.
