<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accounting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div x-data="{ selectedInvoice: null, showModal: false, whereToRecord: ''  }" class="overflow-x-auto" class="p-6 text-gray-900">
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
                                <tr class="cursor-pointer {{ count($invoice->accountedItems) > 0 ? 'text-green-600' : '' }}" :class="{ 'bg-blue-200': selectedInvoice && selectedInvoice.id === {{ $invoice->id }} }" @click="selectedInvoice = {{ json_encode($invoice) }}">
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
                        <button type="button" class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600 transition disabled:opacity-50" :disabled="!selectedInvoice" @click="showModal = true; whereToRecord = 'cash'">
                            To Cash
                        </button>

                        <button type="button" class="bg-green-500 text-white px-6 py-2 rounded-lg shadow hover:bg-green-600 transition disabled:opacity-50" :disabled="!selectedInvoice" @click="showModal = true; whereToRecord = 'unpaid_invoice'">
                            To Unpaid Invoice
                        </button>
                    </div>

                    <!-- Modal -->
                    <div x-cloak x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-96" @click.away="showModal = false">
                            <h2 x-text="whereToRecord"></h2>
                            <h2 class="text-xl font-semibold mb-4">Invoice Details</h2>

                            <p><strong>Invoice No:</strong> <span x-text="selectedInvoice?.no"></span></p>
                            <p><strong>From:</strong> <span x-text="selectedInvoice?.from"></span></p>
                            <p><strong>To:</strong> <span x-text="selectedInvoice?.to"></span></p>
                            <p><strong>Date:</strong> <span x-text="selectedInvoice?.date"></span></p>
                            <p><strong>Due Date:</strong> <span x-text="selectedInvoice?.due_date"></span></p>
                            <p><strong>Total:</strong> <span x-text="selectedInvoice?.total"></span> Ft</p>

                            <form x-data="{ isSaving: false }" @submit="isSaving = true" method="POST" action="{{ route('accounting.store') }}" class="mt-4">
                                @csrf
                                <input type="hidden" name="invoice_id" :value="selectedInvoice?.id">
                                <input type="hidden" name="where_to_record" :value="whereToRecord">

                                <div class="flex items-center gap-2">
                                    <span>T</span>
                                    <input type="text" name="tartozik" id="tartozik" class="border p-2 rounded w-full" required>

                                    <span>K</span>
                                    <input type="text" name="kovetel" id="kovetel" class="border p-2 rounded w-full" value="381" required>
                                </div>

                                <div class="flex justify-end gap-2 mt-4">
                                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-600 transition" @click="showModal = false">Mégse</button>
                                    <button type="submit" :disabled="isSaving" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Modal -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
