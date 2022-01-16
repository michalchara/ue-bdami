<!DOCTYPE HTML>
<html>
    <head>
        <title>Sklep odzieżowy</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="/css/main.css" />
    </head>

    <body>
    
        <?php 
            require_once($_SERVER['DOCUMENT_ROOT'].'/header.php');
        ?>

		<!-- Main -->
        <section id="main">
            <div class="inner">

            
    
                <form action="zamowienie.php" method="post">

                <table>
                <tr><td>Liczba zamawianych koszulek:</td><td> <input type="text" name="koszulki" size=3 maxsize=3 /> </td></tr>
                <tr><td>Liczba zamawianych spodni: </td><td> <input type="text" name="spodnie" size=3 maxsize=3 /> </td></tr>
                <tr><td>Liczba zamawianych czapek: </td><td> <input type="text" name="czapki" size=3 maxsize=3 /> </td></tr>
                </table>

                <input type="submit" value="złóż zamówienie" />              
                </form>
            

            </div>
		</section>

    </body>
</html>
