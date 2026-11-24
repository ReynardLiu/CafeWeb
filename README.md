Bahasa pemrograman
- PHP adalah bahasa pemrograman server-side yang memungkinkan pengaturan perpindahan antar halaman, validasi parameter URL, dan pengolahan data array menu dan galeri.
- HTML5 adalah bahasa markup yang digunakan untuk membuat struktur kerangka semantik halaman web, termasuk elemen seperti <nav>, <main>, <footer>, modal keranjang, dan input formulir.
- CSS3 (didukung Framework Bootstrap 5): bahasa gaya untuk mengatur palet warna tema (Light Yellow dan Coffee Brown), tata letak grid responsif, kartu menu, dan penyatuan latar logo (mix-blend mode).
- JavaScript adalah bahasa pemrograman client-side yang memungkinkan interaksi pengguna secara langsung di browser tanpa memuat ulang halaman (reload).

Metode dan Strategi yang saya gunakan
- Modular Routing (PHP include dan switch-case): File index.php berfungsi sebagai kerangka tetap, termasuk navbar dan footer, dan kemudian menggunakan perintah include untuk menyisipkan file pages.php. Untuk menampilkan konten halaman tertentu, seperti Home, About, Menu, Gallery, Custom Drink, atau Credit, percabangan switch ($page) dalam pages.php membaca nilai parameter $_GET['page'] dari URL.
- Validasi Parameter URL (in_array): Dengan menggunakan fungsi in_array(), index.php mencocokkan nilai $_GET['page'] dengan array $daftar_halaman sebelum mengirimkan halaman. Ini memungkinkan parameter URL yang tidak valid diarahkan kembali ke halaman Home secara otomatis.
- Data-Driven Rendering (Array & foreach): Data seperti daftar menu, foto galeri, jenis biji kopi (beans), dan pilihan minuman khusus dicetak otomatis di dalam struktur array PHP dengan perulangan foreach. Ini membuat kode HTML lebih sederhana dan tidak berulang.
- Responsive Web Design (RWD): Menerapkan tag <meta name="viewport">, navbar yang dapat dilipat, dan sistem grid 12-kolom Bootstrap (row, col-sm-*, col-md-*, col-lg-*) untuk menyesuaikan susunan kartu dan kolom dengan ukuran layar ponsel, tablet, dan laptop.
- Manipulasi DOM dan Pengelolaan Peristiwa (jQuery): Dengan menggunakan event.click() dan.change() pada jQuery, Anda dapat menyaring kartu menu berdasarkan kategori seperti kopi, teh, snack, dan dessert. Anda juga dapat menghitung total harga dan teks Preview Order secara real-time di halaman Custom Drink.
- Web Storage Client-Side (localStorage): Menyimpan daftar pesanan di keranjang belanja (Cart) ke dalam localStorage browser menggunakan format JSON seperti JSON.stringify dan JSON.parse. Ini memastikan bahwa item pesanan tidak hilang saat pengguna berpindah ke halaman PHP.
