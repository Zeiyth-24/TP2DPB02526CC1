import java.util.ArrayList;
import java.util.Scanner;

/**
 * ============================================================================
 * TUGAS PRAKTIKUM 2 - DESAIN & PEMROGRAMAN BERORIENTASI OBJEK (DPBO)
 * Tema: Smartphone Supply Chain
 * Topik: Warisan Bertingkat (Multilevel Inheritance) - 3 Tingkatan Kelas
 * ============================================================================
 * Hierarki Kelas:
 * 1. Kelas Induk (Base Class) : Brand
 * 2. Kelas Turunan 1 (Child Level 1): Gadget (extends Brand)
 * 3. Kelas Turunan 2 (Child Level 2): Smartphone (extends Gadget)
 * ============================================================================
 */
public class Main {

    /**
     * ========================================================================
     * FUNGSI PEMBANTU VALIDASI INPUT PENGGUNA MENGGUNAKAN SCANNER
     * ========================================================================
     * Menggunakan scanner.nextLine() dan parsing aman (Integer.parseInt /
     * Double.parseDouble) untuk menghindari masalah sisa karakter newline (\n)
     * yang sering terjadi bila menggunakan scanner.nextInt().
     * ========================================================================
     */

    // Membaca string tidak kosong dari terminal
    private static String inputString(Scanner scanner, String prompt) {
        while (true) {
            System.out.print(prompt);
            if (!scanner.hasNextLine()) {
                return "";
            }
            String input = scanner.nextLine().trim();
            if (!input.isEmpty()) {
                return input;
            }
            System.out.println("   [Error] Isian tidak boleh kosong. Silakan coba lagi.");
        }
    }

    // Membaca bilangan bulat (int) dengan batas minimum
    private static int inputInteger(Scanner scanner, String prompt, int batasBawah) {
        while (true) {
            String input = inputString(scanner, prompt);
            try {
                int nilai = Integer.parseInt(input);
                if (nilai < batasBawah) {
                    System.out.println("   [Error] Nilai harus minimal " + batasBawah + ". Silakan coba lagi.");
                    continue;
                }
                return nilai;
            } catch (NumberFormatException e) {
                System.out.println("   [Error] Masukan harus berupa bilangan bulat valid. Silakan coba lagi.");
            }
        }
    }

    // Membaca angka desimal (double) dengan batas minimum
    private static double inputDouble(Scanner scanner, String prompt, double batasBawah) {
        while (true) {
            String input = inputString(scanner, prompt).replace(',', '.');
            try {
                double nilai = Double.parseDouble(input);
                if (nilai < batasBawah) {
                    System.out.println("   [Error] Nilai harus minimal " + batasBawah + ". Silakan coba lagi.");
                    continue;
                }
                return nilai;
            } catch (NumberFormatException e) {
                System.out.println(
                        "   [Error] Masukan harus berupa angka desimal valid (contoh: 6.7). Silakan coba lagi.");
            }
        }
    }

