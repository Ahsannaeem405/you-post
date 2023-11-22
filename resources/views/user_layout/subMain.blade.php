<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Social Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4366d6f846.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('css/slider/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/slider/owl.theme.default.min.css')}}"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
            integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"/>
      <style>
          .successFullyAdded {
              text-align: center;
          }
          .successFullyAdded h4:last-child {
              margin-bottom: unset;
              color: rgb(165 165 165);
          }
          .successFullyAdded h4 {
              color: rgb(119 119 119);
              font-size: 17px;
          }
          .successFullyAdded h4 span {
              color: rgb(0 90 191);
          }
          .successFullyAdded i {
              background: rgb(0 172 49);
              color: #fff;
              width: 35px;
              height: 35px;
              border-radius: 50%;
              font-size: 30px;
              display: flex;
              justify-content: center;
              align-items: center;
              margin: 15px auto;
          }

          .all_social_platformWrp {
              width: 50%;
              margin: auto;
              font-family: 'Montserrat', sans-serif;
              padding: 20px;
          }
          .all_social_platformLogo {}
          .all_social_platformLogo p {
              color: rgb(168 175 180);
              font-size: 14px;
          }
          .all_social_platformLogoImg {
              width: 200px;
              margin: auto;
          }
          .all_social_platformLogoImg img {
              width: 100%;
          }
          .all_social_platformTitle {
              margin: 0 0 5px 0;
              color: rgb(119 119 119);
          }
          .all_social_platformMain {
              border: 1.5px solid rgb(199 199 199);
              border-radius: 5px;
              overflow: hidden;
          }
          .all_social_platformCnt {
              background: rgb(245 245 245);
              padding: 40px 40px 15px;
          }
          .all_social_platformCntInner {
              margin-bottom: 30px;
          }
          .all_social_platformCntInner label {
              color: rgb(159 159 163);
              margin-bottom: 5px;
              display: inline-block;
              font-size: 12px;
          }
          .all_social_platformCntInner input {
              border: 1.5px solid rgb(159 158 158);
              width: 70%;
              padding: 4px 10px;
              border-radius: 5px;
              outline: unset;
              background: #fff;
          }
          .all_social_platformCntInner input::placeholder {
              color: rgb(168 175 180);
              font-size: 12px;
          }
          .all_social_platformCntInner:last-child {
              margin-bottom: unset;
          }
          .all_social_platformCntInner:last-child label {
              margin-bottom: unset;
          }
          .all_social_platform {
              display: flex;
              background: rgb(189 195 195);
              justify-content: center;
              padding: 10px;
              flex-wrap: wrap;
          }
          .social_icon img {
              width: 30px;
              margin: 4px;
          }
          .addOtherAccountMain {
              /* background: rgb(194 226 253); */
              padding: 10px;
              margin-top: 10px;
              text-align: center;
              /* border: 1.5px solid rgb(199 199 199); */
              /* border-radius: 5px; */
          }
          .addOtherAccountMain h5 {
              margin: unset;
              color: rgb(119 119 119);
          }
          .addOtherAccountMain i {
              color: rgb(0 172 49);
              width: 30px;
              height: 30px;
              border: 2px solid;
              border-radius: 50%;
              font-size: 20px;
              padding: 3px;
              margin-top: 8px;
          }
          /* ----------------- */
          .switch {
              position: relative;
              display: inline-block;
              width: 25px;
              height: 15px;
              margin-left: 4px;
          }

          .switch input {
              opacity: 0;
              width: 0;
              height: 0;
          }

          .switch .slider {
              position: absolute;
              cursor: pointer;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              background-color: #ccc;
              -webkit-transition: .4s;
              transition: .4s;
          }

          .switch .slider:before {
              position: absolute;
              content: "";
              height: 10px;
              width: 10px;
              left: 4px;
              bottom: 2px;
              background-color: white;
              -webkit-transition: .4s;
              transition: .4s;
          }

          .switch input:checked + .slider {
              background-color: rgb(126 222 98);
          }

          .switch input:focus + .slider {
              box-shadow: 0 0 1px rgb(126 222 98);
          }

          .switch input:checked + .slider:before {
              -webkit-transform: translateX(7px);
              -ms-transform: translateX(7px);
              transform: translateX(7px);
          }

          /* Rounded sliders */
          .switch .slider.round {
              border-radius: 34px;
          }

          .switch .slider.round:before {
              border-radius: 50%;
          }
          /* ----------------- */

          .color_icon{
              display: none;
          }
          .showColorIcon .color_icon {
              display: block;
          }
          .showColorIcon .black_icon {
              display: none;
          }
          #targetContainer {
              margin: 20px 0;
          }
          #elementToEmbed {
              margin: 20px 0;
          }
          .platformBtn {
              text-align: right;
          }
          .platformBtn a {
              text-decoration: none;
              display: inline-block;
              /* background: rgb(15 116 206); */
              color: #000;
              padding: 8px 15px;
              font-weight:400;
              font-size:20px;
              font-family: 'Poppins', sans-serif;
              margin: 10px 20px 0px 0px;
              /* border-radius: 5px; */
          }
          .platformBtn a::after {
             content:"\2192";
             font-size:20px;
             font-weight:600;
             margin-left:10px;
          }
          @media screen and (max-width: 575px) {
              .all_social_platformWrp{
                  width: 90%;
              }
              /* .all_social_platform {

              } */
          }
      </style>

  </head>
  <body>

  @yield('content')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{asset('js/slider/owl.carousel.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
          integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @yield('js')

  </body>
</html>
