<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div x-data="{ selectedInvoice: null }" class="overflow-x-auto" class="p-6 text-gray-900">
                    <div>
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
                                <tr class="cursor-pointer" :class="{ 'bg-blue-200': selectedInvoice && selectedInvoice.id === {{ $invoice->id }} }" 
                                 @click="selectedInvoice = {{ json_encode($invoice) }}">
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

                    <div class="flex justify-end gap-4 mt-4">
                        <button type="button" class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600 transition disabled:opacity-50" 
                            :disabled="!selectedInvoice" 
                            @click="console.log(selectedInvoice)">
                            Könyvelés Pénztárba
                        </button>

                        <button type="button" 
                        class="bg-green-500 text-white px-6 py-2 rounded-lg shadow hover:bg-green-600 transition disabled:opacity-50" 
                        :disabled="!selectedInvoice" 
                        @click="console.log(selectedInvoice)">
                            Könyvelés Kiegyenlítetlen Számlaként
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

