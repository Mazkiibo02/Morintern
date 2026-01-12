<?php if (isset($component)) { $__componentOriginal755230460fd16c04121658d92fbf99f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal755230460fd16c04121658d92fbf99f7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-heading','data' => ['title' => 'PERGURUAN TINGGI MITRA','subtitle' => 'MORBIS melalui MORINTERN berkolaborasi dengan berbagai Perguruan Tinggi di Indonesia untuk memberikan pengalaman magang berbasis proyek nyata. Melalui kerja sama ini, mahasiswa tidak hanya belajar teori, tetapi juga mengasah keterampilan teknis dan soft skill langsung dari industri.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'PERGURUAN TINGGI MITRA','subtitle' => 'MORBIS melalui MORINTERN berkolaborasi dengan berbagai Perguruan Tinggi di Indonesia untuk memberikan pengalaman magang berbasis proyek nyata. Melalui kerja sama ini, mahasiswa tidak hanya belajar teori, tetapi juga mengasah keterampilan teknis dan soft skill langsung dari industri.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $attributes = $__attributesOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__attributesOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal755230460fd16c04121658d92fbf99f7)): ?>
<?php $component = $__componentOriginal755230460fd16c04121658d92fbf99f7; ?>
<?php unset($__componentOriginal755230460fd16c04121658d92fbf99f7); ?>
<?php endif; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
                <img src="<?php echo e(asset('assets/landing/mitra-foto.png')); ?>"
                     class="rounded-xl shadow-xl w-full max-w-xl object-cover">
            </div>
        </div>

        <!-- DATA UNIVERSITAS -->
        <?php
            $universitas = [
                ['nama' => 'ITB', 'logo' => 'itb.png'],
                ['nama' => 'AMIKOM', 'logo' => 'amikom.png'],
                ['nama' => 'UGM', 'logo' => 'ugm.jpg'],
                ['nama' => 'UHN', 'logo' => 'harkat.png'],
                ['nama' => 'UNNES', 'logo' => 'unesa.jpg'],
                ['nama' => 'UNDIP', 'logo' => 'undip.png'],
                ['nama' => 'UI', 'logo' => 'ui.png'],
            ];
        ?>

        <!-- LOGO UNIVERSITAS (INFINITE SCROLL) -->
        <div class="w-full overflow-hidden mt-20">

            <!-- ANIMASI -->
            <style>
                @keyframes scroll-univ {
                    0%   { transform: translateX(0); }
                    100% { transform: translateX(-50%); }
                }
            </style>

            <div class="flex gap-10 py-4 animate-[scroll-univ_30s_linear_infinite] whitespace-nowrap">

                <!-- LOOP 1 -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $universitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-col items-center shrink-0 w-44">

                        <!-- LOGO -->
                        <div class="w-28 h-28 bg-white rounded-full shadow-lg flex items-center justify-center">
                            <img src="<?php echo e(asset('assets/landing/univ/' . $u['logo'])); ?>"
                                 class="w-20 h-20 object-contain">
                        </div>

                        <!-- NAMA UNIVERSITAS -->
                        <p class="mt-3 text-gray-700 font-semibold text-center leading-snug text-sm max-w-[140px] break-words">
                            <?php echo e($u['nama']); ?>

                        </p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <!-- LOOP 2 (duplikasi untuk infinite scroll) -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $universitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-col items-center shrink-0 w-44">

                        <div class="w-28 h-28 bg-white rounded-full shadow-lg flex items-center justify-center">
                            <img src="<?php echo e(asset('assets/landing/univ/' . $u['logo'])); ?>"
                                 class="w-20 h-20 object-contain">
                        </div>

                        <p class="mt-3 text-gray-700 font-semibold text-center leading-snug text-sm max-w-[140px] break-words">
                            <?php echo e($u['nama']); ?>

                        </p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

    </div>
</div>
<?php /**PATH D:\Document\KULIAH\projectmagang\Morintern\resources\views/landing/components/mitra.blade.php ENDPATH**/ ?>