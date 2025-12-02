 

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-white text-[#a6c1ff]">

    
    <?php echo $__env->make('landing.components.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="landing-content">

        
        <?php echo $__env->make('landing.components.hero', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        
        <section class="py-20 bg-white">

            <?php echo $__env->make('landing.components.features', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </section>

        
        <?php echo $__env->make('landing.components.mitra', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        
        <section class="py-20 bg-gradient-to-b from-white to-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                        Lowongan Magang Tersedia
                    </h2>
                    <p class="text-xl text-gray-600">Pilih posisi impianmu dan bergabung bersama kami!</p>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($postingans->count() > 0): ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $postingans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
                                <div class="bg-gradient-to-r from-indigo-600 to-purple-700 p-8 text-white">
                                    <h3 class="text-2xl font-bold mb-3"><?php echo e($post->judul_posisi); ?></h3>
                                    <div class="flex items-center gap-2 text-indigo-100">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="font-medium">
                                            <?php echo e($post->spesialisasi?->nama_spesialisasi ?? 'Umum'); ?>

                                        </span>
                                    </div>
                                </div>

                                <div class="p-8">
                                    <p class="text-gray-700 mb-6 leading-relaxed">
                                        <?php echo e(Str::limit($post->deskripsi, 150)); ?>

                                    </p>

                                    <div class="grid grid-cols-2 gap-4 mb-8">
                                        <div class="text-center bg-gray-50 rounded-xl py-4">
                                            <p class="text-sm text-gray-600">Kuota Tersedia</p>
                                            <p class="text-3xl font-bold text-indigo-600"><?php echo e($post->kuota); ?></p>
                                        </div>
                                        <div class="text-center bg-gray-50 rounded-xl py-4">
                                            <p class="text-sm text-gray-600">Durasi Magang</p>
                                            <p class="text-3xl font-bold text-purple-600"><?php echo e($post->durasi); ?></p>
                                        </div>
                                    </div>

                                    <div class="mt-6">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard('web')->check()): ?>
                                            <!-- Kalau sudah login admin/hrd, langsung ke register peserta (opsional) -->
                                            <a href="<?php echo e(route('filament.admin.resources.peserta-calons.create')); ?>"
                                            class="block w-full text-center bg-gradient-to-r from-green-600 to-emerald-700 text-white font-bold py-4 rounded-xl hover:from-green-700 hover:to-emerald-800 transition shadow-lg">
                                                Daftar untuk Posisi Ini
                                            </a>
                                        <?php else: ?>
                                            <!-- Kalau belum login → popup manis -->
                                            <button type="button" onclick="showLoginModal()"
                                                    class="w-full bg-gradient-to-r from-indigo-600 to-purple-700 text-white font-bold py-4 rounded-xl hover:from-indigo-700 hover:to-purple-800 transition shadow-lg">
                                                Daftar Sekarang
                                            </button>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-20">
                        <div class="bg-gray-200 border-2 border-dashed rounded-xl w-32 h-32 mx-auto mb-8"></div>
                        <h3 class="text-2xl font-semibold text-gray-700 mb-4">Belum Ada Lowongan</h3>
                        <p class="text-lg text-gray-500">Lowongan magang akan segera dibuka. Pantau terus ya!</p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>

        
        <section id="get-started" 
            class="py-10 text-center bg-white text-black">

            <h2 class="text-2xl font-bold mb-3">
                Siap Memulai Karier Profesionalmu?
            </h2>

            <p class="max-w-xl mx-auto text-base opacity-90 leading-relaxed">
                Daftar sekarang dan bergabung dalam program magang MorIntern 
                untuk mendapatkan pengalaman dunia kerja yang sesungguhnya.
            </p>
        </section>

        
        <?php echo $__env->make('landing.components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-60 z-50 items-center justify-center hidden">
            <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-md mx-4 transform scale-95 transition-transform">
                <div class="text-center mb-6">
                    <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">Login Dibutuhkan</h3>
                    <p class="text-gray-600 mt-2">Silahkan login atau daftar akun untuk melamar magang</p>
                </div>
                <div class="space-y-4">
                    <a href="<?php echo e(route('peserta.login')); ?>" 
                    class="block w-full text-center bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
                        Login sebagai Peserta
                    </a>
                    <a href="<?php echo e(route('peserta.register')); ?>" 
                    class="block w-full text-center border-2 border-indigo-600 text-indigo-600 py-3 rounded-lg font-semibold hover:bg-indigo-50 transition">
                        Daftar Akun Baru
                    </a>
                    <button type="button" onclick="hideLoginModal()" 
                            class="w-full text-gray-500 py-2 hover:text-gray-700">
                        Batal
                    </button>
                </div>
            </div>
        </div>

        <script>
            function showLoginModal() {
                document.getElementById('loginModal').classList.remove('hidden');
                document.getElementById('loginModal').classList.add('flex');
            }
            function hideLoginModal() {
                document.getElementById('loginModal').classList.add('hidden');
                document.getElementById('loginModal').classList.remove('flex');
            }
        </script>
    </main>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Document\KULIAH\projectmagang\Morintern\resources\views/landing/landing.blade.php ENDPATH**/ ?>