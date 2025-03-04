@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-11 px-4 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg fade-in">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">
                    <i class="fas fa-address-book text-indigo-600 mr-2"></i>Contacts
                </h1>
                <a href="{{ route('contacts.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md shadow-sm flex items-center">
                    <i class="fas fa-plus mr-2"></i> Add New Contact
                </a>
            </div>
            
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert" x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 3000)">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span>{{ session('success') }}</span>
                        <button type="button" class="ml-auto" @click="show = false">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            @endif
            
            <div class="mb-6">
                <form action="{{ route('contacts.index') }}" method="GET" class="flex gap-3">
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" name="search" placeholder="Search contacts..." value="{{ $search ?? '' }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-md shadow-sm">Search</button>
                </form>
            </div>
            
            <div class="overflow-x-auto bg-white rounded-md shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact Info</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Birthdate</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($contacts as $contact)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                            <span class="text-indigo-700 font-medium">{{ substr($contact->firstname, 0, 1) }}{{ substr($contact->lastname, 0, 1) }}</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $contact->firstname }} {{ $contact->lastname }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"><i class="fas fa-envelope text-gray-400 mr-1"></i> {{ $contact->email }}</div>
                                    @if($contact->workphone)
                                        <div class="text-sm text-gray-500"><i class="fas fa-phone text-gray-400 mr-1"></i> {{ $contact->workphone }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $contact->birthdate->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $contact->created_date->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('contacts.show', $contact->id) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 rounded-md p-2" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('contacts.edit', $contact->id) }}" class="text-green-600 hover:text-green-900 bg-green-50 hover:bg-green-100 rounded-md p-2" title="Edit Contact">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete(this)" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 rounded-md p-2" title="Delete Contact">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 whitespace-nowrap text-sm text-gray-500 text-center bg-gray-50">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-address-card text-gray-300 text-5xl mb-3"></i>
                                        <p class="text-gray-500">No contacts found</p>
                                        <a href="{{ route('contacts.create') }}" class="mt-3 text-indigo-600 hover:text-indigo-800">
                                            <i class="fas fa-plus mr-1"></i> Add your first contact
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(button) {
        if (confirm('Are you sure you want to delete this contact? This action cannot be undone.')) {
            button.closest('form').submit();
        }
    }
</script>
@endsection