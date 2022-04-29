<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    .contactForm{
      margin: 0 50px;
    }
    h1{
      text-align: center;
    }
    .contactTable{
      width: 100%;
    }
    input{
      width: 100%;
      height: 30px;
      border: 2px solid rgba(100, 100, 100, 0.5);
      border-radius: 5px;
    }
    .contactForm_flex>div,
    .contactForm_flex>div:first-child>div{
      display: flex;
    }
    .contactForm_flex>div{
      margin-bottom: 10px;
    }
    .contactForm_flex>div>b{
      width: 20%;
    }
    .contactForm_flex>div>div{
      width: 80%;
    }
    .contactForm_name>div>div{
      width: 45%;
    }
    .contactForm_name>div>div:first-child{
      margin-right: 10%;
    }
    .contactForm_sex>div>input{ 
      width:10%;
    }
    .contactForm_sex>div{
      display: flex;
      align-items: center;
    }
    .contactForm_post>b:nth-child(2){
      width:30px;
    }
    p{
      color: rgba(100, 100, 100, 0.5);
    }
    b{
      padding:5px; 
    }
    .contactForm_button{
      text-align: center;
    }
    .contactForm_button>button:first-child{
      background-color: black;
      color: white;
      width: 150px;
      height: 40px;
      padding: 10px;
      margin: 30px;
    }
    .contactForm_button>button:last-child{
      background:none; 
      border: none;
      text-decoration: underline;
    }
    .contactForm_button>button:hover{
      opacity:0.7;
    }
    .contactForm_button>button,
    a{
      cursor: pointer;
    }
    textarea{
      width: 100%;
      border: 2px solid rgba(100, 100, 100, 0.5);
      border-radius: 5px;
    }
  </style>
  <title>内容確認</title>
</head>
<body>
    <div class="contactForm">
    <h1>お問い合わせ</h1>
    <form action="{{route('create.contact',$items)}}" method="POST">
    @csrf
      {{-- @foreach ($items as $item) --}}
        <div class="contactForm_flex">
          {{-- 名前 --}}
          <div class="contactForm_name">
            <b>お名前</b>
            <div>
              {{$items['fullname']}}
            </div>
          </div>
          {{-- 性別 --}}
          <div class="contactForm_sex">
            <b>性別</b>
            <div>
              @if ($items['gender'] == 1)
                男性
              @elseif($items['gender'] == 2)
                女性
              @endif
            </div>
          </div>
          {{-- メールアドレス --}}
          <div>
            <b>メールアドレス</b>
            <div>
              {{$items['email']}}
              
            </div>
          </div>
          {{-- 郵便番号 --}}
          <div class="contactForm_post">
            <b>郵便番号</b>
            <b>〒</b>
            <div>
              {{$items['postcode']}}
            </div>
          </div>
          {{-- 住所 --}}
          <div>
            <b>住所</b>
            <div>
              {{$items['address']}}
            </div>
          </div>
          {{-- 建物名 --}}
          <div>
            <b>建物名</b>
            <div>
              {{$items['building_name']}}
            </div>
          </div>
          {{-- ご意見 --}}
          <div>
            <b>ご意見</b>
            <div>
              {{$items['opinion']}}
            </div>
          </div>
        </div>
        <div class="contactForm_button">
          <button type="submit">送信</button><br>
          <button type="submit" formaction="{{route('modif.contact',$items)}}">
          修正する
        </button>
        </div>
      {{-- @endforeach --}}
    </form>
  </div>
</body>
</html>