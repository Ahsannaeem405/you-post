
@extends('user_layout.subMain')
<style>
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
        background: rgb(194 226 253);
        padding: 10px;
        margin-top: 10px;
        text-align: center;
        border: 1.5px solid rgb(199 199 199);
        border-radius: 5px;
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
        background: rgb(15 116 206);
        color: #fff;
        padding: 8px 15px;
        margin: 10px 0;
        border-radius: 5px;
    }
    @media screen and (max-width: 575px) {
        .all_social_platformWrp{
            width: 90%;
        }
        /* .all_social_platform {

        } */
    }
</style>


<section class="all_social_platformWrp">

    <div class="all_social_platformLogo">
        <div class="all_social_platformLogoImg">
            <a href="{{ url('/') }}">
                <img src="{{asset('images/YouPost_Logo.png')}}" class="" alt=""/>
            </a>
        </div>
        <p>
            Thanks forsigning up Doug, <br>
            Let’s add your first account and connectit’s social platforms
        </p>
    </div>

    
    <div id="elementToEmbed">
        <h5 class="all_social_platformTitle">Account #1 : Tito’sTacos</h5>
        <div class="all_social_platformMain">

            <div class="all_social_platformCnt">
                <div class="all_social_platformCntInner"> 
                    <label for="">1.Name,Example:“Tito’sTacos”</label>
                    <br>
                    <input type="text" name="" id="" placeholder="Organization Name">
                </div>

                <div class="all_social_platformCntInner">
                    <label for="">2.Switch on & connect social post platforms for “Tito’sTacos” : FaceBook, Instagram, etc...
                    </label>
                </div>
            </div>

            <div class="all_social_platform">
                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/FB_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/FB_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox"  id="checkboxId">
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Instagram_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Instagram_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox">
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Twitter_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Twitter_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Linkedin_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Linkedin_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox">
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Tiktok_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Tiktok_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox">
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Youtube_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Youtube_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox">
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/Telegram_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/Telegram_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox">
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="single_platform">
                    <div class="social_icon">
                        <img src="{{asset('images/WhatsApp_Color.png')}}" class="color_icon" alt=""/>
                        <img src="{{asset('images/WhatsApp_Black.png')}}" class="black_icon" alt=""/>
                    </div>
                    <label class="switch">
                        <input type="checkbox" class="customCheckbox">
                        <span class="slider round"></span>
                    </label>
                </div>


            </div>

        </div>
    </div>

    <div class="addOtherAccountMain">
        <h5>Add Another Account</h5>
        <div>
            <i class="fa-solid fa-plus" id="addAccount"></i>
        </div>
    </div>
    <div class="platformBtn">
        <a href="{{ url('/') }}" class="">Dashboard</a>
    </div>


    <div id="targetContainer"></div>

</section>



<script>

    var checkboxes = document.querySelectorAll('.customCheckbox');

        checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var grandparentElement = checkbox.parentNode.parentNode;

            if (checkbox.checked) {
            grandparentElement.classList.add('showColorIcon');
            } else {
            grandparentElement.classList.remove('showColorIcon');
            }
        });
    });




    // creating colone
    // creating colone
    var embedButton = document.getElementById('addAccount');
    var targetContainer = document.getElementById('targetContainer');
    var elementToEmbed = document.getElementById('elementToEmbed');
    var accountNumber = 1; 

    embedButton.addEventListener('click', function() {
        var embeddedElement = elementToEmbed.cloneNode(true); 
        var accountTitle = embeddedElement.querySelector('.all_social_platformTitle');
        
        accountNumber++;
        accountTitle.textContent = "Account #" + accountNumber + " : Tito’sTacos";

        targetContainer.appendChild(embeddedElement);
    });


</script>



