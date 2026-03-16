<x-layout :title="$title">
    <section
        class="relative overflow-hidden rounded-[2rem] border border-sky-100 bg-white shadow-[0_30px_80px_-35px_rgba(148,163,184,0.45)]">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(253,224,71,0.18),_transparent_28%),radial-gradient(circle_at_80%_20%,_rgba(125,211,252,0.18),_transparent_32%),linear-gradient(135deg,_rgba(255,255,255,0.95),_rgba(240,249,255,0.88)_42%,_rgba(254,249,195,0.55))]">
        </div>
        <div class="relative grid gap-10 px-6 py-10 sm:px-8 lg:grid-cols-[1.2fr_0.8fr] lg:px-12 lg:py-14">
            <div class="min-w-0">
                <span
                    class="inline-flex items-center rounded-full border border-amber-200 bg-amber-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.28em] text-amber-700">
                    New editorial home
                </span>

                <h2
                    class="mt-6 max-w-4xl text-4xl font-black leading-[0.95] tracking-tight text-slate-700 sm:text-5xl lg:text-7xl">
                    Tempat bercerita yang terasa hidup, cepat, dan nyaman dibaca.
                </h2>

                <p class="mt-6 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">
                    Homepage ini saya buat ulang sebagai landing page yang lebih dinamis. Fokusnya bukan sekadar
                    menampilkan daftar post, tetapi membangun suasana editorial yang kuat lalu mengarahkan pembaca ke
                    artikel terbaru dan halaman blog utama.
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-3">
                    <a href="{{ route('blog.index') }}"
                        class="inline-flex items-center rounded-full bg-amber-400 px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-amber-300">
                        Lihat Semua Post
                    </a>
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center rounded-full border border-sky-200 bg-sky-50 px-5 py-3 text-sm font-semibold text-sky-700 shadow-sm transition hover:border-sky-300 hover:bg-sky-100">
                        Masuk ke Dashboard
                    </a>
                </div>

                <div class="mt-10 grid gap-4 sm:grid-cols-3">
                    <div class="rounded-3xl border border-sky-100 bg-sky-50/80 p-4 shadow-sm">
                        <p class="text-xs font-semibold uppercase tracking-[0.22em] text-sky-700">Latest Posts</p>
                        <p class="mt-2 text-3xl font-black text-slate-700">{{ $latestPosts->count() }}</p>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Beberapa tulisan terbaru dipilih langsung untuk
                            tampil di halaman depan.</p>
                    </div>
                    <div class="rounded-3xl border border-amber-100 bg-amber-50/80 p-4 shadow-sm">
                        <p class="text-xs font-semibold uppercase tracking-[0.22em] text-amber-700">Reading Flow</p>
                        <p class="mt-2 text-3xl font-black text-slate-700">Clean</p>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Ruang baca dibuat lega agar headline,
                            ringkasan, dan CTA terasa jelas.</p>
                    </div>
                    <div class="rounded-3xl border border-emerald-100 bg-emerald-50/80 p-4 shadow-sm">
                        <p class="text-xs font-semibold uppercase tracking-[0.22em] text-emerald-700">Publishing</p>
                        <p class="mt-2 text-3xl font-black text-slate-700">Fast</p>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Dari dashboard ke halaman publik, alurnya
                            dibuat singkat dan mudah dipahami.</p>
                    </div>
                </div>
            </div>

            <div class="grid gap-4">
                <div class="rounded-[1.75rem] border border-white bg-white/85 p-5 shadow-sm">
                    <p class="text-xs font-semibold uppercase tracking-[0.24em] text-sky-700">Editorial note</p>
                    <h3 class="mt-3 text-2xl font-black text-slate-700">Homepage ini bukan list biasa.</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        Bagian atas dibuat seperti cover issue: kontras kuat, CTA tegas, dan panel informasi yang terasa
                        lebih seperti magazine landing daripada feed post generik.
                    </p>
                </div>

                <div
                    class="rounded-[1.75rem] border border-amber-100 bg-gradient-to-br from-amber-50 via-white to-sky-50 p-5 shadow-sm">
                    <p class="text-xs font-semibold uppercase tracking-[0.24em] text-amber-700">What you can do</p>
                    <ul class="mt-4 space-y-3 text-sm leading-7 text-slate-600">
                        <li>Tulis artikel baru dari dashboard.</li>
                        <li>Tampilkan avatar author dan kategori dengan identitas yang konsisten.</li>
                        <li>Arahkan pembaca dari homepage ke blog utama tanpa layout terasa berat.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-8">
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500">Fresh reading</p>
                <h3 class="mt-2 text-3xl font-black tracking-tight text-slate-800">Post terbaru yang layak dibuka
                    sekarang.</h3>
            </div>
            <a href="{{ route('blog.index') }}"
                class="inline-flex items-center text-sm font-semibold text-slate-700 transition hover:text-sky-700 hover:underline">
                Lihat post lebih banyak
            </a>
        </div>

        @if ($latestPosts->isNotEmpty())
            <div class="grid gap-6 lg:grid-cols-[1.15fr_0.85fr]">
                @php($featuredPost = $latestPosts->first())
                <article
                    class="relative overflow-hidden rounded-[2rem] border border-sky-100 bg-white p-6 shadow-[0_20px_45px_-35px_rgba(14,165,233,0.35)] transition hover:-translate-y-0.5 hover:shadow-[0_30px_60px_-35px_rgba(14,165,233,0.35)] sm:p-8">
                    <div class="absolute inset-x-0 top-0 h-36 bg-gradient-to-br from-sky-100 via-white to-amber-50">
                    </div>
                    <div class="relative">
                        <div class="flex flex-wrap items-center gap-3 text-sm text-slate-500">
                            <a href="/posts?category={{ $featuredPost->category->slug }}"
                                class="{{ $featuredPost->category->color }} rounded-full border border-current/20 px-3 py-1 text-xs font-semibold">
                                {{ $featuredPost->category->name }}
                            </a>
                            <span>{{ $featuredPost->created_at->diffForHumans() }}</span>
                        </div>

                        <h4
                            class="mt-5 max-w-2xl text-3xl font-black leading-tight tracking-tight text-slate-800 sm:text-4xl">
                            <a href="/posts/{{ $featuredPost->slug }}" class="transition hover:text-slate-700">
                                {{ $featuredPost->title }}
                            </a>
                        </h4>

                        <p class="mt-5 max-w-2xl text-sm leading-8 text-slate-600 sm:text-base">
                            {{ \Illuminate\Support\Str::limit(strip_tags($featuredPost->body), 210) }}
                        </p>

                        <div class="mt-8 flex flex-wrap items-center justify-between gap-4">
                            <a href="/posts?author={{ $featuredPost->author->username }}"
                                class="flex items-center gap-3">
                                <img class="h-11 w-11 rounded-full object-cover"
                                    src="{{ $featuredPost->author->avatar ? asset('storage/' . $featuredPost->author->avatar) : asset('img/sbcf-default-avatar.webp') }}"
                                    alt="{{ $featuredPost->author->name }} avatar" />
                                <div>
                                    <p class="text-sm font-semibold text-slate-800">{{ $featuredPost->author->name }}
                                    </p>
                                    <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Featured writer</p>
                                </div>
                            </a>

                            <a href="/posts/{{ $featuredPost->slug }}"
                                class="inline-flex items-center rounded-full bg-sky-500 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-400">
                                Read article
                            </a>
                        </div>
                    </div>
                </article>

                <div class="grid gap-4">
                    @foreach ($latestPosts->skip(1) as $post)
                        <article
                            class="rounded-[1.5rem] border border-slate-200 bg-gradient-to-br from-white via-sky-50/40 to-amber-50/60 p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-lg">
                            <div
                                class="flex items-center justify-between gap-3 text-xs uppercase tracking-[0.18em] text-slate-500">
                                <span>{{ $post->created_at->diffForHumans() }}</span>
                                <a href="/posts?category={{ $post->category->slug }}"
                                    class="{{ $post->category->color }}">
                                    {{ $post->category->name }}
                                </a>
                            </div>

                            <h4 class="mt-4 text-xl font-black leading-tight text-slate-800">
                                <a href="/posts/{{ $post->slug }}" class="transition hover:text-sky-700">
                                    {{ \Illuminate\Support\Str::limit($post->title, 70) }}
                                </a>
                            </h4>

                            <p class="mt-3 text-sm leading-7 text-slate-600">
                                {{ \Illuminate\Support\Str::limit(strip_tags($post->body), 115) }}
                            </p>

                            <div class="mt-5 flex items-center justify-between gap-3">
                                <a href="/posts?author={{ $post->author->username }}"
                                    class="text-sm font-semibold text-slate-700 hover:underline">
                                    {{ $post->author->name }}
                                </a>
                                <a href="/posts/{{ $post->slug }}"
                                    class="text-sm font-semibold text-slate-700 hover:text-sky-700 hover:underline">
                                    Open
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @else
            <div class="rounded-[2rem] border border-dashed border-slate-300 bg-white px-6 py-12 text-center">
                <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500">No content yet</p>
                <h4 class="mt-3 text-2xl font-black text-slate-800">Belum ada post terbaru untuk ditampilkan.</h4>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    Saat artikel pertama diterbitkan, homepage ini akan langsung menampilkan pilihan post terbaru.
                </p>
                <a href="{{ route('dashboard') }}"
                    class="mt-6 inline-flex items-center rounded-full bg-sky-500 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-400">
                    Buka Dashboard
                </a>
            </div>
        @endif
    </section>

    <section class="mt-8 grid gap-6 lg:grid-cols-3">
        <div class="rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Mood</p>
            <h4 class="mt-3 text-2xl font-black text-slate-800">Editorial, bukan template generik.</h4>
            <p class="mt-4 text-sm leading-7 text-slate-600">
                Kontras terang-gelap, blok informasi yang padat, dan komposisi asimetris membuat homepage terasa lebih
                punya identitas.
            </p>
        </div>

        <div
            class="rounded-[1.75rem] border border-amber-100 bg-gradient-to-br from-amber-50 via-white to-sky-50 p-6 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-amber-700">Purpose</p>
            <h4 class="mt-3 text-2xl font-black text-slate-800">Mengantar pembaca ke konten terbaik lebih cepat.</h4>
            <p class="mt-4 text-sm leading-7 text-slate-600">
                Hero menarik perhatian, latest post memberi konteks, dan CTA `/blog` menjadi jalur utama untuk
                eksplorasi.
            </p>
        </div>

        <div
            class="rounded-[1.75rem] border border-sky-100 bg-gradient-to-br from-sky-50 via-white to-emerald-50 p-6 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-sky-700">Flow</p>
            <h4 class="mt-3 text-2xl font-black text-slate-800">Home, blog, lalu baca post secara natural.</h4>
            <p class="mt-4 text-sm leading-7 text-slate-600">
                Struktur halaman dibuat agar visitor tidak bingung: landing dulu, lihat beberapa post, lalu lanjut ke
                blog penuh saat ingin membaca lebih jauh.
            </p>
        </div>
    </section>
</x-layout>
