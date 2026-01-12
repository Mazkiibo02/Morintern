<div>
    <!-- Grid Card -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $postings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl overflow-hidden transition-all duration-300 transform hover:-translate-y-1">
                    
                    <div class="bg-gradient-to-r from-[#6D8ED0] to-[#5a7bb8] p-6 text-white">
                        <h3 class="text-xl font-bold mb-3 line-clamp-2">
                            <?php echo e($posting->judul_posisi); ?>

                        </h3>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-white/90 font-medium truncate">
                                <?php echo e($posting->spesialisasi?->nama_spesialisasi ?? 'Umum'); ?>

                            </span>
                        </div>
                    </div>

                    
                    <div class="p-6">
                        <p class="text-gray-700 leading-relaxed mb-6 line-clamp-3">
                            <?php echo e(Str::limit($posting->deskripsi, 120)); ?>

                        </p>

                        
                        <div class="flex items-center gap-3 mb-6">
                            <div class="bg-[#6D8ED0]/10 rounded-lg px-3 py-2 text-center">
                                <p class="text-xs text-gray-600">Kuota</p>
                                <p class="text-lg font-bold text-[#6D8ED0]">
                                    <?php echo e($posting->kuota); ?>

                                </p>
                            </div>
                            <div class="bg-[#6D8ED0]/10 rounded-lg px-3 py-2 text-center">
                                <p class="text-xs text-gray-600">Durasi</p>
                                <p class="text-lg font-bold text-[#6D8ED0]">
                                    <?php echo e($posting->durasi); ?> bulan
                                </p>
                            </div>
                        </div>

                        
                        <a href="<?php echo e(route('peserta.register')); ?>"
                           class="w-full bg-[#6D8ED0] text-white font-semibold py-3 rounded-lg hover:bg-[#5b78b8] transition block text-center">
                            Daftar
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">Belum Ada Lowongan</p>
                    <p class="text-sm text-gray-400 mt-2">Lowongan magang akan segera dibuka. Pantau terus halaman ini!</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Show More/Less Button -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($allPostings->count() > 3): ?>
            <div class="flex justify-center mt-8">
                <button wire:click="toggleShowAll"
                        class="bg-[#6D8ED0] text-white px-6 py-3 rounded-full font-semibold hover:bg-[#5b78b8] transition">
                    <?php echo e($showAll ? 'Tampilkan Lebih Sedikit' : 'Lihat Semua Lowongan'); ?>

                </button>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH D:\Document\KULIAH\projectmagang\Morintern\resources\views/livewire/job-postings.blade.php ENDPATH**/ ?>