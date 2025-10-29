<!-- Features (program) section - matches Figma Frame24 -->
<section id="program" class="bg-white">
    <div class="max-w-[1440px] mx-auto px-8 lg:px-12">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center bg-white py-16">
            <!-- Left collage (2x2 rounded photos like reference) -->
            <div class="flex justify-center lg:justify-start">
                <div class="grid grid-cols-2 w-[400px]">
                    <div class="relative w-full pb-[100%]">
                        <img src="{{ asset('assets/landing/feature-1.jpg') }}" alt="Feature 1"
                            class="absolute inset-0 w-full h-full object-cover rounded-tl-[32px] rounded-br-[32px]">
                    </div>
                    <div class="relative w-full pb-[100%]">
                        <img src="{{ asset('assets/landing/feature-2.jpg') }}" alt="Feature 2"
                            class="absolute inset-0 w-full h-full object-cover rounded-tr-[32px] rounded-bl-[32px]">
                    </div>
                    <div class="relative w-full pb-[100%]">
                        <img src="{{ asset('assets/landing/feature-3.jpg') }}" alt="Feature 3"
                            class="absolute inset-0 w-full h-full object-cover rounded-tr-[32px] rounded-bl-[32px]">
                    </div>
                    <div class="relative w-full pb-[100%]">
                        <img src="{{ asset('assets/landing/feature-4.jpg') }}" alt="Feature 4"
                            class="absolute inset-0 w-full h-full object-cover rounded-tl-[32px] rounded-br-[32px]">
                    </div>
                </div>
            </div>

            <!-- Right text -->
            <div>
                <h2 class="text-2xl lg:text-3xl font-bold text-center lg:text-left text-[#1E40AF]">Program Morn Intern dirancang untuk memberikan pengalaman kerja nyata di dunia industri.</h2>
                <p class="mt-6 text-gray-700 max-w-xl">Selama masa magang, peserta akan:</p>
                <ul class="mt-6 space-y-3 list-none text-gray-700">
                    <li class="flex items-start gap-3"><span class="mt-1 text-[#648DDB]">•</span> Berkolaborasi dengan tim profesional di berbagai bidang.</li>
                    <li class="flex items-start gap-3"><span class="mt-1 text-[#648DDB]">•</span> Mengerjakan proyek nyata yang berdampak.</li>
                    <li class="flex items-start gap-3"><span class="mt-1 text-[#648DDB]">•</span> Mendapatkan bimbingan dari mentor berpengalaman.</li>
                    <li class="flex items-start gap-3"><span class="mt-1 text-[#648DDB]">•</span> Mengembangkan portofolio dan keterampilan kerja.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
{{-- Component: features --}}
<section id="features" class="mt-20 bg-white/60 p-6 rounded-2xl">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="p-6 bg-white rounded-lg shadow">
            <img src="{{ asset('assets/landing/feature-1.jpg') }}" alt="Feature One" class="w-full h-32 object-cover rounded-t-lg mb-4">
            <h3 class="font-semibold">Feature One</h3>
            <p class="mt-2 text-sm text-gray-600">Penjelasan singkat fitur.</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow">
            <img src="{{ asset('assets/landing/feature-2.jpg') }}" alt="Feature Two" class="w-full h-32 object-cover rounded-t-lg mb-4">
            <h3 class="font-semibold">Feature Two</h3>
            <p class="mt-2 text-sm text-gray-600">Penjelasan singkat fitur.</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow">
            <img src="{{ asset('assets/landing/feature-3.jpg') }}" alt="Feature Three" class="w-full h-32 object-cover rounded-t-lg mb-4">
            <h3 class="font-semibold">Feature Three</h3>
            <p class="mt-2 text-sm text-gray-600">Penjelasan singkat fitur.</p>
        </div>
    </div>
</section>