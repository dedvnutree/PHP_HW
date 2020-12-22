<div class = 'nav'>
    <div style="font-size:15pt; color:darkred; margin:auto;"> 
        Пользователь
        <br>
            <?php 
                echo '  [  '. $auth->getLogin(). '  ]  ' ;
            ?>
    </div> 

<div>
||<br/>
||<br/>
||<br/>
</div>

    <div >  
        <a class='button' href="index.php?page=main">Главная</a>   <br/> 
        <a class='button' href="index.php?page=myPage">Моя страница</a>   <br/> 
        <a class='button' href="index.php?page=newPost">Новый пост</a>   
    </div>

<div>
||<br/>
||<br/>
||<br/>
</div>
    <div>   <br>
        <a class='button' href='?is_exit=1'> Выйти</a> 
    </div>
</div>