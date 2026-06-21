# Panduan singkat commit dan push untuk kelompok

## Menjalankan project di komputer masing-masing

Setelah project di-clone atau di-download, buka folder project lalu jalankan perintah ini:

```bash
composer install
npm install

# Mac/Linux (Atau ubah langsung .env.example jadi -> .env)
cp .env.example .env

#Windows (Atau ubah langsung .env.example jadi -> .env)
copy .env.example .env

php artisan key:generate
```

Jalankan project:

```bash
composer run dev
```

Buka di browser laptop sendiri: `http://127.0.0.1:8000`

Kalau project belum bisa jalan atau ada error, langsung tanya di grup WA saja supaya kita diskusi dan cari tahu bersama karena saya juga tidak tahu.

## Catatan penting sebelum push

Sebelum menekan tombol push ke branch `main`, pastikan semua anggota kelompok sudah setuju agar perubahan tidak saling menimpa.

## Langkah kerja

1. Buka project ini dengan GitHub Desktop.
2. Ubah file yang dibutuhkan.
3. Isi pesan commit yang singkat, misalnya: `fathur: update halaman login`.
4. Klik `Commit to main`.
5. Klik `Push origin` untuk mengirim perubahan ke GitHub.

## Aturan kelompok yang mudah diikuti

- Gunakan GitHub Desktop supaya lebih mudah dan tidak perlu terminal.
- Sebelum push, selalu konfirmasi dulu dengan anggota kelompok.
- Setelah commit, langsung push ke `main` jika semua sudah setuju.

## Singkatnya

**edit → commit → konfirmasi → push ke main**
