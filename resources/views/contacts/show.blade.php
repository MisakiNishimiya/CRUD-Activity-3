@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Contact Details</h5>
                    <div>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('contacts.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-right font-weight-bold">ID:</div>
                        <div class="col-md-8">{{ $contact->id }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-right font-weight-bold">First Name:</div>
                        <div class="col-md-8">{{ $contact->firstname }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-right font-weight-bold">Last Name:</div>
                        <div class="col-md-8">{{ $contact->lastname }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-right font-weight-bold">Birthdate:</div>
                        <div class="col-md-8">{{ $contact->birthdate->format('Y-m-d') }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-right font-weight-bold">Work Phone:</div>
                        <div class="col-md-8">{{ $contact->workphone ?? 'N/A' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-right font-weight-bold">Home Phone:</div>
                        <div class="col-md-8">{{ $contact->homephone ?? 'N/A' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-right font-weight-bold">Email:</div>
                        <div class="col-md-8">{{ $contact->email }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-right font-weight-bold">Created By:</div>
                        <div class="col-md-8">{{ $contact->creator->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-right font-weight-bold">Created Date:</div>
                        <div class="col-md-8">{{ $contact->created_date->format('Y-m-d H:i:s') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection