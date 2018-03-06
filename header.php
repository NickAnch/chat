
<header class="clearfix">
    <div class="container">
       <a href="#" id="touch-menu">Menu</a>
        <div class="logo">
           <h1 class="right">Travel chat</h1><img src="img/Air.png" alt=""> 
        </div>
           <nav>
            <ul class="nav">
                <li><a href="index.php">Chat</a></li>
                <li><a href="rules.php">Rules</a></li>
                <?php if(isset($_SESSION['logged_user']) ) : ?>
                <li><a href="logout.php">Logout</a><li>
                <?php else : ?>
                <li><a href="registration.php">registration</a></li>
                <li><a href="authorize.php">Login</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['logged_user']) &&  $_SESSION['logged_user'] == 'admin') : ?>
                <li><a href="admin.php">Admin</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
<script>
    $(document).ready(function(){
        var menu = $('#touch-menu');
        var nav = $('.nav');
        
        $(menu).on('click', function(e){
            e.preventDefault();
            nav.slideToggle();
        });
        $(window).resize(function(){
            var wid = $(window).width();
            if(wid>940 && nav.is(':hidden')){
                nav.removeAttr('style');
            }
        });
    });
</script>