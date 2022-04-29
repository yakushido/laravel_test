<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <title>お問い合わせ</title>
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
    .contactForm_gender>div>input{ 
      width:10%;
    }
    .contactForm_gender>div{
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
    .contactForm_button>button{
      background-color: black;
      color: white;
      width: 150px;
      height: 40px;
      padding: 10px;
      margin: 30px;
    }
    .contactForm_button>button:hover{
      cursor: pointer;
    }
    textarea{
      width: 100%;
      border: 2px solid rgba(100, 100, 100, 0.5);
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="contactForm">
    <h1>お問い合わせ</h1>
    <form action="{{route('create.contact')}}" method="POST">
    @csrf
      <div class="contactForm_flex">
        {{-- 名前 --}}
        <div class="contactForm_name">
          <b>お名前</b>
          <div>
            <div>
              <input type="text" name="firstname" value="{{$items['firstname']}}">
              @if($errors->has('firstname'))
              <span>{{$errors -> first('firstname')}}</span>
              @endif
              <p>（例）山田</p>
            </div>
            <div>
              <input type="text" name="lastname" value="{{$items['lastname']}}">
              @if($errors->has('lastname'))
              <span>{{$errors -> first('lastname')}}</span>
              @endif
              <p>（例）太郎</p>
            </div>
          </div>
        </div>
        {{-- 性別 --}}
        <div class="contactForm_gender">
          <b>性別</b>
          <div>
            <input type="radio" name="gender" value="1" 
            <?php if($items['gender'] === "1") echo 'checked';?>
            ><b>男性</b>
            <input type="radio" name="gender" value="2"
            <?php if($items['gender'] === '2') echo 'checked';?>
            ><b>女性</b>
            @if($errors->has('gender'))
              <span>{{$errors -> first('gender')}}</span>
              @endif
          </div>
        </div>
        {{-- メールアドレス --}}
        <div>
          <b>メールアドレス</b>
          <div>
            <input type="email" name="email" value="{{$items['email']}}">
            @if($errors->has('email'))
              <span>{{$errors -> first('email')}}</span>
              @endif
            <p>（例）test@example.com</p>
          </div>
        </div>
        {{-- 郵便番号 --}}
        <div class="contactForm_post">
          <b>郵便番号</b>
          <b>〒</b>
          <div>
            <input type="text" name="postcode" value="{{$items['postcode']}}">
            @if($errors->has('postcode'))
              <span>{{$errors -> first('postcode')}}</span>
              @endif
            <p>（例）123-4567</p>
          </div>
        </div>
        {{-- 住所 --}}
        <div>
          <b>住所</b>
          <div>
            <input type="text" name="address" value="{{$items['address']}}">
            @if($errors->has('address'))
              <span>{{$errors -> first('address')}}</span>
              @endif
            <p>（例）東京都渋谷区千駄ヶ谷1-2-3</p>
          </div>
        </div>
        {{-- 建物名 --}}
        <div>
          <b>建物名</b>
          <div>
            @if(!empty($item['building_name']))
            <input type="text" name="building_name" value="{{$items['building_name']}}">
            @endif
            <p>（例）千駄ヶ谷マンション101</p>
          </div>
        </div>
        {{-- ご意見 --}}
        <div>
          <b>ご意見</b>
          <div>
            <textarea name="opinion" rows="10">{{$items['opinion']}}</textarea>
            @if($errors->has('opinion'))
              <span>{{$errors -> first('opinion')}}</span>
              @endif
          </div>
        </div>
      </div>
      <div class="contactForm_button">
        <button type="submit">確認</button>
      </div>
    </form>
  </div>
</body>
</html>