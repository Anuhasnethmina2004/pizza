@extends('layouts.header')

@section('title', 'Pizza Delivery App')

@section('content')
<style>
    *{
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  scroll-behavior: smooth;
}
body{
  font-family: sans-serif;
  background: #000;
  color: white;
}


/*main*/
.logo{
  text-align: center;
}
.lline{
  position: absolute;
  width: 40%;
  top: 8vh;
  border: 2px solid #ec953c;
}
.rline{
  position: absolute;
  width: 40%;
  top: 8vh;
  right: 0;
  border: 2px solid #ec953c;
}
.menu{
  text-align: center;
  list-style: none;
}
.menu ul li{
  display: inline-block;
  padding: 1vh 4vh 0;
}
.menu ul li a{
  font-size: 3vh;
  color: white;
  font-family: 'Quicksand';
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
  transition: ease-in-out 100ms;
}
.menu ul li a:hover{
  color: #ec953c;
}
.menu ul li .active{
  color: #ec953c;
}




/*FormDesign*/
.formDesign{
  width: 70%;
  margin: 0 auto;
  border: 2px solid white;
  border-radius: 5px;
  display: block;
}
.formDesign h2{
  background-color: #ec953c;
  color: white;
  text-align: center;
  text-transform:uppercase;
  padding: 4vh 0;
  margin-bottom: 2vh;
}
#form{
  margin-bottom: 8vh;
}
form{
  padding: 5vh;
}
form label{
  color: #ec953c;
  font-size: 2.4vh;
}
form button{
  border-radius: 5px;
}
.form-check label{
  color: white;
}
.rpizza, .lpizza{
  position: absolute;
}
.rpizza{
  width: 20%;
  margin: 9vh auto;
  right: 5.5vh;
}
.lpizza{
  left: 5.6vh;
  width: 20%;
  overflow: hidden;
}

/*Footer*/
#footer{
  background-color: #111111;
  bottom: 0;
  padding: 3vh 0;
}
.footerText{
  padding-bottom: 2vh;
}
.left{
  float: left;
}
.right{
  float: right;
}


/*Successful*/
.bg-pizza{
  background: url('https://i.postimg.cc/1tcRYdzn/4.jpg');
  height: 72vh;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.layer{
  background-color: #ec953c5e;
  height: 72vh;
}
.successfulBox{
  text-transform: uppercase;
  text-align: center;
  font-size: 6vh;
  width: 50%;
  padding-top: 8vh;
}

</style>
<!--landing-->
<div id="marginbt">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <div class="land-img-pos">
          <img src="https://i.postimg.cc/6qX28R8R/2.png" alt="">
        </div>
      </div>
      <div class="col-6">
        <div class="land-txt-pos">
          <h1>Pizza Heaven</h1>
          Welcome to Pizza Heaven – your go-to place for delicious, handcrafted pizzas made with fresh, quality ingredients. Whether you crave classic flavors or unique combinations, we’ve got something for everyone. Enjoy a seamless ordering experience, real-time tracking, and great deals. Taste the difference at Pizza Heaven – where every bite is a slice of perfection!
        </div>
        <button type="button" name="button" class="fbtn" ><a href="{{ route('pizza.builder') }}">Order Now</a></button>

      </div>
    </div>
  </div>
</div>
    <!-- Contact Section -->
    <div style="padding: 40px 20px; background-color: #1f1f1f; text-align: center;">
        <h2 style="font-size: 2rem; color: #feb47b; margin-bottom: 20px;">Contact Us</h2>
        <p style="font-size: 1rem; color: #ccc;">Have questions? Reach out to us at <a href="mailto:info@pizzahaven.com" style="color: #ff7e5f; text-decoration: none;">info@pizzahaven.com</a>.</p>
    </div>

@endsection
