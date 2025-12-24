<div class="px-8 mt-4 text-sm text-gray-600 dark:text-gray-300">
    <span>{{ $breadcrumb ?? 'Dashboard' }}</span>
    @isset($breadcrumb_child)
        / <span class="font-semibold">{{ $breadcrumb_child }}</span>
    @endisset
</div>
