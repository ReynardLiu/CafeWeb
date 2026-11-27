$(document).ready(function () {
    // 1. FILTER KATEGORI MENU (Halaman Menu)
    $('.ruri-tab[data-filter]').click(function () {
        $('.ruri-tab[data-filter]').removeClass('active');
        $(this).addClass('active');

        let kategori = $(this).data('filter');
        $('.menu-box').each(function () {
            if (kategori === 'all' || $(this).data('category') === kategori) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    // 2. HITUNG HARGA OTOMATIS CUSTOM DRINK (Halaman Custom Drink)
    let teksCustom = 'Latte - oat milk, sugar 50%, ice level 50%, extra shot';
    let hargaCustom = 18000;

    $('.custom-opt').change(function () {
        let drink = $('input[name="drink"]:checked').val();
        let hargaDasar = parseInt($('input[name="drink"]:checked').data('price'));
        let milk = $('input[name="milk"]:checked').val();
        let sugar = $('input[name="sugar"]:checked').val();
        let ice = $('input[name="ice"]:checked').val();
        let topping = $('input[name="topping"]:checked').val();
        let hargaTopping = parseInt($('input[name="topping"]:checked').data('extra'));

        hargaCustom = hargaDasar + hargaTopping;
        teksCustom = drink + ' - ' + milk + ', sugar ' + sugar + ', ice level ' + ice + ', ' + topping;

        $('#previewText').text(teksCustom);
        $('#previewPrice').text('Rp ' + hargaCustom.toLocaleString('id-ID'));
    });

    // 3. KERANJANG PESANAN (Disimpan di localStorage agar tidak hilang saat pindah halaman PHP)
    let cart = JSON.parse(localStorage.getItem('ruri_cart')) || [];

    function tampilkanCart() {
        localStorage.setItem('ruri_cart', JSON.stringify(cart));
        $('#cartList').empty();
        let total = 0;

        if (cart.length === 0) {
            $('#cartList').html('<p class="text-center text-muted my-3">Keranjang masih kosong.</p>');
        } else {
            cart.forEach(function (item, index) {
                total += item.price;
                $('#cartList').append(`
                    <div class="d-flex justify-content-between align-items-center p-2 mb-2 rounded ruri-box">
                        <div>
                            <strong class="d-block small">${item.name}</strong>
                            ${infoTambahan}
                            <small>Rp ${item.price.toLocaleString('id-ID')}</small>
                        </div>
                        <button class="btn btn-sm btn-danger btn-hapus" data-index="${index}">Hapus</button>
                    </div>
                `);
            });
        }

        $('#cartCount').text(cart.length);
        $('#cartTotal').text('Rp ' + total.toLocaleString('id-ID'));
    }

    // Pastikan bagian ini juga sudah menyimpan desc
    $('.btn-add').click(function () {
        cart.push({
            name: $(this).data('name'),
            price: parseInt($(this).data('price'))
        });
        tampilkanCart();
        alert('Berhasil ditambahkan ke keranjang!');
    });

    // Tambah custom drink ke keranjang
    $('#btnAddCustom').click(function () {
        cart.push({ name: teksCustom, price: hargaCustom });
        tampilkanCart();
        alert('Minuman Racikan berhasil ditambahkan ke keranjang!');
    });

    // Hapus item dari keranjang
    $(document).on('click', '.btn-hapus', function () {
        cart.splice($(this).data('index'), 1);
        tampilkanCart();
    });

    // Checkout pesanan
    $('#btnCheckout').click(function () {
        if (cart.length === 0) return alert('Keranjang masih kosong!');
        alert('Pesanan diterima! Barista Café Ruri segera menyiapkan pesanan Anda.');
        cart = [];
        tampilkanCart();
        $('#cartModal').modal('hide');
    });

    tampilkanCart();
});