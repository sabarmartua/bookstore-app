# Bookstore Web Routes Documentation

## Books
- GET / → menampilkan semua buku
- GET /books/create → form tambah buku
- GET /books/{id} → detail buku
- POST /books → simpan buku baru
- PUT /books/{id} → update buku
- DELETE /books/{id} → hapus buku

## Authors
- Resource /authors → CRUD Authors

## Ratings
- GET /ratings/create → form tambah rating
- POST /ratings → simpan rating

## Lainnya
- GET /books/famous/authors → buku dari penulis terkenal
- GET /books/by-author/{authorId} → buku berdasarkan penulis
