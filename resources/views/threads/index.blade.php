@extends('layouts.app')


@section('title', 'กระทู้ทั้งหมด')

@section('content')
<div class="container">
<ul class="navbar-nav mr-auto">
                       
<!-- <a class="nav-link" href="/threads?by={{auth()->user()->channel_id}}">
                                <font color="#EEEEEE"> อาหาร </font>
                            </a>
                            <a class="nav-link" href="/threads?by={{auth()->user()->channel_id}}">
                                <font color="#EEEEEE"> เครื่องดื่ม </font>
                            </a>
                            <a class="nav-link" href="/threads?by={{auth()->user()->channel_id}}">
                                <font color="#EEEEEE"> ท่องเที่ยว </font>
                            </a> -->
                          
<!--div class="form-group">
                                <label for="channel_id">เลือกช่อง:</label>
                                <select name="channel_id" id="channel_id" class="form-control" required>
                                    <option value="">เลือก...</option>                           
                                    <option value="1"> อาหาร 
                                    <a href= "/threads?by={{auth()->user()->id}}"></a>
                                        </option>
                                        <option value="2"> เครื่องดื่ม
                                        </option>
                                        <option value="3"> ท่องเที่ยว
                                        </option>
                                    @foreach ($channels as $channel)
                                        <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                            {{ $channel->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div-->
    <div class="row">
        <div class="main-content col-md-9 mb-md-3">
            <div class="cardborder-primary mb-3">
                <div class="card-header" style=" background-color: rgb(128,0,128,1.0);">
                    <h3 class="card-title">
                        <font color="#EEEEEE">กระทู้ทั้งหมด</font>
                    </h3>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($threads as $thread)
                    <li class="list-group-item">
                        <div class="media">
                            <a href="{{ route('profile', $thread->creator->id) }}">
                                <img class="pull-left rounded-circle mt-1 mr-2" width="32" src="{{ $thread->creator->avatar_path }}" alt="">
                            </a>
                            <div class="media-body">
                                <a class="text-dark" href="{{ $thread->path() }}">
                                    {{ $thread->title }}
                                </a>
                                <p class="text-xs-muted mb-0">{{ $thread->creator->name }} started {{ $thread->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </li>
                    @empty
                    <li class="list-group-item text-center">
                        ยังไม่มีกระทู้ใหม่ในขณะนี้
                    </li>
                    @endforelse
                </ul>
            </div>
            {{ $threads->links() }}
        </div>
        <div class="sidebar col-md-3">
            @include('threads._sidebar')
        </div>
    </div>
</div>
@endsection