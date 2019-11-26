@extends('layouts.app')
@section('bg', '../img/bg.jpg')
@section('title', $thread->title)

@section('content')
<thread-view :thread="{{ $thread }}" inline-template>
    <div class="container">
        <div class="row">
            <div class="col-md-9 main-content thread-show">
                <div class="card mb-3">
                    <div class="card-header">
                        <h1 class="thread-title">{{ $thread->title }}</h1>
                        <div class="text-xs-muted">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            Published {{ $thread->created_at->diffForHumans() }} By
                            <a href="{{ route('profile', $thread->creator) }}">
                                {{ $thread->creator->name }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                    @can ('delete', $thread)
                    <div class="card-footer py-0">
                        <div class="actions d-flex justify-content-end">
                            <form action="{{ $thread->path() }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-link text-muted">ลบกระทู้</button>
                            </form>
                        </div>
                    </div>
                    @endcan
                </div>

                <!--div class="reply-box">
                    <div class="form-group">
                        <textarea name="destroy" id="destroy" placeholder="Have something to say?" rows="3" required="required" class="form-control">
                        </textarea></div> <button class="btn btn-sm btn-primary">Post</button-->
                <!--div-->
                <replies :replies-count="repliesCount" @added="repliesCount++" @removed="repliesCount--"></replies>
            </div>
        </div>
    </div>
</thread-view>
@endsection