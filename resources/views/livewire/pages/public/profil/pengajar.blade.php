<div class="container mx-auto p-4 pt-6 mb-12">
    <h1 class="text-2xl text-primary-variant font-semibold mb-4">Pengajar</h1>
    <div class="relative overflow-x-auto shadow border border-black/20">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs border-b border-black/20 text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 w-0">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Dosen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mata Kuliah
                    </th>
                </tr>
            </thead>
            <tbody>
                @php $i=1; @endphp
                @foreach ($pengajars as $pengajar)
                <tr class="bg-white border-b border-black/20 dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $i++ }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $pengajar['dosen'] }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $pengajar['matkul'] }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
