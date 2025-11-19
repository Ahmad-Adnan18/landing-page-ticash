<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Menampilkan landing page dengan data testimoni.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        $contactNumber = \App\Models\Setting::getValue('contact_number', '');
        $contactEmail = \App\Models\Setting::getValue('contact_email', '');
        $whatsappNumber = \App\Models\Setting::getValue('whatsapp_number', '');
        $whatsappDefaultMessage = \App\Models\Setting::getValue('whatsapp_default_message', 'Halo, saya tertarik dengan sistem ticash');
        $officeHours = \App\Models\Setting::getValue('office_hours', '');
        $userCount = \App\Models\Setting::getValue('user_count', 0);

        return view('landing.index', compact('testimonials', 'contactNumber', 'contactEmail', 'whatsappNumber', 'whatsappDefaultMessage', 'officeHours', 'userCount'));
    }

    /**
     * Menyimpan data lead dari formulir kontak.
     */
    public function storeContact(Request $request)
    {
        // 1. Validasi
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'pesantren_name' => 'required|string|max:255',
            'position' => 'required|string|max:100',
            'whatsapp_number' => 'required|string|max:20|min:10',
            'email' => 'nullable|email|max:255',
        ]);

        // 2. Simpan ke Database
        Lead::create($validated);

        // 3. (Opsional) Kirim Notifikasi Email ke Tim Sales

        // 4. Redirect kembali dengan pesan sukses
        return redirect()->route('landing.index')
                         ->with('success', 'Terima kasih! Tim kami akan segera menghubungi Anda.');
    }

    /**
     * Menyimpan data lead dari formulir demo dan mengarahkan ke WhatsApp.
     */
    public function requestDemo(Request $request)
    {
        // 1. Validasi
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'pesantren_name' => 'required|string|max:255',
            'position' => 'required|string|max:100',
            'whatsapp_number' => 'required|string|max:20|min:10',
            'email' => 'nullable|email|max:255',
        ]);

        // 2. Simpan ke Database
        $lead = Lead::create($validated);

        // 3. Bangun pesan WhatsApp
        $pesan = "Assalamualaikum,\n" .
                 "Permintaan Demo Baru:\n" .
                 "Nama: " . $validated['name'] . "\n" .
                 "Pesantren: " . $validated['pesantren_name'] . "\n" .
                 "Jabatan: " . $validated['position'] . "\n" .
                 "No. WA: " . $validated['whatsapp_number'] . "\n";

        if ($validated['email']) {
            $pesan .= "Email: " . $validated['email'] . "\n";
        }

        $pesan .= "\nMohon segera ditindaklanjuti.";

        // 4. Ambil nomor WhatsApp tujuan dari setting
        $whatsappNumber = \App\Models\Setting::getValue('whatsapp_number', '');

        // 5. Validasi nomor WA tujuan
        if (!$whatsappNumber) {
            return redirect()->route('landing.index')
                             ->with('error', 'Nomor WhatsApp tujuan tidak ditemukan di pengaturan.');
        }

        // 6. Format nomor WA ke format internasional
        // Hapus semua karakter non-digit
        $whatsappNumber = preg_replace('/\D/', '', $whatsappNumber);

        // Jika nomor diawali dengan "0", ganti dengan "62"
        if (substr($whatsappNumber, 0, 1) === '0') {
            $whatsappNumber = '62' . substr($whatsappNumber, 1);
        }
        // Jika nomor diawali dengan "62", pastikan kode negara tetap benar
        elseif (substr($whatsappNumber, 0, 2) !== '62' && substr($whatsappNumber, 0, 1) === '6') {
            // Jika diawali hanya dengan "6" (bukan "62"), kita asumsikan ini adalah kode negara yang salah
            // Kita bisa tambahkan "62" di depan
            $whatsappNumber = '62' . $whatsappNumber;
        }
        // Jika nomor diawali dengan "8", maka tambahkan "62" di depan (karena nomor Indonesia sering dimulai dengan 08 atau 8)
        elseif (substr($whatsappNumber, 0, 1) === '8') {
            $whatsappNumber = '62' . $whatsappNumber;
        }
        // Jika nomor tidak diawali dengan "62", tambahkan "62"
        elseif (substr($whatsappNumber, 0, 2) !== '62') {
             // Jika kode negara bukan 62 (Indonesia), kita bisa menyesuaikan di sini
             // Untuk sekarang, kita asumsikan jika bukan 62, kita tetap gunakan 62 karena konteksnya Indonesia
             // atau kita bisa menambahkan logika untuk kode negara lain
             // Kita tetap gunakan 62 untuk Indonesia
             $whatsappNumber = '62' . $whatsappNumber;
        }

        // 7. Validasi panjang nomor WA setelah diformat (contoh: minimal 10 digit setelah 62 untuk Indonesia)
        if (strlen($whatsappNumber) < 11) { // 62 + minimal 9 digit
            \Log::warning('Nomor WhatsApp dari setting tidak valid: ' . $whatsappNumber);
            return redirect()->route('landing.index')
                             ->with('error', 'Nomor WhatsApp tujuan di pengaturan tidak valid (terlalu pendek setelah diformat).');
        }

        // 8. Bangun URL WhatsApp
        $pesanEncoded = urlencode($pesan);
        $whatsappUrl = "https://wa.me/{$whatsappNumber}?text={$pesanEncoded}";

        // 8. Redirect ke URL WhatsApp
        return redirect($whatsappUrl);
    }
}
