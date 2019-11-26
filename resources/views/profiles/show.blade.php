@extends('layouts.app')

@section('title', $profileUser->name)

@section('content')
    <div class="profile-card py-2 py-sm-4">
        <div class="container">
            <avatar-form :user="{{ $profileUser }}"></avatar-form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="sidebar col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
                <div class="card">
                    <div class="card-body">
                        5
                    </div>
                </div>
            </div>

            <div class="main-content col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thread</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($threads as $thread)
                            <li class="list-group-item">
                                <a href="{{ url($thread->path()) }}">
                                    {{ $thread->title }}
                                </a>
                                <span class="text-xs-muted pull-right">
                                    {{ $thread->created_at->diffForHumans() }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        {{ $threads->links() }}
    </div>
@endsection