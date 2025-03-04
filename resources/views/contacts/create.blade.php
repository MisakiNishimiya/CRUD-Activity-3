@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-11 px-4 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg fade-in">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">
                    <i class="fas fa-user-plus text-indigo-600 mr-2"></i>Create New Contact
                </h1>
                <a href="{{ route('contacts.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-md shadow-sm flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Contacts
                </a>
            </div>
            
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle mt-1"></i>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium">Please fix the following errors:</p>
                            <ul class="mt-1 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('contacts.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="bg-gray-50 p-6 rounded-md shadow-sm">
                    <h2 class="text-lg font-medium text-gray-700 mb-4 border-b pb-2">Contact Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="firstname" class="block text-sm font-medium text-gray-700 mb-1">First Name <span class="text-red-500">*</span></label>
                            <input type="text" name="firstname" id="firstname" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('firstname') }}" required>
                        </div>
                        
                        <div>
                            <label for="lastname" class="block text-sm font-medium text-gray-700 mb-1">Last Name <span class="text-red-500">*</span></label>
                            <input type="text" name="lastname" id="lastname" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('lastname') }}" required>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" name="email" id="email" class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label for="birthdate" class="block text-sm font-medium text-gray-700 mb-1">Birthdate <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-calendar text-gray-400"></i>
                            </div>
                            <input type="date" name="birthdate" id="birthdate" class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('birthdate') }}" required>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-md shadow-sm">
                    <h2 class="text-lg font-medium text-gray-700 mb-4 border-b pb-2">Phone Numbers</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="workphone" class="block text-sm font-medium text-gray-700 mb-1">Work Phone</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-briefcase text-gray-400"></i>
                                </div>
                                <input type="text" name="workphone" id="workphone" class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('workphone') }}">
                            </div>
                        </div>
                        
                        <div>
                            <label for="homephone" class="block text-sm font-medium text-gray-700 mb-1">Home Phone</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-home text-gray-400"></i>
                                </div>
                                <input type="text" name="homephone" id="homephone" class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('homephone') }}">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('contacts.index') }}" class="bg-white border border-gray-300 text-gray-700 font-medium py-2 px-4 rounded-md shadow-sm hover:bg-gray-50">
                        Cancel
                    </a>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-6 rounded-md shadow-sm">
                        Create Contact
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection