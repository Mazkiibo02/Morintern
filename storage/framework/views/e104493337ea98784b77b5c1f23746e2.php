<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?> - Login</title>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    
    <script src="https://unpkg.com/feather-icons"></script>

    
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
            <a href="<?php echo e(url('/')); ?>" class="text-2xl font-bold tracking-tight">
                <span class="text-white">Mor</span><span class="text-[#6F8FF9] bg-white px-1 rounded">Intern</span>
            </a>
        </div>

        
        <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            
            
            <div class="flex justify-center items-center">
                <img src="<?php echo e(asset('assets/landing/illustrasi-login.png')); ?>" 
                    alt="Login Illustration"
                    class="max-w-[450px] h-auto">
            </div>

            
            <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-md mx-auto">
                
                <div class="text-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Masuk ke Akun Anda</h1>
                    <p class="text-gray-500 text-sm">
                        Silakan masukkan kredensial Anda untuk melanjutkan
                    </p>
                </div>

                
                <form method="POST" action="<?php echo e(route('peserta.login')); ?>" class="space-y-4">
                    <?php echo csrf_field(); ?>

                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-feather="mail" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input id="email" 
                                type="email" 
                                name="email" 
                                value="<?php echo e(old('email')); ?>"
                                required 
                                autofocus 
                                autocomplete="username"
                                placeholder="contoh@email.com"
                                class="w-full h-12 pl-10 pr-4 rounded-lg border border-[#D9D9D9] text-[#111827] placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                        </div>
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
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-feather="lock" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input id="password" 
                                type="password" 
                                name="password" 
                                required 
                                autocomplete="current-password"
                                placeholder="Masukkan password"
                                class="w-full h-12 pl-10 pr-12 rounded-lg border border-[#D9D9D9] text-[#111827] placeholder-[#6B7280] focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9] focus:ring-opacity-20 transition">
                            <button type="button" 
                                    id="togglePassword"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i data-feather="eye" id="eyeIcon" class="w-5 h-5 text-gray-400 hover:text-gray-600 transition"></i>
                            </button>
                        </div>
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

                    
                    <div class="flex items-center">
                        <input id="remember_me" 
                            type="checkbox" 
                            name="remember" 
                            class="h-4 w-4 text-[#6F8FF9] focus:ring-[#6F8FF9] border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                            Ingat saya
                        </label>
                    </div>

                    
                    <div class="pt-2">
                        <button type="submit"
                                class="w-full h-12 bg-[#6F8FF9] hover:bg-[#5D7CE0] text-white font-medium rounded-lg transition-colors duration-200">
                            Masuk
                        </button>
                    </div>

                    
                    <div class="space-y-2 pt-2">
                        <div class="text-center">
                            <a href="<?php echo e(route('peserta.register')); ?>"
                            class="text-sm text-gray-600 hover:text-[#6F8FF9] transition-colors">
                                Belum Punya Akun? <span class="font-semibold">Daftar Disini</span>
                            </a>
                        </div>
                        <div class="text-center">
                            <a href="<?php echo e(route('peserta.password.request')); ?>"
                            class="text-sm text-gray-500 hover:text-[#6F8FF9] transition-colors">
                                Lupa Kata Sandi?
                            </a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    
    <script>
        // Initialize Feather Icons
        feather.replace();

        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function() {
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle the icon
            const iconName = type === 'password' ? 'eye' : 'eye-off';
            eyeIcon.setAttribute('data-feather', iconName);
            feather.replace();
        });
    </script>
</body>
</html><?php /**PATH D:\Document\KULIAH\projectmagang\Morintern\resources\views/peserta/auth/login.blade.php ENDPATH**/ ?>