{{-- <link rel="stylesheet" href="{{ asset('css/modal.css') }}"> --}}
<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}
.mainform{
    border: red solid 2px

}
.companyeditform{
    max-width: 600px;
    width: 60%;
    border: #696969 solid 2px;
    padding: 20px;
    border-radius: 4px;
    /* display: none; */
    visibility: hidden;
    transform: translate(-50%, -50%) scale(0.1);
    position: absolute;
    top: 40%;
    left: 60%;
    transition: transform 0.4s, top 0.4s;
}
.title{
    color: #214D94; 
    font-size: 25px;
    font-weight: bolder;
    letter-spacing: 3px;
    padding-bottom: 15px;
    margin-bottom: 15px;
    border-bottom: 2px solid #696969;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.buttonClose{
    background-color: #ffffff;
    margin-top: -10px;
    border: none;
    padding-top: -2px;
    font-size: 25px;
}
.caddress{
    border: 2px solid #696969;
    border-radius: 4px;
    margin-bottom: 15px;
    padding: 8px;
    font-size: 18;
    width: 100%;
}
.contactcontainer{
    display: flex;
    flex-direction: column;
}
.buttons{
    display: flex;
    justify-content: end;
}
.buttonSave{
    color: #ffffff;
    border-radius: 4px;
    font-size: 16px;
    border: none;
    background-color: #2557A7;
    padding: 10px 40px;
    font-weight: bolder;
}

.pop-editform{
    /* display: block; */
    visibility: visible;
    transform: translate(-50%, -50%) scale(1);
}
</style>

<div class="mainform">
    <button type="submit" class="profileButton" onclick="openPopup()">&#x2715</button>
    <div class="companyeditform" id="companyeditform">
        <form>
            <div class="title">
                EDIT INFORMATION
                <button type="submit" class="buttonClose" onclick="closePopup()">&#x2715</button>
            </div>
            <div class="maininfo">
                <div class="contactcontainer">
                    <input type="text" class="caddress" placeholder="Company name" required>
                    <input type="text" class="caddress" placeholder="Mobile Number" required>
                    <input type="text" class="caddress" placeholder="Telephone" required>
                    <input type="text" class="caddress" placeholder="Email address" required>
                </div>
            </div>
            <div class="buttons">
                <input class="buttonSave" type="submit" value="SAVE">
            </div>  
        </form>
    </div>
</div>

<Script>
    let companypopup = document.getElementById("companyeditform");
        
        function openPopup(){
            companypopup.classList.add("pop-editform");
        }
        function closePopup(){
            companypopup.classList.remove("pop-editform");
        }
</Script>