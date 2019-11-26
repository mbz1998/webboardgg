@extends('layouts.app')

@section('title', 'เพิ่มกระทู้ใหม่')

@section('content')
    <div class="container">
        <div class="row">
            <div class="main-content col-md-9 ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">เพิ่มกระทู้ใหม่</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/threads">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="channel_id">เลือกช่อง:</label>
                                <select name="channel_id" id="channel_id" class="form-control" required>
                                    <option value="">เลือก...</option>
                                    <option value="1"> อาหาร
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
                            </div>

                            <div class="form-group">
                                <label for="title">ชื่อเรื่อง:</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ old('title') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="body">ข้อความ:</label>
                                <textarea name="body" id="body" class="form-control" rows="8"
                                          required>{{ old('body') }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection