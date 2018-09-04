@extends('admin.layouts.admin_app')

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
              <td>{!! link_to_route('admin.edit', '編集', ['id' => $searchWord['id']]) !!}</td>
              <!--<td>削除</td>-->
              <!--<td><a href="#" class="delete-button">削除</a></td>-->
              <td>{!! link_to_route('admin.destroy', '削除', ['id' => $searchWord['id']], ['name' => 'del', 'class' => 'delete-button']) !!}</td>
            </tr>
          @endforeach
        </table>
        
    </div>

  <script>
/*
    var btn = document.getElementById('btn');
    btn.addEventListener('click', function() {
      var result = window.confirm("本当に削除しますか");
    
      if( result ) {
   
          alert('はい');
          submit();
   
      }
      else {
   
          alert('いいえ');
      }
    })
*/
$('.delete-button').on('click', function() {
    // alert('削除ボタンがクリックされたよ')
    var url = $(this).attr('href')
    // var adr = document.getElementById('td').children[0]
    
    var result = window.confirm('削除ボタンがクリックされたよ')
    
    // console.log(result);
      if( result ) {
          var $form = $([
             '<form method="POST" action="' + url + '" accept-charset="UTF-8">',
             '<input name="_method" type="hidden" value="delete">',
            '<input name="_token" type="hidden" value="' + $('meta[name="csrf-token"]').attr('content') + '">',
            '</form>'
          ].join(''));

          $('body').append($form);

          /*
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('delete-button')
              }
          });
          */
          // $('form').submit()
          $form.ready(function () {
          // formが読み込まれたらsubmitして削除処理を実行
            $form.submit();
          });
      }else {
   
          alert('いいえ');
      }
    
});
  </script>
@endsection
