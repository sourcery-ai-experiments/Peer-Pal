<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/homepage.css">
  <title>PeerPal | HomePage</title>
</head>
<body>
  <!-- HEADER / NAVBAR -->
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c83e7dbac7.js" crossorigin="anonymous"></script>
    <title>Nav bar</title>



    <style>

                    * {   
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }


                header {
                       
                        padding: 10px; 
                        }



                nav  {
                        display: flex;
                       align-items: center;
                        justify-content: space-between;
                    }


                
                    a {
                        
                        color: #000;
                        text-decoration: none;
                        padding: 20px;
                        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                        font-size: 14px; 
                        position: relative; 
                    }

                
                    a::before {
                            content: '';
                            position: absolute;
                            left: 0;
                            bottom: -2px; 
                            width: 100%;
                            height: 2px; 
                            background-color:purple;
                            transition: width 0.3s ease; 
                            opacity: 0; 
                        }
                    
                
                        a:hover::before {
                            opacity: 1; 
                        }
                        
                        

                    ul {
                        
                            list-style-type: none;
                            display: flex;
                        }
        

                    .log {
                    height: 150px;
                    width: auto; 
                    margin-right: 40px;
                         }
             
           

                    .dop {
                    margin-left: 120PX;
                    position: relative;
                    display: inline-block;
                         }

                    
                    .dok {
                        background-color: purple;
                        color: #000;
                        padding: 10px;
                        border: none;
                        cursor: pointer;
                        font-size:medium; 
                        font-weight:100; 
                        font-family: 'Arial', sans-serif;
                        margin-right: 30px;
                        width: 100px;
                        border-radius: 20px;

                          }

                .dok:hover{
                        background-color: #140202;
                        color: rgb(255, 255, 255);
                        height: 40px;
                          }
                    
                     .dox {
                        display: none;
                        position: absolute;
                        background-color: #fff;
                        min-width: 160px;
                        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                        z-index: 1;
                    
                           }

                    
                    .dox a {
                        color: #000;
                        padding: 12px 16px;
                        text-decoration: none;
                        display: block;

                        
                           }

                    
              .dox a:hover {
                        background-color: #f0f0f0;
                        
                           }

                    
            .dop:hover .dox{
                        display: block;
                        
                            }


    </style>



</head>



<body>
    
<header>

    <nav>


       
        <nav>
            
           <img src="pawon.png" class="log">
    
          </nav>


        <ul>
            <li><a href="#">Home</a></li>
           
            <li><a href="#">Find Friends</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Notifications</a></li>
            <li><a href="#">Explore</a></li>
          
        </ul>
       
        <ul>
          

            <div class="dop">
                <button class="dok">More</i></button>
                <div class="dox">
                 <a href="#">Events</a>
                  <a href="#">About</a>
                  <a href="#">Help/Support</a>
                  <a style="text-align: center;" href="#">Log out</a>
                </div>
            </div>
               
        
    </ul>
    
    </nav>



 </div>

</header>



<script>
    function toggleMenu() {
      var menu = document.getElementById("menu");
      menu.style.display = menu.style.display === "block" ? "none" : "block";
    }

  
    function toggleMenu() {
    var menu = document.getElementById("menu");
    menu.style.display = menu.style.display === "none" ? "block" : "none";
  }
</script>
</body>
</html>
  <!-- MAIN -->
  <div class="hero">
    <div class="hero__content">
      <h1 class="hero__title">BuddyConnect: Forge Connections, Foster Growth</h1>
      <p class="hero__subtitle">Discover Your Perfect Study Buddy and Thrive Together</p>
      <a href="/login.php" class="hero__button">Browse</a>
    </div>
  </div>
  
  <!-- FOOTER -->
  <footer >
  <h1> Creating the right connections</h1>  
  <h4>copyright 2024</h4>
  </footer>
</body>

</html>