<x-filament-panels::page>
    <div class="mb-6">
        {{ $this->form }}
    </div>

    @if($selectedPart)
    <div class="flex justify-between items-center mb-4">
        <div>
            <h3 class="text-lg font-bold text-gray-700">{{ $selectedPart->kode }} - {{ $selectedPart->nama }}</h3>
            <p class="text-sm text-gray-500">Stok saat ini: <span class="font-bold text-green-600">{{ $selectedPart->stok }}</span></p>
        </div>
        <a href="{{ route('laporan.perpart.pdf', $selectedPart->id) }}" target="_blank"
            class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
            🖨️ Print PDF
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm border border-gray-300">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="p-3 text-left border">No</th>
                    <th class="p-3 text-left border">Tanggal</th>
                    <th class="p-3 text-left border">Kode Transaksi</th>
                    <th class="p-3 text-center border">Qty</th>
                    <th class="p-3 text-center border">Tipe</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse($mutasi as $i => $item)
                <tr class="border-t odd:bg-white even:bg-gray-50">
                    <td class="p-3 border">{{ $i + 1 }}</td>
                    <td class="p-3 border">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i') }}</td>
                    <td class="p-3 border">{{ $item->kode_transaksi }}</td>
                    <td class="p-3 border text-center font-bold">{{ $item->qty }}</td>
                    <td class="p-3 border text-center">
                        @if($item->tipe == 'IN')
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-bold">IN</span>
                        @else
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-bold">OUT</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-3 text-center text-gray-500">Belum ada data mutasi untuk part ini</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endif
</x-filament-panels::page>
