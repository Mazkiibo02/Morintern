<div>
    <!-- Grid Card -->
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($postings as $posting)
                <div class="bg-white shadow-md rounded-xl p-6 flex flex-col gap-4">
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold mb-3">{{ $posting->judul_posisi }}</h3>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ Str::limit($posting->deskripsi, 100) }}</p>

                        <div class="flex items-center gap-4 text-xs mb-4">
                            <span>Kuota: <strong>{{ $posting->kuota }}</strong></span>
                            <span>Durasi: <strong>{{ $posting->durasi }}</strong></span>
                        </div>

                        @if($posting->spesialisasi)
                            <div class="text-xs text-gray-500 mb-4">
                                Spesialisasi: {{ $posting->spesialisasi->nama_spesialisasi }}
                            </div>
                        @endif
                    </div>

                    <div class="mt-auto">
                        <a href="{{ route('peserta.register') }}"
                           class="w-full bg-[#6D8ED0] text-white px-4 py-2 rounded-lg font-semibold text-center hover:bg-[#5b78b8] transition block">
                            Daftar
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">Belum Ada Lowongan</p>
                    <p class="text-sm text-gray-400 mt-2">Lowongan magang akan segera dibuka. Pantau terus halaman ini!</p>
                </div>
            @endforelse
        </div>

        <!-- Show More/Less Button -->
        @if($allPostings->count() > 3)
            <div class="flex justify-center mt-8">
                <button wire:click="toggleShowAll"
                        class="bg-[#6D8ED0] text-white px-6 py-3 rounded-full font-semibold hover:bg-[#5b78b8] transition">
                    {{ $showAll ? 'Tampilkan Lebih Sedikit' : 'Lihat Semua Lowongan' }}
                </button>
            </div>
        @endif
    </div>
</div>
