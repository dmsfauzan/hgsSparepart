<x-filament-panels::page>
    <div class="flex justify-end gap-2 mb-4">
        <a href="{{ route('export.part') }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            📊 Export Excel
        </a>
        <a href="{{ route('laporan.stok.pdf') }}" target="_blank"
            class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
            🖨️ Print PDF
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm border border-gray-300">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="p-3 text-left border">No</th>
                    <th class="p-3 text-left border">Kode Part</th>
                    <th class="p-3 text-left border">Nama Part</th>
                    <th class="p-3 text-center border">Stok</th>
                    <th class="p-3 text-center border">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @foreach($parts as $i => $part)
                <tr class="border-t odd:bg-white even:bg-gray-50">
                    <td class="p-3 border">{{ $i + 1 }}</td>
                    <td class="p-3 border">{{ $part->kode }}</td>
                    <td class="p-3 border">{{ $part->nama }}</td>
                    <td class="p-3 border text-center font-bold">{{ $part->stok }}</td>
                    <td class="p-3 border text-center">
                        @if($part->stok <= 0)
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-bold">Habis</span>
                        @elseif($part->stok <= 5)
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs font-bold">Menipis</span>
                        @else
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-bold">Aman</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-filament-panels::page>
