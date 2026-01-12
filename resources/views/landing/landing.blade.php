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
        @include('landing.components.features')

        {{-- Perguruan Tinggi Mitra --}}
        @include('landing.components.mitra')

        {{-- Job Section --}}
        <x-section-heading title="Lowongan Magang Tersedia" subtitle="Pilih posisi impianmu dan bergabung bersama kami!" />

        @livewire('job-postings')

        {{-- CTA Section --}}
        <x-section-heading title="Siap Memulai Karier Profesionalmu?" subtitle="Daftar sekarang dan bergabung dalam program magang untuk mendapatkan pengalaman dunia kerja yang sesungguhnya." />

        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 sm:gap-6 mt-12 mb-12 px-4 sm:px-6 lg:px-8">
                    <a href="{{ route('peserta.register') }}"
                       class="bg-[#6D8ED0] text-white px-8 py-3 rounded-full font-semibold text-lg hover:bg-[#5b78b8] transition text-center w-full sm:w-auto">
                        Daftar Sekarang
                    </a>
                    <a href="#lowongan"
                       class="bg-[#6D8ED0] text-white px-8 py-3 rounded-full font-semibold text-lg hover:bg-[#5b78b8] transition text-center w-full sm:w-auto">
                        Pelajari Lebih Lanjut
                    </a>
                </div>

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
                        Login Dibutuhkan
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