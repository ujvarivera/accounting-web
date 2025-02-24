<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('General Ledger Codes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('glcodes.store') }}" method="POST" class="max-w-2xl mx-auto bg-white p-4 rounded-lg shadow-md flex items-end space-x-4">
                        @csrf

                        <div class="flex flex-col">
                            <label for="code" class="text-gray-700 font-semibold mb-1">GL Code</label>
                            <input type="text" name="code" id="code" required class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div class="flex flex-col">
                            <label for="name" class="text-gray-700 font-semibold mb-1">GL Name</label>
                            <input type="text" name="name" id="name" required class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
                            Save
                        </button>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-4 py-2 border">{{ __('Code') }}</th>
                                    <th class="px-4 py-2 border">{{ __('Name') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($glcodes as $glcode)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-4 py-2 border text-center">{{ $glcode->code }}</td>
                                    <td class="px-4 py-2 border">{{ $glcode->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
