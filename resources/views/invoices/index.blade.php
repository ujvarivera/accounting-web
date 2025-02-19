<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-4 py-2 border">{{ __('Invoice No') }}</th>
                                    <th class="px-4 py-2 border">{{ __('From') }}</th>
                                    <th class="px-4 py-2 border">{{ __('To') }}</th>
                                    <th class="px-4 py-2 border">{{ __('Date') }}</th>
                                    <th class="px-4 py-2 border">{{ __('Due Date') }}</th>
                                    <th class="px-4 py-2 border">{{ __('Total') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $invoice)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-4 py-2 border text-center">{{ $invoice->no }}</td>
                                        <td class="px-4 py-2 border">{{ $invoice->from }}</td>
                                        <td class="px-4 py-2 border">{{ $invoice->to }}</td>
                                        <td class="px-4 py-2 border text-center">{{ $invoice->date }}</td>
                                        <td class="px-4 py-2 border text-center">{{ $invoice->due_date }}</td>
                                        <td class="px-4 py-2 border text-right font-semibold">{{ number_format($invoice->total, 2) }} Ft</td>
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
