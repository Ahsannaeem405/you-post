
@extends('user_layout.subMain')
<style>
    .all_social_platformWrp {
        width: 50%;
        margin: auto;
        font-family: 'Montserrat', sans-serif;
        padding: 20px;
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

    @media screen and (max-width: 575px) {
        .all_social_platformWrp{
            width: 90%;
        }
    }
</style>


<section class="all_social_platformWrp">
    <div id="elementToEmbed">
        <div class="all_social_platformMain">

            <div class="all_social_platformCnt successFullyAdded">
                <h4>Facebook, Successfuly Added: <span>“Tito’sTacos” </span> </h4>
                <div>
                    <i class="fa-solid fa-check"></i>
                </div>
                <h4>Connect more posting platforms: </h4>
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

    {{-- <div class="addOtherAccountMain">
        <h5>Add Another Account</h5>
        <div>
            <i class="fa-solid fa-plus" id="addAccount"></i>
        </div>
    </div> --}}

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

</script>


