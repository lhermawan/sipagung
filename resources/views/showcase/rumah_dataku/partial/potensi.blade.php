




    {{-- Baris 1 --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-7">
        <x-potensi-card icon="mdi-baby-carriage" label="IKUT BKB" :value="$demografi->j_bkb" color="primary" />
        <x-potensi-card icon="mdi-human-greeting-variant" label="IKUT BKR" :value="$demografi->j_bkr" color="secondary" />
        <x-potensi-card icon="mdi-human-cane" label="IKUT BKL" :value="$demografi->j_bkl" color="orange-500" />
        <x-potensi-card icon="mdi-handshake" label="UPPKA" :value="$potensi->j_uppka" color="sky-500" />
    </div>

    {{-- Baris 2 --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-7">
        <x-potensi-card icon="mdi-account-heart" label="POSYANDU" :value="$potensi->j_posyandu" bg="bg-primary" textColor="text-white" border="false" />
        <x-potensi-card icon="mdi-town-hall" label="SEKOLAH" :value="$potensi->j_sekolah" bg="bg-secondary" textColor="text-white" border="false" />
        <x-potensi-card icon="mdi-highway" label="JALAN" :value="$potensi->j_jalan" unit="m" bg="bg-orange-500" textColor="text-white" border="false" />
        <x-potensi-card icon="mdi-home-flood" label="BENCANA" :value="$potensi->j_bencana" unit="x" bg="bg-sky-500" textColor="text-white" border="false" />
    </div>

    {{-- Baris 3 --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-7">
        <x-potensi-card icon="mdi-stadium" label="FASUM OR/REKREASI" :value="$potensi->j_for" />
        <x-potensi-card icon="mdi-hospital-building" label="FASUM KESEHATAN" :value="$potensi->j_fkes" />
        <x-potensi-card icon="mdi-mosque" label="FASUM IBADAH" :value="$potensi->j_fibadah" />
        <x-potensi-card icon="mdi-store" label="FASUM PASAR" :value="$potensi->j_fpasar" />
    </div>

    {{-- Baris 4 --}}
    <div class="grid grid-cols-2 md:grid-cols-3 gap-7">
        <x-potensi-card icon="mdi-human-male-height-variant" label="STUNTING/GIZI BURUK" :value="$potensi->j_stunting" color="orange-500" />
        <x-potensi-card icon="mdi-account-group" label="PIK-R" :value="$potensi->j_pikr" color="secondary" />
        <x-potensi-card icon="mdi-church" label="PKBM" :value="$potensi->j_pkbm" color="primary" />
    </div>

