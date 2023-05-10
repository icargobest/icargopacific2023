{{-- <link rel="stylesheet" href="{{ asset('css/modal.css') }}"> --}}
<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}

.socialeditform{
    background-color: #ffffff;
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
.maininfo{
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
.fileimage{
    /* display: none; */
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
        <div class="socialeditform" id="socialeditform">
            <form>
                <div class="title">
                    UPLOAD PHOTO
                    <button type="submit" class="buttonClose" onclick="photoclosePopup()">&#x2715</button>
                </div>
                <div class="maininfo">
                    <div class="contactcontainer">
                        <input type="file" id="img" class="fileimage" accept="image/*">
                    </div>
                    <div class="buttons">
                        <input class="buttonSave" type="submit" value="UPLOAD">
                    </div>  
                </div>
            </form>
        </div>
        

    
    <Script>
        let socialpopup = document.getElementById("socialeditform");
            
            function photopenPopup(){
                socialpopup.classList.add("pop-editform");
            }
            function photoclosePopup(){
                socialpopup.classList.remove("pop-editform");
            }
    </Script>