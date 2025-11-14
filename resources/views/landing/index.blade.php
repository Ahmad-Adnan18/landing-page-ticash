@extends('layouts.app')

@section('content')
<div class="relative min-h-screen">
    <!-- Bagian 01: Header -->
    <header x-data="{ atTop: true }" @scroll.window="atTop = (window.scrollY < 50)" :class="{ 'bg-transparent': atTop, 'bg-white shadow-lg': !atTop }" class="fixed top-0 w-full z-50 transition-all duration-300">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <img :src="atTop ? '{{ asset('images/logo-ticash-white.png') }}' : '{{ asset('images/logo-ticash.png') }}'" alt="ticash Logo" class="h-8 w-auto mr-2 transition-colors duration-300">
                <h1 :class="{ 'text-white': atTop, 'text-blue-500': !atTop }" class="text-2xl font-bold transition-colors duration-300">ticash</h1>
            </div>
            <a href="#contact" :class="{ 'bg-yellow-400 text-slate-800': atTop, 'bg-yellow-500 text-slate-800': !atTop }" class="px-4 py-2 rounded-lg bg-yellow-400 font-medium hover:bg-yellow-300 transition">
                Hubungi Kami
            </a>
        </div>
    </header>

    <!-- Bagian 02: Hero Section - MODIFIED -->
    <section class="relative h-screen overflow-hidden">
        <div class="absolute w-full h-full bg-gradient-to-br from-blue-900 via-blue-700 to-blue-800 z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-blue-700/70 z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/40 via-transparent to-blue-700/30 z-10"></div>

        <div class="relative z-20 container mx-auto px-4 h-full grid lg:grid-cols-2 gap-8 items-center pt-20 lg:pt-0">
            <!-- Bagian Kiri: Teks -->
            <div class="text-center lg:text-left text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Solusi Cashless Modern untuk Pesantren
                </h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto lg:mx-0">
                    Tingkatkan efisiensi, transparansi, dan profitabilitas pesantren Anda dengan sistem transaksi digital ticash
                </p>
                <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                    <a href="#features" class="bg-yellow-400 text-slate-800 px-6 py-3 rounded-lg font-medium text-lg hover:bg-yellow-300 transition">
                        Pelajari Fitur
                    </a>
                    <a href="#contact" class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-lg font-medium text-lg hover:bg-white/10 transition">
                        Demo Gratis
                    </a>
                </div>
            </div>

            <!-- Bagian Kanan: Animasi Lottie -->
            <!-- Perubahan di sini -->
            <div class="flex justify-center items-center py-6 lg:py-0">
                <dotlottie-player id="wallet-animation" src="{{ asset('lottie/Wallet.lottie') }}" background="transparent" speed="1" class="w-64 h-64 md:w-80 md:h-80 lg:w-[500px] lg:h-[500px] mx-auto block">
                </dotlottie-player>
            </div>


        </div>

        <div class="absolute bottom-0 left-0 w-full h-80 z-10" style="background: linear-gradient(to top, 
        #F8FAFC 20%,  
        #F8FAFCB3 60%, 
        #F8FAFC00 100%
        );">
        </div>
    </section>


    <section id="problems" class="py-20 bg-slate-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl lg:text-4xl font-bold text-center mb-16 text-slate-800">Tantangan Umum di Pesantren</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <div class="flex justify-center">
                    <dotlottie-wc src="https://lottie.host/33e12edf-1193-4648-b28a-437003a552a8/VhexuQx8aC.lottie" class="w-full max-w-md" style="width: 500px;height: 500px" autoplay loop></dotlottie-wc>
                </div>

                <!-- [PERUBAHAN] Menghilangkan x-data dan accordion -->
                <div class="max-w-3xl w-full lg:mx-0 space-y-6">

                    <!-- Kartu 1: Infrastruktur -->
                    <div class="problem-card bg-white p-6 rounded-xl shadow-lg flex items-start gap-5">
                        <div class="flex-shrink-0">
                            <!-- Ikon untuk Infrastruktur/Database -->
                            <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2 text-slate-800">Pencatatan Manual</h3>
                            <p class="text-slate-600">Manajemen keuangan yang masih manual menyebabkan pembukuan tidak akurat, memakan waktu, dan rentan terhadap kesalahan manusia.</p>
                        </div>
                    </div>

                    <!-- Kartu 2: Transparansi -->
                    <div class="problem-card bg-white p-6 rounded-xl shadow-lg flex items-start gap-5">
                        <div class="flex-shrink-0">
                            <!-- Ikon untuk Transparansi -->
                            <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.634l3.5-7a1.012 1.012 0 0 1 1.634 0l3.5 7a1.012 1.012 0 0 1 0 .634l-3.5 7a1.012 1.012 0 0 1-1.634 0l-3.5-7Zm18.364-3.5a1.012 1.012 0 0 1 0 .634l-3.5 7a1.012 1.012 0 0 1-1.634 0l-3.5-7a1.012 1.012 0 0 1 0-.634l3.5-7a1.012 1.012 0 0 1 1.634 0l3.5 7Z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2 text-slate-800">Kurangnya Transparansi</h3>
                            <p class="text-slate-600">Orang tua kesulitan memantau pengeluaran anak. Sistem pelaporan yang terbatas menyulitkan audit dan pertanggungjawaban.</p>
                        </div>
                    </div>

                    <!-- Kartu 3: Efisiensi -->
                    <div class="problem-card bg-white p-6 rounded-xl shadow-lg flex items-start gap-5">
                        <div class="flex-shrink-0">
                            <!-- Ikon untuk Efisiensi -->
                            <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836A1.5 1.5 0 0 1 12 3c.41 0 .79.168 1.06.44l3.15 3.15c.273.273.44.65.44 1.06v1.086c0 .41-.168.79-.44 1.06l-3.15 3.15c-.273.273-.65.44-1.06.44a1.5 1.5 0 0 1-1.06-.44L7.84 9.836a1.5 1.5 0 0 1-.44-1.06V7.684c0-.41.168-.79.44-1.06l3.15-3.15c.273-.273.65-.44 1.06-.44Zm0 9a1.5 1.5 0 0 1 1.06.44l3.15 3.15c.273.273.44.65.44 1.06v1.086c0 .41-.168.79-.44 1.06l-3.15 3.15c-.273.273-.65.44-1.06.44a1.5 1.5 0 0 1-1.06-.44l-3.15-3.15a1.5 1.5 0 0 1-.44-1.06v-1.086c0-.41.168-.79.44-1.06l3.15-3.15c.273-.273.65.44 1.06.44Z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2 text-slate-800">Proses Tidak Efisien</h3>
                            <p class="text-slate-600">Proses pembayaran SPP, top-up saldo, atau transaksi di kantin sering memakan waktu, menyebabkan antrian, dan mengganggu produktivitas.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Bagian 04: Benefits (Fade-in on Scroll) -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-16 text-slate-800">Manfaat Menggunakan ticash</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div x-data="{ shown: false }" x-intersect:enter="shown = true" :class="{ 'opacity-100 translate-y-0': shown, 'opacity-0 translate-y-10': !shown }" class="transition-all duration-500">
                    <div class="bg-white p-8 rounded-xl shadow-lg text-center h-full">
                        <div class="w-20 h-20 flex items-center justify-center mx-auto mb-6">
                            <dotlottie-wc src="https://lottie.host/ccea7eb4-1b86-44a5-8cfc-b41eb805b8a5/4scQSxzksP.lottie" style="width: 300px;height: 300px" autoplay loop></dotlottie-wc>

                        </div>
                        <h3 class="text-xl font-bold mb-3 text-slate-800">Efisien & Efektif</h3>
                        <p class="text-slate-500">Proses transaksi cepat tanpa antrian panjang, menghemat waktu dan meningkatkan produktivitas.</p>
                    </div>
                </div>

                <div x-data="{ shown: false }" x-intersect:enter="shown = true" :class="{ 'opacity-100 translate-y-0': shown, 'opacity-0 translate-y-10': !shown }" class="transition-all duration-500" style="transition-delay: 200ms">
                    <div class="bg-white p-8 rounded-xl shadow-lg text-center h-full">
                        <div class="w-20 h-20 flex items-center justify-center mx-auto mb-6">
                            <dotlottie-wc src="https://lottie.host/55f2be7d-ed81-4a93-ab9d-3693e7da47f0/KNLfUu2FnR.lottie" style="width: 300px;height: 300px" autoplay loop></dotlottie-wc>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-slate-800">Transparan & Akuntabel</h3>
                        <p class="text-slate-500">Laporan keuangan yang akurat dan dapat diakses secara real-time untuk meningkatkan transparansi.</p>
                    </div>
                </div>

                <div x-data="{ shown: false }" x-intersect:enter="shown = true" :class="{ 'opacity-100 translate-y-0': shown, 'opacity-0 translate-y-10': !shown }" class="transition-all duration-500" style="transition-delay: 400ms">
                    <div class="bg-white p-8 rounded-xl shadow-lg text-center h-full">
                        <div class="w-20 h-20 flex items-center justify-center mx-auto mb-6">
                            <dotlottie-wc src="https://lottie.host/f32261f3-2baf-48d8-b568-d17fa9332f60/T702yD5MpL.lottie" style="width: 400px;height: 400px" autoplay loop></dotlottie-wc>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-slate-800">Aman & Terpercaya</h3>
                        <p class="text-slate-500">Perlindungan data dan keamanan transaksi yang terjamin dengan teknologi modern.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Bagian 05: Features -->
    <section id="features" class="py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-16 text-slate-800">Fitur Unggulan</h2>

            <!-- Interactive Feature Tabs -->
            <div x-data="{ activeFeature: 'mobile' }" class="max-w-4xl mx-auto">
                <!-- Tab Buttons -->
                <div class="flex flex-col sm:flex-row justify-center gap-3 mb-12">
                    <button @click="activeFeature = 'mobile'" :class="{
                        'bg-blue-500 text-white': activeFeature === 'mobile',
                        'bg-slate-100 text-slate-700 hover:bg-slate-200': activeFeature !== 'mobile'
                    }" class="px-6 py-3 rounded-lg font-medium transition">
                        Aplikasi Mobile
                    </button>
                    <button @click="activeFeature = 'admin'" :class="{
                        'bg-emerald-500 text-white': activeFeature === 'admin',
                        'bg-slate-100 text-slate-700 hover:bg-slate-200': activeFeature !== 'admin'
                    }" class="px-6 py-3 rounded-lg font-medium transition">
                        Dashboard Admin
                    </button>
                </div>

                <!-- Feature Content -->
                <div class="relative min-h-[400px]">
                    <!-- Mobile App Feature -->
                    <div x-show="activeFeature === 'mobile'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="bg-white p-8 rounded-xl shadow-lg">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                            <div class="flex justify-center">
                                <img src="{{ asset('images/feature-mobile-mockup.png') }}" alt="Aplikasi Mobile ticash" class="w-3/4 lg:w-[120%] max-w-8xl rounded-xl">
                            </div>

                            <div>
                                <h3 class="text-2xl font-bold mb-4 text-slate-800">Aplikasi Mobile untuk Santri & Orang Tua</h3>
                                <p class="text-slate-600 mb-6">
                                    Akses mudah untuk mengecek saldo, histori transaksi, dan melakukan top-up kapan saja dan di mana saja.
                                </p>
                                <div class="space-y-4">
                                    <div class="flex items-start">
                                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405 1.405A2.032 2.032 0 0118 22H8a2.028 2.028 0 01-1.771-2.595L5 17h5m5 0v2a2 2 0 01-2 2H8a2 2 0 01-2-2v-2m5 0h2a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2v-6a2 2 0 012-2h2"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-slate-800">Notifikasi Real-time</h4>
                                            <p class="text-slate-600">Pemberitahuan instan untuk setiap transaksi.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-slate-800">Top-up Saldo Instan</h4>
                                            <p class="text-slate-600">Fitur pengisian ulang saldo langsung dari aplikasi.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.8 0c-.719.56-1.949.232-3.048-.67-1.1-.9-2.417-1.125-3.632-1.125C6.512 2.25 5.25 2.688 4.125 3.375a48.424 48.424 0 00-1.123.08C2.845 3.552 2.25 4.515 2.25 5.892V18a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0016.5 18v-2.625m0 0a2.25 2.25 0 012.25-2.25h-9m0 8.625a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-slate-800">Laporan Lengkap</h4>
                                            <p class="text-slate-600">Laporan pengeluaran dengan periode harian, mingguan, dan bulanan.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Admin Dashboard Feature -->
                    <div x-show="activeFeature === 'admin'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="bg-white p-8 rounded-xl shadow-lg">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                            <div>
                                <h3 class="text-2xl font-bold mb-4 text-slate-800">Dashboard Admin Terpadu & Real-time</h3>
                                <p class="text-slate-600 mb-6">
                                    Kelola semua transaksi dan keuangan pesantren secara real-time dari satu platform terpadu.
                                </p>
                                <div class="space-y-4">
                                    <div class="flex items-start">
                                        <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-slate-800">Data Santri Terpusat</h4>
                                            <p class="text-slate-600">Pengelolaan data santri dan wali murid yang terpusat.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-6 3h6m2-6a4 4 0 11-8 0 4 4 0 018 0zM7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-slate-800">Pembukuan Otomatis</h4>
                                            <p class="text-slate-600">Pembukuan otomatis dan laporan keuangan real-time.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364a4.5 4.5 0 006.364-6.364L21.5 9a4.5 4.5 0 00-6.364-6.364L12 3.636a4.5 4.5 0 00-6.364 6.364z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-slate-800">Modul Terintegrasi</h4>
                                            <p class="text-slate-600">Modul keuangan terintegrasi untuk SPP, tabungan, dan lainnya.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center lg:h-[450px]">
                                <img src="{{ asset('images/feature-admin-mockup.png') }}" alt="Dashboard Admin ticash" class="w-full h-auto max-h-full object-contain rounded-xl">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bagian 06: Pricing (Animated Counter) -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-16 text-slate-800">Investasi Sistem</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <div>
                    <div class="max-w-2xl mx-auto lg:mx-0 text-center">
                        <div x-data="{ displayPrice: 0, targetPrice: 350000000 }" x-init="
                                    $nextTick(() => {
                                        const observer = new IntersectionObserver((entries) => {
                                            entries.forEach(entry => {
                                                if (entry.isIntersecting) {
                                                    let start = 0;
                                                    const duration = 1800;
                                                    const startTime = performance.now();
                                                    
                                                    const animate = (currentTime) => {
                                                        const elapsed = currentTime - startTime;
                                                        const progress = Math.min(elapsed / duration, 1);
                                                        
                                                        // Cubic out easing function
                                                        const easeProgress = 1 - Math.pow(1 - progress, 3);
                                                        
                                                        displayPrice = Math.floor(easeProgress * targetPrice);
                                                        
                                                        if (progress < 1) {
                                                            requestAnimationFrame(animate);
                                                        } else {
                                                            displayPrice = targetPrice;
                                                        }
                                                    };
                                                    
                                                    requestAnimationFrame(animate);
                                                    observer.disconnect();
                                                }
                                            });
                                        }, { threshold: 0.5 });
                                        
                                        observer.observe($el);
                                    });
                                " class="bg-white p-8 rounded-xl shadow-lg">
                            <h3 class="text-2xl font-bold mb-4 text-slate-800">Biaya Implementasi</h3>
                            <p class="text-4xl font-bold text-blue-500 mb-2" x-text="'Rp ' + displayPrice.toLocaleString('id-ID')">Rp 0</p>
                            <p class="text-slate-500 text-lg">100% Diwakafkan</p>
                            <p class="mt-4 text-slate-500">Sistem ticash merupakan proyek sosial yang didedikasikan sepenuhnya untuk kemaslahatan pesantren. Seluruh investasi diwakafkan dan tidak dimaksudkan untuk mencari keuntungan.</p>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:flex justify-center">
                    <img src="{{ asset('images/investasi-illustration.png') }}" alt="Ilustrasi Investasi Wakaf" class="w-full max-w-md animate-float-slow">
                </div>
            </div>
        </div>
    </section>

    <!-- Bagian 07: Testimonials (Slider) -->
    <section class="py-20 bg-slate-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-16 text-slate-800">Apa Kata Mereka?</h2>

            <div x-data="{ activeSlide: 0, totalSlides: {{ count($testimonials) > 0 ? count($testimonials) : 1 }} }" class="max-w-4xl mx-auto">
                <div class="overflow-hidden">
                    <div class="flex transition-transform duration-500 ease-in-out" :style="{ transform: 'translateX(-' + (activeSlide * 100) + '%)' }">
                        @forelse($testimonials as $testimonial)
                        <div class="w-full flex-shrink-0">
                            <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                                <div class="w-16 h-16 rounded-full bg-slate-200 mx-auto mb-4 overflow-hidden">
                                    @if($testimonial->avatar_path)
                                    <img src="{{ Storage::url($testimonial->avatar_path) }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover">
                                    @else
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-500">{{ substr($testimonial->name, 0, 1) }}</span>
                                    </div>
                                    @endif
                                </div>
                                <p class="text-slate-500 italic mb-4">"{{ $testimonial->quote }}"</p>
                                <h4 class="font-bold text-slate-800">{{ $testimonial->name }}</h4>
                                <p class="text-slate-500">{{ $testimonial->position }}, {{ $testimonial->institution }}</p>
                            </div>
                        </div>
                        @empty
                        <div class="w-full flex-shrink-0">
                            <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                                <div class="w-16 h-16 rounded-full bg-slate-200 mx-auto mb-4"></div>
                                <p class="text-slate-500 italic mb-4">"Sistem ticash sangat membantu dalam mengelola keuangan pesantren dengan lebih efisien dan transparan."</p>
                                <h4 class="font-bold text-slate-800">Contoh Pengguna</h4>
                                <p class="text-slate-500">Bendahara, Pondok Pesantren Modern</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>

                <div class="flex justify-center mt-8 space-x-2">
                    @for($i = 0; $i < max(1, count($testimonials)); $i++) <button @click="activeSlide = {{ $i }}" :class="{ 'bg-blue-500': activeSlide === {{ $i }}, 'bg-slate-300': activeSlide !== {{ $i }} }" class="w-4 h-4 rounded-full transition"></button>
                        @endfor
                </div>

                <div class="flex justify-center mt-4 space-x-4">
                    <button @click="activeSlide = activeSlide === 0 ? totalSlides - 1 : activeSlide - 1" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                        Sebelumnya
                    </button>
                    <button @click="activeSlide = activeSlide === totalSlides - 1 ? 0 : activeSlide + 1" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                        Selanjutnya
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Bagian 08: Contact Form -->
    <section id="contact" class="py-20">
        <div class="container mx-auto px-4">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <div class="hidden lg:flex justify-center">
                    <dotlottie-wc src="https://lottie.host/af8db9f6-4856-406f-9b6a-0805025b8343/CuGkGIddUy.lottie" class="w-full max-w-md animate-float-slow" style="width: 500px;height: 500px" autoplay loop></dotlottie-wc>
                </div>

                <div>
                    <h2 class="text-3xl font-bold text-center lg:text-left mb-4 text-slate-800">Tertarik dengan Solusi Kami?</h2>
                    <p class="text-center lg:text-left text-slate-500 mb-12">Isi formulir di bawah untuk mendapatkan demo gratis dan informasi lebih lanjut</p>

                    <form x-data="contactForm()" method="POST" action="{{ route('landing.kontak') }}" class="bg-white p-8 rounded-xl shadow-lg">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-slate-700 mb-2" for="name">Nama Lengkap</label>
                                <input type="text" id="name" name="name" x-model="formData.name" @blur="validate('name')" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                                <span x-show="errors.name" x-text="errors.name" class="text-red-500 text-sm"></span>
                            </div>

                            <div>
                                <label class="block text-slate-700 mb-2" for="pesantren_name">Nama Pesantren</label>
                                <input type="text" id="pesantren_name" name="pesantren_name" x-model="formData.pesantren_name" @blur="validate('pesantren_name')" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                                <span x-show="errors.pesantren_name" x-text="errors.pesantren_name" class="text-red-500 text-sm"></span>
                            </div>

                            <div>
                                <label class="block text-slate-700 mb-2" for="position">Jabatan</label>
                                <input type="text" id="position" name="position" x-model="formData.position" @blur="validate('position')" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                                <span x-show="errors.position" x-text="errors.position" class="text-red-500 text-sm"></span>
                            </div>

                            <div>
                                <label class="block text-slate-700 mb-2" for="whatsapp_number">No. WhatsApp</label>
                                <input type="text" id="whatsapp_number" name="whatsapp_number" x-model="formData.whatsapp_number" @blur="validate('whatsapp_number')" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                                <span x-show="errors.whatsapp_number" x-text="errors.whatsapp_number" class="text-red-500 text-sm"></span>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-slate-700 mb-2" for="email">Email (Opsional)</label>
                                <input type="email" id="email" name="email" x-model="formData.email" @blur="validate('email')" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                <span x-show="errors.email" x-text="errors.email" class="text-red-500 text-sm"></span>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-yellow-400 text-slate-800 px-6 py-4 rounded-lg font-medium text-lg hover:bg-yellow-300 transition">
                            Kirim Permintaan Demo
                        </button>

                        @if(session('success'))
                        <div class="mt-4 p-4 bg-emerald-50 text-emerald-700 rounded-lg">
                            {{ session('success') }}
                        </div>
                        <script>
                            // Scroll to contact section after successful submission
                            document.addEventListener('DOMContentLoaded', function() {
                                const contactSection = document.getElementById('contact');
                                if (contactSection) {
                                    contactSection.scrollIntoView({
                                        behavior: 'smooth'
                                    });
                                }
                            });

                        </script>
                        @endif
                    </form>

                    <!-- Contact Information Section -->
                    <div class="mt-8 bg-slate-50 p-6 rounded-xl border border-slate-200">
                        <h3 class="text-lg font-bold text-slate-800 mb-4 text-center lg:text-left">Informasi Kontak</h3>
                        <div class="space-y-3">
                            @if($contactNumber)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span class="text-slate-700"><strong>Telepon:</strong> {{ $contactNumber }}</span>
                            </div>
                            @endif

                            @if($contactEmail)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-slate-700"><strong>Email:</strong> {{ $contactEmail }}</span>
                            </div>
                            @endif

                            @if($whatsappNumber)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                </svg>
                                <span class="text-slate-700"><strong>WhatsApp:</strong> {{ $whatsappNumber }}</span>
                            </div>
                            @endif

                            @if($officeHours)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-purple-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-slate-700"><strong>Jam Operasional:</strong> {{ $officeHours }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-100 text-slate-800 py-4">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0 flex items-center">
                    <img src="{{ asset('images/logo-ticash.png') }}" alt="ticash Logo" class="h-12 w-auto mr-2">
                    <div>
                        <h2 class="text-2xl font-bold">ticash</h2>
                        <p class="text-slate-800">Solusi cashless untuk pesantren</p>
                    </div>
                </div>
                <div>
                    <p class="text-slate-800 text-center">© {{ date('Y') }} ticash. Semua hak dilindungi.</p>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Tambahkan script Lottie di bawah (cukup sekali aja di halaman ini) -->
<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.js"></script>
<script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const player = document.getElementById('wallet-animation');

        // Saat mouse masuk (Hover)
        player.addEventListener('mouseenter', () => {
            player.setDirection(1); // Set arah maju (normal)
            player.play(); // Mainkan
        });

        // Saat mouse keluar (Lepas)
        player.addEventListener('mouseleave', () => {
            player.setDirection(-1); // Set arah mundur (rewind)
            player.play(); // Mainkan (karena arahnya -1, dia akan mundur)
        });
    });

</script>
@endsection
