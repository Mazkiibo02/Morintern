 

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-white text-[#a6c1ff]">

    
    <?php echo $__env->make('landing.components.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="landing-content">

        
        <?php echo $__env->make('landing.components.hero', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        
        <section class="py-20 bg-white">

            <?php echo $__env->make('landing.components.features', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </section>

        
        <?php echo $__env->make('landing.components.mitra', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        
        <section id="lowongan" class="py-16 bg-white-50 border-t">
            <?php echo $__env->make('landing.components.jobs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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

    </main>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Document\KULIAH\projectmagang\Morintern\resources\views/landing/landing.blade.php ENDPATH**/ ?>