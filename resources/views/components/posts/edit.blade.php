    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    @endpush

    <div class="relative p-4 w-full  max-h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg border dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Post</h3>
            </div>

            <!-- Modal body -->
            <form action="{{ route('dashboard.post.update', $post->slug) }}" method="POST" id="post-form">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label for="title"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" name="title" id="title" autofocus
                        class="@error('title') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @else bg-gray-25 border-gray-300 text-gray-900 placeholder-gray-400 focus:ring-primary-600 focus:border-primary-600 @enderror text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type post title here" value="{{ old('title') ?? $post->title }}">
                    @error('title')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                            {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select name="category_id" id="category "
                        class="@error('category_id') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @else bg-gray-25 border-gray-300 text-gray-900 placeholder-gray-400 focus:ring-primary-600 focus:border-primary-600 @enderror text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="" value="">Select category</option>
                        @foreach (App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" @selected((old('category_id') ?? $post->category_id) == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                            {{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2 mb-4">
                    <label for="body"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                    <textarea name="body" id="body" rows="4"
                        class="hidden @error('body') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @else bg-gray-25 border-gray-300 text-gray-900 placeholder-gray-400 focus:ring-primary-600 focus:border-primary-600 @enderror text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Write post body here">{{ old('body') ?? $post->body }}</textarea>
                    @error('body')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                            {{ $message }}</p>
                    @enderror
                </div>

                <!-- Create the editor container -->
                <div id="editor">
                    {!! old('body') ?? $post->body !!}
                </div>


                <div class="flex space-x-4">
                    <button type="submit"
                        class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-80₀ focus:ring-4 focus:outline-none focus:ring-primary-3₀ font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-6₀ dark:hover:bg-primary-7₀ dark:focus:ring-primary-8₀">
                        Update Post
                    </button>

                    <a href="/dashboard"
                        class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>

    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
        <!-- Initialize Quill editor -->
        <script>
            const quill = new Quill('#editor', {
                theme: 'snow',
                placeholder: 'Write post body here',
            });

            const postForm = document.getElementById('post-form');
            const postBody = document.getElementById('body');
            const quillEditor = document.getElementById('editor');

            postForm.addEventListener('submit', function(e) {
                const content = quillEditor.children[0].innerHTML;
                e.preventDefault(); // Prevent the default form submission
                postBody.value = content; // Set the textarea value to the Quill editor content
                postForm.submit(); // Submit the form
            });
        </script>
    @endpush
