<?php
switch ($page):

   
    // 1. HALAMAN ABOUT US
    
    case 'about':
?>
    <div class="row align-items-center g-4 py-3">
        <div class="col-lg-5">
            <div class="p-3 rounded-4 ruri-box text-center">
                <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=700&q=80" class="img-fluid rounded-4 mb-2" alt="Café Ruri">
                <span class="badge ruri-badge">Est. 2026 &bull; Jakarta Barat</span>
            </div>
        </div>
        <div class="col-lg-7">
            <h1 class="font-title mb-3">About Us</h1>
            <p class="lh-lg">
                <strong>Café Ruri</strong> hadir sebagai ruang singgah hangat dengan sajian kopi berkualitas dan harga bersahabat. Terinspirasi dari maskot kucing hitam kami yang memeluk cangkir kopi, tempat ini dirancang nyaman untuk beristirahat maupun mengerjakan tugas.
            </p>
            <p class="lh-lg mb-4">
                Kami menggunakan biji kopi sangrai segar dari petani lokal setiap minggunya. Melalui fitur <strong>Custom Drink</strong>, pengunjung bebas mengatur sendiri tingkat gula, es, susu oat, serta topping favorit.
            </p>
            <div class="row g-3">
                <div class="col-sm-6">
                    <div class="p-3 rounded-3 ruri-box">
                        <strong class="d-block"><i class="bi bi-clock me-1"></i> Jam Buka</strong>
                        <small>Setiap Hari: 08.00 – 22.00 WIB</small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="p-3 rounded-3 ruri-box">
                        <strong class="d-block"><i class="bi bi-geo-alt me-1"></i> Lokasi</strong>
                        <small>Jl. Tanjung Duren Raya No. 42, Jakarta</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    break;

  
    // 2. HALAMAN MENU 
  
    case 'menu':
        $menus = [
            ['Café Latte', 'coffee', 15000, 'Espresso dengan susu segar yang di Steam uap panas.', 'assets/img/latte.jpg'],
            ['Americano', 'coffee', 14000, 'Ekstraksi Arabica Dark Roast dingin.', 'assets/img/americano.jpg'],
            ['Hojicha latte', 'tea', 15000, 'Teh yang di roasting dengan susu creamy.', 'assets/img/hojicha.jpg'],
            ['Matcha Latte', 'tea', 18000, 'Matcha Premium Grade dengan susu creamy.', 'assets/img/matcha latte.jpg'],
            ['Tiramisu', 'dessert', 18000, 'Krim mascarpone lembut dengan kopi.', 'assets/img/tiramisu.jpg'],
            
        ];
?>
    <div class="text-center mb-4">
        <h1 class="font-title">Menu</h1>
        <div class="d-flex flex-wrap justify-content-center gap-2 mt-3">
            <?php foreach (['all' => 'All', 'coffee' => 'Coffee', 'tea' => 'Tea', 'snack' => 'Snack', 'dessert' => 'Dessert'] as $key => $label): ?>
                <button class="btn ruri-tab <?= ($key == 'all') ? 'active' : '' ?>" data-filter="<?= $key ?>"><?= $label ?></button>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="row g-4">
        <?php foreach ($menus as [$nama, $kat, $harga, $ket, $img]): ?>
        <div class="col-sm-6 col-lg-3 menu-box" data-category="<?= $kat ?>">
            <div class="card ruri-card h-100">
                <img src="<?= $img ?>" class="card-img-top" style="height: 160px; object-fit: cover;" alt="<?= $nama ?>">
                <div class="card-body d-flex flex-column">
                    <span class="badge ruri-badge align-self-start text-uppercase mb-2"><?= $kat ?></span>
                    <h6 class="font-title"><?= $nama ?></h6>
                    <p class="small flex-grow-1"><?= $ket ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <strong>Rp <?= number_format($harga, 0, ',', '.') ?></strong>
                        <button class="btn btn-sm btn-ruri btn-add" data-name="<?= $nama ?>" data-price="<?= $harga ?>">+ Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

