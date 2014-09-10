<?php
    $url = 'page1';
    $title = 'page 1';
    
    require_once('ajaxResponseHandler.php');
    Arh::exec($url, $title);
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="kewords"     content="wedding, wedding website, vincent garcia, jacklin sammis, save the date" />
        <meta name="description" content="Vincent Garcia and Jacklin Sammis' wedding website" />
        <meta name="author"      content="Vincent Garcia" />
        
        <meta name="viewport" content="width=640, initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="stylesheet" href="/css/css.css" />
        <link rel="stylesheet" href="/css/jquery.fullPage.css" />
        
        <title><?php echo $title; ?></title>
        
        <script src="/js/jquery-2.1.1.min.js"></script>
        <script src="/js/jquery.easings.min.js"></script>
        <script src="/js/jquery.slimscroll.min.js"></script>
        <script src="/js/jquery.fullPage.js"></script>
        <!--<script src="/js/jquery.fullPage.min.js"></script>-->
        <script src="/js/js.js"></script>
    </head>
    
    <body>
        <nav id="menu"><ul>
            <?php foreach(array(
                array('url' => 'test',  'text' => 'one'),
                array('url' => 'page1', 'text' => 'two'),
                array('url' => 'page2', 'text' => 'three'),
            ) as $menuItem) { ?>
                <a href="<?php echo $menuItem['url']; ?>"><!--
                    --><li<?php if($menuItem['url'] == $url) { ?> class="active"<?php } ?>><!--
                        --><?php echo $menuItem['text']; ?><!--
                    --></li><!--
                --></a>
            <?php } ?>
        </ul></nav>
        <main id="fullpage"><div class="section">
            <div class="slide"        data-index="0" data-url="test"  id="slide0">slide 1</div>
            <div class="slide active" data-index="1" data-url="page1" id="slide1">slide 2</div>
            <div class="slide"        data-index="2" data-url="page2" id="slide2">slide 3</div>
        </div></main>
    </body>
</html>
