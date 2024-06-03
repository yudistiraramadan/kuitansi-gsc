var huruf = [
    "",
    "Satu",
    "Dua",
    "Tiga",
    "Empat",
    "Lima",
    "Enam",
    "Tujuh",
    "Delapan",
    "Sembilan",
    "Sepuluh",
    "Sebelas",
];

// Fungsi untuk mengonversi angka ke terbilang (bahasa Indonesia)
function convertToWords(nilai) {
    var penyimpanan = "";
    if (nilai < 12) {
        penyimpanan = " " + huruf[nilai];
    } else if (nilai < 20) {
        penyimpanan = convertToWords(Math.floor(nilai - 10)) + " Belas ";
    } else if (nilai < 100) {
        var bagi = Math.floor(nilai / 10);
        penyimpanan =
            convertToWords(bagi) + " Puluh " + convertToWords(nilai % 10);
    } else if (nilai < 200) {
        penyimpanan = " Seratus " + convertToWords(nilai - 100);
    } else if (nilai < 1000) {
        var bagi = Math.floor(nilai / 100);
        penyimpanan =
            convertToWords(bagi) + " Ratus " + convertToWords(nilai % 100);
    } else if (nilai < 2000) {
        penyimpanan = " Seribu " + convertToWords(nilai - 1000);
    } else if (nilai < 1000000) {
        var bagi = Math.floor(nilai / 1000);
        penyimpanan =
            convertToWords(bagi) + " Ribu " + convertToWords(nilai % 1000);
    } else if (nilai < 1000000000) {
        var bagi = Math.floor(nilai / 1000000);
        penyimpanan =
            convertToWords(bagi) + " Juta " + convertToWords(nilai % 1000000);
    } else if (nilai < 1000000000000) {
        var bagi = Math.floor(nilai / 1000000000);
        penyimpanan =
            convertToWords(bagi) +
            " Miliar " +
            convertToWords(nilai % 1000000000);
    } else if (nilai < 1000000000000000) {
        var bagi = Math.floor(nilai / 1000000000000);
        penyimpanan =
            convertToWords(bagi) +
            " Triliun " +
            convertToWords(nilai % 1000000000000);
    }
    return penyimpanan.trim();
}

// Fungsi untuk mengonversi angka menjadi terbilang dan menempatkannya pada input 'terbilang'
function konversiTerbilang(input) {
    // Menghapus titik sebelum melakukan format
    var number = input.value.replace(/\./g, "");

    // Menghapus titik jika ada lebih dari satu
    number = number.replace(/\.(?=.*\.)/g, "");

    // Hapus semua karakter non-angka
    number = number.replace(/\D/g, "");

    // Format angka dengan titik sebagai pemisah ribuan
    var formatted = number.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    input.value = formatted;

    // Konversi angka ke terbilang
    var angka = parseInt(number, 10);
    var terbilang = convertToWords(angka);
    document.getElementById("terbilang").value =
        terbilang.toUpperCase() + " RUPIAH";
}