    /**
     * ========================================================================
     * FUNGSI PENCETAK TABEL TEKS DINAMIS DI TERMINAL
     * ========================================================================
     * Menghitung lebar setiap kolom secara dinamis berdasarkan data terpanjang,
     * lalu mencetak data dengan batas tabel teks rapi.
     * ========================================================================
     */
    public static void cetakTabelDinamis(ArrayList<Smartphone> daftarSmartphone) {
        if (daftarSmartphone == null || daftarSmartphone.isEmpty()) {
            System.out.println("\n[PERINGATAN] Tidak ada data smartphone untuk ditampilkan.");
            return;
        }

        // Definisi judul kolom (Header)
        String[] headers = {
                "No.",
                "ID Brand",
                "Nama Brand",
                "Negara Asal",
                "Tahun Rilis",
                "Baterai",
                "Storage",
                "Operating System",
                "Kamera",
                "Layar"
        };

        // Kumpulkan semua baris data ke dalam list of array
        ArrayList<String[]> rows = new ArrayList<>();
        for (int i = 0; i < daftarSmartphone.size(); i++) {
            Smartphone sp = daftarSmartphone.get(i);
            String[] specs = sp.toRowData();

            String[] fullRow = new String[headers.length];
            fullRow[0] = String.valueOf(i + 1); // Nomor urut
            System.arraycopy(specs, 0, fullRow, 1, specs.length);
            rows.add(fullRow);
        }

        // Hitung lebar maksimum tiap kolom secara dinamis
        int[] colWidths = new int[headers.length];
        for (int col = 0; col < headers.length; col++) {
            int maxLen = headers[col].length();
            for (String[] row : rows) {
                if (row[col].length() > maxLen) {
                    maxLen = row[col].length();
                }
            }
            colWidths[col] = maxLen;
        }

        // Fungsi pembantu pembuat garis horizontal pemisah
        java.util.function.BiFunction<Character, Character, String> buatGaris = (border, fill) -> {
            StringBuilder sb = new StringBuilder();
            sb.append(border);
            for (int w : colWidths) {
                for (int i = 0; i < w + 2; i++) {
                    sb.append(fill);
                }
                sb.append(border);
            }
            return sb.toString();
        };

        String garisPemisah = buatGaris.apply('+', '-');
        String garisHeader = buatGaris.apply('+', '=');
        int totalLebarTabel = garisPemisah.length();

        // Banner Judul Tabel (Rata Tengah)
        String judul = "TABEL DATA SUPPLY CHAIN SMARTPHONE (WARISAN BERTINGKAT 3 LEVEL - JAVA)";
        int padJudulKiri = Math.max(0, (totalLebarTabel - judul.length()) / 2);

        System.out.println("\n" + "=".repeat(totalLebarTabel));
        System.out.println(" ".repeat(padJudulKiri) + judul);
        System.out.println("=".repeat(totalLebarTabel));

        // Cetak Baris Header
        System.out.println(garisPemisah);
        System.out.print("|");
        for (int col = 0; col < headers.length; col++) {
            int w = colWidths[col];
            int sisaPadding = w - headers[col].length();
            int padLeft = sisaPadding / 2;
            int padRight = sisaPadding - padLeft;
            System.out.print(" " + " ".repeat(padLeft) + headers[col] + " ".repeat(padRight) + " |");
        }
        System.out.println();
        System.out.println(garisHeader);

        // Cetak Baris Data
        for (String[] row : rows) {
            System.out.print("|");
            for (int col = 0; col < row.length; col++) {
                int w = colWidths[col];
                String text = row[col];
                int sisaPadding = w - text.length();

                System.out.print(" ");
                if (col == 0 || col == 1 || col == 4) {
                    // Kolom No, ID Brand, Tahun Rilis -> Center Alignment
                    int padLeft = sisaPadding / 2;
                    int padRight = sisaPadding - padLeft;
                    System.out.print(" ".repeat(padLeft) + text + " ".repeat(padRight));
                } else if (col == 5 || col == 6 || col == 8 || col == 9) {
                    // Kolom Spesifikasi Angka/Satuan -> Right Alignment
                    System.out.print(" ".repeat(sisaPadding) + text);
                } else {
                    // Kolom Teks (Nama Brand, Negara Asal, OS) -> Left Alignment
                    System.out.print(text + " ".repeat(sisaPadding));
                }
                System.out.print(" |");
            }
            System.out.println();
            System.out.println(garisPemisah);
        }

        System.out.println("Total Smartphone Terdaftar: " + daftarSmartphone.size() + " unit\n");
    }

