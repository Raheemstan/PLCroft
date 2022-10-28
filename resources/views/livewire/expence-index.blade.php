<!-- component -->
<div class="bg-white p-8 rounded-md w-full">
	<div class=" flex items-center justify-between pb-6">
		<div>
			<h2 class="text-gray-600 font-semibold">Expenditure Order</h2>
		</div>
		<div class="flex items-center justify-between">
			<div class="flex bg-gray-50 items-center p-2 rounded-md">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
					fill="currentColor">
					<path fill-rule="evenodd"
						d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
						clip-rule="evenodd" />
				</svg>
				<input class="bg-gray-50 outline-none ml-1 block " type="text" name="" id="" placeholder="search...">
          </div>
				<div class="lg:ml-40 ml-10 space-x-8">
					<button wire:click="showCreateModal" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">New Expenditure</button>
				</div>
			</div>
		</div>
		<div>
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Description
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Amount
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Date
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									By
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider" colspan="2">
									Action
								</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($expences as $expence)
							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<div class="flex items-center">
											<div class="ml-3">
												<p class="text-gray-900 whitespace-no-wrap">
												{{ $expence->expence_desc}}
												</p>
											</div>
										</div>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap"> 
										{{ $expence->amount }}
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
										{{$expence->trans_date}}
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
										{{ $expence->created_by }}
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
										<x-jet-button wire:click="showEditModal({{ $expence->id }});">
										Edit
									</x-jet-button>
									</span>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
									<x-jet-danger-button wire:click="deleteEntry({{ $expence->id }});" class="relative">
										Delete
									</x-jet-danger-button>
									</span>
								</td>
							</tr>
							@empty
							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<div class="flex items-center">
											<div class="ml-3">
												<p class="text-gray-900 whitespace-no-wrap">
													The table is empty!!!
												</p>
											</div>
										</div>
								</td>
							</tr>

							@endforelse
						</tbody>
						<tfoot>
							<tr>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Total Entries  
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Total 
								</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		<x-jet-dialog-modal wire:model="showExpenceModal">
			@if ($eId)
			<x-slot  name="title">Update Expences </x-slot>
			@else
			<x-slot  name="title">Register Expences </x-slot>
			@endif
			
			<x-slot  name="content">
                
			<div class="mt-5 md:mt-0 md:col-span-2">
				<form>
					<div class="shadow sm:rounded-md sm:overflow-hidden">
						<div class="px-4 py-5 bg-white space-y-6 sm:p-6">
							<div class="grid grid-cols-3 gap-6">
								<div class="col-span-3 sm:col-span-2">
									<label for="amount" class="block text-sm font-medium text-gray-700">
										Amount
									</label>
									<div class="mt-1 flex rounded-md shadow-sm">
										<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
											$
										</span>
										<input type="number" min="0" wire:model="amount" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Amount">
									</div>
								</div>
							</div>

							<div>
								<label for="about" class="block text-sm font-medium text-gray-700">
									Description
								</label>
								<div class="mt-1">
									<textarea wire:model="expence_desc" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Enter Description"></textarea>
								</div>
							</div>
							<div class="grid grid-cols-3 gap-6">
								<div class="col-span-3 sm:col-span-2">
									<label for="date" class="block text-sm font-medium text-gray-700">
										Date
									</label>
									<div class="mt-1 flex rounded-md shadow-sm">
										<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
											m/d/yy
										</span>
										<input type="date" wire:model="trans_date" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Date">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
            </x-slot>
			<x-slot  name="footer">
				@if ($eId)
				<x-jet-secondary-button wire:click="updateExpence" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</x-jet-button>
				@else
				<x-jet-secondary-button wire:click="newExpence" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</x-jet-button>
				@endif
				<x-jet-button wire:click="closeExpenceModal">Close</x-jet-button>
			</x-slot>
		</x-jet-dialog-modal>
	</div>