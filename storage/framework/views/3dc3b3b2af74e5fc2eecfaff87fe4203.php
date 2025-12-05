<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    
    <div class="fixed inset-0 -z-10 overflow-hidden w-full h-full">
        <img 
            src="<?php echo e(asset('assets/profile/gelombang-profile.svg')); ?>" 
            alt="background waves" 
            class="absolute top-0 right-0 w-[600px] opacity-60 rotate-180 md:rotate-0 object-cover"
        >
        <img 
            src="<?php echo e(asset('assets/profile/gelombang-profile.svg')); ?>" 
            alt="background waves bottom" 
            class="absolute bottom-0 left-0 w-[600px] opacity-60 md:rotate-180 object-cover"
        >
    </div>

    
  

    
    <div class="py-12 relative z-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            
            <?php
                $isPeserta = Auth::guard('peserta_calon')->check();
                $formAction = $isPeserta ? route('peserta.profil.update') : route('profile.update');
                $anggotaBase = $isPeserta ? url('/peserta/profil') : url('/profile');
            ?>
            <form id="formProfilKetua" method="POST" action="<?php echo e($formAction); ?>" enctype="multipart/form-data" 
                class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-200">
                <?php echo csrf_field(); ?>

                
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-gray-800">Profil Magang</h2>
                    <button id="btnPenilaian" type="button" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Penilaian
                    </button>
                </div>

                
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="<?php echo e(old('nama_lengkap', $user->nama_lengkap ?? '')); ?>"
                        class="col-span-2 border border-blue-300 rounded-md focus:ring focus:ring-blue-200 px-3 py-2">
                </div>

                
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Asal Univ</label>
                    <input type="text" name="universitas_id" value="<?php echo e(old('universitas_id', $user->universitas_id ?? '')); ?>"
                        class="col-span-2 border border-blue-300 rounded-md focus:ring focus:ring-blue-200 px-3 py-2">
                </div>

                
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Jurusan</label>
                    <input type="text" name="jurusan_id" value="<?php echo e(old('jurusan_id', $user->jurusan_id ?? '')); ?>"
                        class="col-span-2 border border-blue-300 rounded-md focus:ring focus:ring-blue-200 px-3 py-2">
                </div>

                
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">No Telepon</label>
                    <input type="text" name="no_telp" value="<?php echo e(old('no_telp', $user->no_telp ?? '')); ?>"
                        class="col-span-2 border border-blue-300 rounded-md focus:ring focus:ring-blue-200 px-3 py-2">
                </div>

                
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Email</label>
                    <input type="email" disabled value="<?php echo e($user->email ?? ''); ?>"
                        class="col-span-2 bg-gray-100 border border-gray-300 rounded-md px-3 py-2 cursor-not-allowed">
                </div>

                
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Link Github</label>
                    <input type="text" name="github" value="<?php echo e(old('github', $user->github ?? '')); ?>"
                        class="col-span-2 border border-blue-300 rounded-md focus:ring focus:ring-blue-200 px-3 py-2">
                </div>

                
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">LinkedIn</label>
                    <input type="text" name="linkedin" value="<?php echo e(old('linkedin', $user->linkedin ?? '')); ?>"
                        class="col-span-2 border border-blue-300 rounded-md focus:ring focus:ring-blue-200 px-3 py-2">
                </div>

                
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Tanggal Mulai &<br>Tanggal Selesai</label>
                    <div class="col-span-2 flex items-center gap-2">
                        <input type="date" name="tanggal_mulai" class="border border-blue-300 rounded-md px-3 py-2 flex-1"
                            value="<?php echo e(old('tanggal_mulai', $user->tanggal_mulai?->format('Y-m-d'))); ?>">
                        <span class="text-gray-600">s/d</span>
                        <input type="date" name="tanggal_selesai" class="border border-blue-300 rounded-md px-3 py-2 flex-1"
                            value="<?php echo e(old('tanggal_selesai', $user->tanggal_selesai?->format('Y-m-d'))); ?>">
                    </div>
                </div>

                
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">CV</label>
                    <div class="col-span-2">
                        <input type="file" name="cv" accept=".zip"
                            class="w-full text-sm border border-blue-300 rounded-md px-3 py-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->cv ?? false): ?>
                            <p class="text-sm text-gray-500 mt-1">File saat ini: <?php echo e(basename($user->cv)); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                
                <div class="mb-4 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Surat Lamaran</label>
                    <div class="col-span-2">
                        <input type="file" name="surat" accept=".jpg,.jpeg,.png"
                            class="w-full text-sm border border-blue-300 rounded-md px-3 py-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->surat ?? false): ?>
                            <p class="text-sm text-gray-500 mt-1">File saat ini: <?php echo e(basename($user->surat)); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                
                <div class="mb-6 grid grid-cols-3 gap-4 items-center">
                    <label class="text-gray-700 text-right">Spesialisasi Magang</label>
                    <select name="spesialisasi_id" class="col-span-2 border border-blue-300 rounded-md px-3 py-2">
                        <option value="">-Silahkan Pilih-</option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $spesialisasiOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $nama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($id); ?>" <?php echo e(($user->spesialisasi_id ?? '') == $id ? 'selected' : ''); ?>>
                                <?php echo e($nama); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </select>
                </div>
                
                <div class="mt-10">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-semibold text-gray-800">Daftar Anggota</h2>
                        <button id="btnTambahAnggota" type="button"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            + Tambah Anggota
                        </button>
                    </div>

                    <div id="anggotaContainer" class="space-y-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="border border-blue-300/50 rounded-lg p-6 anggota-item bg-white shadow-sm relative">

                                <!-- Nama Lengkap -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-1">Nama Lengkap</label>
                                    <input type="text" name="anggota[<?php echo e($i); ?>][nama_lengkap]" 
                                        value="<?php echo e($a->nama_lengkap); ?>"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                </div>

                                <!-- Email -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-1">Email</label>
                                    <input type="email" name="anggota[<?php echo e($i); ?>][email]" 
                                        value="<?php echo e($a->email); ?>"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                </div>

                                <!-- No Telepon -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-1">No Telepon</label>
                                        <input type="text" name="anggota[<?php echo e($i); ?>][no_telp]"
                                        value="<?php echo e($a->no_telp); ?>"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                </div>

                                <!-- Spesialisasi -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-1">Spesialisasi Magang</label>
                                    <select name="anggota[<?php echo e($i); ?>][spesialisasi_id]"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                        <option value="">Pilih Spesialisasi</option>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $spesialisasiOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $nama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($id); ?>" <?php echo e($a->spesialisasi_id == $id ? 'selected' : ''); ?>>
                                                <?php echo e($nama); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </select>
                                </div>

                                <!-- GitHub -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-1">GitHub</label>
                                    <input type="text" name="anggota[<?php echo e($i); ?>][github]" 
                                        value="<?php echo e($a->github); ?>"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                </div>

                                <!-- LinkedIn -->
                                <div class="mb-6">
                                    <label class="block text-gray-700 mb-1">LinkedIn</label>
                                    <input type="text" name="anggota[<?php echo e($i); ?>][linkedin]"
                                        value="<?php echo e($a->linkedin); ?>"
                                        class="w-full border border-blue-300 rounded-md px-3 py-2">
                                </div>

                                <!-- Hidden ID -->
                                <input type="hidden" name="anggota[<?php echo e($i); ?>][id]" value="<?php echo e($a->id); ?>">

                                <!-- Tombol Hapus -->
                                <button type="button"
                                    class="btnHapusAnggota absolute top-3 right-3 text-red-600 hover:text-red-800 text-sm">
                                    Hapus
                                </button>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <template id="anggotaTemplate">
                        <div class="border border-blue-300/50 rounded-lg p-6 anggota-item bg-white shadow-sm relative">

                            <!-- Nama Lengkap -->
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" name="anggota[__INDEX__][nama_lengkap]"
                                    class="w-full border border-blue-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-1">Email</label>
                                <input type="email" name="anggota[__INDEX__][email]"
                                    class="w-full border border-blue-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                            </div>

                            <!-- No Telepon -->
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-1">No Telepon</label>
                                <input type="text" name="anggota[__INDEX__][no_telp]"
                                    class="w-full border border-blue-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                            </div>

                            <!-- Spesialisasi -->
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-1">Spesialisasi Magang</label>
                                <select name="anggota[__INDEX__][spesialisasi_id]"
                                    class="w-full border border-blue-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                                    <option value="">Pilih Spesialisasi</option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $spesialisasiOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $nama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>"><?php echo e($nama); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </select>
                            </div>

                            <!-- Github -->
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-1">GitHub</label>
                                <input type="text" name="anggota[__INDEX__][github]"
                                    placeholder="https://github.com/username"
                                    class="w-full border border-blue-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                            </div>

                            <!-- LinkedIn -->
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-1">LinkedIn</label>
                                <input type="text" name="anggota[__INDEX__][linkedin]"
                                    placeholder="https://linkedin.com/in/username"
                                    class="w-full border border-blue-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                            </div>

                            <!-- tombol hapus -->
                            <button type="button"
                                class="hapusBaru absolute top-3 right-3 text-red-600 hover:text-red-800 text-sm">
                                Hapus
                            </button>

                        </div>
                    </template>
                </div>
                
                <div class="flex justify-end pt-4 border-t mt-8">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Simpan
                    </button>
                </div>

            </form>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
            <div id="successModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                <div class="bg-white rounded-lg shadow-lg w-11/12 max-w-md p-6">
                    <h3 class="text-lg font-semibold">Data Berhasil Disimpan</h3>
                    <p class="mt-2 text-gray-600"><?php echo e(session('success')); ?></p>
                    <div class="mt-6 flex justify-end">
                        <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded-md" onclick="document.getElementById('successModal').remove()">Tutup</button>
                    </div>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <!-- Penilaian Modal -->
            <div id="penilaianModal" class="hidden fixed inset-0 z-50 flex items-center justify-center" role="dialog" aria-modal="true" aria-labelledby="penilaianTitle">
                <div class="absolute inset-0 bg-black/50" id="penilaianOverlay" aria-hidden="true"></div>
                <div class="relative bg-white rounded-lg shadow-lg w-11/12 max-w-3xl p-6 z-10" tabindex="-1">
                    <div class="flex items-start justify-between mb-4">
                        <h3 id="penilaianTitle" class="text-lg font-semibold">Penilaian Magang</h3>
                        <button id="btnClosePenilaian" class="text-gray-500 hover:text-gray-800">Tutup</button>
                    </div>
                    <div id="penilaianContent" class="space-y-4 max-h-[60vh] overflow-auto">
                        <p class="text-sm text-gray-500">Memuat data penilaian...</p>
                    </div>
                </div>
            </div>

            
            
            <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Hapus Akun</h3>
                <div class="border-t border-gray-200 pt-4">
                    <?php if ($__env->exists('profile.partials.delete-user-form')) echo $__env->make('profile.partials.delete-user-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

        </div>
    </div>

    
    <?php $__env->startPush('scripts'); ?>
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const btnTambah = document.getElementById("btnTambahAnggota");
        const container = document.getElementById("anggotaContainer");
        const templateEl = document.getElementById("anggotaTemplate");
        const template = templateEl ? templateEl.innerHTML : '';
        const anggotaBase = "<?php echo e($anggotaBase); ?>";
        let index = <?php echo e(count($anggota)); ?>;

        if (btnTambah && template) {
            btnTambah.addEventListener("click", () => {
                let html = template.replace(/__INDEX__/g, index++);
                container.insertAdjacentHTML("beforeend", html);
            });
        }

        // Penilaian popup handling
        const btnPenilaian = document.getElementById('btnPenilaian');
        const penilaianModal = document.getElementById('penilaianModal');
        const penilaianOverlay = document.getElementById('penilaianOverlay');
        const btnClosePenilaian = document.getElementById('btnClosePenilaian');
        const penilaianContent = document.getElementById('penilaianContent');

        let _penilaianKeyHandler = null;
        function closePenilaian() {
            if (!penilaianModal) return;
            penilaianModal.classList.add('hidden');
            if (penilaianContent) penilaianContent.innerHTML = '';
            document.body.classList.remove('overflow-hidden');
            if (typeof _penilaianKeyHandler === 'function') {
                document.removeEventListener('keydown', _penilaianKeyHandler);
                _penilaianKeyHandler = null;
            }
            if (btnPenilaian) btnPenilaian.focus();
            if (btnPenilaian) btnPenilaian.disabled = false;
        }

        function renderFileHtml(fileUrl) {
            if (!fileUrl) return '';
            const ext = fileUrl.split('.').pop().toLowerCase();
            const imageExt = ['jpg','jpeg','png','gif','webp'];
            if (imageExt.includes(ext)) {
                return `<img src="${fileUrl}" alt="Hasil Penilaian" class="max-w-full max-h-96 rounded-md border"/>`;
            }
            return `<a href="${fileUrl}" target="_blank" class="text-blue-600 underline">Lihat file penilaian</a>`;
        }

        if (btnPenilaian) {
            btnPenilaian.addEventListener('click', (e) => {
                e.preventDefault();
                btnPenilaian.disabled = true;
                if (penilaianContent) penilaianContent.innerHTML = '<p class="text-sm text-gray-500">Memuat data penilaian...</p>';
                if (penilaianModal) penilaianModal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
                const modalContainer = penilaianModal ? penilaianModal.querySelector('[tabindex="-1"]') : null;
                if (modalContainer) modalContainer.focus();

                _penilaianKeyHandler = function (ev) {
                    if (ev.key === 'Escape' || ev.key === 'Esc') {
                        closePenilaian();
                    }
                };
                document.addEventListener('keydown', _penilaianKeyHandler);

                fetch(`${anggotaBase}/penilaian`, { headers: { 'Accept': 'application/json' } })
                .then(r => r.json())
                .then(json => {
                    if (!json.success) {
                        if (penilaianContent) penilaianContent.innerHTML = `<p class="text-sm text-red-500">${json.message || 'Gagal memuat penilaian.'}</p>`;
                        return;
                    }
                    const data = json.data || [];
                    if (data.length === 0) {
                        if (penilaianContent) penilaianContent.innerHTML = '<p class="text-sm text-gray-600">Belum ada penilaian untuk Anda.</p>';
                        return;
                    }
                    if (penilaianContent) {
                        penilaianContent.innerHTML = data.map(d => {
                            return `
                            <div class="border p-4 rounded-md">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="text-sm text-gray-700 font-medium">${d.nama}</div>
                                    <div class="text-sm text-gray-600">Nilai: <span class="font-semibold">${d.nilai_rata_rata ?? '-'}</span></div>
                                </div>
                                <div class="mb-2 text-sm text-gray-700">${d.masukan ? d.masukan : '<span class="text-gray-500">(Tidak ada masukan)</span>'}</div>
                                <div>${renderFileHtml(d.file_url)}</div>
                            </div>`;
                        }).join('<div class="h-2"></div>');
                    }
                })
                .catch(err => {
                    console.error(err);
                    if (penilaianContent) penilaianContent.innerHTML = '<p class="text-sm text-red-500">Terjadi kesalahan saat memuat penilaian.</p>';
                })
                .finally(() => { btnPenilaian.disabled = false; });
            });
        }

        if (btnClosePenilaian) btnClosePenilaian.addEventListener('click', closePenilaian);
        if (penilaianOverlay) penilaianOverlay.addEventListener('click', closePenilaian);

        if (container) {
            container.addEventListener('click', (e) => {
                const target = e.target;
                if (target.classList.contains('btnHapusAnggota')) {
                    const item = target.closest('.anggota-item');
                    if (!item) return;
                    const idInput = item.querySelector('input[name$="[id]"]');
                    if (idInput && idInput.value) {
                        const anggotaId = idInput.value;
                        if (!confirm('Hapus anggota ini?')) return;
                        fetch(`${anggotaBase}/anggota/${anggotaId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            },
                        })
                        .then(r => r.json())
                        .then(json => {
                            if (json.success) item.remove();
                            else alert(json.message || 'Gagal menghapus anggota.');
                        })
                        .catch(err => { console.error(err); alert('Terjadi kesalahan saat menghapus anggota.'); });
                    } else {
                        item.remove();
                    }
                }
                if (target.classList.contains('hapusBaru')) {
                    const item = target.closest('.anggota-item');
                    if (item) item.remove();
                }
            });
        }
    });
    </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH D:\Document\KULIAH\projectmagang\Morintern\resources\views/profile/edit.blade.php ENDPATH**/ ?>