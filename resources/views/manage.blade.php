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
b:not(:nth-of-type(2)){
  display: inline-block;
  width: 150px;
}

.button{
  text-align: center;
}
.button>button{
  background-color: black;
  color: white;
  width: 150px;
  height: 40px;
  padding: 10px;
  margin: 30px;
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
th:not(:nth-of-type(6n-1)){
  width: 10%;
}
td:not(:last-of-type){
  text-align: center;
}
td:last-of-type{
  padding-left:40px; 
}
.paginate{
  display: flex;
  justify-content: space-between;
}
.paginate>div{
  display: flex;
  align-items: center;
}
.delete_button{
  width: 100%;
  background-color:black;
  color: white;
}
.delete_button:hover{
  opacity: 0.7;
  cursor: pointer;
}

input[type="radio"]{
  accent-color: black;
}
.opinion_full,
.opinion_omit{
  cursor: pointer;
  transition: 2s;
}
.opinion_full{
  display: none;
}
.opinion_omit.active{
  display: none;
}.opinion_full.active{
  display: block;
}
  </style>
</head>
<body>
  <h1>管理システム</h1>
  <form action="{{route('serch.contact')}}" method="POST">
  @csrf
    <div class="serch">
      <div>
        <b>お名前</b>
        <input type="text" name='fullname'>
        <b>性別</b>
        <input type="radio" class="visually-hidden" name="gender" value='"1"||"2"' checked="checked"><label class="label">全て</label> 
        <input type="radio" class="visually-hidden" name="gender" value="1"><label class="label">男性</label>
        <input type="radio" class="visually-hidden" name="gender" value="2"><label class="label">女性</label>
      </div>
      <div>
        <b>登録日</b>
        <input type="date" name="from" placeholder="from_date">
        <span>～<span>
        <input type="date" name="until" placeholder="until_date">
      </div>
      <div>
        <b>メールアドレス</b>
        <input type="email" name="email">
      </div>
      <div class="button">
        <button>検索</button><br>
        <a href="/manage">リセット</a>
      </div>
    </div>
  </form>
  <div>
    <table>
      <tr>
        <th>ID</th><th>お名前</th><th>性別</th><th>メールアドレス</th><th>ご意見</th><th></th>
      </tr>
      <div class="paginate">
        <div>全{{ $items->total() }}件中 
        {{  ($items->currentPage() -1) * $items->perPage() + 1}} - 
        {{ (($items->currentPage() -1) * $items->perPage() + 1) + (count($items) -1)  }}件</div>
        <div>{{ $items->links('vendor.pagination.bootstrap-4') }}</div>
      </div>
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
          <td id="opinion">
            <div>
              <p id="opinion_omit" class="opinion_omit">{{mb_strimwidth($item->opinion,0,25,'...')}}</p>
              <p id="opinion_full" class="opinion_full">{{$item->opinion}}</p>
            </div>
          </td>
          <td>
            <form action="{{route('delete.contact',[$item->id])}}" method="POST">
            @csrf
              <button class="delete_button">削除</button>
            </form>
          </td>
        </tr>
      @endforeach
      </table>
  </div>

  <script>
    const opinion = document.getElementById('opinion');
    const omit = document.getElementById('opinion_omit');
    const full = document.getElementById('opinion_full');

    opinion.addEventListener('mouseover', () => {
      omit.classList.toggle('active');
      full.classList.toggle('active');
    });
  </script>
</body>
</html>