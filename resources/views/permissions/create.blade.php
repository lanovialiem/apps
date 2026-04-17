<section>
    @vite(['src/input.css'])

    <div class="min-h-screen bg-gray-100 py-12">
        <div class="max-w-4xl mx-auto px-4">

            <!-- CARD -->
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

                <!-- HEADER -->
                <div class="px-6 py-4 border-b bg-gray-50 flex items-center justify-between">

                    <!-- TITLE -->
                    <h2 class="text-xl font-semibold text-gray-800">
                        Create Permission
                    </h2>

                    <!-- LOGO -->
                    <a href="#" class="flex items-center gap-2">
                        <img src="/logo.png" alt="Logo" class="h-8 w-auto">
                        <span class="text-sm font-medium text-gray-700">Logo</span>
                    </a>

                </div>

                <!-- FORM -->
                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left text-gray-700">

                            <tbody class="divide-y">

                                <!-- NAME -->
                                <tr>
                                    <td class="px-6 py-4 font-medium w-1/3">
                                        Permission Name
                                    </td>
                                    <td class="px-6 py-4">
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            placeholder="Enter permission name"
                                            class="w-full px-4 py-2 rounded-lg border border-gray-300 
                                            focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                                    </td>
                                </tr>

                                <!-- GUARD -->
                                <tr>
                                    <td class="px-6 py-4 font-medium">
                                        Guard Name
                                    </td>
                                    <td class="px-6 py-4">
                                        <input type="text" name="guard_name" value="{{ old('guard_name') }}"
                                            placeholder="Enter your name"
                                            class="w-full px-4 py-2 rounded-lg border border-gray-300 
                                            focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                                    </td>
                                </tr>

                                <!-- BUTTON -->
                                <tr>
                                    <td></td>
                                    <td class="px-6 py-4">
                                        <button type="submit"
                                            class="bg-blue-600 hover:bg-blue-700 text-white 
                                            px-6 py-2 rounded-lg shadow-md transition">
                                            Save Permission
                                        </button>
                                    </td>
                                </tr>

                            </tbody>

                        </table>
                    </div>

                </form>

            </div>

        </div>
    </div>
</section>
