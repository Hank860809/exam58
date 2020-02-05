@section('content')
    {{-- {{dd($user)}} --}}
    <h1 class="text-center">
        {{$exam->title}}
        @can('建立測驗')
            <a href="{{route('exam.edit', $exam->id)}}"  class="btn btn-primary" role="button">編輯</a>
            {{-- <button type="button" class="btn btn-danger btn-del-exam" data-id="{{ $exam->id }}">刪除</button> --}}
            <form action="{{route('exam.destroy', $exam->id)}}" method="POST" style="display:inline">
                @csrf
                @method('delete')
                <button type="submit"  class="btn btn-danger">刪除</button>
            </form>
        @endcan
    </h1>
    @can('建立測驗')
        @include('exam.form')
    @endcan
    @if($user->can('建立測驗') || $user->can('進行測驗'))
        @can('進行測驗')
            {{ bs()->openForm('post', 'http://localhost/exam58/public/test') }}
                @include('exam.topic')
                {{ bs()->hidden('user_id', Auth::id()) }}
                {{ bs()->hidden('exam_id', $exam->id) }}
                <div class="text-center my-5">
                    {{ bs()->submit('寫完送出') }}
                </div>
            {{ bs()->closeForm() }}
        @else
            @include('exam.topic')
        @endcan
    @else
        @component('bs::alert', ['type' => 'info'])
            共 {{ $exam->topics->count() }} 題
        @endcomponent
    @endif
    <div class="text-center">
        發佈於 {{$exam->created_at->format("Y年m月d日 H:i:s")}} / 最後更新： {{$exam->updated_at->format("Y年m月d日 H:i:s")}}
    </div>
@endsection
@can('建立測驗')
    @include('backpack::layout')
@else
    @include('layouts.app')
@endif
