<!-- Jobs section -->
    <section id="lowongan" class="bg-white py-16">
    <div class="w-screen bg-[#6D8ED0] py-6 relative left-1/2 right-1/2 -ml-[50vw] -mr-[50vw] mb-12">
        <h2 class="text-center text-white text-2xl lg:text-3xl font-bold tracking-wide">
            LOWONGAN TERSEDIA
        </h2>
    </div>

        <!-- Dynamic Job Postings via Livewire -->
        @livewire('job-postings')

        <!-- Tombol Daftar -->
        <div class="flex justify-center mt-12">
            <a href="#daftar"
            class="bg-[#6D8ED0] text-white px-8 py-3 rounded-full font-semibold text-lg hover:bg-[#5b78b8] transition">
            Daftar Disini
            </a>
        </div>

    </div>

</section>

