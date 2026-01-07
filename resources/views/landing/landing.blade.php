@extends('layouts.landing')

@section('content')
<div class="min-h-screen bg-white">
    {{-- Header --}}
    @include('landing.components.header')

    <main>
        @if(session('just_logged_in') || session('already_logged_in'))
        <div class="fixed inset-0 z-[60] flex items-center justify-center bg-black/40">
            <div class="bg-white rounded-xl shadow-xl max-w-md w-full p-6">
                <h3 class="text-xl font-semibold text-gray-800">Anda sudah masuk!</h3>
                <p class="mt-2 text-gray-600">Selamat datang di MORIntern.</p>
                <div class="mt-6 flex justify-end gap-3">
                    <a href="{{ route('peserta.profil') }}" class="px-4 py-2 bg-[#648DDB] hover:bg-[#527BC8] text-white rounded-lg">Profil Peserta</a>
                    <a href="{{ route('landing') }}" class="px-4 py-2 border border-gray-300 rounded-lg">Tutup</a>
                </div>
            </div>
        </div>
        @endif
        @include('landing.components.hero')

        {{-- Features / Program Section --}}
        <section class="py-16 md:py-20 bg-white">
            @include('landing.components.features')
        </section>

        {{-- Perguruan Tinggi Mitra --}}
        @include('landing.components.mitra')

        {{-- Job Section --}}
        <section class="py-16 md:py-20 bg-gradient-to-b from-white to-gray-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                @include('landing.components.section-header', ['title' => 'Lowongan magang tersedia', 'subtitle' => 'Pilih posisi impianmu dan bergabung bersama kami!'])

                @if($postingans->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 max-w-7xl mx-auto">
                        @foreach($postingans as $post)
                            <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl overflow-hidden transition-all duration-300 transform hover:-translate-y-1">
                                {{-- Card Header --}}
                                <div class="bg-gradient-to-r from-indigo-600 to-purple-700 p-6 md:p-8 text-white">
                                    <h3 class="text-xl md:text-2xl font-bold mb-3 line-clamp-2">
                                        {{ $post->judul_posisi }}
                                    </h3>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-indigo-100 font-medium truncate">
                                            {{ $post->spesialisasi?->nama_spesialisasi ?? 'Umum' }}
                                        </span>
                                    </div>
                                </div>

                                {{-- Card Body --}}
                                <div class="p-6 md:p-8">
                                    <div x-data="{ expanded: false }" class="mb-6">
                                        <p x-show="!expanded" class="text-gray-700 leading-relaxed line-clamp-3">
                                            {{ Str::limit($post->deskripsi, 160) }}
                                        </p>
                                        <p x-show="expanded" class="text-gray-700 leading-relaxed">
                                            {{ $post->deskripsi }}
                                        </p>
                                        <button type="button" @click="expanded = !expanded" class="mt-2 text-indigo-600 hover:text-indigo-700 text-sm font-semibold">
                                            <span x-show="!expanded">Lihat selengkapnya</span>
                                            <span x-show="expanded">Tutup</span>
                                        </button>
                                    </div>

                                    {{-- Stats --}}
                                    <div class="grid grid-cols-2 gap-3 md:gap-4 mb-6">
                                        <div class="bg-gray-50 rounded-xl p-4 text-center">
                                            <p class="text-sm text-gray-600 mb-1">Kuota</p>
                                            <p class="text-2xl md:text-3xl font-bold text-indigo-600">
                                                {{ $post->kuota }}
                                            </p>
                                        </div>
                                        <div class="bg-gray-50 rounded-xl p-4 text-center">
                                            <p class="text-sm text-gray-600 mb-1">Durasi</p>
                                            <p class="text-2xl md:text-3xl font-bold text-purple-600">
                                                {{ $post->durasi }} bulan
                                            </p>
                                        </div>
                                    </div>

                                    {{-- Action Button --}}
                                    <div class="mt-6">
                                        @auth('peserta_calon')
                                            {{-- Jika sudah login --}}
                                            <form action="{{ route('peserta.promosi') }}" method="POST" class="w-full">
                                                @csrf
                                                <input type="hidden" name="postingan_id" value="{{ $post->id }}">
                                                <button type="submit"
                                                        class="block w-full bg-gradient-to-r from-indigo-600 to-purple-700 text-white font-semibold py-3 md:py-4 rounded-xl hover:from-indigo-700 hover:to-purple-800 transition shadow-lg text-center">
                                                    Lamar Sekarang
                                                </button>
                                            </form>
                                        @else
                                            {{-- Jika belum login --}}
                                            <button type="button" 
                                                    onclick="showLoginModal()"
                                                    class="w-full bg-gradient-to-r from-indigo-600 to-purple-700 text-white font-semibold py-3 md:py-4 rounded-xl hover:from-indigo-700 hover:to-purple-800 transition shadow-lg">
                                                Daftar untuk Melamar
                                            </button>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    {{-- Empty State --}}
                    <div class="text-center py-12 md:py-20">
                        <div class="inline-flex items-center justify-center w-24 h-24 md:w-32 md:h-32 bg-gray-100 rounded-full mb-6 md:mb-8">
                            <svg class="w-12 h-12 md:w-16 md:h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl md:text-2xl font-semibold text-gray-700 mb-3">
                            Belum ada lowongan
                        </h3>
                        <p class="text-gray-500 max-w-md mx-auto">
                            Lowongan magang akan segera dibuka. Pantau terus halaman ini!
                        </p>
                    </div>
                @endif
            </div>
        </section>

        {{-- CTA Section --}}
        <section class="py-12 md:py-16 bg-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">
                    Siap memulai karier profesionalmu?
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
                    Daftar sekarang dan bergabung dalam program magang untuk mendapatkan pengalaman dunia kerja yang sesungguhnya.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('peserta.register') }}"
                       class="px-8 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition shadow-md">
                        Daftar Sekarang
                    </a>
                    <a href="#lowongan"
                       class="px-8 py-3 border-2 border-indigo-600 text-indigo-600 font-semibold rounded-lg hover:bg-indigo-50 transition">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </section>

        {{-- Footer --}}
        @include('landing.components.footer')
    </main>

    {{-- Login Modal --}}
    <div id="loginModal" class="fixed inset-0 bg-black/60 z-50 items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-auto animate-fade-in">
            <div class="p-6 md:p-8">
                {{-- Modal Header --}}
                <div class="text-center mb-6">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 md:w-10 md:h-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-2">
                        Login dibutuhkan
                    </h3>
                    <p class="text-gray-600">
                        Silakan login atau daftar untuk melamar magang
                    </p>
                </div>

                {{-- Modal Actions --}}
                <div class="space-y-4">
                    <a href="{{ route('peserta.login') }}"
                       class="block w-full bg-indigo-600 text-white text-center py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
                        Login sebagai Peserta
                    </a>
                    <a href="{{ route('peserta.register') }}"
                       class="block w-full border-2 border-indigo-600 text-indigo-600 text-center py-3 rounded-lg font-semibold hover:bg-indigo-50 transition">
                        Daftar Akun Baru
                    </a>
                    <button onclick="hideLoginModal()"
                            class="w-full text-gray-500 py-2 hover:text-gray-700 text-sm">
                        Nanti saja
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript --}}
<script>
    function showLoginModal() {
        const modal = document.getElementById('loginModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function hideLoginModal() {
        const modal = document.getElementById('loginModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    // Close modal on outside click
    document.getElementById('loginModal').addEventListener('click', function(e) {
        if (e.target.id === 'loginModal') {
            hideLoginModal();
        }
    });

    // Close modal on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            hideLoginModal();
        }
    });
</script>

{{-- Add CSS animation --}}
<style>
    @keyframes fade-in {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    .animate-fade-in {
        animation: fade-in 0.2s ease-out;
    }
</style>
@endsection