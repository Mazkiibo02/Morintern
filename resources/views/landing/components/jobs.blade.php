<!-- Jobs section -->
    <section id="lowongan" class="bg-white py-16">
    <!-- Header Bar (sesuai Figma, full width biru) -->
    <div class="w-full bg-[#6D8ED0] py-4">
        <h3 class="text-center text-white font-semibold text-2xl lg:text-3xl tracking-wide">
            LOWONGAN MAGANG TERSEDIA
        </h3>
    </div>

    <!-- Subtext -->
    <div class="text-center mt-6 mb-12 px-4">
        <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
            Temukan posisi magang yang sesuai dengan minat dan kemampuanmu.  
            Mulai perjalanan karirmu bersama kami.
        </p>
    </div>

    <!-- Grid -->
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach(['Quality Assurance','Backend Developer','System Analyst','Frontend Developer'] as $job)
            <div class="bg-white rounded-xl shadow-md border hover:shadow-xl transition-all duration-300 p-6 group">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-semibold text-xl text-[#0F172A] group-hover:text-[#648DDB] transition-colors">
                        {{ $job }}
                    </h4>
                    <span class="text-[#648DDB] text-sm font-medium bg-[#E8F0FF] px-2 py-1 rounded-md">
                        Magang
                    </span>
                </div>

                <ul class="text-gray-600 space-y-2 text-sm leading-relaxed">
                    <li>Mahasiswa aktif atau lulusan maksimal 1 tahun.</li>
                    <li>Semangat belajar tinggi & mampu bekerja dalam tim.</li>
                    <li>Bersedia mengikuti program magang selama periode.</li>
                    <li>Memahami dasar-dasar sesuai posisi yang dilamar.</li>
                </ul>

                <div class="mt-6">
                    <a href="{{ route('peserta.register') }}"
                    class="block w-full text-center bg-[#648DDB] text-white py-2 rounded-lg font-medium hover:bg-[#527bc8] transition">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- CTA Buttons -->
        <div class="text-center mt-14">
            <a href="{{ route('peserta.register') }}"
            class="inline-block px-8 py-3 bg-[#648DDB] text-white font-semibold rounded-lg shadow-md hover:bg-[#527bc8] transition">
                Daftar Magang
            </a>

            <div class="mt-4">
                <a href="#" class="px-6 py-2 bg-[#648DDB] text-white rounded-md">LIHAT LOWONGAN LAINNYA</a>
            </div>
        </div>
    </div>
</section>

