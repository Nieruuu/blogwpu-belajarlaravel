<main class="bg-gray-50 py-8 antialiased dark:bg-gray-900 sm:py-12">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <article
            class="overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-950">
            <div class="border-b border-gray-200 p-6 dark:border-gray-800 sm:p-8">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-blue-600 transition hover:text-blue-700 hover:underline dark:text-blue-400 dark:hover:text-blue-300">
                    &laquo; Back to Dashboard
                </a>

                <div class="mt-6 flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                    <div class="min-w-0 flex-1">
                        <address class="not-italic">
                            <div class="flex items-center gap-4">
                                <img class="h-14 w-14 rounded-full object-cover ring-2 ring-gray-100 dark:ring-gray-800"
                                    src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/sbcf-default-avatar.webp') }}"
                                    alt="{{ $post->author->username }}">
                                <div class="min-w-0">
                                    <a href="/posts?author={{ $post->author->username }}" rel="author"
                                        class="block truncate text-lg font-semibold text-gray-900 dark:text-white hover:underline">
                                        {{ $post->author->name }}
                                    </a>
                                    <a href="/posts?category={{ $post->category->slug }}"
                                        class="{{ $post->category->color }} mt-1 inline-flex">
                                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                            {{ $post->category->name }}
                                        </span>
                                    </a>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                        {{ $post->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </address>

                        <h1
                            class="mt-6 max-w-3xl text-3xl font-black leading-tight tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                            {{ $post->title }}
                        </h1>
                    </div>

                    <div class="flex flex-wrap items-center gap-3 lg:justify-end">
                        <a href="{{ route('dashboard.post.edit', $post->slug) }}"
                            class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg aria-hidden="true" class="mr-1 -ml-1 h-5 w-5" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd"
                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            Edit
                        </a>
                        <button type="button" data-modal-target="deleteModal-{{ $post->id }}"
                            data-modal-toggle="deleteModal-{{ $post->id }}"
                            class="inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg aria-hidden="true" class="mr-1.5 -ml-1 h-5 w-5" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            Delete
                        </button>
                    </div>
                </div>
            </div>

            <div class="p-6 sm:p-8">
                <div
                    class="mx-auto max-w-3xl whitespace-pre-line text-base leading-8 text-gray-700 wrap-break-word break-words dark:text-gray-300 sm:text-lg">
                    {!! $post->body !!}
                </div>
            </div>
        </article>
    </div>
</main>

<div id="deleteModal-{{ $post->id }}" tabindex="-1" aria-hidden="true"
    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
    <div class="relative max-h-full w-full max-w-md p-4">
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <button type="button"
                class="absolute right-2.5 top-3 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="deleteModal-{{ $post->id }}">
                <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 h-14 w-14 text-gray-400 dark:text-gray-200"
                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8.257 3.099c-.765-1.36-2.722-1.36-3.486 0l-.082.15A2.99 2.99 0 002.99 9h14a2.99 2.99 0 002.82-2.75l-.082-.15c-.765-1.36-2.722-1.36-3.486 0L10 8.586l-1.743-1.487zM10 12a1 1 0 100 2 1 1 0 000-2z"
                        clip-rule="evenodd" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                    Are you sure you want to delete this post?
                </h3>

                <div class="flex items-center justify-center gap-3">
                    <button type="button"
                        class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600"
                        data-modal-hide="deleteModal-{{ $post->id }}">
                        No, cancel
                    </button>
                    <form action="{{ route('dashboard.post.destroy', $post->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="rounded-lg bg-red-600 px-3 py-2 text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                            Yes, I'm sure
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
