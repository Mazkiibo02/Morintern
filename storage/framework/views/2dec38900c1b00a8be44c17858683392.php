<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?> - Register</title>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen w-full flex items-center justify-center bg-[#6F8FF9] font-['Plus_Jakarta_Sans'] px-6">

        
        <div class="absolute top-8 left-8">
            <a href="<?php echo e(url('/')); ?>" class="text-white text-2xl font-bold tracking-wide">
                MorIntern
            </a>
        </div>

        
        <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

            
            <div class="flex justify-center">
                <img src="<?php echo e(asset('assets/landing/ilustrasi-register.svg')); ?>"
                     alt="Ilustrasi Register"
                     class="max-w-[450px] h-auto">
            </div>

            
            <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-md mx-auto">

                <div class="text-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Daftar Sebagai HRD</h1>
                    <p class="text-gray-500 text-sm">Buat akun HRD Anda di bawah ini</p>
                </div>

                <form method="POST" action="<?php echo e(route('register')); ?>" class="space-y-4">
                    <?php echo csrf_field(); ?>

                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input 
                            type="text" 
                            name="name" 
                            value="<?php echo e(old('name')); ?>"
                            required
                            placeholder="Masukkan nama lengkap"
                            class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] 
                                   placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 
                                   focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            value="<?php echo e(old('email')); ?>"
                            required
                            placeholder="email@example.com"
                            class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] 
                                   placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 
                                   focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input 
                            type="password" 
                            name="password"
                            required
                            placeholder="Masukkan password"
                            class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] 
                                   placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 
                                   focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                        <input 
                            type="password" 
                            name="password_confirmation"
                            required
                            placeholder="Ulangi password"
                            class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] 
                                   placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 
                                   focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                    </div>

                    
                    <button 
                        type="submit"
                        class="w-full h-12 bg-[#6F8FF9] text-white font-semibold rounded-lg 
                               hover:bg-[#5c77d8] transition shadow">
                        Daftar
                    </button>

                    <p class="text-center text-sm text-gray-600 mt-4">
                        Sudah punya akun?
                        <a href="<?php echo e(route('login')); ?>" class="text-[#6F8FF9] hover:underline">Masuk</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\Document\KULIAH\projectmagang\Morintern\resources\views\Auth\register.blade.php ENDPATH**/ ?>