<?php
    break;

    // galerry
    case 'gallery':
        if (($_GET['view'] ?? '') == 'beans'):
            $beans = [
                ['Robusta', 'assets/img/robusta.webp'],
                ['Arabica', 'assets/img/arabika.webp'],
                ['House Blend', 'assets/img/houseblend.webp']
            ];
?>
        <div class="mb-4">
            <a href="index.php?page=gallery" class="btn btn-sm btn-ruri-outline mb-3">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Gallery
            </a>
            <h1 class="font-title text-center">Beans</h1>
        </div>

        <div class="row g-4">
            <?php foreach ($beans as [$nama, $img]): ?>
            <div class="col-md-4">
                <div class="card ruri-card h-100 text-center overflow-hidden">
                    <img src="<?= $img ?>" class="card-img-top" style="height: 250px; object-fit: cover;" alt="<?= $nama ?>">
                    <div class="card-body py-3">
                        <h5 class="font-title mb-0"><?= $nama ?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

<?php
        else:
            $galeri = [
                ['col-md-8', '270px', 'Manual Brew Bar', 'Penyeduhan V60 menggunakan biji kopi Nusantara segar.', 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=900&q=80', ''],
                ['col-md-4', '270px', 'Latte Art', 'Microfoam lembut di setiap cangkir.', 'https://images.unsplash.com/photo-1534778101976-62847782c213?auto=format&fit=crop&w=600&q=80', ''],
                ['col-md-4', '220px', 'Cozy Corner', 'Area duduk hangat bernuansa kayu.', 'https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=600&q=80', ''],
                ['col-md-4', '220px', 'Morning Pastry', 'Croissant dipanggang setiap pagi.', 'https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=600&q=80', ''],
                ['col-md-4', '220px', 'Roasted Beans', 'Klik untuk melihat jenis beans →', 'assets/img/arabika.webp', 'index.php?page=gallery&view=beans']
            ];
?>
        <h1 class="font-title text-center mb-4">Gallery</h1>
        <div class="row g-4">
            <?php foreach ($galeri as [$col, $tinggi, $judul_foto, $desc, $img, $link]): ?>
            <div class="<?= $col ?>">
                <?php if ($link != ''): ?>
                    <a href="<?= $link ?>" class="text-decoration-none text-reset">
                <?php endif; ?>
                <div class="card ruri-card overflow-hidden h-100">
                    <img src="<?= $img ?>" style="height: <?= $tinggi ?>; object-fit: cover;" alt="<?= $judul_foto ?>">
                    <div class="card-body py-3">
                        <h6 class="font-title mb-1"><?= $judul_foto ?></h6>
                        <small><?= $desc ?></small>
                    </div>
                </div>
                <?php if ($link != ''): ?>
                    </a>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

<?php
        endif;
    break;

  
    // 5. HALAMAN CUSTOM DRINK
  
    case 'custom':
?>
    <h1 class="font-title text-center mb-4">Custom Drink</h1>
    <div class="row g-4">
        <div class="col-lg-7">
            <div class="p-4 rounded-4 ruri-card">
                <!-- 1. Type of Drink -->
                <div class="mb-3">
                    <label class="font-title d-block mb-2">1. Select Type of Drink</label>
                    <?php foreach (['Latte' => 15000, 'Espresso' => 12000] as $d => $p): ?>
                        <input type="radio" class="btn-check custom-opt" name="drink" id="d_<?= $d ?>" value="<?= $d ?>" data-price="<?= $p ?>" <?= ($d == 'Latte') ? 'checked' : '' ?>>
                        <label class="btn ruri-tab me-2" for="d_<?= $d ?>"><?= $d ?> (Rp <?= number_format($p, 0, ',', '.') ?>)</label>
                    <?php endforeach; ?>
                </div>

                <!-- 2. Milk Option -->
                <div class="mb-3">
                    <label class="font-title d-block mb-2">2. Milk Option</label>
                    <?php foreach (['oat milk', 'fresh milk'] as $i => $m): ?>
                        <input type="radio" class="btn-check custom-opt" name="milk" id="m_<?= $i ?>" value="<?= $m ?>" <?= ($i == 0) ? 'checked' : '' ?>>
                        <label class="btn ruri-tab me-2" for="m_<?= $i ?>"><?= ucwords($m) ?></label>
                    <?php endforeach; ?>
                </div>

                <!-- 3. Sugar Level -->
                <div class="mb-3">
                    <label class="font-title d-block mb-2">3. Sugar Level</label>
                    <?php foreach (['100%', '75%', '50%', '25%', 'no sugar'] as $i => $s): ?>
                        <input type="radio" class="btn-check custom-opt" name="sugar" id="s_<?= $i ?>" value="<?= $s ?>" <?= ($s == '50%') ? 'checked' : '' ?>>
                        <label class="btn ruri-tab me-1 mb-1" for="s_<?= $i ?>"><?= $s ?></label>
                    <?php endforeach; ?>
                </div>

                <!-- 4. Ice Level -->
                <div class="mb-3">
                    <label class="font-title d-block mb-2">4. Ice Level</label>
                    <?php foreach (['100%', '75%', '50%', '25%', 'No ice'] as $i => $ice): ?>
                        <input type="radio" class="btn-check custom-opt" name="ice" id="ic_<?= $i ?>" value="<?= $ice ?>" <?= ($ice == '50%') ? 'checked' : '' ?>>
                        <label class="btn ruri-tab me-1 mb-1" for="ic_<?= $i ?>"><?= $ice ?></label>
                    <?php endforeach; ?>
                </div>

                <!-- 5. Topping -->
                <div>
                    <label class="font-title d-block mb-2">5. Topping (+Rp 3.000)</label>
                    <?php foreach (['no topping' => 0, 'boba' => 3000, 'jelly' => 3000, 'extra shot' => 3000] as $i => $extra): ?>
                        <input type="radio" class="btn-check custom-opt" name="topping" id="t_<?= md5($i) ?>" value="<?= $i ?>" data-extra="<?= $extra ?>" <?= ($i == 'extra shot') ? 'checked' : '' ?>>
                        <label class="btn ruri-tab me-1 mb-1" for="t_<?= md5($i) ?>"><?= ucwords($i) ?></label>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Preview Order -->
        <div class="col-lg-5">
            <div class="p-4 rounded-4 ruri-box">
                <h4 class="font-title mb-3">Preview Order</h4>
                <div class="p-3 rounded-3 bg-white border mb-3">
                    <p id="previewText" class="fw-semibold mb-2">Latte - oat milk, sugar 50%, ice level 50%, extra shot</p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Total Order:</span>
                        <strong id="previewPrice" class="fs-4 font-title">Rp 18.000</strong>
                    </div>
                </div>
                <button id="btnAddCustom" class="btn btn-ruri w-100 py-2">Add to Cart</button>
            </div>
        </div>
    </div>

<?php
    break;

   
    // 6. HALAMAN CREDIT (Web Developer Profile)
    
   case 'credit':
?>
    <h1 class="font-title text-center mb-4">Web Developer Profile</h1>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="p-4 p-md-5 rounded-4 ruri-card">
                <div class="row align-items-center g-4">
                    <div class="col-md-4 text-center">
                        <img src="assets/img/developer-rey.webp" alt="Developer" class="img-fluid rounded-4 border" style="width: 200px; height: 240px; object-fit: cover;">
                    </div>
                    <div class="col-md-8">
                        <h5 class="font-title">BIODATA</h5>
                        <p class="small mb-3">
                            Mahasiswa Informatika Universitas Kristen Krida Wacana (UKRIDA) yang merancang dan membangun website Café Ruri menggunakan PHP, HTML5, CSS3, Bootstrap, dan jQuery.
                        </p>
                        <div class="row g-2 small">
                            <div class="col-sm-6"><strong>NAME :</strong><br>Reynard Liu</div>
                            <div class="col-sm-6"><strong>LANGUAGE :</strong><br>PHP, HTML, CSS, JS / jQuery</div>
                            <div class="col-sm-6"><strong>SOSIAL MEDIA :</strong><br>@reynardliu</div>
                            <div class="col-sm-6"><strong>CONTACT DETAILS :</strong><br>+0821 13739528<br>example@gmail.com</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    break;

    // 7. HALAMAN HOME (Default)
    
    default:
        $rekomendasi = [
            ['Ruri Caramel Latte', 18000, 'Espresso lembut berpadu susu segar dan saus karamel rumahan.', 'https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=600&q=80'],
            ['Oat Milk Iced Coffee', 20000, 'Perpaduan house blend dark roast dengan susu oat yang creamy.', 'https://images.unsplash.com/photo-1517701550927-30cf4ba1dba5?auto=format&fit=crop&w=600&q=80'],
            ['Matcha Brown Sugar', 19000, 'Teh hijau Jepang pilihan dengan lapisan gula aren organik.', 'https://images.unsplash.com/photo-1536256263959-770b48d82b0a?auto=format&fit=crop&w=600&q=80']
        ];
?>
    <!-- Carousel -->
    <div id="heroCarousel" class="carousel slide ruri-box rounded-4 overflow-hidden mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active p-4 p-lg-5">
                <div class="row align-items-center g-4">
                    <div class="col-lg-6">
                        <span class="badge ruri-badge mb-2">Selamat Datang Di Café Ruri</span>
                        <h1 class="font-title display-5 mb-3">Segelas kopi Hangat, Suasana Nyaman Tiap hari.</h1>
                        <p class="mb-4">Nikmati seduhan Kopi Pilihan dengan suasana hangat untuk belajar, bekerja, maupun bersantai.</p>
                        <a href="index.php?page=menu" class="btn btn-ruri px-4">Lihat Menu</a>
                        <a href="index.php?page=custom" class="btn btn-ruri-outline px-4">Racik Sekarang!</a>
                    </div>
                    <div class="col-lg-6">
                        <img src="assets/img/matcha latte.jpg" class="img-fluid rounded-4 w-100" style="height: 290px; object-fit: cover;" alt="Slide 1">
                    </div>
                </div>
            </div>
            <div class="carousel-item p-4 p-lg-5">
                <div class="row align-items-center g-4">
                    <div class="col-lg-6">
                        <span class="badge ruri-badge mb-2">Racikan minuman disini!</span>
                        <h2 class="font-title display-5 mb-3">Atur kemanisan Mu sendiri &amp; Tingakt Es Mu  .</h2>
                        <p class="mb-4">Atur sendiri takaran gula, es, susu oat, dan topping boba atau jelly sesuai seleramu.</p>
                        <a href="index.php?page=custom" class="btn btn-ruri px-4">Racik Sekarang</a>
                    </div>
                    <div class="col-lg-6">
                        <img src="assets/img/americano.jpg" class="img-fluid rounded-4 w-100" style="height: 290px; object-fit: cover;" alt="Slide 2">
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span></button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next"><span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span></button>
    </div>

    <!-- Best Recommended -->
    <h2 class="font-title text-center mb-4">Rekomendasi</h2>
    <div class="row g-4">
        <?php foreach ($rekomendasi as [$nama, $harga, $ket, $img]): ?>
        <div class="col-md-4">
            <div class="card ruri-card h-100">
                <img src="<?= $img ?>" class="card-img-top" style="height: 200px; object-fit: cover;" alt="<?= $nama ?>">
                <div class="card-body d-flex flex-column">
                    <h5 class="font-title"><?= $nama ?></h5>
                    <p class="small flex-grow-1"><?= $ket ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <strong>Rp <?= number_format($harga, 0, ',', '.') ?></strong>
                        <button class="btn btn-sm btn-ruri btn-add" data-name="<?= $nama ?>" data-price="<?= $harga ?>">+ Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

<?php
    break;
endswitch;
?>