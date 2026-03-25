# 4BroKhata — Family Expense & Income Tracker

Laravel 11 application to manage family income (Amad), expenses (Kharcha), and balances.

## Quick Start

1. Ensure MySQL is running and your database name matches `DB_DATABASE=4brokhata` in `.env`.
2. Run:
   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   php artisan storage:link
   ```
3. Start server:
   ```bash
   php artisan serve --host=127.0.0.1 --port=8000
   ```

## URLs

- Public: `http://localhost:8000/`
- Admin Login: `http://localhost:8000/admin/login`

## Seeded Admin Credentials

- `superadmin` / `Admin@1234` (Super Admin)
- `admin1` / `Admin@1234` (Custom Admin)
- `kashif` / `Admin@1234` (Custom Admin)

# 4brokhatatest
