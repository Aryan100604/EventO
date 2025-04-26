@extends('layouts.app')

@section('title', 'Events')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Events</h2>
        <a href="{{ route('events.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Create Event
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <span class="badge bg-{{ $event->status === 'completed' ? 'success' : ($event->status === 'in_progress' ? 'primary' : 'warning') }}">
                                {{ ucfirst($event->status) }}
                            </span>
                        </div>
                        <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i> {{ $event->start_date->format('M d, Y') }} - {{ $event->end_date->format('M d, Y') }}
                            </small>
                        </div>
                        @if($event->location)
                            <div class="mb-3">
                                <small class="text-muted">
                                    <i class="bi bi-geo-alt"></i> {{ $event->location }}
                                </small>
                            </div>
                        @endif
                        <div class="progress mb-3" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: {{ $event->progress }}%;" 
                                aria-valuenow="{{ $event->progress }}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('events.show', $event) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <div>
                                <a href="{{ route('events.edit', $event) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No events found. Create your first event to get started!
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection 