@section('content')
    <h1>測驗一覽<small>（共 {{$exams->total()}} 筆資料）</small></h1>
    <ul class="list-group">
        @if(Auth::user()==null)
            <li class="list-group-item">請先登入</li>
        @else
            @forelse  ($exams as $exam)
            {{-- {{dd($exams)}} --}}
                <li class="list-group-item">
                @if(!$exam->enable==1)
                    {{ bs()->badge()->text('關閉') }}
                @endif
                    {{$exam->created_at->format("Y年m月d日") }} -
                    <a href="exam/{{$exam->id}}">
                    {{$exam->title}}
                    </a>
                </li>
            @empty
                <li class="list-group-item">尚無任何測驗</li>
            @endforelse
        @endif
    </ul>
    <div class="my-3">
        {{ $exams->links() }}
    </div>
@endsection
@can('建立測驗')
    @include('backpack::layout')
@else
    @include('layouts.app')
@endif
