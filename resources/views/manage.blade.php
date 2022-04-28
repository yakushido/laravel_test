<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>管理ページ</title>
  <style>
.serch{
  border: 2px solid black;
  padding: 15px;
}
input:not([type='radio']){
  width: 400px;
  height: 30px;
  border: 2px solid rgba(100, 100, 100, 0.5);
  border-radius: 5px;
  margin:10px ;
}
label:not(:nth-of-type(2)){
  display: inline-block;
  width: 150px;
}
label:nth-of-type(2){
  margin-left: 20px;
}
input[type='radio']{
  margin: 0 20px;
}
.button{
  text-align: center;
}
.button>button:first-child{
      background-color: black;
      color: white;
      width: 150px;
      height: 40px;
      padding: 10px;
      margin: 30px;
    }
    .button>button:last-child{
      background:none; 
      border: none;
      text-decoration: underline;
    }
    .button>button:hover{
      opacity:0.7;
      cursor: pointer;
    }
    table{
      border-collapse: collapse;
    }
    th{
      border-bottom: 2px solid black;
    }
    th:not(:last-of-type){
      width: 15%;
    }
    td:not(:last-of-type){
      text-align: center;
    }
    td:last-of-type{
      padding-left:40px; 
    }
  </style>
</head>
<body>
  <h1>管理システム</h1>
  <form action="{{route('serch.contact')}}" method="POST">
  @csrf
    <div class="serch">
      <div>
        <label>お名前</label>
        <input type="text" name='fullname'>
        <label>性別</label>
        <input type="radio" name="gender" value='"1"||"2"' checked>全て
        <input type="radio" name="gender" value="1">男性
        <input type="radio" name="gender" value="2">女性
      </div>
      <div>
        <label>登録日</label>
        <input type="date" name="from" placeholder="from_date">
        <span>～<span>
        <input type="date" name="until" placeholder="until_date">
      </div>
      <div>
        <label>メールアドレス</label>
        <input type="text" name="email">
      </div>
      <div class="button">
        <button>検索</button><br>
        <button>リセット</button>
      </div>
    </div>
  </form>
  <div>
    <table>
      <tr>
        <th>ID</th><th>お名前</th><th>性別</th><th>メールアドレス</th><th>ご意見</th>
      </tr>
      {{ $items->links('vendor.pagination.default') }}
      <p>全{{ $items->total() }}件中 
       {{  ($items->currentPage() -1) * $items->perPage() + 1}} - 
       {{ (($items->currentPage() -1) * $items->perPage() + 1) + (count($items) -1)  }}件</p>
      @foreach($items as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->fullname}} </td>
          <td>
            @if($item->gender===1)
              男性
            @elseif($item->gender===2)
              女性
            @endif
          </td>
          <td>{{$item->email}}</td>
          <td>{{mb_strimwidth($item->opinion,0,25,'...')}}</td>
          <td>
            <form action="{{route('delete.contact',[$item->id])}}" method="POST">
            @csrf
              <button>削除</button>
            </form>
          </td>
        </tr>
      @endforeach
      </table>
  </div>
</body>
</html>