    /**
     * ========================================================================
     * PROGRAM UTAMA (MAIN METHOD)
     * ========================================================================
     */
    public static void main(String[] args) {
        System.out.println("=================================================================");
        System.out.println(" PROGRAM SMARTPHONE SUPPLY CHAIN MANAGEMENT - JAVA MULTI-BAGIAN OOP");
        System.out.println("=================================================================");
        System.out.println("Menginisialisasi 5 data awal objek Smartphone (Hardcoded)...");

        // 1. Inisialisasi ArrayList berisi 5 objek Smartphone yang di-hardcode
        // Parameter urutan:
        // Level 1 (Brand) : id_brand, nama_brand, negara_asal
        // Level 2 (Gadget) : tahun_rilis, kapasitas_baterai_mah, storage_gb
        // Level 3 (Smartphone): operating_system, resolusi_kamera_mp, ukuran_layar_inci
        ArrayList<Smartphone> daftarSmartphone = new ArrayList<>();

        daftarSmartphone.add(new Smartphone(
                101, "Apple", "Amerika Serikat",
                2023, 3274, 128,
                "iOS 17", 48, 6.1));

        daftarSmartphone.add(new Smartphone(
                102, "Samsung", "Korea Selatan",
                2024, 5000, 256,
                "Android 14 (One UI)", 200, 6.8));

        daftarSmartphone.add(new Smartphone(
                103, "Xiaomi", "Tiongkok",
                2024, 4610, 512,
                "HyperOS (Android 14)", 50, 6.36));

        daftarSmartphone.add(new Smartphone(
                104, "Google", "Amerika Serikat",
                2023, 5050, 128,
                "Android 14", 50, 6.7));

        daftarSmartphone.add(new Smartphone(
                105, "Sony", "Jepang",
                2024, 5000, 256,
                "Android 14", 48, 6.5));

        System.out.println("Sukses memuat " + daftarSmartphone.size() + " data Smartphone awal.");

        // 2. Loop interaktif menggunakan Scanner untuk mengambil input pengguna
        System.out.println("\n-----------------------------------------------------------------");
        System.out.println(" INPUT DATA BARU OLEH PENGGUNA");
        System.out.println("-----------------------------------------------------------------");

        Scanner scanner = new Scanner(System.in);

        while (true) {
            String pilihan = inputString(scanner, "\nApakah Anda ingin menambahkan data Smartphone baru? (y/n): ")
                    .toLowerCase();

            if (pilihan.equals("y") || pilihan.equals("ya") || pilihan.equals("yes")) {
                System.out.println("\n--- Input Data Smartphone ke-" + (daftarSmartphone.size() + 1) + " ---");

                // Input atribut tingkat 1 (Brand)
                System.out.println("[Informasi Brand]");
                int idBrand = inputInteger(scanner, "  Masukkan ID Brand (integer)           : ", 1);
                String namaBrand = inputString(scanner, "  Masukkan Nama Brand (string)          : ");
                String negaraAsal = inputString(scanner, "  Masukkan Negara Asal (string)         : ");

                // Input atribut tingkat 2 (Gadget)
                System.out.println("[Spesifikasi Fisik Gadget]");
                int tahunRilis = inputInteger(scanner, "  Masukkan Tahun Rilis (integer)        : ", 1990);
                int kapasitasBaterai = inputInteger(scanner, "  Kapasitas Baterai (mAh, integer)      : ", 100);
                int storageGb = inputInteger(scanner, "  Kapasitas Penyimpanan (GB, integer)   : ", 1);

                // Input atribut tingkat 3 (Smartphone)
                System.out.println("[Fitur Spesifik Smartphone]");
                String osName = inputString(scanner, "  Sistem Operasi / OS (string)          : ");
                int kameraMp = inputInteger(scanner, "  Resolusi Kamera Utama (MP, integer)   : ", 1);
                double layarInci = inputDouble(scanner, "  Ukuran Layar (inci, contoh: 6.7)      : ", 1.0);

                // Instansiasi objek Smartphone baru (Multilevel Inheritance)
                Smartphone hpBaru = new Smartphone(
                        idBrand, namaBrand, negaraAsal,
                        tahunRilis, kapasitasBaterai, storageGb,
                        osName, kameraMp, layarInci);

                // Menambahkan objek baru ke dalam ArrayList
                daftarSmartphone.add(hpBaru);
                System.out.println("\n[SUKSES] Data Smartphone '" + namaBrand + "' berhasil ditambahkan!");

            } else if (pilihan.equals("n") || pilihan.equals("no") || pilihan.equals("tidak")) {
                System.out.println("\nInput data selesai. Menyiapkan tampilan tabel gabungan...");
                break;
            } else {
                System.out.println("[Peringatan] Masukan tidak dikenali. Ketik 'y' untuk Ya atau 'n' untuk Tidak.");
            }
        }

        scanner.close();

        // 3. Menampilkan seluruh data gabungan dalam tabel dinamis
        cetakTabelDinamis(daftarSmartphone);
    }
}
