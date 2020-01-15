@extends('layouts.app')
@section('content')
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
    @if(Auth::check('建立測驗') || Auth::check('進行測驗'))
        @can('進行測驗')
            {{ bs()->openForm('post', 'http://127.0.0.1/exam58/public/test') }}
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
{{-- @section('js')
    <script>
        // 刪除按鈕點擊事件
        $('.btn-del-exam').click(function() {
            // 獲取按鈕上 data-id 屬性的值，也就是編號
            var id = $(this).data('id');
            // 調用 sweetalert
            swal({
                title: "確定要刪除測驗嗎？",
                text: "刪除後該測驗連同所有題目就消失救不回來囉！",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "是！含淚刪除！",
                cancelButtonText: "不...別刪",
            }).then((result) => {
                if (result.value) {
                    swal("OK！刪掉測驗惹！", "該測驗所有資料已經隨風而逝了...", "success");
                    // 調用刪除介面，用 id 來拼接出請求的 url
                    axios.delete('/exam/' + id).then(function () {
                        location.href='/exam';
                    });
                }
            });
        });
    </script>
@endsection --}}
