<?php
/**
 * ============================================================================
 * TUGAS PRAKTIKUM 2 - DESAIN & PEMROGRAMAN BERORIENTASI OBJEK (DPBO)
 * Tema: Smartphone Supply Chain
 * Topik: Warisan Bertingkat (Multilevel Inheritance) - 3 Tingkatan Kelas (PHP)
 * ============================================================================
 * 
 * PENJELASAN STRUKTUR WARISAN (INHERITANCE):
 * ----------------------------------------------------------------------------
 * 1. Kelas Induk (Base Class): Brand
 *    Atribut (3): id_brand (int), nama_brand (string), negara_asal (string)
 * 
 * 2. Kelas Turunan 1 (Child Level 1): Gadget extends Brand
 *    Mewarisi seluruh atribut Brand dan menambahkan 3 atribut fisik gadget:
 *    Atribut (3): tahun_rilis (int), kapasitas_baterai_mah (int), storage_gb (int)
 * 
 * 3. Kelas Turunan 2 (Child Level 2): Smartphone extends Gadget
 *    Mewarisi seluruh atribut Gadget (dan secara bertingkat juga Brand).
 *    Menambahkan 3 atribut spesifik smartphone + 1 atribut tambahan foto produk:
 *    Atribut: operating_system (string), resolusi_kamera_mp (int),
 *             ukuran_layar_inci (float), foto_produk (string, private)
 * 
 * Total atribut yang dimiliki oleh objek Smartphone adalah 10 atribut
 * (3 dari Brand, 3 dari Gadget, 4 dari Smartphone).
 * ============================================================================
 */

require_once __DIR__ . '/Smartphone.php';

// Memulai sesi untuk mendukung penyimpanan data tambahan jika diinput via form web
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * ----------------------------------------------------------------------------
 * 1. INISIALISASI 5 OBJEK AWAL (HARDCODED DATA)
 * ----------------------------------------------------------------------------
 */
$daftar_smartphone = [
    new Smartphone(
        101, "Apple", "Amerika Serikat",
        2023, 3274, 128,
        "iOS 17", 48, 6.1,
        "images/iphone15.svg"
    ),
    new Smartphone(
        102, "Samsung", "Korea Selatan",
        2024, 5000, 256,
        "Android 14 (One UI)", 200, 6.8,
        "images/s24ultra.svg"
    ),
    new Smartphone(
        103, "Xiaomi", "Tiongkok",
        2024, 4610, 512,
        "HyperOS (Android 14)", 50, 6.4,
        "images/xiaomi14.svg"
    ),
    new Smartphone(
        104, "Google", "Amerika Serikat",
        2023, 5050, 128,
        "Android 14", 50, 6.7,
        "images/pixel8.svg"
    ),
    new Smartphone(
        105, "Sony", "Jepang",
        2024, 5000, 256,
        "Android 14", 48, 6.5,
        "images/xperia1.svg"
    )
];

/**
 * ----------------------------------------------------------------------------
 * 2. DATA PENGGUNA BARU YANG DI-HARDCODE (SIMULASI INPUT USER SESUAI PEDOMAN LAB)
 * ----------------------------------------------------------------------------
 */
$data_pengguna_baru = new Smartphone(
    106, "Asus ROG", "Taiwan (Republik Tiongkok)",
    2024, 6000, 1024,
    "Android 14 (ROG UI Edition)", 50, 6.8,
    "images/rog8.svg"
);

// Menambahkan data pengguna baru ke dalam koleksi utama
$daftar_smartphone[] = $data_pengguna_baru;

