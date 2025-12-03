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

    <div class="min-h-screen w-full flex items-center justify-center bg-[#6F8FF9] px-6">

        
        <div class="absolute top-8 left-8">
            <a href="<?php echo e(url('/')); ?>" class="text-2xl font-bold tracking-tight">
                <span class="text-white">Mor</span>
                <span class="text-[#6F8FF9] bg-white px-1 rounded">Intern</span>
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
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Masuk ke Akun HRD</h1>
                    <p class="text-gray-500 text-sm">
                        Silakan masukkan kredensial Anda untuk melanjutkan
                    </p>
                </div>

                
                <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-4">
                    <?php echo csrf_field(); ?>

                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Email
                        </label>
                        <div class="relative">
                            <i data-feather="mail" class="absolute left-3 top-3.5 w-5 h-5 text-gray-400"></i>
                            <input id="email" type="email" name="email"
                                class="w-full h-12 pl-10 pr-4 rounded-lg border border-[#D9D9D9]
                                       focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9]/20"
                                placeholder="email@example.com"
                                required autocomplete="username">
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
                            <i data-feather="lock" class="absolute left-3 top-3.5 w-5 h-5 text-gray-400"></i>
                            <input id="password" type="password" name="password"
                                class="w-full h-12 pl-10 pr-12 rounded-lg border border-[#D9D9D9]
                                       focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9]/20"
                                placeholder="Masukkan password"
                                required autocomplete="current-password">

                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i data-feather="eye" id="eyeIcon" class="w-5 h-5 text-gray-400"></i>
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

                    
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 text-sm text-gray-600">
                            <input type="checkbox" name="remember" class="rounded border-gray-300">
                            Ingat saya
                        </label>
                    </div>

                    
                    <button type="submit"
                        class="w-full h-12 rounded-lg bg-[#6F8FF9] text-white font-semibold
                            hover:bg-[#5a7be0] transition">
                        Masuk
                    </button>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Route::has('register')): ?>
                    <p class="text-sm text-gray-600 dark:text-gray-400 text-center mt-4">
                        <?php echo e(__('Belum punya akun?')); ?>

                        <a href="<?php echo e(route('register')); ?>"
                            class="font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                            <?php echo e(__('Daftar Sekarang')); ?>

                        </a>
                    </p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="text-center">
                            <a href="<?php echo e(route('password.request')); ?>" 
                            class="text-sm text-gray-500 hover:text-[#6F8FF9] transition-colors">
                                Lupa Kata Sandi?
                            </a>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        feather.replace();

        document.getElementById("togglePassword").addEventListener("click", () => {
            const input = document.getElementById("password");
            const icon = document.getElementById("eyeIcon");
            const type = input.type === "password" ? "text" : "password";
            input.type = type;
            icon.dataset.feather = type === "password" ? "eye" : "eye-off";
            feather.replace();
        });
    </script>

</body>
</html>
<?php /**PATH D:\Document\KULIAH\projectmagang\Morintern\resources\views/auth/login.blade.php ENDPATH**/ ?>