{{-- Component: hero --}}
<section id="hero" class="relative pt-24 pb-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                    Kesempatan Magang seru untuk Generasi Muda kreatif!
                </h1>
                <p class="mt-6 text-lg text-gray-600">
                    Apakah kamu siap memulai perjalanan karier yang bermakna?
                    Morn Intern membuka kesempatan bagi mahasiswa dan fresh graduate untuk
                    bergabung dalam program magang yang penuh pengalaman nyata, pembelajaran
                    langsung, dan kesempatan berjejaring dengan profesional terbaik di bidangnya.
                </p>
                <div class="mt-8">
                    <a href="#lowongan" class="inline-block bg-[#678DE5] text-white px-8 py-3 rounded-md font-semibold hover:bg-blue-600 transition-colors">
                        CARI LOWONGAN
                    </a>
                </div>
            </div>
            <div class="relative">
                <img src="{{ asset('assets/landing/hero-image.png') }}" alt="Hero Image" class="w-full max-w-lg mx-auto">
                <div class="absolute -right-4 top-1/2 transform -translate-y-1/2">
                    <div class="bg-white/80 backdrop-blur-sm rounded-lg p-4 shadow-lg">
                        <img src="{{ asset('assets/landing/icon-lowongan.svg') }}" alt="" class="w-8 h-8 mb-2">
                        <p class="text-sm font-medium">Lowongan Tersedia</p>
                    </div>
                </div>
                <div class="absolute -left-4 bottom-1/4">
                    <div class="bg-white/80 backdrop-blur-sm rounded-lg p-4 shadow-lg">
                        <img src="{{ asset('assets/landing/icon-pelamar.svg') }}" alt="" class="w-8 h-8 mb-2">
                        <p class="text-sm font-medium">Dilihat pelamar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>