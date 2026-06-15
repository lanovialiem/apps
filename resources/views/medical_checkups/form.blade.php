@extends('welcome.welcome')

@section('content')
    <div class="container">

        {{-- Header --}}
        <div class="page-header">
            <div>
                <h1 class="text-3xl font-bold text-white">
                    Medical Check Up
                </h1>

                <p class="text-white mt-2 text-sm">
                    Register MCU Employee
                </p>
            </div>

            <div class="action-group">
                <a href="{{ route('medical_checkups.index') }}"
                    class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-sm text-black">
                    Back
                </a>
            </div>
        </div>

        {{-- Card --}}
        <div class="employee-card">

            <form method="POST" action="{{ route('medical_checkups.store') }}" enctype="multipart/form-data">

                @csrf

                <div class="mb-6">
                    <div class="bg-yellow-50 border border-yellow-300 text-yellow-800 px-4 py-3 rounded-lg">
                        Example date format will be generated automatically.
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    {{-- Employee --}}
                    <div>
                        <label class="block text-black text-sm font-medium mb-2">
                            Employee Name
                        </label>

                        <select name="employee_id"
                            class="w-full border text-black border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">

                            <option disabled selected>
                                Select Employee
                            </option>

                            @foreach ($employee as $emp)
                                <option value="{{ $emp->id }}" {{ old('employee_id') == $emp->id ? 'selected' : '' }}>
                                    {{ $emp->full_name }}
                                </option>
                            @endforeach
                        </select>

                        @error('employee_id')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Hospital --}}
                    <div>
                        <label class="block text-black text-sm font-medium mb-2">
                            Hospital
                        </label>

                        <select name="hospital" class="w-full border text-black border-gray-300 rounded-lg px-4 py-2">

                            <option disabled selected>
                                Select Hospital
                            </option>

                            @foreach ($h as $hs)
                                <option value="{{ $hs }}">
                                    {{ $hs }}
                                </option>
                            @endforeach

                        </select>

                        @error('hospital')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- MCU Date --}}
                    <div>
                        <label class="block text-black text-sm font-medium mb-2">
                            MCU Date
                        </label>

                        <input type="date" id="mcu_date" name="mcu_date" value="{{ old('mcu_date') }}"
                            class="w-full border text-black border-gray-300 rounded-lg px-4 py-2">

                        @error('mcu_date')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Expire Date --}}
                    <div>
                        <label class="block text-black text-sm font-medium mb-2">
                            Expire Date
                        </label>

                        <input type="date" id="expire_date" name="expire_date" readonly
                            class="w-full border text-black border-gray-300 rounded-lg px-4 py-2 bg-gray-100">

                        @error('expire_date')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Result --}}
                    <div>
                        <label class="block text-black text-sm font-medium mb-2">
                            Result
                        </label>

                        <select name="result" class="w-full border text-black border-gray-300 rounded-lg px-4 py-2">

                            <option disabled selected>
                                Select Result
                            </option>

                            <option value="Fit_to_work">
                                Fit To Work
                            </option>

                            <option value="Fit_with_note">
                                Fit With Note
                            </option>

                            <option value="-">
                                -
                            </option>
                        </select>

                        @error('result')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Upload MCU --}}
                    <div>
                        <label class="block text-black text-sm font-medium mb-2">
                            MCU File (PDF)
                        </label>

                        <input type="file" name="file_mcu"
                            class="w-full border text-black border-gray-300 rounded-lg px-4 py-2">

                        @error('file_mcu')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="md:col-span-2 lg:col-span-3">
                        <label class="block text-black text-sm font-medium mb-2">
                            Description
                        </label>

                        <textarea name="description" rows="4" class="w-full border text-black border-gray-300 rounded-lg px-4 py-2"
                            placeholder="Additional Notes">{{ old('description') }}</textarea>

                        @error('description')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                {{-- Button --}}
                <div class="flex justify-end gap-2 mt-8">
                    <button type="submit" class="btn-add">
                        Save MCU
                    </button>

                </div>

            </form>

        </div>

    </div>
@endsection

@push('scripts')
    <script>
        const mcuInput = document.getElementById('mcu_date');
        const expireInput = document.getElementById('expire_date');

        mcuInput.addEventListener('change', function() {

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
            today.setHours(0, 0, 0, 0);
            expireDate.setHours(0, 0, 0, 0);

            let diffDays = Math.floor((expireDate - today) / (1000 * 60 * 60 * 24));

            // reset class
            expireInput.className = "w-full px-3 py-2 rounded-lg border text-black bg-gray-100";

            if (diffDays < 0) {
                // ❌ EXPIRED
                expireInput.classList.add('bg-red-100', 'border-red-500');
                expireInput.value += " (EXPIRED)";
            } else if (diffDays <= 30) {
                // ⚠️ SOON EXPIRE
                expireInput.classList.add('bg-yellow-100', 'border-yellow-500');
            } else {
                // ✅ VALID
                expireInput.classList.add('bg-green-100', 'border-green-500');
            }
        });
    </script>
@endpush
