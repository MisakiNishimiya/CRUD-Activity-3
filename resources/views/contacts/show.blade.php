@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-11 px-4 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg fade-in">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">
                    <i class="fas fa-user text-indigo-600 mr-2"></i>Contact Details
                </h1>
                <div class="flex space-x-2">
                    <a href="{{ route('contacts.edit', $contact->id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md shadow-sm flex items-center">
                        <i class="fas fa-edit mr-2"></i> Edit
                    </a>
                    <a href="{{ route('contacts.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-md shadow-sm flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Contacts
                    </a>
                </div>
            </div>
            
            <div class="bg-gray-50 p-6 rounded-md shadow-sm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <div class="mb-4">
                            <h3 class="text-sm font-medium text-gray-500">ID</h3>
                            <p class="mt-1 text-base text-gray-900">{{ $contact->id }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <h3 class="text-sm font-medium text-gray-500">First Name</h3>
                            <p class="mt-1 text-base text-gray-900">{{ $contact->firstname }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <h3 class="text-sm font-medium text-gray-500">Last Name</h3>
                            <p class="mt-1 text-base text-gray-900">{{ $contact->lastname }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <h3 class="text-sm font-medium text-gray-500">Birthdate</h3>
                            <p class="mt-1 text-base text-gray-900">{{ $contact->birthdate->format('F d, Y') }}</p>
                        </div>
                    </div>
                    
                    <div>
                        <div class="mb-4">
                            <h3 class="text-sm font-medium text-gray-500">Work Phone</h3>
                            <p class="mt-1 text-base text-gray-900">{{ $contact->workphone ?? 'Not provided' }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <h3 class="text-sm font-medium text-gray-500">Home Phone</h3>
                            <p class="mt-1 text-base text-gray-900">{{ $contact->homephone ?? 'Not provided' }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <h3 class="text-sm font-medium text-gray-500">Email</h3>
                            <p class="mt-1 text-base text-gray-900">{{ $contact->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 p-6 rounded-md shadow-sm mt-6">
                <h2 class="text-lg font-medium text-gray-700 mb-4 border-b pb-2">Record Information</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <h3 class="text-sm font-medium text-gray-500">Created By</h3>
                        <p class="mt-1 text-base text-gray-900">{{ $contact->createdBy->name ?? 'Unknown' }}</p>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="text-sm font-medium text-gray-500">Created Date</h3>
                        <p class="mt-1 text-base text-gray-900">{{ $contact->created_date->format('F d, Y H:i:s') }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-sm font-medium text-gray-500">Updated at</h3>
                        <p class="mt-1 text-base text-gray-900">{{ $contact->updated_at->format('F d, Y H:i:s') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection