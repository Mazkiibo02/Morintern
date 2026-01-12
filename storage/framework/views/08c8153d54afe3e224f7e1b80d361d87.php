<?php if (isset($component)) { $__componentOriginal755230460fd16c04121658d92fbf99f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal755230460fd16c04121658d92fbf99f7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-heading','data' => ['title' => 'Program MorIntern dirancang untuk memberikan pengalaman kerja nyata di dunia industri.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Program MorIntern dirancang untuk memberikan pengalaman kerja nyata di dunia industri.']); ?>
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
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <!-- Left Image Collage -->
            <div class="flex justify-center lg:justify-start">
                <div class="grid grid-cols-2 gap-4 w-[420px]">

                    <div class="relative w-full pb-[100%] shadow-lg rounded-3xl overflow-hidden">
                        <img src="<?php echo e(asset('assets/landing/feature-1.jpg')); ?>"
                             class="absolute inset-0 w-full h-full object-cover">
                    </div>

                    <div class="relative w-full pb-[100%] shadow-lg rounded-3xl overflow-hidden">
                        <img src="<?php echo e(asset('assets/landing/feature-2.jpg')); ?>"
                             class="absolute inset-0 w-full h-full object-cover">
                    </div>

                    <div class="relative w-full pb-[100%] shadow-lg rounded-3xl overflow-hidden">
                        <img src="<?php echo e(asset('assets/landing/feature-3.jpg')); ?>"
                             class="absolute inset-0 w-full h-full object-cover">
                    </div>

                    <div class="relative w-full pb-[100%] shadow-lg rounded-3xl overflow-hidden">
                        <img src="<?php echo e(asset('assets/landing/feature-4.jpg')); ?>"
                             class="absolute inset-0 w-full h-full object-cover">
                    </div>

            </div>
        </div>

        <!-- Right Text Content -->
        <div class="lg:pl-12">
            <p class="text-gray-600 max-w-lg leading-relaxed">
                Selama masa magang, peserta akan mendapatkan kombinasi pengalaman praktis
                dan bimbingan yang meningkatkan kesiapan karier.
            </p>

            <ul class="mt-8 space-y-4">
                <li class="flex items-start gap-4">
                    <div class="mt-1 w-3 h-3 rounded-full bg-[#648DDB]"></div>
                    <span class="text-gray-700">
                        Berkolaborasi dengan tim profesional lintas divisi.
                    </span>
                </li>

                <li class="flex items-start gap-4">
                    <div class="mt-1 w-3 h-3 rounded-full bg-[#648DDB]"></div>
                    <span class="text-gray-700">
                        Mengembangkan proyek nyata yang memberikan dampak langsung.
                    </span>
                </li>

                <li class="flex items-start gap-4">
                    <div class="mt-1 w-3 h-3 rounded-full bg-[#648DDB]"></div>
                    <span class="text-gray-700">
                        Mendapatkan bimbingan dari mentor berpengalaman.
                    </span>
                </li>

                <li class="flex items-start gap-4">
                    <div class="mt-1 w-3 h-3 rounded-full bg-[#648DDB]"></div>
                    <span class="text-gray-700">
                        Membangun portofolio profesional dan skill yang relevan industri.
                    </span>
                </li>
            </ul>
        </div>

    </div>
</div>
<?php /**PATH D:\Document\KULIAH\projectmagang\Morintern\resources\views/landing/components/features.blade.php ENDPATH**/ ?>