/**
 * ----------------------------------------------------------------------------
 * 3. PENANGANAN INPUT INTERAKTIF JIKA FORM WEB DISUBMIT (OPSIONAL FLEKSIBEL)
 * ----------------------------------------------------------------------------
 */
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah_hp'])) {
    $id_brand = (int)($_POST['id_brand'] ?? 0);
    $nama_brand = trim($_POST['nama_brand'] ?? '');
    $negara_asal = trim($_POST['negara_asal'] ?? '');
    $tahun_rilis = (int)($_POST['tahun_rilis'] ?? 0);
    $baterai = (int)($_POST['kapasitas_baterai_mah'] ?? 0);
    $storage = (int)($_POST['storage_gb'] ?? 0);
    $os = trim($_POST['operating_system'] ?? '');
    $kamera = (int)($_POST['resolusi_kamera_mp'] ?? 0);
    $layar = (float)str_replace(',', '.', $_POST['ukuran_layar_inci'] ?? '0');
    $foto = trim($_POST['foto_produk'] ?? 'images/default.svg');

    if ($foto === '') {
        $foto = 'images/default.svg';
    }

    if ($id_brand > 0 && !empty($nama_brand)) {
        $hp_input_user = new Smartphone(
            $id_brand, $nama_brand, $negara_asal,
            $tahun_rilis, $baterai, $storage,
            $os, $kamera, $layar, $foto
        );

        if (!isset($_SESSION['extra_smartphones'])) {
            $_SESSION['extra_smartphones'] = [];
        }
        $_SESSION['extra_smartphones'][] = serialize($hp_input_user);
    }
}

