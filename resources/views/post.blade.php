<x-layout :title="$title">
    <main class="bg-slate-50 pt-8 pb-16 antialiased lg:pt-16 lg:pb-24">
        <div class="flex justify-between px-4 mx-auto max-w-7xl ">
            <article
                class="mx-auto w-full max-w-4xl rounded-[2rem] border border-slate-200 bg-white p-6 shadow-[0_24px_60px_-40px_rgba(148,163,184,0.6)] format format-sm sm:format-base lg:format-lg format-blue sm:p-8 lg:p-10">
                <a href="/posts"
                    class="inline-flex items-center text-sm font-semibold text-sky-700 transition hover:text-sky-500 hover:underline">

                    &laquo; Back to all posts
                </a>
                <header class="my-4 rounded-[1.5rem] bg-gradient-to-br from-sky-50 via-white to-amber-50 p-5 lg:mb-6 not-format">
                    <address class="mb-6 flex items-center not-italic">
                        <div class="mr-3 inline-flex items-center text-sm text-gray-900">
                            <img class="mr-4 h-16 w-16 rounded-full object-cover ring-4 ring-white"
                                src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/sbcf-default-avatar.webp') }}"
                                alt="{{ $post->author->username }}">
                            <div>
                                <a href="/posts?author={{ $post->author->username }}" rel="author"
                                    class="block text-xl font-bold text-slate-800">{{ $post->author->name }}</a>
                                <a href="/posts?category={{ $post->category->slug }}"
                                    class="{{ $post->category->color }} block my-1">
                                    <span
                                        class="rounded-full border border-current/15 px-3 py-1 text-sm font-semibold text-gray-500 shadow-sm">{{ $post->category->name }}</span>
                                </a>
                                <p class="text-base text-gray-500">
                                    {{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-slate-800 lg:mb-6 lg:text-4xl">
                        {{ $post->title }}</h1>
                </header>
                <p class="rounded-[1.5rem] bg-white text-lg leading-8 text-slate-700">{!! $post->body !!}</p>
            </article>
        </div>
    </main>


</x-layout>
