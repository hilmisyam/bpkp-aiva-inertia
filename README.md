# Database Seeding

Untuk mengisi database dengan data awal, Anda dapat menggunakan seeder yang telah disediakan. Seeder ini akan membuat data awal untuk roles, permissions, dan users.

## Langkah-langkah untuk menjalankan seeder

1. **Jalankan migrasi database**:
    Pastikan Anda telah menjalankan migrasi untuk membuat tabel-tabel yang diperlukan di database Anda.

    ```bash
    php artisan migrate

2. **Jalankan seeder**:
    Gunakan perintah berikut untuk menjalankan seeder dan mengisi database dengan data awal.

    ```bash
    php artisan db:seed

    Perintah ini akan menjalankan DatabaseSeeder yang akan memanggil seeder lainnya seperti RolesTableSeeder, PermissionsTableSeeder, dan UserTableSeeder.

## Seeder yang tersedia

- **RolesTableSeeder**: Seeder ini akan membuat data roles awal.
- **PermissionsTableSeeder**: Seeder ini akan membuat data permissions awal.
- **UserTableSeeder**: Seeder ini akan membuat data users awal dan mengaitkan roles serta permissions ke users tersebut.