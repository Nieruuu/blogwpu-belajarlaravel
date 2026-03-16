<x-layout :title="$title">


    <div class="py-4 px-4 mx-auto max-w-7xl lg:px-6">

        <form class="max-w-md mb-10 mx-auto">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input autocomplete="off" name='search' autofocus type="search" id="search"
                    class="block w-full rounded-2xl border border-slate-200 bg-white p-3 ps-10 text-sm text-slate-700 shadow-[0_18px_40px_-30px_rgba(148,163,184,0.6)] placeholder:text-slate-400 focus:border-sky-300 focus:ring-sky-200"
                    placeholder="Search post title" required />
                <button type="submit"
                    class="absolute end-1.5 bottom-1.5 rounded-xl bg-sky-500 px-3 py-1.5 text-xs font-medium leading-5 text-white shadow-sm transition hover:bg-sky-400 focus:outline-none focus:ring-4 focus:ring-sky-200">Search</button>
            </div>
        </form>

        <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2 mb-6">
            @forelse($posts as $post)
                <article
                    class="group rounded-[1.75rem] border border-slate-200 bg-gradient-to-br from-white via-sky-50/40 to-amber-50/60 p-6 shadow-[0_20px_45px_-32px_rgba(148,163,184,0.55)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_28px_55px_-32px_rgba(125,211,252,0.45)]">
                    <div class="mb-5 flex items-center justify-between text-gray-500">
                        <a href="/posts?category={{ $post->category->slug }}">
                            <span class="{{ $post->category->color }} rounded-full border border-current/15 px-3 py-1 text-xs font-semibold shadow-sm">
                                {{ $post->category->name }}
                            </span>
                        </a>
                        <span class="text-sm text-slate-500">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <h2 class="mb-3 text-2xl font-black tracking-tight text-slate-800"><a
                            href="/posts/{{ $post->slug }}">{{ Str::limit($post->title, 40) }}</a></h2>
                    <p class="mb-6 text-sm leading-7 text-slate-600">{!! Str::limit($post->body, 120) !!}</p>
                    <div class="flex items-center justify-between">
                        <a href="/posts?author={{ $post->author->username }}" class="flex items-center">
                            <div class="flex items-center space-x-4">
                                <img class="h-8 w-8 rounded-full object-cover ring-2 ring-white"
                                    src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/sbcf-default-avatar.webp') }}"
                                    alt="{{ $post->author->name }} avatar" />
                                <span class="text-sm font-semibold text-slate-700 hover:underline">
                                    {{ $post->author->name }}
                                </span>
                            </div>
                        </a>
                        <a href="/posts/{{ $post->slug }}"
                            class="inline-flex items-center text-sm font-semibold text-sky-700 transition hover:text-sky-500 hover:underline">
                            Read more
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            @empty
                <div class="text-center py-12 mx-auto max-w-7xl lg:px-6 lg:py-24">
                    <p class=" text-gray-500 font-medium text-xl">No post found.</p>
                    <a href="/posts" class="font-medium text-blue-500 hover:underline block mt-4">
                        &laquo;.. Back to all posts
                    </a>
                </div>
            @endforelse
        </div>
        {{ $posts->links() }}
    </div>

</x-layout>
