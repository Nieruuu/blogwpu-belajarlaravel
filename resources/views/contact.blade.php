<x-layout :title="$title">
    <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm sm:p-8 lg:p-10">
        <div class="max-w-3xl">
            <span
                class="inline-flex items-center rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.24em] text-emerald-700">
                Contact
            </span>
            <h2 class="mt-4 text-4xl font-black tracking-tight text-slate-800 sm:text-5xl">
                Hubungi kami lewat jalur yang sederhana dan langsung.
            </h2>
            <p class="mt-5 text-base leading-8 text-slate-600 sm:text-lg">
                Halaman ini dibuat untuk memberi gambaran cara menghubungi project ini. Tidak dibuat rumit, cukup
                dengan blok informasi yang jelas, form sederhana, dan beberapa jawaban singkat untuk pertanyaan umum.
            </p>
        </div>
    </section>

    <section class="mt-8 grid gap-6 lg:grid-cols-[0.9fr_1.1fr]">
        <div class="space-y-6">
            <article class="rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Contact info</p>
                <div class="mt-5 space-y-4">
                    <div class="rounded-2xl border border-slate-100 bg-slate-50/70 p-4">
                        <p class="text-sm font-semibold text-slate-800">Email</p>
                        <p class="mt-1 text-sm text-slate-600">hello@wpublog.test</p>
                    </div>
                    <div class="rounded-2xl border border-slate-100 bg-slate-50/70 p-4">
                        <p class="text-sm font-semibold text-slate-800">Location</p>
                        <p class="mt-1 text-sm text-slate-600">Remote workflow, Indonesia</p>
                    </div>
                    <div class="rounded-2xl border border-slate-100 bg-slate-50/70 p-4">
                        <p class="text-sm font-semibold text-slate-800">Response time</p>
                        <p class="mt-1 text-sm text-slate-600">Biasanya dibalas dalam 1-2 hari kerja</p>
                    </div>
                </div>
            </article>

            <article class="rounded-[1.5rem] border border-sky-100 bg-sky-50/70 p-6 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-sky-700">Best for</p>
                <ul class="mt-4 space-y-3 text-sm leading-7 text-slate-600">
                    <li>Pertanyaan umum tentang blog dan konten</li>
                    <li>Kolaborasi atau feedback desain halaman</li>
                    <li>Laporan masalah pada dashboard atau flow publish</li>
                </ul>
            </article>
        </div>

        <div class="rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">Send a message</p>
            <form class="mt-6 space-y-5">
                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium text-slate-700">Name</label>
                        <input type="text" id="name"
                            class="block w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm placeholder:text-slate-400 focus:border-sky-300 focus:ring-sky-200"
                            placeholder="Your name">
                    </div>
                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-slate-700">Email</label>
                        <input type="email" id="email"
                            class="block w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm placeholder:text-slate-400 focus:border-sky-300 focus:ring-sky-200"
                            placeholder="name@example.com">
                    </div>
                </div>

                <div>
                    <label for="subject" class="mb-2 block text-sm font-medium text-slate-700">Subject</label>
                    <input type="text" id="subject"
                        class="block w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm placeholder:text-slate-400 focus:border-sky-300 focus:ring-sky-200"
                        placeholder="What do you want to talk about?">
                </div>

                <div>
                    <label for="message" class="mb-2 block text-sm font-medium text-slate-700">Message</label>
                    <textarea id="message" rows="6"
                        class="block w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm placeholder:text-slate-400 focus:border-sky-300 focus:ring-sky-200"
                        placeholder="Write your message here..."></textarea>
                </div>

                <button type="button"
                    class="inline-flex items-center rounded-full bg-sky-500 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-400">
                    Send Message
                </button>
            </form>
        </div>
    </section>

    <section class="mt-8 grid gap-6 lg:grid-cols-3">
        <article class="rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500">FAQ</p>
            <h3 class="mt-3 text-lg font-black text-slate-800">Bisa kirim ide artikel?</h3>
            <p class="mt-3 text-sm leading-7 text-slate-600">
                Bisa. Gunakan subject yang jelas agar ide atau proposal lebih mudah dipilah.
            </p>
        </article>

        <article class="rounded-[1.5rem] border border-amber-100 bg-amber-50/70 p-6 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-amber-700">FAQ</p>
            <h3 class="mt-3 text-lg font-black text-slate-800">Apakah form ini sudah aktif?</h3>
            <p class="mt-3 text-sm leading-7 text-slate-600">
                Saat ini form dipakai sebagai tampilan halaman contact. Alur backend bisa ditambahkan nanti jika
                dibutuhkan.
            </p>
        </article>

        <article class="rounded-[1.5rem] border border-sky-100 bg-sky-50/70 p-6 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-sky-700">FAQ</p>
            <h3 class="mt-3 text-lg font-black text-slate-800">Ada pertanyaan teknis?</h3>
            <p class="mt-3 text-sm leading-7 text-slate-600">
                Sertakan konteks singkat tentang halaman atau flow yang bermasalah supaya penanganannya lebih cepat.
            </p>
        </article>
    </section>
</x-layout>