// Menggabungkan data dari session jika ada
if (!empty($_SESSION['extra_smartphones'])) {
    foreach ($_SESSION['extra_smartphones'] as $ser) {
        $daftar_smartphone[] = unserialize($ser);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smartphone Supply Chain - Multilevel Inheritance PHP</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a0ca3;
            --secondary: #4cc9f0;
            --bg-color: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --badge-bg: #eff6ff;
            --badge-text: #1d4ed8;
            --highlight: #f1f5f9;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            padding: 30px 20px;
            line-height: 1.6;
        }

        .container {
            max-width: 1300px;
            margin: 0 auto;
        }

        .header-card {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            color: #ffffff;
            padding: 35px 30px;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.15);
            margin-bottom: 30px;
        }

        .badge-pill {
            display: inline-block;
            background: rgba(67, 97, 238, 0.3);
            border: 1px solid rgba(67, 97, 238, 0.6);
            color: #93c5fd;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 9999px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 12px;
        }

        .header-card h1 {
            font-size: 1.85rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: #f8fafc;
        }

        .header-card p {
            color: #94a3b8;
            font-size: 0.95rem;
        }

        .hierarchy-box {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 18px;
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .hierarchy-node {
            background: rgba(255, 255, 255, 0.07);
            border-radius: 8px;
            padding: 6px 14px;
            font-size: 0.85rem;
            color: #cbd5e1;
        }

        .hierarchy-arrow {
            color: #60a5fa;
            font-weight: bold;
            align-self: center;
        }

        .content-card {
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: 0 4px 15px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-color);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .card-header {
            padding: 20px 25px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ffffff;
        }

        .card-header h2 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-main);
        }

        .total-counter {
            font-size: 0.9rem;
            color: var(--text-muted);
            background: var(--highlight);
            padding: 5px 14px;
            border-radius: 20px;
            font-weight: 600;
        }

        .table-responsive {
            overflow-x: auto;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.9rem;
        }

        thead {
            background-color: #f8fafc;
            border-bottom: 2px solid var(--border-color);
        }

        th {
            padding: 14px 16px;
            font-weight: 700;
            color: #475569;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            white-space: nowrap;
        }

        td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
        }

        tr:hover {
            background-color: #f8fafc;
            transition: background-color 0.15s ease;
        }

        .img-cell {
            width: 75px;
            text-align: center;
        }

        .product-photo {
            width: 58px;
            height: 58px;
            object-fit: contain;
            border-radius: 10px;
            background: #f1f5f9;
            padding: 4px;
            border: 1px solid #cbd5e1;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease;
        }

        .product-photo:hover {
            transform: scale(1.1);
        }

        .brand-name {
            font-weight: 600;
            color: var(--text-main);
        }

        .badge-spec {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 6px;
            font-size: 0.78rem;
            font-weight: 600;
            background: #f1f5f9;
            color: #334155;
            white-space: nowrap;
        }

        .badge-os {
            background: #e0f2fe;
            color: #0369a1;
        }

        .align-center {
            text-align: center;
        }

        .align-right {
            text-align: right;
        }

        /* Form Tambah Smartphone */
        .form-section {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 25px 30px;
            box-shadow: 0 4px 15px -1px rgba(0, 0, 0, 0.05);
        }

        .form-section h3 {
            font-size: 1.15rem;
            margin-bottom: 15px;
            color: var(--text-main);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group label {
            font-size: 0.8rem;
            font-weight: 600;
            color: #475569;
        }

        .form-group input, .form-group select {
            padding: 9px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 0.88rem;
            font-family: inherit;
            color: var(--text-main);
        }

        .form-group input:focus, .form-group select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }

        .btn-submit {
            background-color: var(--primary);
            color: white;
            padding: 10px 24px;
            font-size: 0.9rem;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .btn-submit:hover {
            background-color: var(--primary-dark);
        }

        footer {
            text-align: center;
            margin-top: 30px;
            color: var(--text-muted);
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Header Card -->
    <div class="header-card">
        <span class="badge-pill">DPBO - Tugas Praktikum 2</span>
        <h1>Smartphone Supply Chain Management</h1>
        <p>Implementasi Pemrograman Berorientasi Objek (OOP) dengan konsep Warisan Bertingkat (Multilevel Inheritance) 3 Tingkatan Kelas menggunakan PHP & HTML.</p>
        
        <div class="hierarchy-box">
            <span class="hierarchy-node"><strong>Level 1 (Induk):</strong> Brand</span>
            <span class="hierarchy-arrow">&rarr;</span>
            <span class="hierarchy-node"><strong>Level 2 (Turunan 1):</strong> Gadget extends Brand</span>
            <span class="hierarchy-arrow">&rarr;</span>
            <span class="hierarchy-node"><strong>Level 3 (Turunan 2):</strong> Smartphone extends Gadget (+ foto_produk)</span>
        </div>
    </div>

    <!-- Tabel Data Utama -->
    <div class="content-card">
        <div class="card-header">
            <h2>Koleksi Data Smartphone Supply Chain</h2>
            <span class="total-counter">Total: <?= count($daftar_smartphone) ?> Unit Terdaftar</span>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th class="align-center">No.</th>
                        <th class="align-center">Foto</th>
                        <th class="align-center">ID Brand</th>
                        <th>Nama Brand</th>
                        <th>Negara Asal</th>
                        <th class="align-center">Tahun Rilis</th>
                        <th class="align-right">Baterai</th>
                        <th class="align-right">Storage</th>
                        <th>Sistem Operasi (OS)</th>
                        <th class="align-right">Kamera</th>
                        <th class="align-right">Layar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daftar_smartphone as $idx => $hp): ?>
                        <tr>
                            <!-- Nomor Urut -->
                            <td class="align-center" style="font-weight: 600; color: #64748b;">
                                <?= $idx + 1 ?>
                            </td>

                            <!-- Kolom Foto Produk (Merender tag <img> menggunakan jalur atribut foto_produk) -->
                            <td class="img-cell">
                                <img src="<?= htmlspecialchars($hp->getFotoProduk()) ?>" 
                                     alt="<?= htmlspecialchars($hp->getNamaBrand()) ?>" 
                                     class="product-photo"
                                     onerror="this.src='images/default.svg'">
                            </td>

                            <!-- Atribut Tingkat 1 (Brand) -->
                            <td class="align-center">
                                <span class="badge-spec"><?= htmlspecialchars((string)$hp->getIdBrand()) ?></span>
                            </td>
                            <td>
                                <span class="brand-name"><?= htmlspecialchars($hp->getNamaBrand()) ?></span>
                            </td>
                            <td><?= htmlspecialchars($hp->getNegaraAsal()) ?></td>

                            <!-- Atribut Tingkat 2 (Gadget) -->
                            <td class="align-center"><?= htmlspecialchars((string)$hp->getTahunRilis()) ?></td>
                            <td class="align-right">
                                <span class="badge-spec"><?= number_format($hp->getKapasitasBateraiMah(), 0, ',', '.') ?> mAh</span>
                            </td>
                            <td class="align-right">
                                <span class="badge-spec"><?= htmlspecialchars((string)$hp->getStorageGb()) ?> GB</span>
                            </td>

                            <!-- Atribut Tingkat 3 (Smartphone) -->
                            <td>
                                <span class="badge-spec badge-os"><?= htmlspecialchars($hp->getOperatingSystem()) ?></span>
                            </td>
                            <td class="align-right"><?= htmlspecialchars((string)$hp->getResolusiKameraMp()) ?> MP</td>
                            <td class="align-right" style="font-weight: 600;">
                                <?= number_format($hp->getUkuranLayarInci(), 1) ?>"
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Input Pengguna Baru (Web Terminal Simulator) -->
    <div class="form-section">
        <h3>
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Smartphone Baru (Input Interaktif Pengguna)
        </h3>
        <form method="POST" action="">
            <div class="form-grid">
                <!-- Brand Level -->
                <div class="form-group">
                    <label for="id_brand">ID Brand (integer):</label>
                    <input type="number" id="id_brand" name="id_brand" value="107" required min="1">
                </div>
                <div class="form-group">
                    <label for="nama_brand">Nama Brand (string):</label>
                    <input type="text" id="nama_brand" name="nama_brand" placeholder="Contoh: OnePlus" required>
                </div>
                <div class="form-group">
                    <label for="negara_asal">Negara Asal (string):</label>
                    <input type="text" id="negara_asal" name="negara_asal" placeholder="Contoh: Tiongkok" required>
                </div>

                <!-- Gadget Level -->
                <div class="form-group">
                    <label for="tahun_rilis">Tahun Rilis (integer):</label>
                    <input type="number" id="tahun_rilis" name="tahun_rilis" value="2024" required min="1990">
                </div>
                <div class="form-group">
                    <label for="kapasitas_baterai_mah">Kapasitas Baterai (mAh):</label>
                    <input type="number" id="kapasitas_baterai_mah" name="kapasitas_baterai_mah" value="5400" required min="100">
                </div>
                <div class="form-group">
                    <label for="storage_gb">Kapasitas Storage (GB):</label>
                    <input type="number" id="storage_gb" name="storage_gb" value="256" required min="1">
                </div>

                <!-- Smartphone Level -->
                <div class="form-group">
                    <label for="operating_system">Sistem Operasi (OS):</label>
                    <input type="text" id="operating_system" name="operating_system" placeholder="Contoh: OxygenOS 14" required>
                </div>
                <div class="form-group">
                    <label for="resolusi_kamera_mp">Kamera Utama (MP):</label>
                    <input type="number" id="resolusi_kamera_mp" name="resolusi_kamera_mp" value="50" required min="1">
                </div>
                <div class="form-group">
                    <label for="ukuran_layar_inci">Ukuran Layar (inci):</label>
                    <input type="number" step="0.1" id="ukuran_layar_inci" name="ukuran_layar_inci" value="6.82" required min="1">
                </div>

                <!-- Atribut Tambahan: Foto Produk -->
                <div class="form-group">
                    <label for="foto_produk">Foto Produk (Path Gambar):</label>
                    <select id="foto_produk" name="foto_produk">
                        <option value="images/default.svg">Default SVG (Bawaan)</option>
                        <option value="images/iphone15.svg">iPhone 15 SVG</option>
                        <option value="images/s24ultra.svg">S24 Ultra SVG</option>
                        <option value="images/xiaomi14.svg">Xiaomi 14 SVG</option>
                        <option value="images/pixel8.svg">Pixel 8 Pro SVG</option>
                        <option value="images/xperia1.svg">Sony Xperia 1 SVG</option>
                        <option value="images/rog8.svg">Asus ROG 8 SVG</option>
                    </select>
                </div>
            </div>

            <button type="submit" name="tambah_hp" class="btn-submit">Simpan Smartphone Baru</button>
        </form>
    </div>

    <footer>
        <p>&copy; <?= date('Y') ?> Tugas Praktikum 2 DPBO - Multilevel Inheritance PHP</p>
    </footer>
</div>

</body>
</html>
