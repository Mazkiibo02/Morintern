<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?> - Daftar</title>

    
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
                    alt="Register Illustration"
                    class="max-w-[450px] h-auto">
            </div>

            
            <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-md mx-auto">
                
                <div class="text-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Daftar Sebagai Peserta</h1>
                    <p class="text-gray-500 text-sm">
                        Silakan isi data di bawah untuk membuat akun Anda
                    </p>
                </div>

                
                <form method="POST" action="<?php echo e(route('peserta.register')); ?>" class="space-y-4">
                    <?php echo csrf_field(); ?>

                    
                    <div>
                        <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Lengkap
                        </label>
                        <input id="nama_lengkap" 
                            type="text" 
                            name="nama_lengkap" 
                            value="<?php echo e(old('nama_lengkap')); ?>"
                            required 
                            autofocus 
                            autocomplete="name"
                            placeholder="Masukkan nama lengkap"
                            class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['nama_lengkap'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Alamat Email
                        </label>
                        <input id="email" 
                            type="email" 
                            name="email" 
                            value="<?php echo e(old('email')); ?>"
                            required 
                            autocomplete="username"
                            placeholder="contoh@email.com"
                            class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div>
                        <label for="no_telp" class="block text-sm font-medium text-gray-700 mb-1">
                            Nomor Telepon
                        </label>
                        <input id="no_telp" 
                            type="text" 
                            name="no_telp" 
                            value="<?php echo e(old('no_telp')); ?>"
                            required
                            placeholder="08xxxxxxxxxx"
                            class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['no_telp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            Password
                        </label>
                        <input id="password" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="new-password"
                            placeholder="Masukkan password"
                            class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                            Konfirmasi Password
                        </label>
                        <input id="password_confirmation" 
                            type="password" 
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password"
                            placeholder="Konfirmasi password"
                            class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9] text-[#111827] placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div class="pt-2">
                        <button type="submit"
                                class="w-full h-12 bg-[#6F8FF9] hover:bg-[#5D7CE0] text-white font-medium rounded-lg transition-colors duration-200">
                            Daftar
                        </button>
                    </div>

                    
                    <div class="text-center pt-2">
                        <a href="<?php echo e(route('peserta.login')); ?>"
                        class="text-sm text-gray-600 hover:text-[#6F8FF9] transition-colors">
                            Sudah punya akun? <span class="font-semibold">Masuk</span>
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>

<?php /**PATH D:\Document\KULIAH\projectmagang\Morintern\resources\views\peserta\auth\register.blade.php ENDPATH**/ ?>