# Database Seeding

Untuk mengisi database dengan data awal, Anda dapat menggunakan seeder yang telah disediakan. Seeder ini akan membuat data awal untuk roles, permissions, dan users.

## Langkah-langkah untuk menjalankan seeder

1. **Jalankan migrasi database**:
    Pastikan Anda telah menjalankan migrasi untuk membuat tabel-tabel yang diperlukan di database Anda.

    ```bash
    php artisan migrate
    ```

2. **Jalankan seeder**:
    Gunakan perintah berikut untuk menjalankan seeder dan mengisi database dengan data awal.

    ```bash
    php artisan db:seed 
    ```

    Perintah ini akan menjalankan DatabaseSeeder yang akan memanggil seeder lainnya seperti RolesTableSeeder, PermissionsTableSeeder, dan UserTableSeeder.

## Seeder yang tersedia

- **RolesTableSeeder**: Seeder ini akan membuat data roles awal. CRUD dapat diakses di /roles.
- **PermissionsTableSeeder**: Seeder ini akan membuat data permissions awal. CRUD dapat diakses di /permissions.
- **UserTableSeeder**: Seeder ini akan membuat data users awal dan mengaitkan roles serta permissions ke users tersebut. CRUD dapat diakses di /users.

## URL Auth
- /permissions
- /roles
- /users

## Email dan Pw
- Role Pemimpin: tanmalaka@gmail.com/password
- Role Pegawai: soekarno@gmail.com/password

## Dashboard Data

Dashboard mengambil data dari backend melalui `DashboardController`. Data yang diambil meliputi Total Pegawai, Kehadiran Hari Ini, dan Sedang Cuti. 

### Data yang Diambil

1. **Total Pegawai**: Jumlah total pegawai yang diambil dari view `v_employee_profiles`.
2. **Kehadiran Hari Ini**: Jumlah pegawai yang hadir hari ini berdasarkan kolom `count` di baris yang memiliki `status` 1 dari view `v_today_attendance`.
3. **Sedang Cuti**: Jumlah pegawai yang sedang cuti berdasarkan kolom `count` di baris yang memiliki `status` 3 dari view `v_today_attendance`.
