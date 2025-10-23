{{-- Component: header --}}
<header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex-shrink-0">
                <a href="/" class="text-xl font-bold text-gray-900">MorIntern</a>
            </div>
            <nav class="hidden md:flex items-center space-x-4">
                <a href="#" class="text-gray-900 hover:text-gray-700 px-3 py-2">Home</a>
                <a href="#" class="text-gray-900 hover:text-gray-700 px-3 py-2">Tentang</a>
                <a href="#" class="text-gray-900 hover:text-gray-700 px-3 py-2">Kontak</a>
                <a href="{{ route('login') }}" class="text-gray-900 hover:text-gray-700 px-3 py-2">Masuk</a>
                <a href="{{ route('register') }}" class="bg-[#678DE5] text-white px-4 py-2 rounded-md hover:bg-blue-600">Daftar</a>
            </nav>
        </div>
    </div>
</header>