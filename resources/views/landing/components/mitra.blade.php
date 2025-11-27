<section class="py-20 bg-white">


    <!-- HEADER BAR FULL WIDTH (di luar container) -->  
    <div class="w-full bg-[#6D8ED0] py-4">
        <h3 class="text-center text-white font-semibold text-2xl lg:text-3xl tracking-wide">
            PERGURUAN TINGGI MITRA
        </h3>
    </div>

    <!-- Container isi -->
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 mt-12">

        <!-- Intro + Foto -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            <!-- Text -->
            <div class="text-black text-lg leading-relaxed">
                <p>
                    MORBIS melalui MORINTERN berkolaborasi dengan berbagai Perguruan Tinggi di Indonesia 
                    untuk memberikan pengalaman magang berbasis proyek nyata.
                </p>
                <p class="mt-4">
                    Melalui kerja sama ini, mahasiswa tidak hanya belajar teori, tetapi juga mengasah 
                    keterampilan teknis dan soft skill langsung dari industri.
                </p>
            </div>

            <!-- FOTO -->
            <div class="flex justify-center">
                <img src="{{ asset('assets/landing/mitra-foto.png') }}"
                     class="rounded-xl shadow-xl w-full max-w-xl object-cover">
            </div>
        </div>

        <!-- LOGO GRID -->
        <div class="mt-20 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-12 place-items-center">
            @foreach(range(1,5) as $univ)
            <div class="text-center">
                <div class="w-36 h-36 bg-white rounded-full shadow-xl flex items-center justify-center">
                    <img src="{{ asset('assets/landing/univ-logo.png') }}"
                         class="w-24 h-24 object-contain">
                </div>
                <p class="mt-4 text-gray-700 font-semibold text-lg">Univ {{ $univ }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>
