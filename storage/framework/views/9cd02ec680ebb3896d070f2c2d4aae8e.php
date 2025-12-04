<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Reset Password - <?php echo e(config('app.name')); ?></title>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
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

        
        <div class="bg-white rounded-lg shadow-md p-8 w-full max-w-md">

            
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Reset Password</h1>
                <p class="text-gray-500 text-sm">
                    Buat kata sandi baru yang aman dan berbeda dari sebelumnya.
                </p>
            </div>

            
            <form method="POST" action="<?php echo e(route('peserta.password.store')); ?>" class="space-y-4">
                <?php echo csrf_field(); ?>

                
                <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">

                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email
                    </label>
                    <input id="email" type="email" name="email"
                        value="<?php echo e(old('email', $request->email)); ?>" required autofocus
                        class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9]
                            text-gray-900 placeholder-gray-400
                            focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9]/20 transition">
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
                        Kata Sandi Baru
                    </label>
                    <input id="password" type="password" name="password" required
                        class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9]
                            focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9]/20 transition">
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
                        Konfirmasi Kata Sandi
                    </label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full h-12 px-4 rounded-lg border border-[#D9D9D9]
                            focus:border-[#6F8FF9] focus:ring-2 focus:ring-[#6F8FF9]/20 transition">
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

                
                <button type="submit"
                    class="w-full bg-[#6F8FF9] text-white py-3 rounded-lg font-semibold
                        hover:bg-[#5A79E6] transition shadow-md">
                    Perbarui Kata Sandi
                </button>

            </form>
        </div>

    </div>

</body>
</html>
<?php /**PATH D:\Document\KULIAH\projectmagang\Morintern\resources\views\peserta\auth\reset-password.blade.php ENDPATH**/ ?>