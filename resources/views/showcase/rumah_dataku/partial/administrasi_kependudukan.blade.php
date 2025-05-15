<div class="text-center mb-8">
    <h1 class="text-4xl font-extrabold text-gray-800">
        RUMAH DATAKU <span class="text-primary">(DATA ADMINISTRASI KEPENDUDUKAN)</span>
    </h1>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
    <div class="bg-white rounded-lg shadow-md p-4">
        <p class="text-sm text-gray-500">Tidak Memiliki Kartu Keluarga</p>
        <p class="text-2xl font-semibold text-indigo-600">
            {{ $administrasiKependudukan->t_memiliki_kk ?? 0 }}
        </p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-4">
        <p class="text-sm text-gray-500">Tidak Memiliki Akta Lahir</p>
        <p class="text-2xl font-semibold text-indigo-600">
            {{ $administrasiKependudukan->t_memiliki_akte_lahir ?? 0 }}
        </p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-4">
        <p class="text-sm text-gray-500">Tidak Memiliki Akta Nikah</p>
        <p class="text-2xl font-semibold text-indigo-600">
            {{ $administrasiKependudukan->t_memiliki_akte_nikah ?? 0 }}
        </p>
    </div>
</div>
