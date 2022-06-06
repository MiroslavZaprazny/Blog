    <aside class="w-48 flex-shrink-0">
        <h4 class="font-semibold mb-4">
            Links
        </h4>
        <ul>
            <li class="mb-1">
                <a href="/admin/posts/create"
                class="{{request()->is('admin/posts/create') ? 'text-blue-500' : ''}}"
                >New post</a>
            </li>
            <li class="mb-1">
                <a href="/admin/posts/"
                class="{{request()->is('admin/posts') ? 'text-blue-500' : ''}}"
                >All posts</a>
            </li>
            <li>
                <a href="/admin/category/create"
                class="{{request()->is('admin/category/create') ? 'text-blue-500' : ''}}"
                >New category</a>
            </li>
        </ul>
    </aside>