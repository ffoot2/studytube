@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>検索ワード一覧</h1>
    </div>
    {!! link_to_route('admin.create', '新規作成') !!}
    <div class="table-responsive">
        <table class="table">
          <tr>
            <th>id</th>
            <th>カテゴリ</th>
            <th>ソート</th>
            <th>編集</th>
            <th>削除</th>
          </tr>
          @foreach($searchWords as $searchWord)
            <tr>
              <td><?php echo $searchWord['id'] ?></td>
              <td><?php echo $searchWord['word'] ?></td>
              <td><?php echo $searchWord['sort'] ?></td>
              <td>編集</td>
              <td>削除</td>
            </tr>
          @endforeach
        </table>
    </div>

@endsection
