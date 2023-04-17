<tr>
    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
        <div class="flex items-center">
            <div class="font-medium text-gray-900">{{ $product->name }}</div>
        </div>
    </td>
    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
        <div class="text-gray-900">{{ $product->sku }}</div>
    </td>
    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
        <div class="text-gray-900">{{ $product->price }}</div>
    </td>
    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
        <div class="text-gray-900">{{ $product->stock }}</div>
    </td>
    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
        <span class="inline-flex rounded-full px-2 text-xs font-semibold leading-5 @if(\Illuminate\Support\Str::lower($product->status) === 'published') text-green-800 bg-green-100 @else text-red-800 bg-red-100 @endif">{{ $product->status }}</span>
    </td>
    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">{{ $product->type }}</td>
</tr>
