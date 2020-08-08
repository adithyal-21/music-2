<!DOCTYPE html>
        <html lang="en">
        <head>
          <title>Music player</title>
          <link href="player.css" rel="stylesheet">
          <link rel="icon" href="title.jpeg" type="image/x-icon" />
       <link href="edit.css" rel="stylesheet">
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
          <style>
          .songtitles{
    color:whitesmoke;
    width:350px;
    background-color: black;
    text-align: center;
    position: absolute;
    left:6%;
    bottom:28%;
    font-family:Coronetscript, cursive;
    height:98px;
    border-radius:30px;
    }
    .plays,.pre,.next
    {
    cursor: pointer;
    }
    .buttons{
        position:relative;
       text-align:center;
       margin-bottom:60px;
      
      
    }
    .plays{
        border-radius: 30%;
        background-color: black;
    }
    .pre{
       
        position: absolute;
        right:240px;
        border-radius: 30%;
        background-color: black;
       
    }
    .next{
       
        position: absolute;
        left:250px;
        border-radius: 30%;
        background-color: black;
    }
    .seeks{
        width: 300px;height: 5px;
    background-color: whitesmoke;border-radius: 50px;
    cursor: pointer;display: flex;margin-left: 40px;
    position:absolute;bottom:13%;
    }
    .fills
    {
        height: 5px;background-color: royalblue;border-radius: 20px;
    }
    .handles{
        width:8px ;height: 5px;background-color: royalblue;border-radius: 50%;
        margin-left: -5px;transform: scale(2);
    }
    .tim{
        color: whitesmoke;
        font-family:Coronetscript, cursive;
        position: absolute;
        top:88%;
      left: 15%;
      font-size:13px;
    }
    .min{
        position: absolute;
        right:130px;
        cursor: pointer;
        border-radius: 30%;
        background-color: black;
        bottom:-1%;
        right:120px;
    }
    .spe{
        position: absolute;
        right:80px;
        border-radius: 30%;
        background-color: black;
        bottom:-1%;
        right:65px;
        
    }
    .add{
        position: absolute;
        right:30px;
        cursor: pointer;
        border-radius: 30%;
        background-color: black;
        bottom:-1%;
        right:10px;
    }
    .pl{
        position: absolute;
        left:10px;
        cursor: pointer;
        border-radius: 30%;
        background-color: black;
        bottom:-1%;
    }
    .re{
      position: absolute;
        left:65px;
        cursor: pointer;
        border-radius: 30%;
        background-color: black;
        bottom:-1%;
    }
        
          </style>
          </head>
          <body style="background:url(playback.jpeg)no-repeat;background-position:fixed;background-size:cover">
           
           <div class="container" style="height:550px;width:400px;border:solid 3px black;position:relative;margin-top:40px;border-radius:30px;-webkit-box-shadow:-1px 4px 26px 11px black;-maz-box-shadow:-10px 4px 26px 15px  black;box-shadow:  -1px 3px 26px 18px  black;"">
           <div class="row">
           <div class="col-sm-12">
     <div id="image">
           <img src="playback.jpeg" style="height:300px;width:400px;position:relative;left:-5%;margin-bottom:20px;border-radius:30px">
     </div>
 <br>
 <div class="player"> <br>
 
     <div id="songtitle" class="songtitles">
     </div><br><br>
 
       <div class="buttons">
           <button class="pre"><img src="logo/back.png"></button>
           <button class="plays" id="play" ><img src="logo/signs.png"></button>
           <button class="next" ><img src="logo/button.png"></button>
       </div><br>
 
         <div class="seeks"  id="seek">
             <div  class="fills" id="fill"></div>
             <div class="handles" id="handle"></div>
         </div>
 
             <div id="currentTime" class="tim">00:00/00:00
             </div><br>
 
                <div id="volume" class="vol">
                     <button  id="minus" class="min" onclick="decrease()"><img src="logo/lines.png"></button>
                     <button  id="speaker" class="spe"><img src="logo/communications.png"></button>
                     <button  id="plus" class="add" onclick="increase()"><img src="logo/signs (1).png"></button>
                     <button  id="playlist" class="pl" onclick="update()"><img src="logo/play-button.png"></button>
                     <button  id="repeat" class="re"><img src="logo/repeat.png"></button>
                 </div>
  </div>
    </div>
      </div>
        </div>
        <script>
    
 function update()
  {
    var minus=document.createElement("img");
   minus.src="logo/signs.png";
     minus.className="minu";
    var input=document.createElement("INPUT");
    input.type="file";
    input.accept=".mp3"
    input.click();
    input.onchange=function()
    {
      var songname=this.files[0].name;
      document.querySelector("#songtitle").innerHTML=songname;
      var url=URL.createObjectURL(this.files[0]);
      var audio=document.createElement("AUDIO");
      audio.src=url;
      audio.play();
      audio.onplay=function()
      {
        $("#play img").attr("src","logo/signs.png");
        document.querySelector("#play").onclick=function()
        {
          audio.pause();
          $("#play img").attr("src","logo/arro.png");
        } 
        
      }
      audio.onpause=function()
      {
        $("#play img").attr("src","logo/arro.png");
        document.querySelector("#play").onclick=function()
        {
          audio.play();
          $("#play img").attr("src","logo/signs.png");
        } 
        
      }
      audio.ontimeupdate=function()
      {
        var duration=this.duration;
        var current=this.currentTime;
        var percent=Math.floor((current*100)/duration);
        var progress=document.querySelector("#fill");
        fill.style.width=percent+"%";
        document.querySelector("#currentTime").innerHTML=(current/60).toFixed(2)+"/"+(duration/60).toFixed(2);
        document.querySelector("#seek").onclick=function(e){
        var forward=e.offsetX/this.offsetWidth;
        audio.currentTime=forward*audio.duration;
       
        }
      }
    
    }
    }

   
  
  </script>
           
          </body>

</html>