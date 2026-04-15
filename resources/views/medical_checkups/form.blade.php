@include('layout.header')

<div class="max-w-5xl mx-auto pt-28 px-4">
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">
                MCU Registration Form
            </h2>
            <img src="{{ asset('images/logo.png') }}" class="h-10" alt="Logo">
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('medical_checkups.store') }}" enctype="multipart/form-data"
            class="p-6 space-y-8">
            @csrf

            {{-- Note --}}
            <p class="text-red-500 text-sm">contoh input tanggal: <span class="font-bold">5-20-2023</span></p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Employee -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Name</label>
                    <select name="employee_id"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                        <option disabled {{ old('employee_id') ? '' : 'selected' }}>Choose...</option>
                        @foreach ($employee as $c)
                        <option value="{{ $c->id }}" {{ old('employee_id')==$c->id ? 'selected' : '' }}>
                            {{ $c->full_name }}
                        </option>
                        @endforeach
                    </select>
                    @error('employee_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Hospital -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Hospital</label>
                    <select name="hospital"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                        <option disabled {{ old('hospital') ? '' : 'selected' }}>Choose...</option>
                        @foreach ($h as $hs)
                        <option value="{{ $hs }}" {{ old('hospital')==$hs ? 'selected' : '' }}>
                            {{ $hs }}
                        </option>
                        @endforeach
                    </select>
                    @error('hospital')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- MCU Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">MCU Date</label>
                    <input type="date" id="mcu_date" name="mcu_date" value="{{ old('mcu_date') }}"
                        class="w-full px-3 py-2 rounded-lg border border-gray-300">
                    @error('mcu_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Expire Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Expire Date</label>
                    <input type="date" id="expire_date" name="expire_date" readonly
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 bg-gray-100">
                    @error('expire_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Result -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Result</label>
                    <select name="result" class="w-full px-3 py-2 rounded-lg border border-gray-300">
                        <option disabled {{ old('result') ? '' : 'selected' }}>Choose...</option>
                        <option value="Fit_to_work">Fit to work</option>
                        <option value="Fit_with_note">Fit with note</option>
                        <option value="-">-</option>
                    </select>
                    @error('result')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- File Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Upload MCU File (PDF)</label>
                    <input type="file" name="file_mcu" class="w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-lg file:border-0
                        file:bg-blue-50 file:text-blue-600
                        hover:file:bg-blue-100">
                    @error('file_mcu')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2 lg:col-span-3">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Description</label>
                    <textarea name="description" rows="3" class="w-full px-3 py-2 rounded-lg border border-gray-300"
                        placeholder="Tambahkan Keterangan">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- Button -->
            <div class="flex justify-end pt-4 border-t">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl shadow-md transition">
                    Submit
                </button>
            </div>

        </form>
    </div>
</div>

@include('layout.footer')

<script>
    const mcuInput = document.getElementById('mcu_date');
    const expireInput = document.getElementById('expire_date');

mcuInput.addEventListener('change', function () {

    let mcuDate = new Date(this.value);

    if (isNaN(mcuDate)) return;

    // set expire +1 tahun
    let expireDate = new Date(mcuDate);
    expireDate.setFullYear(expireDate.getFullYear() + 1);

    expireInput.value = expireDate.toISOString().split('T')[0];

    // ======================
    // TODAY
    // ======================
    let today = new Date();
    today.setHours(0,0,0,0);
    expireDate.setHours(0,0,0,0);

    let diffDays = Math.floor((expireDate - today) / (1000 * 60 * 60 * 24));

    // reset class
    expireInput.className = "w-full px-3 py-2 rounded-lg border bg-gray-100";

    if (diffDays < 0) {
        // ❌ EXPIRED
        expireInput.classList.add('bg-red-100','border-red-500');
        expireInput.value += " (EXPIRED)";
    } 
    else if (diffDays <= 30) {
        // ⚠️ SOON EXPIRE
        expireInput.classList.add('bg-yellow-100','border-yellow-500');
    } 
    else {
        // ✅ VALID
        expireInput.classList.add('bg-green-100','border-green-500');
    }
});
</script>