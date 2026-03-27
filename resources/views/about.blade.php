<x-layout :title="$title">
    <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm sm:p-8 lg:p-10">
        <div class="max-w-3xl">
            <span
                class="inline-flex items-center rounded-full border border-sky-200 bg-sky-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.24em] text-sky-700">
                About this space
            </span>
            <h2 class="mt-4 text-4xl font-black tracking-tight text-slate-800 sm:text-5xl">
                RaflyBlog dibuat sebagai ruang menulis yang sederhana, bersih, dan mudah dipakai.
            </h2>
            <p class="mt-5 text-base leading-8 text-slate-600 sm:text-lg">
                Halaman ini menjelaskan ide di balik project ini: tempat untuk menulis, mengelola, dan menampilkan post
                dengan alur yang ringan. Fokus utamanya bukan dekorasi berlebihan, tapi pengalaman membaca dan mengelola
                konten yang jelas.
            </p>
        </div>
    </section>

    <section class="mt-8 grid gap-6 lg:grid-cols-3">
        <article class="rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Purpose</p>
            <h3 class="mt-3 text-2xl font-black text-slate-800">Blog personal yang rapi.</h3>
            <p class="mt-4 text-sm leading-7 text-slate-600">
                Menyediakan tempat untuk menampilkan tulisan dengan struktur author, category, dan detail post yang
                mudah dipahami oleh pembaca.
            </p>
        </article>

        <article class="rounded-[1.5rem] border border-amber-100 bg-amber-50/70 p-6 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-amber-700">Approach</p>
            <h3 class="mt-3 text-2xl font-black text-slate-800">Tampilan ringan, alur cepat.</h3>
            <p class="mt-4 text-sm leading-7 text-slate-600">
                Antarmuka dibuat cukup modern namun tetap hemat elemen, supaya homepage, blog, dan dashboard terasa
                saling terhubung.
            </p>
        </article>

        <article class="rounded-[1.5rem] border border-sky-100 bg-sky-50/70 p-6 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-sky-700">Workflow</p>
            <h3 class="mt-3 text-2xl font-black text-slate-800">Tulis, edit, lalu tampilkan.</h3>
            <p class="mt-4 text-sm leading-7 text-slate-600">
                Dashboard dipakai untuk mengelola post, sedangkan halaman publik fokus menampilkan konten secara nyaman
                untuk dibaca.
            </p>
        </article>
    </section>

    <section class="mt-8 grid gap-6 lg:grid-cols-[1.1fr_0.9fr]">
        <div class="rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">What you will find</p>
            <div class="mt-5 space-y-5">
                <div class="rounded-2xl border border-slate-100 bg-slate-50/70 p-4">
                    <h4 class="text-lg font-bold text-slate-800">Homepage</h4>
                    <p class="mt-2 text-sm leading-7 text-slate-600">
                        Halaman depan yang berfungsi sebagai pengantar, menampilkan post terbaru dan arah eksplorasi ke
                        blog utama.
                    </p>
                </div>
                <div class="rounded-2xl border border-slate-100 bg-slate-50/70 p-4">
                    <h4 class="text-lg font-bold text-slate-800">Blog & Single Post</h4>
                    <p class="mt-2 text-sm leading-7 text-slate-600">
                        Daftar artikel dan halaman detail post yang menjaga kenyamanan baca lewat card, spacing, dan
                        typography yang rapi.
                    </p>
                </div>
                <div class="rounded-2xl border border-slate-100 bg-slate-50/70 p-4">
                    <h4 class="text-lg font-bold text-slate-800">Dashboard</h4>
                    <p class="mt-2 text-sm leading-7 text-slate-600">
                        Area internal untuk mengelola konten, melihat daftar post, dan melakukan perubahan tanpa alur
                        yang rumit.
                    </p>
                </div>
            </div>
        </div>

        <div
            class="rounded-[1.75rem] border border-slate-200 bg-gradient-to-br from-white via-sky-50 to-amber-50 p-6 shadow-sm sm:p-8">
            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Simple timeline</p>
            <div class="mt-6 space-y-5">
                <div class="flex gap-4">
                    <div class="mt-1 h-3 w-3 rounded-full bg-sky-400"></div>
                    <div>
                        <h4 class="text-base font-bold text-slate-800">Mulai dari ide</h4>
                        <p class="mt-1 text-sm leading-7 text-slate-600">
                            Konten lahir dari headline dan body yang kemudian dirapikan di dashboard.
                        </p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="mt-1 h-3 w-3 rounded-full bg-amber-400"></div>
                    <div>
                        <h4 class="text-base font-bold text-slate-800">Masuk ke struktur</h4>
                        <p class="mt-1 text-sm leading-7 text-slate-600">
                            Author, category, dan slug membuat setiap post lebih mudah dikelola.
                        </p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="mt-1 h-3 w-3 rounded-full bg-emerald-400"></div>
                    <div>
                        <h4 class="text-base font-bold text-slate-800">Tampil ke publik</h4>
                        <p class="mt-1 text-sm leading-7 text-slate-600">
                            Konten disajikan melalui home, blog, dan halaman detail dengan pengalaman baca yang lebih
                            bersih.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
